<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
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
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $cred=[
            'email'=>$email,
            'password'=>$password
        ];

        if(Auth::guard('web')->attempt($cred,1))
        {
            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect()->back()->withErrors(['email'=>'does not match our records']);

        }
    }

    public function viewForget(){
        return view('forgetPassword');
    }

    public function sendEmailToResetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);

        $email=$request->email;
        session()->put('email',$email);

        Mail::to($email)->send(new ResetPasswordEmail(route('viewResetPassword',$request->_token)));
        return view('emails.messageAfterSendingEmail');
    }

    public function viewResetPassword(Request $request,$token){
        if(session()->get('_token') == $token){
            return view('reset-password');
        }
        else{
            return abort(404);
        }
    }

    public function changePassword(Request $request){
        $request->validate([
            'password' => 'required|alpha_num|max:255|confirmed'
        ]);
        if (session()->has('email')){
            $user=User::where('email',session()->get('email'))->first();
            $password=bcrypt($request->pasword);
            $user->update(['password' => $password]);
            $user->save();
            session()->forget('email');
            auth()->login($user);
            return redirect('/');
        }else{
            return abort(404);
        }
    }
}
