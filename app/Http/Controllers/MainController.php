<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function save(Request $request){
        //return $request->input();//to test if we get input on post request

        //Validate requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',//email required on email-format, with 'admins' email being unique
            'password' => 'required|min:5|max:12'//password required with min length of 5 and max length of 12
        ]);

        //insert data into database thanks to the model
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);//use the Hash helper to hash password
        $save = $admin->save();

        if($save){
            return back()->with('success', 'New User has been successfully added to the database');
        } else {
            return back()->with('fail', 'Something wetn wrong, try again later');
        }
    }

    function check(Request $request){
        //return $request->input();//To check if we get request inputs
        
        //Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        //to fetch user with requested email in Admin's table
        $userInfo = Admin::where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address');
        } else{
            //check if password is correct
            if(Hash::check($request->password, $userInfo->password)){
                //store user id into session
                $request->session()->put('LoggedUser', $userInfo->id);
                //redirect to the admin's dashboard area
                return redirect('admin/dashboard');
            } else {
                //display error message on login area if password is incorrect
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    //Create logout method
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        //where user id = user id stored in session
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

    function settings(){
        //where user id = user id stored in session
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    function profile(){
        //where user id = user id stored in session
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }

    function staff(){
        //where user id = user id stored in session
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
}
