@extends('layouts.residentstatus')

@section('title', 'Barangay 781 Zone 85')

@section('contentresidentlistAdmin')
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
                        <a class="nav-link active" href="../Admin/resident">
                            <i class="fas fa-users"></i> <span class="link-text">List of Residents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/addresident">
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
                <div class="col-lg-6">
                    <h1 class="p-3 fw-bolder">List of Residents</h1>
                </div>
              
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">HouseHold</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="retrievetable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
       
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header ">
                    <strong class="me-auto text-success">Successfully created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-bg-success">
                    Message goes here 
                    </div>
                </div>
            </div>
    </div>
</main>


<div class="modal fade" id="Addofficials" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModalLabel">Add Official Members</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="members" class="form-label">Official Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="name" placeholder="Name of the Official Member">
          <div class="form-text" id="error-name" style="display: none;"></div>
        </div>
        <div class="mb-3">
          <label for="position" class="form-label">Official Position <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="position" placeholder="Position of the Member">
        </div>
        <div class="mb-3">
          <label for="profile" class="form-label">Profile Picture <span class="text-danger">*</span></label>
          <input type="file" class="form-control" id="profile">
          <div class="form-text" id="error-profile" style="display: none;"></div>
          <div class="form-text" id="basic-addon4">Maximum file size: 50 MB, maximum number of files: 1<br>Accepted file types: .pdf .png .jpg .jpeg</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-confirm-primary" id="liveToastBtn"><span class="decinepbtn">Submit</span> <div class="spinner-border" role="status" style="display: none;">
            <span class="visually-hidden">Loading...</span>
          </div></button>
      </div>
    </div>
  </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast text-bg-danger " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Invalid Input !</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="restrictionModal" tabindex="-1" role="dialog" aria-labelledby="restrictionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="restrictionModalLabel">Restrict Resident</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="regid">
        <p>Reason for restriction:</p>
        <textarea id="restrictionReason" class="form-control" rows="3" placeholder="This Account is Restricted Due to: "></textarea>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="btnRestrict" class="btn btn-danger"><span id="restrict">Restrict</span> <div class="spinner-border sample" role="status" style="display: none;">
  <span class="visually-hidden">Loading...</span>
</div></button>
      </div>
    </div>
  </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast text-bg-success toastset" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-success">
      <strong class="me-auto">Account Restriction</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>


<div class="modal fade" id="residentDetailsModal" tabindex="-1" aria-labelledby="residentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="residentDetailsModalLabel">Resident Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p id="personaldisplay"></p>

                <!-- Resident details will be populated here dynamically -->
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="residentdetails" tabindex="-1" aria-labelledby="residentDetailsModalLabel" aria-hidden="true">
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
            <div class="col-lg-4">  <p><strong id="civildisplay"></strong></p></div>
            <div class="col-lg-4">  <p><strong id="citizendisplay">Citizenship:</strong> </p></div>
            <div class="col-lg-6">  <p><strong id="personaldisplaymember">Personal Status:</strong></p></div>
                </div>    
            </div>
           
        </div>
        <br>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>





@endsection
