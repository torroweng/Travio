<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CategoryBanner;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function updateprofile()
    {

        $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        
        if(session()->has('LoggedUser')){
        
        return view('EditProfile',$data);
    }

        else
        {
           return redirect('home');
        }

    }
    function check(Request $request){

        //Validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:30',
            'newpassword'=>'required|min:8|max:30',
             'connewpassword'=>'required|min:8|same:newpassword'
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

                
                $MbrPass = User::where('u_id','=', session('LoggedUser'));
                
                 if(!$MbrPass)
                    {return back()->with('error','We do not recognize your password');}
                else
                    {User::where('u_id','=', session('LoggedUser'))->update(['u_password'  => Hash::make($request->newpassword)]);return back()->with('success','Password Updated!');}
                    $request->session()->put('LoggedUser', $MbrInfo->u_id);
                  
                  
                
             }else{
                 return back()->with('error','Wrong Password');
             }
        }
    }

    }
}
