<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function showlogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = DB::table('tbUsers')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            $request->session()->put('user', $user);
            if ($user->role == 1) {
                return redirect('/viewProducts');
            } elseif ($user->role == 2) {
                return redirect('/adminProducts');
            }
        } else {
            return back()->with('error', 'wrong login name or password');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/login')->with('success', 'logout successful!');
    }
}
