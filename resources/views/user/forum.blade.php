@extends('layouts.forumheader')

@section('title', 'Barangay 781 Zone 85')

@section('content')
<style>
        .highlight:hover {
            border-bottom: 2px solid #fff; /* Change the color as needed */
        }
        .active {
            border-bottom: 2px solid #fff; /* Change the color as needed */
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
<body style="background-color: #E8E6E6;">
    <!-- Spinner Start -->
    <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
</div>
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
                        <a href="../User/events" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-calendar2-event-fill"></i> Events </span></a>
                        <a href="../User/certificate" class="nav-item nav-link text-white"><span class="highlight "><i class="bi bi-file-earmark-text-fill"></i> My Certificates</span></a>
                        <a href="../User/aboutus" class="nav-item nav-link text-white"><span class="highlight "><i class="bi bi-info-circle-fill"></i> About us </i></span></a>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="highlight active"><i class="bi bi-gear-fill"></i> Settings</span>
                            </a>
                            <ul class="dropdown-menu" >
                                <li><a class="dropdown-item" href="../User/forum"><i class="bi bi-info-circle-fill"></i> Inquiries</a></li>
                                <li><a class="dropdown-item" href="../User/profile"><i class="bi bi-person-circle"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="/" class="nav-item nav-link text-white"><i class="bi bi-door-closed"></i> Logout</a></li>
                            </ul>
                        </li> 
                    </div>
                </div>
            </div>
        </nav>
    </div>
<div class="container-fluid px-0 mb-5">
    <section id="hero" class="d-flex align-items-center" style=" max-width: 100%;
    height: auto;
    height: calc(50vh - 50px);
    background: linear-gradient(to bottom, rgba(0, 0, 0, .7) 0%, rgba(0, 0, 0, .5) 100%, #000 100%), url('../pic/whole.png');
    background-size: cover;
    opacity: .8;
    position: relative;">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
        <h1 class="text-center text-white text-uppercase"style="font-size: 5rem;">Inquiries</h1>
    </div>
</section>
</div>

<!-- Features Start -->
<!-- statistic start -->
<div class="container-fluid col-lg-12" style="margin-top:-2rem;" >
    <div class="row" >
        <div class="card">
            <div class="card-body">
                <h2>Create A Inquiry</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select a Name: <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example" name="names_display" id="names_display" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
                    <div id="valid" ></div>

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Topic: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="topic" placeholder="Write a Topic" name="topic">
                    <div id="valid" ></div>

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description: </label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Write a Description" name="description"></textarea>
                </div>
                <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary btn-forum"
                    data-topic="#topic"
                    date-description="#description">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row" id="displayform">
        
    </div>
</div>
<br>
<script src="{{ asset('js/forum.js') }}"></script>

<!-- Modal -->
<div class="modal fade" id="forumModal" tabindex="-1" aria-labelledby="forumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forumModalLabel">View Forum</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" >
      <div class="card" >
          <div class="card-header">
              <div id="forumTopic"></div>
              <div id="forumDescription"></div>
          </div>
          <div class="card-body" style="width: 70rem; height: 20rem;overflow-y: auto;overflow-x: hidden;">
            <div class="row" id="displayComments">
                
            </div>
           
        </div>
        <div class="card-footer text-body-secondary">
            <div class="mb-3">
                <div class="row">
                    <div id="inputform">
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select a Name: <span class="text-danger">*</span></label>
                                <select class="form-select form-select-sm mb-3 names_display" aria-label="Large select example" name="names_display" id="names_display" >
                                    <option selected disabled>-----</option>
                                    <!-- Names of members and Head Ofthe family-->
                                </select>
                            <div id="valid" ></div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 1rem; margin-bottom:-1rem;">
                        <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="hidden" class="form-control" id="picid">
                            <img src="../pic/brgy_logo.png" class="rounded-circle me-3" alt="Profile Picture" width="70" height="70" id="displayimage"> 
                            <input type="text" class="form-control" id="comment" placeholder="Write a Comment" name="commnent">
                            <button type="submit" class="btn btn-primary btn-comment" data-commnent="#comment" data-id_form="#id_form" data-adminname="#adminname"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                              <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                          </svg> </button>
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
<div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
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
                <!-- Footer End -->

 <!-- Copyright Start -->
                <div class="container-fluid copyright py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="fw-medium text-light" href="#">J.Rizz&Co.</a>, All Right Reserved.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Copyright End -->





        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


                    <!-- Back to Top -->
                    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
                        class="bi bi-arrow-up"></i></a>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-success">
      <strong class="me-auto">Forum Added Succesfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-bg-success">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
        @endsection