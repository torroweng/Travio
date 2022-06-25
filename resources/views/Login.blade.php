@extends('Layout.body')
<title>Travio-Home</title>
@section('content')

<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Login</h4>
            <h2>Start to share and discover more.</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Banner Ends Here -->
<section class="contact-us" >
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="down-contact">
          <div class="row">
            <div class="col-lg-3" >
            </div>
            <div class="col-lg-6 login" >
              <div class="sidebar-item contact-form">
                <div class="sidebar-heading">
                  <h2>Login</h2>
                </div>
                
                <div class="content">
                  <form id="contact" action="{{ route('login.check') }}" method="post">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                      
                      <strong>{{ $message }}</strong>
                    </div>
                    @elseif($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    
    <strong>{{ $message }}</strong>
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
                   </div>
                   @endif
                   
                   {{ csrf_field() }}
                   <div class="row">
                     <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <h3>Email</h3>
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="email" type="text" id="email" placeholder="Email" >
                             <!--  @error('email')
                              <div class="alert-danger">{{$message}}</div>   
                              @enderror -->
                              
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Password</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="password" type="password" id="password" placeholder="Password(min:8characters)" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <a href="{{ route('register') }}">Haven't own a account? Register Now</a>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <a href="{{ route('forgotpass') }}">Forgot Your Password? Reset Now</a>
                            </fieldset>
                          </div>
                          <div class="col-lg-12 text-center">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Login</button>
                            </fieldset>
                          </div>
                          
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2">
                </div>
                
              </div>
            </div>
            
            
            
          </div>
        </div>
      </section>
      @endsection