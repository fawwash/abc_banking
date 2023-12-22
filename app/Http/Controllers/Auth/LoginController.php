<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('signin')->with('status',session('status'));
    }

    public function authenticate(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            $user_id = $user->id;
            $name = $user->name;
            $email = $user->email;
            if (Hash::check($request->input('password'), $user->password)) {
                $user_id_cookie = Cookie::make('id', $user_id, 60 * 24 * 7);
                $name_cookie = Cookie::make('name', $name, 60 * 24 * 7);
                $email_cookie = Cookie::make('email', $email, 60 * 24 * 7);
                Auth::login($user);
                return redirect('/home')->withCookie($user_id_cookie)->withCookie($email_cookie)->withCookie($name_cookie);
            } else {
                return back()->withErrors(['Invalid Credentials']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['An error occurred during authentication.']);
        }
    }
    public function signin(){
        $cookies = request()->Cookie('id');
        if(empty($cookies))
            return view('signin');
        else
        return redirect('/setup/home');
    }
    public function signup(){
        $cookies = request()->Cookie('id');
        if(empty($cookies))
            return view('signup');
        else
        return redirect('/setup/home');
    }

    public function logout()
    {
        try {
            $user_id_cookie = Cookie::forget('id');
            $name_cookie = Cookie::forget('name');
            $email_cookie = Cookie::forget('email');
            Auth::logout();
            return redirect('/login')->withCookie($user_id_cookie)->withCookie($email_cookie)->withCookie($name_cookie)->with('success', 'Logged-out successfully.');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['An error occurred during logout.']);
        }
    }
}
