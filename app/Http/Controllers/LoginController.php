<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        if(Auth::check()){
            
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function signIn(LoginRequest $request){
    
        $user = $request->authenticate();

        if($user == false){
            return redirect()->back()->with('error','user name and password is incorrect');
        }
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
