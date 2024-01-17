<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;


//use Mail;

class AuthContoller extends Controller
{
    //create public function to enable user to login
    public function login()
    { 
        if (!empty(Auth::check())) {
            # code...
           if (Auth::user()->user_type == 1) 
           {
                # code...
                return redirect('admin/dashboard');
           }
           else if (Auth::user()->user_type == 2) {
                # code...
                return redirect('teacher/dashboard');
            }
            else if (Auth::user()->user_type == 3) 
            {
                # code...
                return redirect('student/dashboard');
            }
            else if (Auth::user()->user_type == 4) 
            {
                # code...
                return redirect('parent/dashboard');
            }
        }
        return view('auth.login');
    }
     
    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' =>$request->email, 'password' => $request->password], $remember)) {
            # code...
            if (Auth::user()->user_type == 1) {
                # code...
                return redirect('admin/dashboard');
            } 
            else if(Auth::user()->user_type == 2){
                # code...
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                # code...
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 4){
                # code...
                return redirect('parent/dashboard');
            }
        }
        else {
            return redirect()->back()->with('error', 'Please enter correct email or password');
        }
    }

    public function register(){
        return view('auth.register');
    }
    public function register_user(Request $request){
      
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required | email |unique:users',
            'password' => 'required|min:8|max:15|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/|confirmed',
        ]);
        
        $user =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $result = $user->save();

        if ($result) {
            # code...
            return back()->with('success', 'You have registered successfully');
          
        } else {
            # code...
            return back()->with('fail', 'Something went wrong');
        } 
        
    }
    public function forgot_password(Request $request){
        return view('auth.forgot-password');
       
    }
    public function PostForgotPassword(Request $request){
        $user = User::getEmailSingle($request->email);
        
        if (!empty($user)) {
            # code...
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your email and reset your password");

        } else {
            # code...
            return redirect()->back()->with('error', "Email not found in the System");
        }

        
    }
    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            # code...
            $data['user'] = $user;
            return view('auth.reset');
        } else {
            # code...
            abort(404);
        }
        
        
        
    }
    public function PostReset($token, Request $request){
        if ($request->password == $request->cpassword) {
            # code...
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            
            return redirect(url('/'))->with('success', "Password successfully changed.");
        }
        else {
            # code...
            return redirect()->back()->with('error', "Password and Confrim password does not match");
        }
    }
    public function logout(Request $request){
        Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');

    }
    
}
