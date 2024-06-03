<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logging(Request $request)
    {
        $validate = $request->validate([
            "email"=> "required",
            "password"=> "required"
        ]);
        if(Auth::attempt($validate))
        {
            return redirect()->intended(route("dashboard"));
        }
        else
        {
            return redirect()->back()->with("error","Incorrect email or password");
        }
    }
    public function register(){
        return view('register');
    }
    public function registration(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email'=> 'required||unique:users,email',
            'password' => 'required'
        ]);
       $create =  User::create($validate);
       if($create)
       {
        return redirect()->route('dashboard');
       }
       else
       {
        return redirect()->back()->with('error','');
       }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
        
    }
}