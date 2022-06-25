@extends('Layout.body')
<title>Travio-Home</title>
@section('content')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="video-banner header-text" >
  <div class="row-hero">
    <video class="video" poster="" autoplay playsinline muted loop>
      <source src="{{ URL::asset("storage/videobanner/header video.mp4") }}" type="video/mp4">
      </video>
      <div class="video-quote">
        <p>Get to share and discover new place, food and travel, <b>Travio</b> is ready for you!</p>
      </div>
    </div>
  </div>
  <br/><br/><br/>
  <div class="text-center main-banner header-text" >
    <h1>Recommended Categories</h1>
  </div>
  <div class="main-banner header-text">
    <div class="container-fluid">
      <div class="owl-banner owl-carousel">
        @foreach($CategoryList as $CategoryList)

        <div class="item">
          <a href="{{route('spec_category.show', $CategoryList)}}">
          <img src="{{ URL::asset("storage/categorybanner/{$CategoryList->c_image1}") }}" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>{{$CategoryList->c_name}}</span>
              </div>
              <a href="{{route('spec_category.show', $CategoryList)}}"><h4>{{$CategoryList->c_content}}</h4></a>
              <!-- <ul class="post-info">
                <li><a href="#">{{$CategoryList->c_name}}</a></li>
                <li><a href="#">May 12, 2020</a></li>
                <li><a href="#">12 Comments</a></li>
              </ul> -->
            </div>
          </div>
        </a>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->

  


  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              
@if(count($PostList) < 1)
            <div class="col-lg-12">  
              <h4>No post had been created! Get to share your new post now!</h4>
              <br/>

            </div>
            @else
  @foreach($PostList as $PostList1)
  
  <div class="col-lg-12">
    <a href="{{route('spec_post.show', $PostList1)}}">
    <div class="blog-post">
      <div class="blog-thumb">
        @if($PostList1->p_video =='')
        <img src="{{ URL::asset("storage/uploads/{$PostList1->p_image1}") }}" alt="">
        @else
        <video width="100%" controls autoplay muted loop>
          <source src="{{ URL::asset("storage/uploads/{$PostList1->p_video}") }}" type="video/mp4">
            
            Your browser does not support the video tag.
          </video>
          @endif
          
        </div>
        <div class="down-content">
          <span>{{$PostList1->Category->c_name}}</span>
          <h4>{{$PostList1->p_name}}</h4>
          <ul class="post-info">
            <li>{{$PostList1->PostedByUser->u_name}} <span class="flag-icon flag-icon-{{$PostList1->PostedByUser->u_country}}"></span></li>
            <li>{{$PostList1->p_createdtime}}</li>
            <li>{{$PostList1->Comment->where('cm_postid','=', $PostList1->p_id)->where('cm_status','=', 1)->count('cm_id')}} Comment</li>
          </ul>
          <p style="word-wrap: break-word">{{$PostList1->p_content}}</p>
          </a>
          <div class="post-options">
            <div class="row">
              <div class="col-6">
                <ul class="post-tags">
                  @if(session()->has('LoggedUser'))
                  <form method="POST" action="{{ route('likepost') }}" style="display: inline-block;">
                    {{ csrf_field() }}
                    <li><input name="postlike" type="hidden" id="postlike" placeholder="postlike" value="{{$PostList1->p_id}}"  readonly></li>           
                 <li style="color:blue;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-up" style="color:blue;"></i>  <strong>{{$PostList1->PostRating->where('r_postid','=', $PostList1->p_id)->where('r_value','=', 1)->count('r_postid')}}</strong></button></li>
               </form>
                <form method="POST" action="{{ route('unlikepost') }}" style="display: inline-block;">
                    {{ csrf_field() }}
                     <li><input name="postlike" type="hidden" id="postlike" placeholder="postlike" value="{{$PostList1->p_id}}"  readonly></li>  
                 <li style="color:red;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-down" style="color:red;"></i>  <strong>{{$PostList1->PostRating->where('r_postid','=', $PostList1->p_id)->where('r_value','=', 0)->count('r_postid')}}</strong></button></li>
               </form>
               @else
               <li style="color:blue;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-up" style="color:blue;"></i>  <strong>{{$PostList1->PostRating->where('r_postid','=', $PostList1->p_id)->where('r_value','=', 1)->count('r_postid')}}</strong></button></li>
                <li style="color:red;margin-right: 10px;display: inline-block;"><button type="submit" id="form-submit" class="main-button"><i class="fa fa-thumbs-down" style="color:red;"></i>  <strong>{{$PostList1->PostRating->where('r_postid','=', $PostList1->p_id)->where('r_value','=', 0)->count('r_postid')}}</strong></button></li>
               @endif

                 
                </ul>
              </div>
              <div class="col-6">
                <ul class="post-share">
                   @if(session()->has('LoggedUser'))
                            @if($PostList1->p_userid == $LoggedUserInfo['u_id'])
                            <form method="POST" action="{{ route('spec_cate.postdelete') }}">
                              {{ csrf_field() }}
                              <li><input name="postdelete" type="hidden" id="postdelete" placeholder="postdelete" value="{{$PostList1->p_id}}"  readonly></li>
                              <li><input name="imagedelete" type="hidden" id="imagedelete" placeholder="imagedelete" value="{{$PostList1->p_image1}}"  readonly></li>
                              <li><input name="videodelete" type="hidden" id="videodelete" placeholder="videodelete" value="{{$PostList1->p_video}}"  readonly></li>
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
        {!! $PostList->appends(['postlist' => 'list'])->links() !!}
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
    </section>
    @endsection