<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
 	// show admin login view   

 	public function index(){
 		
 		return view("Auth/login");
 	}

 	public function loginProcess(Request $request){
 		
 		// form validation
 		
 		$request->validate([
 			'email'	   =>'required',
 			'password' =>'required'
 		]);

 		$email = $request->email;
 		$password = $request->password;

 		// retrive first occurence
 		
 		$user = User::where('email', $email)
 					  ->where('password',$password)
 					  ->first();

 		if($user != null){
 			
 			if($user->role == 'admin'){
 			   $request->session()->put('email', $email);
 			   $request->session()->put('role', $user->role);
			   return redirect()->route('adminHome');
 			}else{
 				$request->session()->put('email', $email);
 				$request->session()->put('role', $user->role);
			    return redirect()->route('farmerhome.index');
 			}
 			 

 		}else{
 			$request->session()->flash('errorMessage', 'Please Insert Valid email and password');
 			return redirect()->route('adminLogin');
 		}

 	}


}
