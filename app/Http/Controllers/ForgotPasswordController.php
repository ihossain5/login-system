<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Mail\forgotPasswordEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller {
    public function index() {
        return view('forgot-password');
    }

    public function sendForgotPasswordNotification(Request $request) {
        $request->validate([
            'user_name' => 'required|exists:users',
        ],[
            'user_name.exists' => 'This name does not exits on our server',
        ]);

        $user = User::where('user_name', $request->user_name)->first();

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $user->email,
            'token'      => $token,
            'created_at' => Carbon::now(),
        ]);
        $maildata = [
            'title'   => 'Hello',
            'message' => 'You are receiving this email because we are received a password reset request for your account',
            'url'     => route('reset.password', [$token]),
        ];

        Mail::to($user->email)->send(new forgotPasswordEmail($maildata));

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function resetPassword($token) {

        $user_token = $this->userToken($token);

        $user = User::where('email', $user_token->email)->first();

        return view('recover-password', compact('user'));
    }

    public function recoverPassword(ResetPasswordRequest $request) {

        Auth::login($request->resetPassword());

        return redirect()->route('dashboard')->with('success', 'Password has been reset');

    }

    private function userToken($token) {
        return DB::table('password_resets')
            ->where('token', $token)
            ->first();
    }
}
