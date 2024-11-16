@extends("layouts.default")
@section("title","Barangay 781 Zone 85")
@section("content")
<style>
        .highlight:hover {
            border-bottom: 2px solid #fff; /* Change the color as needed */
        }
        .highlight_active{
            border-bottom: 2px solid #fff; /* Change the color as needed */
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
<body>
    <!-- Spinner Start -->
    <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
</div>
<!-- Spinner End -->
    <!-- Navbar Start -->
    <div class=" bg-transparent sticky-top">
        <nav class="navbar navbar-expand-lg p-lg-0"style="background-color: #1C2035;">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav text">
                     <a class="navbar-brand" href="/">
                     <img src="../pic/logo_TP.png" alt="Logo" width="100" height="70" class="d-inline-block align-middle">
                     <span class="text-light text-uppercase" style="font-size:1.5rem; "><b>Barangay 781 Zone 85</b></span>
                     </a>
                    </div> 
                    <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <a href="onlineservices" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-newspaper"></i> Online Services</span> </a>
                        <a href="register" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-person-fill"></i> Create an Account</span></a>
                        <a href="aboutus" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-info-circle"></i> About us </i></span></a>
                        <a href="login" class="nav-item nav-link text-white"><span class="highlight_active"><i class="bi bi-door-open-fill"></i> Login</span></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
<!-- Navbar End -->
    <div class="container-fluid px-0 mb-5">
    <section id="hero" class="d-flex align-items-center" style=" max-width: 100%;
    height: auto;
    height: calc(50vh - 50px);
    background: linear-gradient(to bottom, rgba(0, 0, 0, .7) 0%, rgba(0, 0, 0, .5) 100%, #000 100%), url('../pic/whole1.png');
    background-size: cover;
    opacity: .8;
    position: relative;">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
        <h1 class="text-center text-white"style="font-size: 5rem;">LOGIN</h1>
    </div>
</section>
</div>
<!-- login Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-4">Welcome to Barangay 781 Zone 85</h1>
                <p>Welcomes and Greetings to the community. We vow to help and encourage you throughout your arrival, creating togetherness and friendship.</p>
                <p class="mb-4">We promote active engagement in community events in order to generate a sense of belonging and to create meaningful connections.</p>
                <p class="mb-4">If you want assistance, you can contact barangay authorities or community leaders. I wish you a happy, productive, and fulfilling stay in Barangay 781, Zone 85.</p>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                @csrf
                <h2 class="mb-4"> <i class="bi bi-door-open-fill"></i> Login </h2>
                @if(session()->has("success"))
         <div class="alert alert-success">
            {{session()->get("success")}}
         </div>
         @endif
         @if(session()->has("error"))
         <div class="alert alert-danger">
            {{session()->get("error")}}
         </div>
         @endif
                <div class="row g-3">
                    <div id="opTag"></div>
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" required autofocus>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" required>
                            <span class="input-group-text" id="basic-addon2">
                                <a id="togglePassword" type="button"><i class="bi bi-eye-slash" id="eyeIcon"></i></a>
                            </span>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-floating">
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <button class="btn btn-primary login-btn" type="submit" name="login" data-email="email"
                        data-password="password"> <span><div class="spinner-border text-light d-none" role="status">
  <span class="visually-hidden">Loading...</div></span><span class="login_text">Login</span></button>
                    </div>
                    <hr>
                    <div class="col-12 text-center">
                       <a href="register" class="btn btn-success btn-lg">Create An Account</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- Footer Start -->
<div class="container-fluid footer mt-5 py-5 wow fadeIn text-light"style="background-color: #1C2035;" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Our Office</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Barangay 781 Zone 85 Sta. Ana Manila City</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 8856 9560</p>
                <p class="mb-2" style="font-size: 13px;"><i class="fa fa-envelope me-3" style="font-size: 19px;"></i>barangay781.2023@gmail.com</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-light rounded-circle me-2" href="https://mail.google.com/mail/?view=cm&fs=1&to=barangay781.2023@gmail.com" target="_blank"><i
                        class="fab fa-google"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100089497350963" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="text-white mb-4">Business Hours</h4>
                                <p class="mb-1">Monday - Friday</p>
                                <h6 class="text-light">09:00 am - 07:00 pm</h6>
                                <p class="mb-1">Saturday</p>
                                <h6 class="text-light">09:00 am - 12:00 pm</h6>
                                <p class="mb-1">Sunday</p>
                                <h6 class="text-light">Closed</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <!-- forgot password modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Forgot Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h1 class="modal-title fs-5">Fill up the Form</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="forgotpassresult">
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                   
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                        <use xlink:href="#info-fill" id="svg"/>
                                    </svg>
                                    <div>
                                        Provide your email for further instructions.
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email_check" name="email" placeholder="Your Email Address">
                                <label for="email">Your Email Address</label>
                                <div class="invalid-feedback" id="emailFeedback"></div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary forgot-btn" data-email="email">  <div class="spinner-border text-light" role="status" style="display:none;" id="load">
                                        <span class="visually-hidden">Loading...</span>
                                    </div> Submit</button>
            </div>
        </div>
    </div>
</div>


@endsection