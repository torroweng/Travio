<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\CategoryBanner;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
//
    public function register()
    { 
       
        if(session()->has('LoggedUser')){

            return redirect('home');
        }

        else
        {
         return view('Register');
     }


 }
 function check(Request $request){

//Validate requests
    $request->validate([
        'name'=>'required|min:5|max:30',
        'email'=>'required|email',
        'password'=>'required|min:8|max:30',      
        'country'=>'required'
    ]);
    if(!$request->filled('email')||!$request->filled('password')||!$request->filled('name'))
    {
        return back();
    }
    else
    {
        $noduplicate = User::where('u_email','=', $request->email)->first();
        if($noduplicate){
           return back()->with('error','Email had been registered!');
       }
       else{
        $usercreation= User::create([

            'u_name' => $request->name,
            'u_email' => $request->email,
            'u_password' => Hash::make($request->password),
            'u_country' => $request->country
        ]);
        if($usercreation->wasRecentlyCreated){
            return back()->with('success','Registered Successful!');
        }else{
           return back()->with('error','Something went wrong, try again later');
       }

   }
   
}
}
}
