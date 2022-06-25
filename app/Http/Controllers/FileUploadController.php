<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; 
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('fileUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimetypes:video/mp4,image/png|max:204800'  //mimes:jpeg,png,svg,webp,jpg,mp4
        ]);
        
        $fileName = date('dmYHis')."-".$request->file->getClientOriginalName();  
   
        
   
        
    if($request->file('file')->extension()=='png')
    {
        $usercreation= Post::create([

            'p_category' => '1',
            'p_name' => 'a',
            'p_userid' => '1',
            'p_content' => '1',
            'p_image1' => $fileName
            
        ]);
        $filesave = $request->file('file')->storeAs('public/uploads/',$fileName);
return back()
            ->with('success','You have successfully upload picture.'.$request->file->getClientOriginalExtension())
            ->with('file',$request->file->getClientOriginalExtension());
    }

    elseif($request->file('file')->extension()=="mp4")
    {
        $usercreation= Post::create([

            'p_category' => '1',
            'p_name' => 'a',
            'p_userid' => '1',
            'p_content' => '1',
            'p_video' => $fileName
        ]);
        $filesave = $request->file('file')->storeAs('public/uploads/',$fileName);
       return back()
            ->with('success','You have successfully upload video.'.$request->file->getClientOriginalExtension())
            ->with('file',$request->file->getClientOriginalExtension()); 
    }
    else
    {
 return back()
            ->with('error','Upload Failed!')
            ->with('file',$request->file->getClientOriginalExtension()); 
    }
    }
    public function delete(Request $request)
    {

        $request->validate([
            'filename' => 'required',
        ]);
        
        $fileName = $request->filename;  
   
        $filedelete=Storage::delete('public/uploads/'.$request->filename);
   
        
    if($filedelete)
    {
        $post=Post::where('p_image1','=', $request->filename)->orwhere('p_video','=', $request->filename)->delete();
return back()
            ->with('alert','You have delete post.');
    }
    else
    {
       return back()
            ->with('alert','You have not delete post.'); 
    }
    }
}