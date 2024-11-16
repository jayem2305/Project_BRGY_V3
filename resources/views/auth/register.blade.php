@extends("layouts.default")
@section("title","Barangay 781 Zone 85")
@section("content")
<!-- Navbar Start -->
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
        .viewletter, .voterscert {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px; /* Adjust this height if needed */
    text-align: center;
    border: 2px solid #ddd; /* Add border here */
    border-radius: 8px; /* Optional: Add rounded corners */
    padding: 10px; /* Optional: Add some padding inside the border */
}


.viewletter img, .viewletter iframe, .voterscert img, .voterscert iframe {
    max-width: 100%;
    max-height: 100%;
    margin: auto;
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
                        <a href="register" class="nav-item nav-link text-white"><span class="highlight_active"><i class="bi bi-person-fill"></i> Create an Account</span></a>
                        <a href="aboutus" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-info-circle"></i> About us </i></span></a>
                        <a href="login" class="nav-item nav-link text-white"><span class="highlight"><i class="bi bi-door-open-fill"></i> Login</span></a>
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
    <h1 class="text-center text-white text-uppercase"style="font-size: 5rem;">Create An <br>Account</h1>
    </div>
</section>
</div>
<!-- registration Start -->
<div class="container-fluid py-5" style="margin-top: -5rem;">
    <div class="container-fluid" id="step1" style="display: block;">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">  
                <h2 class="mb-4"><i class="bi bi-person-fill"></i>Create an Account </h2>
                <div class="row">
                <div class="col-lg-4 col-xs-3">
                    <h5><span class="circle-number-color">1</span>Head of the Family Information<i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number">2</span>House Hold Information <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number">3</span>Upload your Valid ID’s <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-2 col-xs-3" >
                    <h5><span class="circle-number">4</span>Face Scan</h5>
                </div>
         </div>
         <hr>
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
                    <div role="alert" id="opTag"></div>
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
                            </div>
                            @error('fname')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">Middle Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg " id="mname" placeholder="Middle Name" name="mname"  >
                        </div>
                        <div class="valid-secondary text-danger fw-bolder" style="margin-top: -1rem;">
                        Type "NA" if not applicable
                            </div>
                    </div>
                    <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Ext. Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="ext" placeholder="Extension" name="ext"  >
                            </div>
                            <div class="valid-secondary text-danger fw-bolder" style="margin-top: -1rem;">
                            Type "NA" if not applicable
                            </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Complete Address<span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" id="house" placeholder="House #" name="house" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" id="street" placeholder="Street" name="stree" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" id="brgy" placeholder="Barangay" name="brgy" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" id="city" placeholder="City" Value="Manila City" name="city" Readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
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
                                <input type="date" class="form-control form-control-lg" id="birthday" placeholder="Date of Birth" name="birthday" max="2009-12-31" min="1924-12-31" >
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Age<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control form-control-lg" id="age" placeholder="Age" name="age" min="18" readonly>
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
                            <label for="formGroupExampleInput" class="form-label">Gender at Birth<span class="text-danger">*</span></label>
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
                                <option value="Separated">Separated</option>
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
                                    <input class="form-check-input" type="checkbox" value="Employed" id="employed" name="employed" checked disabled>
                                    <label class="form-check-label" for="employed">
                                        Labor / Employed / Employer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Unemployed" id="unemployed" name="unemployed" disabled>
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
                <div class="row">
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Email<span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="btn-text">Send OTP</span>
                                    </button>
                                    <input type="hidden" class="form-control form-control-lg" id="verified"name="verified" value="">          

                                </div>
                            </div>
                            <div class="col-lg-12 verify-otp-section" style="display:none;">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-lg" id="otp" placeholder="Enter OTP" name="otp">          
                                    <button class="btn btn-outline-primary verify-otp-btn" type="button" id="verify-otp-btn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="btn-text">Verify OTP</span>
                                    </button>
                                </div>
                                <p id="otp-timer" class="text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Password<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" oninput="updatePasswordRequirements()">
                            <span class="input-group-text" id="basic-addon2">
                                <a id="togglePassword" type="button"><i class="bi bi-eye-slash" id="eyeIcon"></i></a>
                            </span>
                            </div>
                            <div class="text-primary" style="margin-top: -1rem;" id="charac">
                            <b><i class="bi bi-emoji-smile-fill" id="eigth_id"></i></b> Must Have 8 Characters long.
                            </div>
                            <div class="text-primary" style="margin-top: -.3rem;" id="cap">
                            <b><i class="bi bi-emoji-smile-fill"id="cap_id"></i></b> Atleast 1 Capital Letter
                            </div>
                            <div class="text-primary" style="margin-top: -.2rem;"id="num">
                            <b><i class="bi bi-emoji-smile-fill" id="num_id"></i></b> Atleast 1 Number
                            </div>
                            <div class=" text-primary" style="margin-top: -.1rem;"id="spec">
                            <b><i class="bi bi-emoji-smile-fill" id="char_id"></i></b> Atleast 1 Special Character [@_><,.?..]
                            </div>

                    </div>
                </div>
                <script>
                    function updatePasswordRequirements() {
    var pass = document.getElementById('password').value;
    var Characters = document.getElementById('charac');
    var passwordRequirements = document.getElementById('cap');
    var numRequirements = document.getElementById('num');
    var cspecRequirements = document.getElementById('spec');
                                // Define the password requirements
    var hasMinLength = pass.length >= 8;
    var hasUppercase = /[A-Z]/.test(pass);
    var hasNumber = /\d/.test(pass);
    var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(pass);

                                // Update the display based on the requirements
    //passwordRequirements.innerHTML = "Password must have at least 1 Capital Letter";
   if (hasUppercase) {
            $('#cap').removeClass('text-danger').addClass('text-success');
            $('#cap_id').removeClass('bi bi-emoji-frown-fill').addClass('bi bi-emoji-laughing-fill');
            $('#cap_id').removeClass('bi bi-emoji-smile-fill');
        } else {
            $('#cap').removeClass('text-success').addClass('text-danger');
            $('#cap_id').removeClass('bi bi-emoji-laughing-fill').removeClass('bi-emoji-smile-fill').addClass('bi bi-emoji-frown-fill');
        }
 // Characters.innerHTML = "Password Must Have 8 Characters long.";
  //numRequirements.innerHTML = "Password must have at least 1 Number.";
    if (hasMinLength) {
        $('#charac').removeClass('text-danger').addClass('text-success');
        $('#eigth_id').removeClass('bi bi-emoji-frown-fill').addClass('bi bi-emoji-laughing-fill');
            $('#eigth_id').removeClass('bi bi-emoji-smile-fill');
        } else {
            $('#charac').removeClass('text-success').addClass('text-danger');
            $('#eigth_id').removeClass('bi bi-emoji-laughing-fill').removeClass('bi-emoji-smile-fill').addClass('bi bi-emoji-frown-fill');
        }
 
    if (hasNumber) {
        $('#num').removeClass('text-danger').addClass('text-success');
        $('#num_id').removeClass('bi bi-emoji-frown-fill').addClass('bi bi-emoji-laughing-fill');
            $('#num_id').removeClass('bi bi-emoji-smile-fill');
        } else {
            $('#num').removeClass('text-success').addClass('text-danger');
            $('#num_id').removeClass('bi bi-emoji-laughing-fill').removeClass('bi-emoji-smile-fill').addClass('bi bi-emoji-frown-fill');
        }
  //cspecRequirements.innerHTML = "Password must have at least 1 Special Character.";
    if (hasSpecialChar) {
        $('#spec').removeClass('text-danger').addClass('text-success');
        $('#char_id').removeClass('bi bi-emoji-frown-fill').addClass('bi bi-emoji-laughing-fill');
            $('#char_id').removeClass('bi bi-emoji-smile-fill');
        } else {
            $('#spec').removeClass('text-success').addClass('text-danger');
            $('#char_id').removeClass('bi bi-emoji-laughing-fill').removeClass('bi-emoji-smile-fill').addClass('bi bi-emoji-frown-fill');
        }
}
</script>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary firststep-btn" type="submit" 
data-lname="lname"
data-fname="fname"
data-mname="mname"
data-ext="ext"
data-address="address"
data-household="household"
data-Birth="Birth"
data-birthday="birthday"
data-age="age"
data-cnum="cnum"
data-gender="gender"
data-civil="civil"
data-citizenship="citizenship"
data-occupation="occupation"
data-employed="#employed"
data-unemployed="#unemployed"
data-PWD="#PWD"
data-OFW="#OFW"
data-soloparent="#soloparent"
data-OSY="#OSY"
data-student="#student"
data-OSC="#OSC"
data-email="email"
data-password="password" name="firststep"> <span class="next-text ">Next</span>
    <i class="bi bi-arrow-right-circle "></i> <div class="spinner-border text-light d-none" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</i></button>
</div>
               </div>
           </div>
       </div>
   </div>
   </div>
<div class="container-fluid" id="step2" style="display: none;">
    <div class="row g-5">
        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">  
            <h2 class="mb-4"><i class="bi bi-person-fill"></i>Create an Account </h2>
            <div class="row" >
                <div class="col-lg-4 col-xs-3">
                    <h5><span class="circle-number-color">1</span>Head of the Family Information<i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number-color">2</span>House Hold Information <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number">3</span>Upload your Valid ID’s <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-2 col-xs-3" >
                    <h5><span class="circle-number">4</span>Face Scan</h5>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-lg-4">
      <label for="mail">Uri ng pagmamay-ari<span class="text-danger">*</span></label>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="owner" id="owner" required>
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
        <input class="form-control form-control-lg" type="text" placeholder="Pangalan ng May-ari" name="ownername" id="ownername" required >
    </div>
</div>

<div class="col-lg-4">
<label for="living">No. of years Living in The Barangay<span class="text-danger">*</span></label>
<div class="input-group mb-3">
  <input class="form-control form-control-lg" type="number" placeholder="Number of Years Living in the Barangay" min="0" value="0" name="living" id="living" required >
  <select class="form-select" id="Num_days">
    <option selected disabled>-----</option>
    <option value="Days">Day</option>
    <option value="Months">Month</option>
    <option value="Years">Years</option>
  </select>
</div>
</div>
<div class="col-lg-6">
<label for="numberoffam">No. of HouseHold Members<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="number" placeholder="Number of Household Member"name="numberoffam" id="numberoffam" min="0" value="0" required>
    </div>
    <div class="valid-secondary text-danger" style="margin-top: -1rem;">
    Head of the family is Excluded here.
    
</div>
</div>
<div class="col-lg-6">
<label for="numberoffam">Prescint No.<span class="text-danger">*</span></label>
    <div class="row">
        <div class="col-lg-3">
            <div class="input-group mb-3">
                <input class="form-control form-control-lg" type="text" name="s_1" id="s_1" min="2"  max="2" required>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="input-group mb-3">
                <input class="form-control form-control-lg" type="text" name="s_2" id="s_2" min="9" max="9" required>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="input-group mb-3">
                <input class="form-control form-control-lg" type="text" name="s_3" id="s_3" min="8"  max="9" required>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="input-group mb-3">
                <input class="form-control form-control-lg" type="text" name="s_4" id="s_4" min="0"  max="9" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="input-group mb-3">
                <input class="form-control form-control-lg" type="text" name="s_5" id="s_5"  required>
            </div>
        </div>
    </div>
    <div class="valid-secondary text-danger" style="margin-top: -1rem;">
    if Applicable.
</div>
</div>
<div class="col-lg-6 ">
<br>

    <div class="alert alert-primary d-flex align-items-center overflow-auto"  role="alert">
        <div class="row">
            <div class="col-12">
                <h3>Preview of The Letter</h3>
            <div class="viewletter" ></div>
            </div>
            <hr>
            <div class="col-12">
                    <ul>
                        <li>Maximum file size: 5 MB, maximum number of files: 1</li>
                        <li>Accepted file types: .png .jpg .jpeg .pdf</li>
                    </ul>
            </div>
        </div>
    </div>
    <div class="form-floating">
    <input class="form-control form-control-lg " type="file" placeholder="letter ng May-ari"name="proofofowner" id="proofofowner" >
    <label for="proofofowner">Letter ng May-ari<span class="text-danger">*</span> </label>
    </div>
    <div class="valid-secondary text-danger" >Para sa Hindi may Ari ng Tahanan.</div>
</div> 
<div class="col-lg-6 ">
<br>

    <div class="alert alert-primary d-flex align-items-center overflow-auto"  role="alert">
        <div class="row">
            <div class="col-12">
            <h3>Preview of Voter Certificate</h3>
            <div class="voterscert" ></div>
            </div>
            <hr>
            <div class="col-12">
                    <ul>
                        <li>Maximum file size: 5 MB, maximum number of files: 1</li>
                        <li>Accepted file types: .png .jpg .jpeg .pdf</li>
                    </ul>
            </div>
        </div>
    </div>
    <div class="form-floating">
        <input type="file" class="form-control" id="voterscert" name="voterscert" >
        <label for="voterscert">Voters Certificate:</label>
    </div>
    <div class="valid-secondary text-danger" >If applicable</div>
</div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary " type="button" onclick="prevStep(1)"><i class="bi bi-arrow-left-circle "></i> <span class="previous-text " >Previous</span>
     <div class="spinner-border text-light d-none" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</i></button>
  <button class="btn btn-primary secondstep-btn" type="button"
  data-owner = "owner"
  data-ownername = "ownername"
  data-proofofowner = "proofofowner"
  data-numberoffam = "numberoffam"
  data-living = "living"
  data-num_days="Num_days"> <span class="next-text ">Next</span>
    <i class="bi bi-arrow-right-circle "></i> <div class="spinner-border text-light d-none" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</i></button>
</div>
    </div>
</div>

<!-- Step 3: Upload Valid IDs -->
 
<div class="step" id="step3" style="display: none;">
<h2 class="mb-4"><i class="bi bi-person-fill"></i>Create an Account </h2>
        <div class="row">
                <div class="col-lg-4 col-xs-3">
                    <h5><span class="circle-number-color">1</span>Head of the Family Information<i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number-color">2</span>House Hold Information <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number-color">3</span>Upload your Valid ID’s <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-2 col-xs-3" >
                    <h5><span class="circle-number">4</span>Face Scan</h5>
                </div>
         </div>
<hr>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card" style="display: block;">
            <div class="card-header text-center text-body-secondary">
                Upload your Valid ID
            </div>
            <div class="card-body text-center">
                <!-- File Upload and ID Type Selection (Initially Hidden) -->
                <div id="file-upload" style="display: block;" class="mt-3">

                    <div class="uploadid" ></div>
                    <br>
                    <div id="result" class="text-primary"></div>
                    <input type="file" id="id-file" class="form-control" accept="image/*,application/pdf" required>
                    <figcaption class="blockquote-footer">
                        
                            <li>Maximum file size: 5 MB, maximum number of files: 1</li>
                            <li>Accepted file types: .png .jpg .jpeg </li>
                        
                    </figcaption>
                </div>

                <div id="id-type" class="mt-3">
                    <label for="id-select" class="form-label">Select ID Type</label>
                    <select id="id-select" class="form-select" name="id-select">
                        <option disabled selected>----</option>
                        <option value="Drivers License">Driver's License</option>
                        <option value="National ID">National ID</option>
                        <option value="Philhealth">Philhealth</option>
                        <option value="SSS">SSS</option>
                        <option value="Barangay ID">Barangay ID</option>
                        <option value="Student ID">Student ID</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-primary " type="button" onclick="prevStep(2)"><i class="bi bi-arrow-left-circle "></i> <span class="previous-text " >Previous</span>
                <div class="spinner-border text-light d-none" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>
                </i></button>
                <button class="btn btn-primary Thirdstep-btn" type="button" id="Thirdstep-btn" data-id-file = "id-file"
                data-id-select = "id-select"> <span class="next-text ">Next</span>
                    <i class="bi bi-arrow-right-circle "></i> <div class="spinner-border text-light d-none" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>
                </i></button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Step 4: Face recognition -->
<div class="step" id="step4" style="display: none;">
<h2 class="mb-4"><i class="bi bi-person-fill"></i>Create an Account </h2>
        <div class="row">
                <div class="col-lg-4 col-xs-3">
                    <h5><span class="circle-number-color">1</span>Head of the Family Information<i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number-color">2</span>House Hold Information <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-3 col-xs-3" >
                    <h5><span class="circle-number-color">3</span>Upload your Valid ID’s <i class="bi bi-caret-right-fill"></i></h5>
                </div>
                <div class="col-lg-2 col-xs-3" >
                    <h5><span class="circle-number-color">4</span>Face Scan</h5>
                </div>
         </div>
<hr>

<div class="container center-align">
    <div class="row justify-content-center text-center w-100">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1>Scan Face</h1>
                    <h6  class="text-primary">Scan your face here. To verify Your Valid ID</h6>
                    <div id="video-container" class="video-container mx-auto">
                    <video id="video" autoplay></video>
                    <div class="scan-line"></div> 
                    </div>
                    <h6 id="status" ></h6>

                    <h6>Face Scan Tips:</h6>
                    <ul>
                        <li>Make sure there is enough light around</li>
                        <li>Remove all accessories (e.g., eyeglasses, earrings, contact lenses, etc.)</li>
                        <li>Place your face in the frame</li>
                        <li>Click "Capture" for front Face, then follow the next steps</li>
                    </ul>
                    
                    <div class="scan-buttons">
                        <button class="btn btn-primary" type="button" id="capture-front"><i class="bi bi-upc-scan"></i> Scan</button>
                        <button class="btn btn-primary d-none" type="button" id="capture-left"><i class="bi bi-upc-scan"></i> Scan</button>
                        <button class="btn btn-primary d-none" type="button" id="capture-right"><i class="bi bi-upc-scan"></i> Scan</button>
                    </div>

                    <button class="btn btn-primary laststep-btn d-none" type="submit" id="registerButton" name="start">
                        <span class="next-text">Create Account</span>
                        <i class="bi bi-arrow-right-circle"></i> 
                        <div class="spinner-border text-light d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button><br>

                    <a href="#" class="btn text-primary icon-link"  onclick="prevStep(3)">
                        <i class="bi bi-arrow-left-circle"></i> 
                        <span class="previous-text text-decoration-underline">Previous Step</span>
                        <div class="spinner-border text-light d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </a>
                    

                </div>
            </div>
        </div>
    </div>
</div>

<br>
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
<div class="modal fade bg-primay" id="exampleModal"data-bs-backdrop="static" data-bs-keyboard="false"tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl alert-success">
        <div class="alert alert-success" role="alert">
         <h3 class="text-success" style="text-align: center;">The account had been successfully created.</h3>
         <h1  class="text-danger" style="text-align: center;">Account Control Number: <i><span id="controlNumber"></span></i></h1>
         <p class="text-success">Your account has been successfully created! You can now proceed to the login page to access your account. Please remember to capture or save your control number, and then simply enter your credentials to get started.</p>
         <div class="modal-content bg-transparent" style="border: none;">
           <div style="margin-left:31rem">
            <a href="login" class="btn btn-primary">Login</a>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" tabindex="-1" id="termscondition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terms and Conditions</h5>
      </div>
      <div class="modal-body " data-bs-spy="scroll" style="max-height: 400px; overflow-y: auto;">
      <b>These Terms and Conditions ("Terms") govern your use of the Barangay 781 Zone 85 website www.barangay781zone85.com ("the Website") and the services provided therein. By accessing or using the Website, you agree to be bound by these Terms. If you do not agree to these Terms, please refrain from using the Website.
</b>
<br>
<br>
<br>
        <h4>1. Privacy</h4>
        <p>Your privacy is important to us. By using the Website, you consent to the collection, use, and disclosure of your personal information as described in our Privacy Policy. Please review our Privacy Policy to understand how we collect, use, and protect your personal information.</p>
        <h4>2. Collection of Personal Information</h4>
        <p>In order to access certain features or services on the Website, you may be required to provide personal information such as your name, birthdate, address, and identification documents. By providing such information, you represent and warrant that it is accurate, complete, and current. You also consent to the collection and processing of this information in accordance with our Privacy Policy.
</p>
        <h4>3. Use of Personal Information</h4>
        <p>We may use the personal information collected from you for the following purposes:<br>To provide you with the services offered on the Website.<br>To verify your identity.<br>To communicate with you regarding your account or the services.<br>To comply with legal and regulatory requirements.<br>To improve and personalize your experience on the Website.
</p>
        <h4>4. Security</h4>
        <p>We are committed to protecting the security of your personal information. We employ industry-standard security measures to safeguard your information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
        <h4>5. Third-Party Links</h4>
        <p>The Website may contain links to third-party websites or services that are not owned or controlled by us. We are not responsible for the content, privacy policies, or practices of any third-party websites or services. We encourage you to review the terms and privacy policies of any third-party websites or services that you visit.
</p>
        <h4>6. Changes to Terms and Conditions</h4>
        <p>We reserve the right to update or modify these Terms at any time without prior notice. Any changes to these Terms will be effective immediately upon posting on the Website. Your continued use of the Website after the posting of revised Terms constitutes your acceptance of such changes.
</p>
        <h4>7. Governing Law</h4>
        <p>These Terms shall be governed by and construed in accordance with the laws of the Philippines, without regard to its conflict of law provisions.
</p>
        <h4>8. Contact Us</h4>
        <p>If you have any questions or concerns about these Terms or the Website, please contact us at 88569560.</p>
    </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                    <h6>By using the Website, you acknowledge that you have read, understood, and agree to be bound by these Terms and our Privacy Policy.</h6>
                    </div>
                    <div class="text-danger">
                    <p><i class="bi bi-info-circle"></i> Please be advised that you will not be allowed to continue with the account creation process if you decline the terms and conditions. 
                        </p>
                    </div>
                    <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/" type="button" class="btn btn-secondary" >Decline</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection