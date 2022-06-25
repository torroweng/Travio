@extends('Layout.body')
<title>Travio-Home</title>
@section('content')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>{{$spec_category->c_name}}</h4>
            <h2>{{$spec_category->c_content}}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            
            @if(count($selectedcategory) < 1)
            <div class="col-lg-12">  
              <h4>No post in {{$spec_category->c_name}} category</h4>
              <br/>

            </div>
            @else
            @foreach($selectedcategory as $selectedcategory1)


            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb">
                  @if($selectedcategory1->p_video =='')
                  
                  <img src="{{ URL::asset("storage/uploads/{$selectedcategory1->p_image1}") }}" alt="">
                  @else
                  <video width="100%" controls autoplay muted loop>
                    <source src="{{ URL::asset("storage/uploads/{$selectedcategory1->p_video}") }}" type="video/mp4">
                      
                      Your browser does not support the video tag.
                    </video>
                    @endif
                    
                  </div>
                  <div class="down-content">
                    <span>Lifestyle</span>
                    <a href="{{route('spec_post.show', $selectedcategory1)}}"><h4>{{$selectedcategory1->p_name}}</h4></a>
                    <ul class="post-info">
                      <li>{{$selectedcategory1->PostedByUser->u_name}} <span class="flag-icon flag-icon-{{$selectedcategory1->PostedByUser->u_country}}"></span></li>
                      <li>{{$selectedcategory1->p_createdtime}}</li>
                      <li>{{$selectedcategory1->Comment->where('cm_postid','=', $selectedcategory1->p_id)->where('cm_status','=', 1)->count('cm_id')}} Comment</li>
                    </ul>
                    <p style="word-wrap: break-word">{{$selectedcategory1->p_content}}</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            @if(session()->has('LoggedUser'))
                  <form method="POST" action="{{ route('likepost') }}" style="display: inline-block;">
                    {{ csrf_field() }}
                    <li><input name="postlike" type="hidden" id="postlike" placeholder="postlike" value="{{$selectedcategory1->p_id}}"  readonly></li>           
                 <li style="color:blue;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-up" style="color:blue;"></i>  <strong>{{$selectedcategory1->PostRating->where('r_postid','=', $selectedcategory1->p_id)->where('r_value','=', 1)->count('r_postid')}}</strong></button></li>
               </form>
                <form method="POST" action="{{ route('unlikepost') }}" style="display: inline-block;">
                    {{ csrf_field() }}
                     <li><input name="postlike" type="hidden" id="postlike" placeholder="postlike" value="{{$selectedcategory1->p_id}}"  readonly></li>  
                 <li style="color:red;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-down" style="color:red;"></i>  <strong>{{$selectedcategory1->PostRating->where('r_postid','=', $selectedcategory1->p_id)->where('r_value','=', 0)->count('r_postid')}}</strong></button></li>
               </form>
               @else
               <li style="color:blue;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-up" style="color:blue;"></i>  <strong>{{$selectedcategory1->PostRating->where('r_postid','=', $selectedcategory1->p_id)->where('r_value','=', 1)->count('r_postid')}}</strong></button></li>
                <li style="color:red;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-down" style="color:red;"></i>  <strong>{{$selectedcategory1->PostRating->where('r_postid','=', $selectedcategory1->p_id)->where('r_value','=', 0)->count('r_postid')}}</strong></button></li>
               @endif
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            @if(session()->has('LoggedUser'))
                            @if($selectedcategory1->p_userid == $LoggedUserInfo['u_id'])
                            <form method="POST" action="{{ route('spec_cate.postdelete') }}">
                              {{ csrf_field() }}
                              <li><input name="postdelete" type="hidden" id="postdelete" placeholder="postdelete" value="{{$selectedcategory1->p_id}}"  readonly></li>
                              <li><input name="imagedelete" type="hidden" id="imagedelete" placeholder="imagedelete" value="{{$selectedcategory1->p_image1}}"  readonly></li>
                              <li><input name="videodelete" type="hidden" id="videodelete" placeholder="videodelete" value="{{$selectedcategory1->p_video}}"  readonly></li>
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
              
              
              @endforeach

              <div class="col-lg-12">
                <div class="d-flex justify-content-center">
                  {!! $selectedcategory->appends(['selectedcategory' => 'list'])->links() !!}
                </div>
              </div>
              @endif
              @if(session()->has('LoggedUser'))
              <div class="col-lg-12 text-center">
                <br/>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo" style="background: rebeccapurple;">Create new post</button>
              </div>
              <div id="demo" class="collapse">
                <div class="col-lg-12">  
                  <section class="contact-us" >
                    <div class="container">
                      <div class="row">
                        
                        <div class="col-lg-12">
                          <div class="down-contact">
                            <div class="row">
                              
                              <div class="col-lg-12 login" >
                                <div class="sidebar-item contact-form">
                                  <div class="sidebar-heading text-center">
                                    <h2>Share a {{$spec_category->c_name}} </h2>
                                  </div>
                                  
                                  <div class="content">
                                    <form id="contact" action="{{ route('spec_cate.postcreate') }}" method="POST" enctype="multipart/form-data">
                                      @if ($message = Session::get('error'))
                                      <div class="alert alert-danger alert-block">
                                        
                                        <strong>{{ $message }}</strong>
                                        <button type="button"  data-dismiss="alert">×</button>
                                      </div>
                                      @elseif ($message = Session::get('success'))
                                      <div class="alert alert-success alert-block">
                                        <strong>{{ $message }}</strong>
                                        <button type="button"  data-dismiss="alert">×</button>
                                      </div>
                                      
                                      @endif
                                      @if (count($errors) > 0)
                                      <div class="alert alert-danger">
                                        <h5>⚠Noted⚠</h5>
                                        <ul>
                                         @foreach($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                         @endforeach

                                       </ul>
                                       <button type="button"  data-dismiss="alert" >×</button>
                                     </div>
                                     @endif
                                     
                                     {{ csrf_field() }}
                                     <div class="row">
                                    <!-- <div class="col-md-12 col-sm-12">
                                      <fieldset>
                                        <h3>Category</h3>
                                      </fieldset>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                      <fieldset>
                                        {{$spec_category->c_name}}
                                        <select name="category" id="category">
                                          <option value="1" selected>Place</option>
                                          <option value="2">Food</option>
                                          <option value="3">Travel</option>
                                          
                                        </select>
                           
                              
                            </fieldset>
                          </div> -->
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Topic</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="topic" type="text" id="topic" placeholder="Topic" >
                             <!--  @error('email')
                              <div class="alert-danger">{{$message}}</div>   
                              @enderror -->
                              <input name="category" type="hidden" id="category" placeholder="category" value="{{$spec_category->c_id}}"  readonly>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Content</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="Your Message"  style=" resize: none; "></textarea>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Upload Image or Video</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input type="file" name="file" >                            
                            </fieldset>
                          </div>
                          <div class="col-lg-12 text-center">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Post</button>
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
          
          
          
        </div>
      </div>
    </section>
  </div>
</div>
@endif

                <!-- <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div> -->
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
          </div>
        </div>
      </div>
    </section>
    @endsection