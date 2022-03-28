<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

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

        return redirect()->route('front.dashboard');
    }

    public function register(RegisterRequest $request)
    {
        $inputs = $request->validated();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        return redirect()->route('dashboard');
        
    }
}
