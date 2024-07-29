<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function signUp(Request $request, User $user)
    {
         $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'name' => ['required', 'string'],
            'password' =>['required', 'confirmed'],
            'password_confirmation' => ['required']
         ]);

            return $user->userSingup($credentials);
        
    }

    public function signin(Request $request, User $user): RedirectResponse
    {
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password' =>['required'],
            
         ]);
        
        $remember = $request->has('remember');

         if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();

            return redirect()->intended('/');
         }

         return back()->withErrors([
            'error' => 'email or password is not correct'
         ]);
    }
}
