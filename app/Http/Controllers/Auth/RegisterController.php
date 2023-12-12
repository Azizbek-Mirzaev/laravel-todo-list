<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
       $user = new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=bcrypt($request->password);
       $user->save();
        return redirect()->route('showLoginForm');
        //dd(md5('password'),bcrypt('password'));
        //dd($request->name,$request->email);
        //return view('auth.register');
    }
}
