<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Hash;

class AdminController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $emailChk = User::where(['email'=>$data['email']])->count();
            if($emailChk>0){
                return redirect('/admin-register')->with('error', 'This Email is already use in an 
                    another account.<br>Please register with a new one!');
            }
            $register = new User;
            $register->name = $data['name'];
            $register->email = $data['email'];
            $register->password = Hash::make($data['pwd']);
            //dd($register);
            $register->save();

            return redirect('/admin-login')->with('success','You Are Successfully Registered as An Admin. Login Now!');

        }

        return view('admin.register');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'],'admin'=>'1'])){
                //dd("success");
                return redirect('/admin-dashboard');
            }else{
                return redirect('/admin-login')->with('error','Invalid Username or Password');
            }
        }
        return view('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
    public function logout(){
        Session::flush();
        return redirect('/admin-login')->with('success', 'You are Successfully Logged out');
    }

    public function setting(){
        return view('admin.setting');
    }

    public function chkPassword(Request $request ){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true";die;
        }else{
            echo "false";die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User:: where(['email'=> Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin-setting')->with('success','Password Update Successfully!');
            }else{
                return redirect('/admin-setting')->with('error','Incorrect Current Password!');
            }
        }
    }
}
