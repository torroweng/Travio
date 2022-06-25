
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}"><h2>Travio</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{route('aboutus')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('blog')}}">Blog Entries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('post')}}">Post Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
               
              @if(session()->has('LoggedUser'))
        
        <li class="nav-item">
          <div class="dropdown">
                <a class="nav-link" href="#">{{ $LoggedUserInfo['u_name'] }}

<span class="flag-icon flag-icon-{{$LoggedUserInfo['u_country']}}"></span>


                </a>

  
  <div class="dropdown-content">
    <a class="nav-link" href="#">Profile</a>
    <a class="nav-link" href="{{ route('updateprofile') }}">Edit Profile</a>
    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
  </div>
</div>
              </li>
              
              

        @else
        <li class="nav-item">
                <div class="dropdown">
             <a class="nav-link" href="#">Register/Login</a>  
  
  <div class="dropdown-content">
    <a class="nav-link" href="{{ route('register') }}">Register</a>
    <a class="nav-link" href="{{ route('login') }}">Login</a>
  </div>
</div>
              </li>
              
        @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>
