<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        if(!Auth::attempt($request->validated())){
            return redirect()->back()->withErrors(['password'=>'Credentials does not match!']);
        }

        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
