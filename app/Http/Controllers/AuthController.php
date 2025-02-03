<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'user_nama' => 'required',
            'user_pass' => 'required'
        ]);

        // Get user data
        $user = User::where('user_nama', $request->user_nama)->first();

        // Check if the password matches the MD5 hashed password
        if ($user && Hash::check($request->user_pass, $user->user_pass)) {
            // If login is successful
            Auth::login($user);
            session(['user_id' => $user->user_id]);
            return redirect()->intended('home');
        } else {
            // If failed
            return back()->withErrors(['loginError' => 'Nama atau password salah'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Optionally, invalidate the session to prevent session fixation
        $request->session()->invalidate();

        // Regenerate the session to prevent session hijacking
        $request->session()->regenerateToken();

        // Redirect to the login page or home page
        return redirect()->intended(route('login'));
    }

}
