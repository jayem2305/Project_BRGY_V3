@extends('layouts.certificateheader')

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
                        <a href="../User/certificate" class="nav-item nav-link text-white"><span class="highlight active"><i class="bi bi-file-earmark-text-fill"></i> My Certificates</span></a>
                        <a href="../User/aboutus" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-info-circle-fill"></i> About us </i></span></a>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="highlight"><i class="bi bi-gear-fill"></i> Settings</span>
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
        <h1 class="text-center text-white text-uppercase"style="font-size: 5rem;">CERTIFICATE</h1>
    </div>
</section>
</div>
<div class="row g-0 feature-row">
    <div class="col-lg-12" >
        <div class="card w-100 mb-3 ">
            <div class="card-body">
                <div class="col-lg-12 text-center">
                    <img src="../pic/process.png" class="img-fluid img-thumbnail">
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Request a Certificate</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="Searchbar" placeholder="Search">
                            <span class="input-group-text bg-primary" id="basic-addon2">
                                <a id="search" type="button"><i class="bi bi-search text-light"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-auto row" style="max-height: 40rem;" id="certificateCards">
                        <div class="col-lg-4 mb-3 mb-sm-0">
                            <div class="card" style="height: 23rem; margin-bottom: 1rem;">
                                <div class="card-body">
                                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                                    <h5 class="card-title"style="text-align:center;" >Barangay Indigency</h5>
                                    <hr>
                                    <div  id="searchResults">
                                            <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_indigency">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                </dl>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#exampleModal">Request <i class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-sm-0">
                            <div class="card" style="height: 23rem; margin-bottom: 1rem;">
                                <div class="card-body">
                                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                                    <h5 class="card-title"style="text-align:center;" >Business Permit</h5>
                                    <hr>
                                    <div>
                                    <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_permit">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                </dl>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#modalBpermit">Request <i class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-sm-0">
                            <div class="card" style="height: 23rem; margin-bottom: 1rem;">
                                <div class="card-body">
                                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                                    <h5 class="card-title"style="text-align:center;" >Cessation of Business</h5>
                                    <hr>
                                    <div>
                                    <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_cessation">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                </dl>
                                                
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#modalBcessation">Request <i class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-sm-0">
                            <div class="card" style="height: 23rem; margin-bottom: 1rem;">
                                <div class="card-body">
                                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                                    <h5 class="card-title"style="text-align:center;" >First time job seeker</h5>
                                    <hr>
                                    <div>
                                    <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_ftj">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                    
                                                </dl>
                                                
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#exampleModalftjcert">Request <i class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-sm-0">
                            <div class="card" style="height: 23rem; margin-bottom: 1rem;">
                                <div class="card-body">
                                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                                    <h5 class="card-title"style="text-align:center;" >Application of Solo Parent</h5>
                                    <hr>
                                    <div>
                                    <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_soloparent">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                   
                                                </dl>
                                                
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#exampleModalsolo">Request <i class="bi bi-chevron-double-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-sm-0">
                            <div class="card" style="height: 23rem; margin-bottom: 1rem;">
                                <div class="card-body">
                                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                                    <h5 class="card-title"style="text-align:center;" >Barangay Certificate</h5>
                                    <hr>
                                    <div>
                                    <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>   
                                                    <a href="" class="icon-link"  data-bs-toggle="modal" data-bs-target="#requirement_certificate">
                                                        See more...
                                                        </a> 
                                                </dl>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#exampleModalCertificate">Request <i class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-sm-0">
                <div class="card" style=" margin-bottom: 1rem;">
                  <div class="card-body">
                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                    <h5 class="card-title"style="text-align:center;" >Good moral - For Employment</h5>
                    <hr>
                    <div  id="searchResults">
                                            <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_goodmoral">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                </dl>
                                            </div>
                                        </p>
                                    </div>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#exampleModalgoodmoral">Request <i class="bi bi-chevron-double-right"></i>
         </div>
     </div>
 </div>
 <div class="col-lg-4 mb-3 mb-sm-0">
                <div class="card" style=" margin-bottom: 1rem;">
                  <div class="card-body">
                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                    <h5 class="card-title"style="text-align:center;" >Certificate of Law Income</h5>
                    <hr>
                    <div  id="searchResults">
                                            <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <li>Student ID (for Students Only)</li>   
                                                    <!--<a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_lawincome">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>-->
                                                </dl>
                                            </div>
                                        </p>
                                    </div>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal" data-bs-target="#exampleModallawincome">Request <i class="bi bi-chevron-double-right"></i>
         </div>
     </div>
 </div>
 <div class="col-lg-4 mb-3 mb-sm-0">
                <div class="card" style=" margin-bottom: 1rem;">
                  <div class="card-body">
                    <h1 class="text-primary" style="text-align:center; font-size:5rem;"><i class="bi bi-file-earmark-richtext"></i></h1>
                    <h5 class="card-title"style="text-align:center;" >Barangay ID</h5>
                    <hr>
                    <div  id="searchResults">
                                            <b>Requirements</b>
                                            <div class="col-md-12">
                                                <dl style="text-align: left;">
                                                    <li>Atleast 1 valid ID</li>
                                                    <li>Control Number</li>
                                                    <a href=""  class="icon-link icon-link-hover" data-bs-toggle="modal" data-bs-target="#requirement_barangayID">
                                                        See more...
                                                        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
                                                        </a>
                                                </dl>
                                            </div>
                                        </p>
                                    </div>
                </div>
                <div class="card-footer">
                <a href="#" class="btn btn-primary col-lg-12" disabled>Request <i class="bi bi-chevron-double-right"></i></a>
            </div>
        </div>
    </div>
                    </div>
                </div>
            </div>
    </div> 
<div class="row g-2">
    <div class="col-12">
        <h3>History and Monitoring of My Certificate</h3>
        <table class="table text-start" id="myTable">
            <thead class="">
                <tr >
                <th scope="col ">No.</th>
                <th scope="col ">Controll Number</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Name</th>
                <th scope="col">Certificate</th>
                <th scope="col">Purpose</th>
                <th scope="col">Number of Copy</th>
                <th scope="col">Remarks</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Barangay Indigency</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="Barangay Indigency" name="indigency" id="indigency">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="voters" id="voters">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="names_display" id="names_display" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="copy" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control" id="requirements" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Purpose of Barangay Indigency <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 purpose" aria-label="Large select example"name="purpose" id="purpose">
                    <option selected disabled>-----</option>
                    <option value="Financial Assistance">Financial Assistance</option>
                    <option value="School Requirement">School Requirement</option>
                    <option value="Burial Assistance">Burial Assistance</option>
                    <option value="Educational Assistance">Educational Assistance</option>
                    <option value="Medical Assistance">Medical Assistance</option>
                    <option value="Hospital Requirement">Hospital Requirement</option>
                    <option value="Scholarship Application">Scholarship Application</option>
                    <option value="Social Pension for Indigent Senior Citizen Application">Social Pension for Indigent Senior Citizen Application</option>
                    <option value="Others">Others </option>
                </select>
            </div>
            <div class="col-lg-12">
                <span class="text-primary"><i class="bi bi-info-circle"></i> Specify The Purpose if Others is selected</span>
                <input type="text" class="form-control otherpurpose" placeholder="Others" name="others" id="otherpurpose" style="display: none;">
            </div>
        </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-indigency"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
   
        
</div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModalCertificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Barangay Certificate</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form

                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="Barangay Certificate" name="certificate" id="certificate">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="voters" id="voters_cert">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example" name="names_display" id="names_display_cert" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="copy_cert" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control" id="requirements_cert" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Purpose of Barangay Certificate <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 purpose" aria-label="Large select example"name="purpose" id="purposecert">
                    <option selected disabled>-----</option>
                    <option value="Proof of Residency">Proof of Residency</option>
                    <option value="Local Employment">Local Employment</option>
                    <option value="PWD ID Application">PWD ID Application</option>
                    <option value="School Requirements">School Requirements</option>
                    <option value="Educational Assistance">Educational Assistance</option>
                    <option value="Senior Citizen Application">Senior Citizen Application</option>
                    <option value="Bank Account Opening">Bank Account Opening</option>
                    <option value="Hospital Requirement">Hospital Requirement</option>
                    <option value="Others">Others </option>
                </select>
            </div>
            <div class="col-lg-12">
                <span class="text-primary"><i class="bi bi-info-circle"></i> Specify The Purpose if Others is selected</span>
                <input type="text" class="form-control otherpurpose" placeholder="Others" name="others" id="otherpurposecert" style="display: none;">
            </div>
        </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-certifictae"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalBpermit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Business Permit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="Business Permit" name="bpermit" id="bpermit">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 voters" aria-label="Large select example"name="voters" id="voters">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="name" id="names_display_bpermit" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg copy" name="copy_bpermit" id="copy_bpermit" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control form-control-lg requirements" name="requirements_bpermit" id="requirements_bpermit" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Business Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Business Name" name="bname" id="bname" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Business Address: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Business Address" name="baddress" id="baddress" >
            </div>
        </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-bpermit"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalBcessation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Cessation of Business</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="Cessation of Business" name="cbpermit" id="cbpermit">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 voters" aria-label="Large select example" name="voters" id="voters_cessation">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="names_display" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg" id="copy_cessation" name="copy_cessation" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control form-control-lg requirements" id="requirements_display" name="requirements" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Business Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Business Name" name="cbname" id="cbname" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">CEO Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="CEO Name" name="CEOname" id="CEOname" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Business Address: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Business Address" name="cbaddress" id="cbaddress" >
            </div>
        </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-cessation"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModalftjcert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request First-Time Job Seeker</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="First-Time Job Seeker" name="cbpermit" id="cbpermit">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 voters" aria-label="Large select example"name="voters" id="voters_ftj">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="names_display" id="names_display_ftj" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg" id="copy_ftj" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control form-control-lg" id="requirements_ftj" >
            </div>
            <div class="col-lg-6">
            <label for="formGroupExampleInput" class="form-label">Type of First-Time Job Seeker<span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="ftjtypes" id="ftjtypes">
                    <option selected disabled>-----</option>
                    <option value="First Time Job seeker (Minor)">First Time Job seeker (Minor)</option>
                    <option value="First Time Job Seeker Oath Taking">First Time Job Seeker Oath Taking</option>
                    <option value="First Time Job Seeker">First Time Job Seeker</option>
                </select>
            </div>
            <div class="col-lg-6">
            <label for="formGroupExampleInput" class="form-label">Number of years Resided in the Barangay<span class="text-danger">*</span></label>
                <div class="row g-2">
                    <div class="col-lg-6">
                        <input type="number" class="form-control form-control-lg" value="0" name="numberofliving" id="numberofliving" min="0"  >
                    </div>
                    <div class="col-lg-6">
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="typeofdays" id="typeofdays">
                            <option selected disabled>-----</option>
                            <option value="Months">Months</option>
                            <option value="Years">Years</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" style="display: none;" id="minordisplay">
                <div class="row">
                    <hr>
                    <h4>Guardian Information</h4>
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Guardian Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Guardian's Name" name="pname" id="pname" >
                    </div>
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Guardians age: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-lg" placeholder="Guardian Age" name="page" id="page" min="18">
                    </div>
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Guardians Current Address: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Guardian Current Address" name="paddress" id="paddress" >
                    </div>
                    <div class="col-6">
                    <label for="formGroupExampleInput" class="form-label">Approval of Guardian With Valid ID <span class="text-danger">*</span> </label>
                    <input type="file" class="form-control form-control-lg" id="requirements_parents_ftj" >
                    <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-ftj"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModalsolo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Application of Solo Parent</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="First-Time Job Seeker" name="cbpermit" id="cbpermit">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="voters" id="voters_solo">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="names_display_solo" id="names_display_solo" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg" id="copy_solo" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control form-control-lg" id="requirements_solo" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Purpose of Barangay Certificate <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Solo Parent" name="soloparent" id="soloparent" value="Solo Parent" readonly >
            </div>
            <br>
            <div class="col-lg-12" >
            <label for="formGroupExampleInput" class="form-label text-primary">Please identify your children in list:<span class="text-danger">*</span></label>
                <div class="row gx-2" id="childdisplay">
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-soloparent"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="exampleModalgoodmoral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Certificate of Good moral For Employment</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="voters" id="voters_goodmoral">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="names_display_goodmoral" id="names_display_goodmoral" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg" id="copy_goodmoral" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control form-control-lg" id="requirements_goodmoral" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Purpose of Certificate <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="goodmoral" name="goodmoral" id="goodmoral" value="CERTIFICATE OF GOOD MORAL CHARACTER" readonly >
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-goodmoral"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModallawincome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Certificate of Law Income</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
             <div id="error-message"  >
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                  <div>
                    Fill Up the form
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="voters" id="voters_lawincome">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg mb-3 names_display" aria-label="Large select example"name="names_display_lawincome" id="names_display_lawincome" >
                    <option selected disabled>-----</option>
                    <!-- Names of members and Head Ofthe family-->
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg" id="copy_lawincome" max="5" min="1" value="1">
            </div>
            <div class="col-lg-9">
                <label for="formGroupExampleInput" class="form-label">Upload your Requirements <span class="text-danger">*</span> <span class="text-primary"><i class="bi bi-info-circle"></i> Compiled it in PDF format with maximum 50mb</span></label>
                <input type="file" class="form-control form-control-lg" id="requirements_lawincome" >
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Purpose of Certificate <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="lawincome" name="lawincome" id="lawincome" value="Certificate of Law Income" readonly >
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary upload-lawincome"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span><i>Submit</i></button>
</div>
</div>
</div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto" id="display"></strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<div class="modal fade" id="requirement_indigency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Barangay Indigency Requirements</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Requirements:</b>
            <dl style="text-align: left;">
                <li>Atleast 1 valid ID</li>
                <li>Control Number</li>
                <li>Student ID (for Students Only)</li>
                
                <b>Available Purposes of Baranggay Indigency :</b>
                <div class="col-md-12">
                    <dl style="text-align: left;">
                        <li>Financial Assistance</li>
                        <li>School Requirement</li>
                        <li>Burial Assistance</li>
                        <li>Educational Assistance</li>
                        <li>Medical Assistance</li>
                        <li>Hospital Requirement</li>
                        <li>Scholarship Application</li>
                        <li>Social Pension for Indigent Senior Citizen Application</li>
                        <li>Others <span class="text-primary"><i class="bi bi-info-circle"></i> Specify The Purpose if Others is selected</span></li>
                    </dl>
                    
                </div>                    
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="requirement_certificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Barangay Certificate Requirements</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Requirements:</b>
            <dl style="text-align: left;">
                <li>Atleast 1 valid ID</li>
                <li>Control Number</li>
                <li>Student ID (for Students Only)</li>
                
                <b>Available Purposes of Baranggay Indigency :</b>
                <div class="col-md-12">
                    <dl style="text-align: left;">
                        <li>Proof of Residency</li>
                        <li>Local Employment</li>
                        <li>PWD ID Application</li>
                        <li>School Requirements</li>
                        <li>Educational Assistance</li>
                        <li>Senior Citizen Application</li>
                        <li>Bank Account Opening</li>
                        <li>Hospital Requirement</li>
                        <li>Others <span class="text-primary"><i class="bi bi-info-circle"></i> Specify The Purpose if Others is selected</span></li>
                    </dl>
                    
                </div>                    
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="requirement_permit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Business Permit Requirements</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Requirements:</b>
            <dl style="text-align: left;">
                <li>Atleast 1 valid ID</li>
                <li>Control Number</li>
                <li>Student ID (for Students Only)</li>                 
                <li>Baranggay Certificate</li>
                <li>Business Name</li>
                <li>Business Address</li>
                <li>Permit From City hall</li>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="requirement_cessation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Business Permit Requirements</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Requirements:</b>
            <dl style="text-align: left;">
                <li>Atleast 1 valid ID</li>
                <li>Control Number</li>
                <li>Student ID (for Students Only)</li>                 
                <li>Baranggay Certificate</li>
                <li>Business Name</li>
                <li>Business Address</li>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="requirement_ftj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">First time Job Seeker Requirements</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Requirements:</b>
            <dl style="text-align: left;">
                <li>Atleast 1 valid ID</li>
                <li>Student ID (for Students Only)</li>
                <b>Type of First time Job Seeker Available:</b>
                <div class="col-md-12">
                    <dl style="text-align: left;">
                        <li>First Time Job seeker (Minor)</li>
                        <li>First Time Job Seeker Oath Taking</li>
                        <li>First Time Job Seeker </li>
                    </dl>
                </div>    
                <b>First time Job Seeker Requirements for Minor :</b>
                <div class="col-md-12">
                    <dl style="text-align: left;">
                        <li>Need of approval of Guardian with signature</li>
                        <li>Name of a Guardian</li>
                        <li>Age of a Guardian</li>
                        <li>Currently Address of Guardian</li>
                    </dl>
                </div>           
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="requirement_soloparent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Business Permit Requirements</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Requirements:</b>
            <dl style="text-align: left;">
                <li>Atleast 1 valid ID</li>
                <li>Student ID (for Students Only)</li>                 
                <li>Names of the child/ Children</li>
                <li>PSA of Child / Children</li>
            </div>
        </div>
    </div>
</div>
