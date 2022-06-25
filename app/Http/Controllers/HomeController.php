<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CategoryBanner;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class HomeController extends Controller
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
    public function home(Request $request)
    {
         $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        
        $CategoryList = CategoryBanner::all()->where('c_status','=', 1)->unique('c_id');
        $PostList = Post::orderBy('p_createdtime')->where('p_status','=', 1)->paginate(2);
        $recentpost = Post::inRandomOrder()->where('p_status','=', 1)->limit(5)->get();
        
        if(session()->has('LoggedUser')){
        
        return view('Home',$data)->with(compact(['recentpost','CategoryList','PostList']));
    }

        else
        {
           return view('Home')->with(compact(['recentpost','CategoryList','PostList']));
        }
        
    }
    public function aboutus()
    {
         $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        
        if(session()->has('LoggedUser')){
        
        return view('About',$data);
    }

        else
        {
           return view('About');
        }
        
    }
    public function blog()
    {
         $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        
        $CategoryList = CategoryBanner::all()->where('c_status','=', 1)->unique('c_id');
        $PostList = Post::orderBy('p_createdtime')->where('p_status','=', 1)->paginate(2);
        if(session()->has('LoggedUser')){
        
        return view('Blog',$data)->with(compact(['CategoryList','PostList']));
    }

        else
        {
           return view('Blog')->with(compact(['CategoryList','PostList']));
        }
        
    }
    public function post()
    {
         $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        
        $CategoryList = CategoryBanner::all()->where('c_status','=', 1)->unique('c_id');
        $PostList = Post::orderBy('p_createdtime')->where('p_status','=', 1)->paginate(2);
        if(session()->has('LoggedUser')){
        
        return view('Post',$data)->with(compact(['CategoryList','PostList']));
    }

        else
        {
           return view('Post')->with(compact(['CategoryList','PostList']));
        }
        
    }
   public function contact()
    {
         $data = ['LoggedUserInfo'=>User::where('u_id','=', session('LoggedUser'))->first()];
        
        $CategoryList = CategoryBanner::all()->where('c_status','=', 1)->unique('c_id');
        $PostList = Post::orderBy('p_createdtime')->where('p_status','=', 1)->paginate(2);
        if(session()->has('LoggedUser')){
        
        return view('Contact',$data)->with(compact(['CategoryList','PostList']));
    }

        else
        {
           return view('Contact')->with(compact(['CategoryList','PostList']));
        }
        
    }
     
    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $emaildata = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'email'   =>   $request->email
        );

     Mail::to($emaildata['email'])->send(new SendMail($emaildata));
     return back()->with('success', 'Thanks for contacting us!');

    

}
}