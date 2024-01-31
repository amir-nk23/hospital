<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showlogin(){

        return view('auth.login');

    }

    public function login(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'mobile' => ['required','digits:11'],
            'password' => ['required'],
        ],[
            'mobile.required'=>'لطفا تمامی فیلد ها را پر کنید',
            'mobile.digits'=>'لطفا شماره موبایل خود را به صورت صحیح وارد کنید',
            'password.required'=>'لطفا تمامی فیلد ها را پر کنید'
        ]);



        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'validate' => 'اطلاعات وارد شده صحیح نمیباشد',
        ])->onlyInput('mobile');


    }


    public function logout(){


        Auth::logout();

        return redirect()->route('auth.login');

    }
}
