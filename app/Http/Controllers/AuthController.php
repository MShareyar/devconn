<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{    
    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(LoginRequest $request)
    {

        if(!Auth::attempt($request->validated())){
            return redirect()->back()->withErrors(['password'=>'Credentials does not match!']);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function register(RegisterRequest $request)
    {
        $inputs = $request->validated();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        return redirect()->route('dashboard');
        
    }
}
