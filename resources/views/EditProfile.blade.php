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
                <h4>Edit Profile</h4>
                <h2>Edit your details for better secure.</h2>
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
                
                <div class="col-lg-3">
                </div>
               <div class="col-lg-6 register">
               
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>Edit Profile</h2>
                    </div>

                    <div class="content">
                      <form id="contact" action="{{ route('updateprofile.check') }}" method="post">
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
                         
                        <!-- <div class="row"> -->
                        	<div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Email</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Email" value="{{ $LoggedUserInfo['u_email'] }}" readonly>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Password</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="password" type="password" id="password" placeholder="Password" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>New Password</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="newpassword" type="password" id="newpassword" placeholder="New Password" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Confirm New Password</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="connewpassword" type="password" id="connewpassword" placeholder="Confirm New Password" >
                            </fieldset>
                          </div>
                          
                          <div class="col-lg-12 text-center">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Update</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  
                </div>
               
              </div>
            </div>
        </div>
        <div class="col-lg-3">
                </div>
              </div>
            </div>
          </div>
          
          
          
        </div>
      </div>
    </section>
@endsection