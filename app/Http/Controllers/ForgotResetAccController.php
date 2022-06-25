<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CategoryBanner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassMail;
use Carbon\Carbon;

class ForgotResetAccController extends Controller
{
    //
    public function forgotpass()
    {     
        if(session()->has('LoggedUser')){
        
        return redirect('home');
    }

        else
        {
           return view('ForgotPass');
        }

    }
    public function resetpass()
    {     
        $data = ['LoggedUserInfoReset'=>User::where('u_id','=', session('LoggedResetId'))->first()];
        if(session()->has('LoggedUserInfoReset')){
        
        return view('ResetPass',$data);
    }

        else
        {
           return redirect('forgotpass');
        }
    }
    public function check(Request $request){
        //You can add validation login here

$MbrInfo = User::where('u_email','=', $request->email)->first();
    
//Check if the user exists
if(!$MbrInfo){
            return back()->with('error','Empty field or Invalid User\'s email address');
        }

//Create Password Reset Token
         $MbrInfo = User::where('u_email','=', $request->email)->update(['u_otp'  =>  rand(100000,999999),'u_otpdate'  => Carbon::now()]);
                

//Get the token just created above
$tokenData = User::where('u_email','=', $request->email)->first();

if ($this->sendResetEmail($request->email, $tokenData->u_otp)) {
     $MbrInfo = User::where('u_email','=', $request->email)->first();
    
    
    return redirect('resetpass')->with($request->session()->put('LoggedResetId', $MbrInfo->u_id))->with($request->session()->put('LoggedUserInfoReset', $MbrInfo->u_id));
} else {
    return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
}
    }
    private function sendResetEmail($email)
{
//Retrieve the user from the database
$UsrInfoResetPass = User::where('u_email','=', $email)->select('u_name', 'u_email','u_otp')->first();

//Generate, the password reset link. The token generated is embedded in the link

$data = array(
            'email'   =>   $email,
            'name' =>   $UsrInfoResetPass->u_name,
            'otp'=>$UsrInfoResetPass->u_otp
        );
    try {

        Mail::to($data['email'])->send(new ForgotPassMail($data));
        
                
           return true;     
    
        
    } catch (Exception $e) {
        return false;
    }

}
function setnewpass(Request $request){
        //Validate requests
        
        $request->validate([
             'email'=>'required|email',
             'newpassword'=>'required|min:8|max:30',
             'connewpassword'=>'required|min:8|same:newpassword',
             'otp'=>'required|min:6'
        ]);

        $verifyotp = User::where([['u_email','=', $request->email],['u_otp','=', $request->otp]])->first();

        if(!$verifyotp){
            return back()->with('error','Invalid OTP');
        }else{
            //check otp
            
                $MbrOTP = User::where('mbr_id','=', session('LoggedResetId'));
               
                if(!$MbrOTP){return back()->with('fail','We do not recognize your otp');}
                else
                { User::where('u_id','=', session('LoggedResetId'))->update(['u_password'  => Hash::make($request->newpassword)]);
                session()->forget('LoggedResetId');
                return redirect('login')->with('success','New Password Set and Ready to go.');}
                            
        }
    }
}
