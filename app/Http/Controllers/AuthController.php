<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            if(auth()->user()->is_admin){

                return redirect(route('admin.projects.index'));
            }
            return redirect(route('projects.index'));
        }

        return view('pages.auth.login');
    }
     public function signIn(Request $request)  {
        $validate=$request->validate([
            'email' =>'required|email|string',
            'password'=>'required',
        ]);
         $remember = $request->has('remember');

        if (Auth::attempt($validate, $remember)) {
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


    public function register(){
        if (Auth::check()) {
            if(auth()->user()->is_admin){

                return redirect(route('admin.projects.index'));
            }
            return redirect(route('projects.index'));
        }
        return view('pages.auth.create');
    }
    public function signUp(Request $request){
        $validated=$request->validate([
            'name'=>'required|max:50',
            'email'=>'required|email|max:100|unique:users,email',
            'password'=>'required|min:8|max:50',
        ]);
        // $validated['password']=Hash::make( $validated['password']);
        $validated['username']=$validated['email'];
        $user=User::create($validated);
        auth()->login($user);
        // Notification::route('mail', 'errazy.abdelfatah@gmail.com')->notify(new UserRegisteredNotification());

        return redirect()->route('home')->with('success','your account has been created successfly');

    }
}
