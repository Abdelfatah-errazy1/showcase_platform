<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(){
        return view('pages.auth.login');
    }
     public function signIn(Request $request)  {
        $validate=$request->validate([
            'email' =>'required|email|string',
            'password'=>'required',
        ]);
        // $validate['password']=($validate['password']);
        if(auth()->attempt($validate)){
           if(auth()->user()->is_admin){

               session()->regenerate();
               return redirect(route('admin.projects.index'));
           }
            else{
                return redirect(route('projects.index'));
            }
        }
        throw ValidationException::withMessages(['email'=>'email or password is not working']);
        
    }
    public function logout(){
        auth()->logout();
        return redirect(route('auth.login'));
    }
}
