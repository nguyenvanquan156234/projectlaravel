<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember');
        $credentials = ['email' => $email, 'password' => $password, 'level' => 1];

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin/home');
        } else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }


}
