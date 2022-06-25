@extends('Layout.body')
<title>Travio-Post</title>
@section('content')
<!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>{{$spec_post->Category->c_name}}</h4>
                <h2>{{$spec_post->p_name}}</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      @if($spec_post->p_video =='')
                      <img src="{{ URL::asset("storage/uploads/{$spec_post->p_image1}") }}" alt="">
                      @else
                      <video width="100%" controls autoplay muted loop>
          <source src="{{ URL::asset("storage/uploads/{$spec_post->p_video}") }}" type="video/mp4">
            
            Your browser does not support the video tag.
          </video>
                      @endif
                    </div>
                    <div class="down-content">
                      <span>{{$spec_post->Category->c_name}}</span>
                      <h4>{{$spec_post->p_name}}</h4>
                      <ul class="post-info">
                        <li>{{$spec_post->PostedByUser->u_name}} <span class="flag-icon flag-icon-{{$spec_post->PostedByUser->u_country}}"></span></li>
                        <li>{{$spec_post->p_createdtime}}</li>
                        <li>{{$spec_post->Comment->where('cm_postid','=', $spec_post->p_id)->where('cm_status','=', 1)->count('cm_id')}} Comment</li>
                      </ul>
                      <p style="word-wrap: break-word">{{$spec_post->p_content}}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              @if(session()->has('LoggedUser'))
                  <form method="POST" action="{{ route('likepost') }}" style="display: inline-block;">
                    {{ csrf_field() }}
                    <li><input name="postlike" type="hidden" id="postlike" placeholder="postlike" value="{{$spec_post->p_id}}"  readonly></li>           
                 <li style="color:blue;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-up" style="color:blue;"></i>  <strong>{{$spec_post->PostRating->where('r_postid','=', $spec_post->p_id)->where('r_value','=', 1)->count('r_postid')}}</strong></button></li>
               </form>
                <form method="POST" action="{{ route('unlikepost') }}" style="display: inline-block;">
                    {{ csrf_field() }}
                     <li><input name="postlike" type="hidden" id="postlike" placeholder="postlike" value="{{$spec_post->p_id}}"  readonly></li>  
                 <li style="color:red;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-down" style="color:red;"></i>  <strong>{{$spec_post->PostRating->where('r_postid','=', $spec_post->p_id)->where('r_value','=', 0)->count('r_postid')}}</strong></button></li>
               </form>
               @else
               <li style="color:blue;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-up" style="color:blue;"></i>  <strong>{{$spec_post->PostRating->where('r_postid','=', $spec_post->p_id)->where('r_value','=', 1)->count('r_postid')}}</strong></button></li>
                <li style="color:red;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-down" style="color:red;"></i>  <strong>{{$spec_post->PostRating->where('r_postid','=', $spec_post->p_id)->where('r_value','=', 0)->count('r_postid')}}</strong></button></li>
               @endif
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                            @if(session()->has('LoggedUser'))
                            @if($spec_post->p_userid == $LoggedUserInfo['u_id'])
                            <form method="POST" action="{{ route('spec_cate.postdelete') }}">
                              {{ csrf_field() }}
                              <li><input name="postdelete" type="hidden" id="postdelete" placeholder="postdelete" value="{{$spec_post->p_id}}"  readonly></li>
                              <li><input name="imagedelete" type="hidden" id="imagedelete" placeholder="imagedelete" value="{{$spec_post->p_image1}}"  readonly></li>
                              <li><input name="videodelete" type="hidden" id="videodelete" placeholder="videodelete" value="{{$spec_post->p_video}}"  readonly></li>
                            <li><button type="submit" id="form-submit" class="main-button"><i class="fa fa-trash"></i></button></li>
                          </form>
                            @endif
                            @endif
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments" >
                    <div class="sidebar-heading">
                      <h2>{{$spec_post->Comment->where('cm_postid','=', $spec_post->p_id)->where('cm_status','=', 1)->count('cm_id')}} Comment </h2>
                    </div>
                    <div class="content" style="height: 400px;overflow: auto;">
                      <ul>
                        
                          <!-- <div class="author-thumb">
                            <img src="{{ Storage::url("uploads/blog-thumb-02.jpg") }}"alt="" height="100" width="100">
                          </div> -->
                          @foreach($comment as $comment)
                          <li style="width: 100%;">
                          <div class="right-content">                           
                            <h4>{{$comment->CommentByUser->u_name}}<span class="flag-icon flag-icon-{{$comment->CommentByUser->u_country}}"></span><span>{{$comment->cm_createdtime}}</span></h4>
                            <p>{{$comment->cm_comment}}</p>
                            @if(session()->has('LoggedUser'))
                            @if($comment->cm_userid == $LoggedUserInfo['u_id'])
                            <form method="POST" action="{{ route('commentdelete') }}">
                              {{ csrf_field() }}
                              <li><input name="commentdelete" type="hidden" id="commentdelete" placeholder="commentdelete" value="{{$comment->cm_id}}"  readonly></li>
                              
                            <li><button type="submit" id="form-submit" class="main-button"><i class="fa fa-trash"></i></button></li>
                          </form>
                            @endif
                            @endif
                          </div>
                        </li>
                        <br/>
                          @endforeach
                          
                       
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    <div class="content">
                      <form id="comment" action="#" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="subject" type="text" id="subject" placeholder="Subject">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="Type your comment"></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <!-- <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div> -->
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                      @if(count($recentpost) < 1)
                      <h4>No post had been created! Get to share your new post now!</h4>
                      @else
                      @foreach($recentpost as $recentpost)
                        <li><a href="{{route('spec_post.show', $recentpost)}}">
                          <h5>{{$recentpost->p_name}}</h5>
                          <p>{{$recentpost->PostedByUser->u_name}} <span style="display: inline-block;" class="flag-icon flag-icon-{{$recentpost->PostedByUser->u_country}}"></span></p>
                          <span>{{$recentpost->p_createdtime}}</span>
                        </a></li>
                      @endforeach
                      @endif
                      
                    
                      </ul>
                    </div>
                  </div>
                </div>
               
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection