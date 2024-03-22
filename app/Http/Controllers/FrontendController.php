<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\verifyAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class FrontendController extends Controller
{
    public function Login()
    {
        return view('frontend.login');
    }
    public function postLogin(Request $request)
    {
        $check=Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($check) {
            if(auth()->user()->email_verified_at == '') {
                Auth::logout();
                return back()->withInput()->with('error', 'Bạn chưa xác nhân tài khoản, vui lòng kiểm tra lại email');
            };
            return redirect()->route('home');
        } else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        };

    }

    public function Logout()
    {
        Auth::logout();
            
        return redirect()->back();

    }
    public function signUp()
    {
        return view('frontend.signup');
    }
    public function postsignUp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'fullname' => 'required',
        ]);

        try {
            if($acc = User::create([
                'email' => $request->email,
                'name' => $request->fullname,
                'password' => Hash::make($request->password),
            ])) {
                Mail::to($acc->email)->send(new verifyAccount($acc));
                // dd('ok',);
            };
            // dd('No ok');
            return redirect()->route('login')->with('success', 'Đăng ký thành công, hãy kiểm tra email để xác nhận tài khoản');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu cần thiết
            dd($e);
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }

    }
    public function getHome()
    {
        $data['dacbiet'] = Product::where('prod_dacbiet', 1)->orderBy('prod_id', 'desc')->take(8)->get();
        $data['moi'] = Product::where('prod_dacbiet', 0)->orderBy('prod_id', 'desc')->take(8)->get();

        return view('frontend.home', $data);
    }
    public function getDetail($id)
    {
        $data['item'] = Product::find($id);
        $data['comment'] = Comment::where('com_product',$id)->get();
        return view('frontend.details', $data);
    }
    public function getCategory($id)
    {
        $data['cateitems'] = Category::find($id);
        $data['items'] = Product::where('cate', $id)->orderBy('prod_id', 'desc')->paginate(4);
        return view('frontend.category', $data);
    }
    public function postComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment -> com_name = $request->name;
        $comment -> com_email = $request->email;
        $comment -> com_content = $request->content;
        $comment -> com_product = $id;
        $comment->save();
        return back();
    }

    public function getSearch(Request $request)
    {
        $search = $request->result;
        $data['keysearch'] = $request->result;
        $search = str_replace(' ','%',$search);
        $data['comments'] = Product::where('prod_name','like','%'.$search.'%',)->get();
        return view('frontend.search', $data);
    }
    public function verify( $email)
    {
        $acc = User::Where('email', $email);
        $acc->WhereNULL('email_verified_at')->firstOrfail();
        $acc->update(['email_verified_at' => date('Y-m-d')]);
        return redirect()->route('login')->with('success', 'xác nhận thành công, bạn có thể đăng nhập lại');
    }
}
