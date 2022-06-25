<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\CategoryBanner;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    { 
        
       
    
        if(session()->has('LoggedUser')){
         
        return redirect('home');
    }

        else
        {
            $request->session()->forget('LoggedUserInfoReset');
           return view('Login');
        }
       
   
    }
    
    public function logout(Request $request){
        
        
            $request->session()->forget('LoggedUser');
            $request->session()->flush();
            return back();      
            
            
    }
    function check(Request $request){

        //Validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:30'
        ]);
        if(!$request->filled('email')||!$request->filled('password'))
        {
            return back();
        }
        else
        {
            $MbrInfo = User::where('u_email','=', $request->email)->where('u_status','=', 1)->first();
            if(!$MbrInfo){
             return back()->with('error','Invalid or Disabled email address');
         }
         else{
             //check password
             if(Hash::check($request->password, $MbrInfo->u_password)){

                $request->session()->put('LoggedUser', $MbrInfo->u_id);
                $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
                
                
                 
                    
                  return redirect('home')->with(compact(['data']));
                  
                
             }else{
                 return back()->with('error','Wrong Email or Password')->with('jsAlert','Wrong Email or Password');
             }
        }
    }


    }
}
