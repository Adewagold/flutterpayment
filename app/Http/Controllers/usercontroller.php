<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class usercontroller extends Controller
{
    //
    public $email;

    public function signIn(){
    	return view('user.signin');
    }

    public function signUp(){
    	return view('user.signup');
    }

    public function signUpPost(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'email|required|unique:users',
    		'password'=>'required|min:4'

    		]);
    	$newuser = new User([
    		'name'=>$request->input('name'),
    		'email'=>$request->input('email'),
    		'password'=>bcrypt($request->input('password'))]);
    	$newuser->save();
        Auth::Login($user);
    return redirect()->route('dashboard.index');
    }
 

    public function postSignIn(Request $request){
        //$user = User::find($id);

        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required|min:4'
            ]);
        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

}
    return redirect()->route('dashboard.index');

    }

    public function getLogout(){
        Auth::Logout();
        return redirect()->route('user.signin');
    }

    public function getDashboard(){
       // $email=$request->input('email')
        //dd($this->email);
        return view('dashboard.index', ['user'=> Auth::user()]);
    }
}
