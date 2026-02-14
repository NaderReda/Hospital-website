<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="frontend/assets/css/maicons.css">

  <link rel="stylesheet" href="frontend/assets/css/bootstrap.css">

  <link rel="stylesheet" href="frontend/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="frontend/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="frontend/assets/css/theme.css">
  <style>
   .centered-box{
     text-align: center;
     padding: 70px;
   }
  </style>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('alldoctors') }}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('myappointments') }}">My Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
            @if(!Auth::check())
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>

            </li>
            @else
            <li class="nav-item">

                 <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="btn btn-primary ml-lg-3"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>


 <div class="centered-box">
    <table>
        <thead>
            <tr style="background-color: lightblue;">
                <th>Name</th>
                <th>Email</th>
                <th>Submission Date</th>
                <th>Speciality</th>
                <th>Number</th>
                <th>status</th>
                <th>Action</th>
               
            </tr>
            </thead>
            <tbody>
                @foreach($appoint as $appoints)
                <tr>
                    <td>{{ $appoints->full_name }}</td>
                    <td>{{ $appoints->email_address }}</td>
                    <td>{{ $appoints->submission_date }}</td>
                    <td>{{ $appoints->speciality }}</td>
                    <td>{{ $appoints->number }}</td>
                    <td>{{ $appoints->status }}</td>
                    <td>
                      <form action="{{ route('cancelappoint',$appoints->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Cancel Appointment</button>
                      </form>
                    </td>
                </tr>
                @endforeach
           
        </tbody>
        
    </table>
 </div>

 

<script src="frontend/assets/js/jquery-3.5.1.min.js"></script>

<script src="frontend/assets/js/bootstrap.bundle.min.js"></script>

<script src="frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="frontend/assets/vendor/wow/wow.min.js"></script>

<script src="frontend/assets/js/theme.js"></script>

</body>
</html>
