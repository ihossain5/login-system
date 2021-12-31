<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller {
    public function index() {

        return view('admin.dashboard');
    }

    public function verifyEmail(User $user) {
        $user->update([
            'email_verified_at' => Carbon::now(),
        ]);

        return redirect()->route('dashboard')->with('success','Your account has been verified');
    }
}
