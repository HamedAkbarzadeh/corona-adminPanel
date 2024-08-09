<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function GoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoolgeCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'password' => Hash::make(12345678),
            'email' => $googleUser->email,
        ]);

        Auth::login($user);

        return redirect()->route('admin.home');
    }
}
