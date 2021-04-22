<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Controller;
use App\Http\Requests\TwoFactorLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class TwoFactorAuthenticatedSessionController extends Controller
{


    /*
     * Attempt to authenticate a new session using the two factor authentication code.
     *
     * @param  \Laravel\Fortify\Http\Requests\TwoFactorLoginRequest  $request
     * @return mixed
     */
    public function store(TwoFactorLoginRequest $request)
    {
        $user = $request->challengedUser();

        if ($code = $request->validRecoveryCode()) {
            $user->replaceRecoveryCode($code);
        } elseif (! $request->hasValidCode()) {

            if ($request->code){
                return view('auth.two-factor-challenge')->withErrors(['code'=>'The provided two factor authentication code was invalid.']);
            }else{
                return view('auth.two-factor-challenge')->withErrors(['recovery_code'=>'The provided two factor authentication recovery_code was invalid.']);
            }
        }

        Auth::login($user, $request->remember());

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }
}
