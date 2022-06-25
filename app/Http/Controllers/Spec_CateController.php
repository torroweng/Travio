<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CategoryBanner;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; 

class Spec_CateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
     

 public function show(CategoryBanner $spec_category)
    { 
        $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
       
        $selectedcategory = Post::where('p_category','=', $spec_category->c_id)->where('p_status','=', 1)->paginate(2);
        $recentpost = Post::inRandomOrder()->where('p_status','=', 1)->limit(5)->get();
        
        if(session()->has('LoggedUser'))
        { 
        return view('Spec_Cate',$data)->with(compact('spec_category','selectedcategory','recentpost'));     
        }
        else
        {
        return view('Spec_Cate')->with(compact('spec_category','selectedcategory','recentpost'));        
        }
    }
  public  function postcreate(Request $request){

//Validate requests
    $request->validate([
        'topic'=>'required|min:10|max:150',
        'category'=>'required',
        'message'=>'required|min:10|max:750',
        'file'=>'required|file|mimes:mp4,png|max:204800'      
        
    ]);
    
       $fileName = date('dmYHis')."-".$request->file('file')->getClientOriginalName();  
       if($request->file('file')->extension()=='png')
    {
        $filecreation= Post::create([

            'p_category' => $request->category,
            'p_name' => $request->topic,
            'p_userid' => session('LoggedUser'),
            'p_content' => $request->message,
            'p_image1' => $fileName,
            'p_status' => 1
            
        ]);
        $ratingcreation= Rating::create([

            
            'r_userid' => session('LoggedUser'),
            'r_postid' => Post::max('p_id'),           
            'r_value' => 3,
            'r_status' => 1
            
        ]);
        $commentcreation= Comment::create([

            
            'cm_userid' => session('LoggedUser'),
            'cm_postid' => Post::max('p_id'),
            'cm_comment' => 'autogenerate comment',          
            'cm_status' => 0
            
        ]);
        $filesave = $request->file('file')->storeAs('uploads/',$fileName);

return back()
            ->with('success','You have successfully created post with image attached!')->with('alert','You have successfully created post with image attached!');
    }

    elseif($request->file('file')->extension()=="mp4")
    {
        $filecreation= Post::create([

            'p_category' => $request->category,
            'p_name' => $request->topic,
            'p_userid' => session('LoggedUser'),
            'p_content' => $request->message,
            'p_video' => $fileName,
            'p_status' => 1
        ]);
        $ratingcreation= Rating::create([

            
            'r_userid' => session('LoggedUser'),
            'r_postid' => Post::max('p_id'),           
            'r_value' => 2,
            'r_status' => 1
            
        ]);
        $commentcreation= Comment::create([

            
            'cm_userid' => session('LoggedUser'),
            'cm_postid' => Post::max('p_id'),
            'cm_comment' => 'autogenerate comment',          
            'cm_status' => 0
            
        ]);
        $filesave = $request->file('file')->storeAs('uploads/',$fileName);
       return back()
            ->with('success','You have successfully created post with video attached!')->with('alert','You have successfully created post with video attached!');
            
    }
    else
    {
 return back()
            ->with('error','Upload Failed!');
            
    }
   }
   public function postdelete(Request $request){

        //Validate requests
      

         //Insert data into database
        $request->session()->put('PostSessionDel', $request->postdelete);
        $request->session()->put('CateSession', $request->cateid);
        $postdel=Post::where('p_id','=', session('PostSessionDel'))->where('p_userid','=', session('LoggedUser'))->delete();
        $ratingdel=Rating::where('r_postid','=', session('PostSessionDel'))->delete();
        $commentdel=Comment::where('cm_postid','=', session('PostSessionDel'))->delete();
        $imagedelete=Storage::delete('uploads/'.$request->imagedelete);
        $videodelete=Storage::delete('uploads/'.$request->videodelete);
          
        
    if(($imagedelete || $videodelete)&&($ratingdel && $postdel && $commentdel))
    {
        
    return redirect('home')->with('alert','Your Post had been Deleted and back to Home!');
    }
    else
    {

       return back()->with('alert','You have not successfully delete post!'); 
    }
        
       
    }

 
}