<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Summary of userSingup
     * @param array<user> $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userSingup( array $credentials): RedirectResponse
    {
            User::create([
            'name' => $credentials['name'],
            'email'  => $credentials['email'],
            'password' => Hash::make($credentials['password'])
       ]);
        
        
        return to_route('login');
    
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function profile(){
     return User::where('id', Auth::user()->id)->get(['name', 'email']);
    }
    

}
