<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $data){
        $data->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email'=>$data->email,'password'=>$data->password])) {
            if(Auth::guard('admin')->user()->role != 'admin'){
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error','Unauthorized user.Access denied!');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->withInput($data->only('email'))->with('error','Invalid Credentials');
        }
    }

    public function register(){

        $user = new User();
        $user->name='Admin';
        $user->role='admin';
        $user->email='admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();

        return redirect()->route('admin.login')->with('success','User created successfully.');

    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logged out successfully');
    }

    public function form(){
        return view('admin.form');
    }

    public function table(){
        return view('admin.table');
    }
}
