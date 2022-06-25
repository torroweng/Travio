<!DOCTYPE html>
<html lang="en">

 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('TravioAddIn/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('TravioAddIn/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('TravioAddIn/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('TravioAddIn/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('TravioAddIn/css/flag-icon.css') }}">
    
  </head>

  <body>

     <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
  @include('Layout.header')

   @yield('content')
  @include('Layout.footer')

    <!-- Bootstrap core JavaScript -->
   
    <script src="{{ asset('TravioAddIn/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('TravioAddIn/jquery/jquery.min.js') }}"></script>
    <!-- Additional Scripts -->
    <script src="{{ asset('TravioAddIn/js/custom.js') }}"></script>
    <script src="{{ asset('TravioAddIn/js/owl.js') }}"></script>
    <script src="{{ asset('TravioAddIn/js/slick.js') }}"></script>
    <script src="{{ asset('TravioAddIn/js/isotope.js') }}"></script>
    <script src="{{ asset('TravioAddIn/js/accordions.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
 <script>
    var alertshow = '{{Session::get('alert')}}';
    var alertexist = '{{Session::has('alert')}}';
    if(alertexist){
      alert(alertshow);
    }
  </script>
  </body>
</html>