<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    //
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        
        
        $newUser = User::updateOrCreate([
            'google_id' =>$user->id,
        ]
            ,[
            'name' => $user->name,
            'email' => $user->email,
            'google_id' => $user->id,
            'password' => Hash::make('dummypassword')
        ]);

            request()->session()->regenerate();
            Auth::login($newUser);
            session(['exam_id'=> Str::random(40) ]);
            return redirect()->intended('/');

    }
}
