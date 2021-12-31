<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\verifyEmail as MailVerifyEmail;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller {
    public function index() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('register');
    }

    public function signUp(RegisterRequest $request) {

        $user = User::create($request->validated());

        $maildata = [
            'title'   => 'Hello',
            'message' => 'Verify your email address by clicking below button',
            'url'     => route('verify.email', [$user->id]),
        ];

        Mail::to($user->email)->send(new MailVerifyEmail($maildata));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
