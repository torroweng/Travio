<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CategoryBanner;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class Spec_PostController extends Controller
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
   
     

 public function show(Post $spec_post)
    { 
        $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        $comment = Comment::where('cm_postid','=',$spec_post->p_id)->where('cm_status','=',1)->get();
        $recentpost = Post::inRandomOrder()->where('p_status','=', 1)->limit(5)->get();
        
        if(session()->has('LoggedUser'))
        { 
        return view('Spec_Post',$data)->with(compact('spec_post','comment','recentpost'));     
        }
        else
        {
        return view('Spec_Post')->with(compact('spec_post','comment','recentpost'));        
        }
    }
    public function likepost(Request $request){

        $ratinglike=Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->first();
    
      if(!$ratinglike){
        
        $ratingcreation= Rating::create([

            
            'r_userid' => session('LoggedUser'),
            'r_postid' => $request->postlike,           
            'r_value' => 1
            
        ]);
        return back()->with('alert','You have liked the post!'); 
        }
        else if(Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->where('r_value','=',1)->first())
        {
            Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->update(['r_value'  => 3]);
            return back()->with('alert','You have remove the like for the post!'); 
        }
        else
        {
            Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->update(['r_value'  => 1]);
            return back()->with('alert','You have change to like the post!'); 
        }
   }
   public function unlikepost(Request $request){

        $ratingunlike=Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->first();
    
      if(!$ratingunlike){
        
        $ratingcreation= Rating::create([

            
            'r_userid' => session('LoggedUser'),
            'r_postid' => $request->postlike,           
            'r_value' => 0
            
        ]);
        return back()->with('alert','You have unliked the post!'); 
        }
        else if(Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->where('r_value','=',0)->first())
        {
            Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->update(['r_value'  => 3]);
            return back()->with('alert','You have remove the unlike for the post!'); 
        }
        else
        {
            Rating::where('r_userid','=',session('LoggedUser'))->where('r_postid','=',$request->postlike)->update(['r_value'  => 0]);
            return back()->with('alert','You have change to unlike the post!'); 
        }
   }
   public function commentdelete(Request $request){

        //Validate requests
      

         //Insert data into database
        $request->session()->put('CommentSessionDel', $request->commentdelete);
        
        $commentdel=Comment::where('cm_id','=', session('CommentSessionDel'))->where('cm_userid','=', session('LoggedUser'))->delete();
        
          
        
    if($commentdel)
    {
        
    return back()->with('alert','Your comment had been Deleted！');
    }
    else
    {

       return back()->with('alert','You have not successfully delete your comment!'); 
    }
        
       
    }
}