<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['index','login']);
    }
    public function index(){
        return view('login');
    }
    public function logout(){
        auth()->logout();
        session()->flush();
        return view('logout');
    }
    public function login(Request $request){
        $password=$request->password;
        $email=$request->email;

        $cred=[
            'email'=>$email,
            'password'=>$password
        ];

        if(Auth::guard('web')->attempt($cred,1))
        {
            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect('/');

        }
    }

    public function viewForget(){
        return view('forgetPassword');
    }
}
