<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        return view('backend.index');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
