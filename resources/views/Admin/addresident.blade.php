@extends("layouts.default")
@section("title","Barangay 781 Zone 85")
@section("content")
<!-- Navbar Start -->
<style>
        body {
            font-size: 0.875rem;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Stay on top of everything */
            padding: 48px 0 0; /* Height of navbar */
            background-color: #222E3C; /* Set the background color */
            color: white; /* Set the text color */
            transition: width 0.2s;
            width: 255px; /* Default width is expanded */
            overflow-y: auto; 
            overflow-x: hidden; 
            scrollbar-width: thin; /* Makes scrollbar thinner in Firefox */
            scrollbar-color: #0d6efd transparent;
        }
        .sidebar:hover {
            scrollbar-color: #ffffff transparent; 
        }
        /* Custom Scrollbar Styles */
        .sidebar::-webkit-scrollbar {
        width: 12px; /* Width of the scrollbar */
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent; /* Background of the track */
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.6); /* Color of the scrollbar thumb */
             border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #ffffff; /* Color on hover */
            box-shadow: 0 0 10px #ffffff; /* Glowing effect */
        }
        .nav-link {
            font-weight: 500;
            color: #ffffff; /* Light text color */
            padding: 5px 15px; /* Adjust padding */
            text-align: left; /* Align text to the left */
            transition: all 0.3s; /* Smooth transition */
            white-space: nowrap; /* Prevent text wrapping */
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        .nav-link i {
            font-size: 24px; /* Set default icon size */
            transition: transform 0.3s; /* Transition for shrinking effect */
            
        }
        .nav-link span {
            font-size: 16px; /* Set text size */
            margin-left: 10px; /* Space between icon and text */
            
        }
        .nav-link:hover {
    background-color: #44618B; /* Change background on hover */
    color: #ffffff; /* Text color on hover */
    box-shadow: inset 5px 0 0 #0d6efd; /* Glowing primary color on the right */
}

.nav-link.active {
    background-color: #44618B; /* Background color when clicked */
    color: #ffffff; /* Text color when clicked */
    box-shadow: inset 5px 0 0 #0d6efd; /* Glowing color on the right */
}
/* Optionally, you can add a slight glowing effect */
.nav-link:hover::after {
    content: "";
    display: block;
    height: 100%;
    width: 5px; /* Glow on the right side */
    background-color: #0d6efd; /* Primary color */
    position: absolute;
    right: 0; /* Ensure it appears on the right side */
    top: 0;
}

/* Ensure only the hovered one is affected */
.nav-link:hover .link-text {
    color: #ffffff; /* Highlight the text */
}
        .content {
            margin-left: 240px; /* Match the default expanded sidebar width */
            transition: margin-left 0.2s, transform 0.2s;
        }
        .contentadmin {
            margin-top: -20px; /* Match the default expanded sidebar width */
            margin-left: 10px; /* Match the default expanded sidebar width */
            transition: margin-left 0.2s, transform 0.2s;
        }
        .sidebar .nav-section {
            padding: 15px; /* Space around section headings */
            font-weight: bold; /* Bold headings */
            color: #ccc; /* Color for headings */
        }
    /* Set fixed height for the table body and make it scrollable */
    #tablemonths {
    width: 100%;
    display: block;
}

#tablemonths thead {
    display: table;
    width: 100%;
}

#tablemonths tbody {
    display: block;
    height: 200px; /* Adjust this height as needed */
    overflow-y: scroll;
    width: 100%;
}

#tablemonths th, #tablemonths td {
    width: 20%; /* Adjust this percentage based on your column sizes */
    text-align: left;
}
    </style>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Navbar -->
        <nav class="sidebar active" id="sidebar"> <!-- Sidebar is active by default -->
        <div class="Menu-Top" style="margin-top:-2rem; margin-left:15px;">
            <h2 class="text-white"><i class="fas fa-bars"></i> Menu</h2>
        </div>
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <!-- Pages Section -->
                    <li class="nav-section">Pages</li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../Admin">
                            <i class="fas fa-tachometer-alt"></i> <span class="link-text">Dashboard</span>
                        </a>
                    </li>
                    <!-- Content Manager Section -->
                    <li class="nav-section">Content Manager</li>
                    <li class="nav-item">
                        <a class="nav-link " href="../admin/event">
                            <i class="fas fa-calendar-alt"></i>  <span class="link-text">Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../admin/project">
                            <i class="fas fa-briefcase"></i> <span class="link-text">Projects</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/announcement">
                            <i class="fas fa-bullhorn"></i> <span class="link-text">Announcements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/contentmanager">
                            <i class="fas fa-file-alt"></i> <span class="link-text">About Us</span>
                        </a>
                    </li>
                        <!-- Certificates Section -->
                        <li class="nav-section">Certificates</li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="ftj" href="../Admin/ftj">
                            <i class="fas fa-certificate"></i> <span class="link-text">First Time Job Seeker</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert " id="indigency" href="../Admin/indigency">
                            <i class="fas fa-certificate"></i> <span class="link-text">Barangay Indigency</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert " id="certificate" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">Barangay Certificate</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert " id="permits" href="../Admin/permit">
                            <i class="fas fa-certificate"></i> <span class="link-text">Business Permit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="cessation" href="../Admin/cessation">
                            <i class="fas fa-certificate"></i> <span class="link-text">Cessation of Business</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="soloparent" href="../Admin/soloparent">
                            <i class="fas fa-certificate"></i> <span class="link-text">Solo Parents Certificate</span>
                        </a>
                    </li>
                    <!-- Residents Section -->
                    <li class="nav-section">Residents</li>
                    <li class="nav-item">
                        <a class="nav-link " href="../Admin/resident">
                            <i class="fas fa-users"></i> <span class="link-text">List of Residents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../Admin/addresident">
                            <i class="bi bi-person-plus"></i> <span class="link-text">Add Resident</span> <!-- Changed to message icon -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/addofficer">
                            <i class="fas fa-user-tie"></i> <span class="link-text">Barangay Officials</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/forum">
                            <i class="fas fa-comment-alt"></i> <span class="link-text">Inquiries</span> <!-- Changed to message icon -->
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main Content Area -->
        <main class="content col">
                <div class="d-flex justify-content-between align-items-center">
                      <div class="d-flex align-items-center" style="margin-bottom: -1rem;">
                          <img src="../pic/logo_TP.png" alt="Logo" class="me-3" style="width: 60px; height: 60px;"> <!-- Adjust the path and size as needed -->
                          <h3 class="d-inline fw-bolder text-secondary" style="font-size:2.5rem; margin-top:1rem;">Barangay 781 Zone 85</h3>
                      </div>
                      <div class="ms-auto" style="margin-top: 1rem;"> <!-- This div pushes the button to the right -->
                          <a href="/" class="btn btn-danger shadow-lg rounded-pill red" type="button" style="font-size: 1.1rem; padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #dc3545, #c82333); transition: transform 0.2s ease, background 0.2s ease;">
                              <i class="fas fa-sign-out-alt me-2"></i> Logout
                          </a>
                      </div>
                </div>
                <hr>
            <div class="row gx-2 gy-2 contentadmin">
 <!-- registration Start -->
<div class="container-fluid p-2">
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
                        If applicable
                            </div>
                    </div>
                    <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Ext. Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="ext" placeholder="Extension" name="ext"  >
                            </div>
                            <div class="valid-secondary text-danger fw-bolder" style="margin-top: -1rem;">
                            If applicable
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Complete Address<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" id="address" placeholder="Complete Address" name="address" >
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
                <div class="row">
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Email<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email"  >
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
<div class="col-lg-12">
<label for="numberoffam">No. of HouseHold Members<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="number" placeholder="Number of Household Member"name="numberoffam" id="numberoffam" min="0" value="0" required>
    </div>
    <div class="valid-secondary text-danger" style="margin-top: -1rem;">
    Head of the family is Excluded here.
    
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

<div class="modal fade bg-primay" id="exampleModal"data-bs-backdrop="static" data-bs-keyboard="false"tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl alert-success">
        <div class="alert alert-success" role="alert">
         <h3 class="text-success" style="text-align: center;">The account had been successfully handed to the administrator.</h3>
         <h1  class="text-danger" style="text-align: center;">Account Control Number: <i><span id="controlNumber"></span></i></h1>
         <p class="text-success">Your patience is greatly appreciated, as we process your account within 3-5 business days. Will subsequently email it to your provided email address. We regret any cause of inconvenience this might cause to you, but we assure that care will be implemented while under queue. Thank you</p>
         <div class="modal-content bg-transparent" style="border: none;">
           <div style="margin-left:31rem">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>>
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
                        <button data-bs-dismiss="modal" type="button" class="btn btn-secondary" >Decline</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>               
            </div>
        </main>
    </div>
</div>

@endsection