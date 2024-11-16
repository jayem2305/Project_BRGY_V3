@extends('layouts.user')

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
<!-- Navbar End -->
<div class="container-fluid px-0 mb-5">
<div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-lg-12"> 
                <div class="card" style="font-size: 20px;"> 
                    <!-- Profile Header -->
                    <div class="rounded-top text-white d-flex flex-row" style="background-image: url('../img/backgroundProfile.png'); height:300px; background-size: cover;"> 
                        <!-- Profile Image and Edit Button -->
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 250px;" id="image_profile"> 
                            <img src="../img/load.gif" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 250px; z-index: 1"> 
                            <button type="button" class="btn btn-outline-success btn-edit-profile btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Edit profile
                                        </button>
                        </div>
                        <!-- Profile Details -->
                        <div class="ms-3" style="margin-top: 150px;"> 
                          <div id="userProfile">
                            <h3 style="font-size: 40px; color: #fff;">Loading...</h3>
                            <p style="font-size: 24px;">Loading...</p>
                          </div>
                        </div>
                    </div>
                    <!-- Profile About and Family Members -->
                    <div class="card-body p-4 text-black" style="font-size: 20px; margin-top: 150px;"> 
                        <div class="mb-5"> 
                            <p class="lead fw-normal mb-1" style="font-size: 30px;">About</p> 
                            <div class="p-4" style="background-color: #f8f9fa;" >
                                <p class="font-italic mb-1" style="font-size: 24px;" id="info_num">+639-999-999-999</p> 
                                <p class="font-italic mb-1" style="font-size: 24px;"id="info_address">2030 Int. 8 Pilar Estate St. Brgy. 781 Manila City</p> 
                                <p class="font-italic mb-0" style="font-size: 24px;"id="info_head">Head of the family</p> 
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
  <p class="lead fw-normal mb-0" style="font-size: 30px;">Family Members</p>
  <button type="button" class="btn btn-outline-primary btn-show-all"data-bs-toggle="modal" data-bs-target="#addmember" >
  Add Family Member
</button>
</div>

<div class="container">
  <div class="row" id="team-container">
    <!-- Add more similar columns for other family members -->
  </div>
</div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Features Start -->

<!-- Footer Start -->
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">Last Name<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="lname" placeholder="Last Name" name="lname"  autofocus>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">First Name<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="fname" placeholder="First Name" name="fname" >
                                <input type="hidden" class="form-control form-control-lg" id="id" placeholder="reg_number" name="reg_number" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">Middle Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg " id="mname" placeholder="Middle Name" name="mname"  >
                        </div>
                        <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                        If applicable
                            </div>
                    </div>
                    <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Ext. Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="ext" placeholder="Extension" name="ext"  >
                            </div>
                            <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                            If applicable
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Comeplete Address<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="address" placeholder="Comeplete Address" name="address" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Relation to family</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="household" name="household" value="Head of The Family" disabled>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Place of Birth<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="Birth" placeholder="Place of Birth" name="Birth" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control form-control-lg" id="birthday" placeholder="Date of Birth" name="birthday" max="2009-12-31" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Age<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control form-control-lg" id="age" placeholder="Age" name="age" min="15" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Phone Number<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+639</span>
                                <input type="tel" class="form-control form-control-lg" id="cnum" placeholder="xx-xxx-xxxx" name="cnum"pattern="[0-9]{2}-[0-9]{3}-[0-9]{4}" maxlength="11" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Sex<span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg mb-3 " aria-label="Large select example" name="gender" id="gender">
                                <option selected disabled value="">------</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Civil Status<span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="civil" id="civil">
                                <option selected disabled value="">------</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Citizenship<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="citizenship" placeholder="Citizenship" name="citizenship" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Occupation<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="occupation" placeholder="Occupation" name="occupation" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <label for="formGroupExampleInput" class="form-label text-primary"><b>Indicate if: <span class="text-danger">*</span></label>
                   <div style="display: none;" class="alert-danger_message">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2"  width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
        Please select at least one option from the checkboxes.
    </div>
</div>
</div>

                    <div class="row">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Employed" id="employed" name="employed" >
                                    <label class="form-check-label" for="employed">
                                        Labor / Employed
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Unemployed" id="unemployed" name="unemployed">
                                    <label class="form-check-label" for="Unemployed">
                                        Unemployed
                                    </label>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="PWD" id="PWD" name="PWD">
                                    <label class="form-check-label" for="PWD">
                                       PWD
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="OFW" id="OFW"name="OFW">
                                    <label class="form-check-label" for="OFW">
                                        OFW
                                    </label>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Solo Parent" id="soloparent" name="soloparent">
                                    <label class="form-check-label" for="soloparent">
                                       Solo Parent
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Out of School Youth (OSY)" id="OSY" name="OSY">
                                    <label class="form-check-label" for="OSY">
                                        Out of School Youth (OSY)
                                    </label>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Student" id="student" name="student">
                                    <label class="form-check-label" for="student">
                                    Student
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Out of School Children (OSC)" id="OSC" name="OSC">
                                    <label class="form-check-label" for="OSC">
                                        Out of School Children (OSC)
                                    </label>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-lg-4">
      <label for="mail">Uri ng pagmamay-ari<span class="text-danger">*</span></label>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="owner" id="owner">
          <option selected disabled value=" ">-----</option>
          <option value="May-Ari">May-Ari</option>
          <option value="Nangungupahan">Nangungupahan</option>
          <option value="Nakatira sa may Ari">Nakatira sa may Ari</option>
          <option value="Nakikitira sa Nangungupahan">Nakikitira sa Nangungupahan</option>
          <option value="Informal Settler">Informal Settler</option>
      </select>
  </div>
  <div class="col-lg-4">
  <label for="ownername">Pangalan ng May-ari<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="text" placeholder="Pangalan ng May-ari" name="ownername" id="ownername" >
    </div>
</div>
<div class="col-lg-4">
<label for="numberoffam">No. of HouseHold Members<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="number" placeholder="Number of Household Member"name="numberoffam" id="numberoffam" min="0" value="0" >
    </div>
    <div class="valid-secondary text-primary" style="margin-top: -1rem;">
    Head of the family is Excluded here.
</div>
</div>
<div class="col-lg-12">
<div class="ms-4 mt-5 d-flex flex-column" style="width: 250px;" id="letter"> 
  <img src="" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 250px; z-index: 1"> 
</div>
<label for="proofofowner">letter ng May-ari<span class="text-danger">*</span> </label>
    <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="file" placeholder="letter ng May-ari"name="proofofowner" id="proofofowner" >
    </div>
    <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                       Input Jpg, png, or Jpeg with Maximum 50mb if needed
                            </div>
</div>
<div class="col-lg-12">
<div class="ms-4 mt-5 d-flex flex-column" style="width: 250px;" id="2x2"> 
  <img src="" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 250px; z-index: 1"> 
</div>
<label for="proofofowner">2x2 Picture<span class="text-danger">*</span> </label>
    <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="file" placeholder="2x2 Picture"name="profile2x2" id="profile2x2" >
    </div>
    <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                       Input Jpg, png, or Jpeg with Maximum 50mb if needed
                            </div>
</div>
                    </div>
                    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update-btn">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="addmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Last Name<span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" id="lname_addmember" placeholder="Last Name" name="lname_addmember"  autofocus>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">First Name<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="fname_addmember" placeholder="First Name" name="fname_addmember" >
                            <input type="hidden" class="form-control form-control-lg" id="id_addmember" placeholder="reg_number" name="reg_number_addmember" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Middle Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg " id="mname_addmember" placeholder="Middle Name" name="mname_addmember"  >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                    If applicable
                </div>
            </div>
            <div class="col-lg-2">
                <label for="formGroupExampleInput" class="form-label">Ext. Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" id="ext_addmember" placeholder="Extension" name="ext_addmember"  >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                    If applicable
                </div>
            </div>
            <!-- Continued from previous code snippet -->
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Relation to family</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="household_addmember" name="household_addmember" placeholder="Relation To the Head of the family">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <label for="proofofowner">2x2 Picture<span class="text-danger">*</span> </label>
                <div class="input-group mb-3">
                    <input class="form-control form-control-lg" type="file" placeholder="2x2 Picture"name="profile2x2_addmember" id="profile2x2_addmember" >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                  Note: Jpg, png, or Jpeg with Maximum 50mb only
              </div>
          </div>
          <div class="col-lg-4">
                <label for="voters">Voters Certificate (Manila Voters Only) </label>
                <div class="input-group mb-3">
                    <input class="form-control form-control-lg" type="file" placeholder="Voters Certificate "name="voters" id="voters" >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                  Note: Jpg, png, or Jpeg with Maximum 50mb only
              </div>
          </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Place of Birth<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="Birth_addmember" placeholder="Place of Birth" name="Birth_addmember" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control form-control-lg" id="birthday_addmember" placeholder="Date of Birth" name="birthday_addmember" max="2009-12-31"onchange="calculateAge()" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Age<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg" id="age_addmember" placeholder="Age" name="age_addmember" min="15" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Sex<span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg mb-3 " aria-label="Large select example" name="gender_addmember" id="gender_addmember">
                            <option selected disabled value="">------</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Civil Status<span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="civil_addmember" id="civil_addmember">
                            <option selected disabled value="">------</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Citizenship<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="citizenship_addmember" placeholder="Citizenship" name="citizenship_addmember" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Occupation<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="occupation_addmember" placeholder="Occupation" name="occupation_addmember" >
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label text-primary"><b>Indicate if: <span class="text-danger">*</span></label>
             <div style="display: none;" class="alert-danger_message">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2"  width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <div>
                    Please select at least one option from the checkboxes.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Employed" id="employed_addmember" name="employed_addmember" >
                    <label class="form-check-label" for="employed_addmember">
                        Labor / Employed
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Unemployed" id="unemployed_addmember" name="unemployed_addmember">
                    <label class="form-check-label" for="Unemployed_addmember">
                        Unemployed
                    </label>
                </div>
            </div> 
            <div class="col-lg-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="PWD" id="PWD_addmember" name="PWD_addmember">
                    <label class="form-check-label" for="PWD_addmember">
                     PWD
                 </label>
             </div>
             <div class="form-check">
                <input class="form-check-input" type="checkbox" value="OFW" id="OFW_addmember" name="OFW_addmember">
                <label class="form-check-label" for="OFW_addmember">
                    OFW
                </label>
            </div>
        </div> 
        <div class="col-lg-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Solo Parent" id="soloparent_addmember" name="soloparent_addmember">
                <label class="form-check-label" for="soloparent_addmember">
                 Solo Parent
             </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Out of School Youth (OSY)" id="OSY_addmember" name="OSY_addmember">
            <label class="form-check-label" for="OSY_addmember">
                Out of School Youth (OSY)
            </label>
        </div>
    </div> 
    <div class="col-lg-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Student" id="student_addmember" name="student_addmember">
            <label class="form-check-label" for="student_addmember">
                Student
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Out of School Children (OSC)" id="OSC_addmember" name="OSC_addmember">
            <label class="form-check-label" for="OSC_addmember">
                Out of School Children (OSC)
            </label>
        </div>
    </div> 
</div>
</div>               
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary addmember-btn" id="liveToastBtn">Save changes</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Last Name<span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" id="lname_editmember" placeholder="Last Name" name="lname_editmember"  autofocus>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">First Name<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="fname_editmember" placeholder="First Name" name="fname_editmember" >
                            <input type="hidden" class="form-control form-control-lg" id="id_editmember" placeholder="reg_number" name="reg_number_editmember" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Middle Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg " id="mname_editmember" placeholder="Middle Name" name="mname_editmember"  >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                    If applicable
                </div>
            </div>
            <div class="col-lg-2">
                <label for="formGroupExampleInput" class="form-label">Ext. Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" id="ext_editmember" placeholder="Extension" name="ext_editmember"  >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                    If applicable
                </div>
            </div>
            <!-- Continued from previous code snippet -->
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Relation to family</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="household_editmember" name="household_editmember" placeholder="Relation To the Head of the family">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <label for="proofofowner">2x2 Picture<span class="text-danger">*</span> </label>
                <div class="input-group mb-3">
                    <input class="form-control form-control-lg" type="file" placeholder="2x2 Picture"name="profile2x2_editmember" id="profile2x2_editmember" >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                  Note: Jpg, png, or Jpeg with Maximum 50mb only
              </div>
          </div>
          <div class="col-lg-4">
                <label for="proofofowner">Voters Certificate (Manil Voters Only)<span class="text-danger">*</span> </label>
                <div class="input-group mb-3">
                    <input class="form-control form-control-lg" type="file" placeholder="Voters Certificate "name="votersupdate" id="votersupdate" >
                </div>
                <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                  Note: Jpg, png, or Jpeg with Maximum 50mb only
              </div>
          </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Place of Birth<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="Birth_editmember" placeholder="Place of Birth" name="Birth_editmember" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control form-control-lg" id="birthday_editmember" placeholder="Date of Birth" name="birthday_editmember" max="1924-12-31"onchange="calculateAge()" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Age<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg" id="age_editmember" placeholder="Age" name="age_editmember" min="0" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Sex<span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg mb-3 " aria-label="Large select example" name="gender_editmember" id="gender_editmember">
                            <option selected disabled value="">------</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Civil Status<span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="civil_editmember" id="civil_editmember">
                            <option selected disabled value="">------</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Citizenship<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="citizenship_editmember" placeholder="Citizenship" name="citizenship_editmember" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Occupation<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="occupation_editmember" placeholder="Occupation" name="occupation_editmember" >
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label text-primary"><b>Indicate if: <span class="text-danger">*</span></label>
             <div style="display: none;" class="alert-danger_message">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2"  width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <div>
                    Please select at least one option from the checkboxes.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Employed" id="employed_editmember" name="employed_editmember" >
                    <label class="form-check-label" for="employed_editmember">
                        Labor / Employed
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Unemployed" id="unemployed_editmember" name="unemployed_editmember">
                    <label class="form-check-label" for="Unemployed_editmember">
                        Unemployed
                    </label>
                </div>
            </div> 
            <div class="col-lg-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="PWD" id="PWD_editmember" name="PWD_editmember">
                    <label class="form-check-label" for="PWD_editmember">
                     PWD
                 </label>
             </div>
             <div class="form-check">
                <input class="form-check-input" type="checkbox" value="OFW" id="OFW_editmember" name="OFW_editmember">
                <label class="form-check-label" for="OFW_editmember">
                    OFW
                </label>
            </div>
        </div> 
        <div class="col-lg-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Solo Parent" id="soloparent_editmember" name="soloparent_editmember">
                <label class="form-check-label" for="soloparent_editmember">
                 Solo Parent
             </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Out of School Youth (OSY)" id="OSY_editmember" name="OSY_editmember">
            <label class="form-check-label" for="OSY_editmember">
                Out of School Youth (OSY)
            </label>
        </div>
    </div> 
    <div class="col-lg-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Student" id="student_editmember" name="student_editmember">
            <label class="form-check-label" for="student_editmember">
                Student
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Out of School Children (OSC)" id="OSC_editmember" name="OSC_editmember">
            <label class="form-check-label" for="OSC_editmember">
                Out of School Children (OSC)
            </label>
        </div>
    </div> 
</div>
</div>               
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success editmember-btn" id="liveToastBtn">Update</button>
</div>
</div>
</div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-success">
      <strong class="me-auto">Sucess</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Family Member added successfully
    </div>
  </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToastdanger" class="toast text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-danger">
      <strong class="me-auto">Somthings not Right</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body toastdanger">
      Family Member added successfully
    </div>
  </div>
</div>
                    <!-- Remaining input fields with modified IDs -->
                    <div class="modal fade" id="residentDetailsModal" tabindex="-1" aria-labelledby="residentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="residentDetailsModalLabel">Family member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
            <div class="col-lg-4">
            <img src="../residentprofile/img.png"class="img-thumbnail mx-auto d-block" alt="Profile pic" style="width: 250px; height: 250px;" id="profilePic" >
            <br>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 text-start"><p>Contoll #:<strong id="controll"></strong > </p></div>
                    <div class="col-lg-6 text-start"><p>Status: <strong id="statusacc"></strong > </p></div>
                    <h1 class="text-center" id="nameidsplay"> </h1>
                    <h3 class="text-center" ><strong id="statusdisplay"></strong></h3>
                    <div class="col-lg-3">  <p><strong id="birthdaydsiplay">Birthday:</strong> </p> </div>
            <div class="col-lg-3">  <p><strong  id="agedisplay">Age:</strong> </p> </div>
            <div class="col-lg-3">  <p><strong id="birthdisplay">Birt Place:</strong></p></div>
            <div class="col-lg-3">  <p><strong id="genderdisplay">Gender:</strong> <p></div>
            <div class="col-lg-4">  <p><strong id="occupationdisplay">Occupation:</strong> </p></div>
            <div class="col-lg-4">  <p><strong id="civildisplay"></strong> </p></div>
            <div class="col-lg-4">  <p><strong id="citizendisplay">Citizenship:</strong> </p></div>
            <div class="col-lg-6">  <p><strong id="personaldisplay">Personal Status:</strong></p></div>
                </div>    
            </div>
           
        </div>
        <br>
            </div>
            
        </div>
    </div>
</div>

@endsection