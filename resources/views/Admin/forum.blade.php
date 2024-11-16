@extends('layouts.header')

@section('title', 'Barangay 781 Zone 85')

@section('contentAdmin')
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
                        <a class="nav-link active" href="../Admin/forum">
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
                        <h1 class="p-3 fw-bolder">Residents Inquaries</h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="row" id="displayform">
            
                        </div> 
                    </div>
                </div>
        </main>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="autoShowModal" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body" style="background-image: url('../pic/popup.png'); background-size: cover; height: auto; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <button type="button" class="btn-close custom-close-button" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 48rem; margin-bottom: 23rem; z-index: 1;"></button>

                        <!-- Background Image -->
                        <div >
                            <a href="onlineservices" class="btn btn-primary btn-lg" role="button" style="margin-left: -22rem;margin-top: -6rem; z-index: 1; position: absolute;">CLICK HERE TO APPLY</a>
                        </div>
                        <!-- End Background Image -->
                    </div>
                </div>
            </div>
        </div>
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
                    <div class="col-lg-12" style="margin-top: 1rem; margin-bottom:-1rem;">
                        <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="hidden" id="adminname" name="adminname" value="Barangay 781 Zone 85 (Admin)">
                            <img src="../pic/brgy_logo.png" class="rounded-circle me-3" alt="Profile Picture" width="50" height="50">
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


@endsection
