@extends('layouts.content')
@section('title', 'Barangay 781 Zone 85')

@section('contentmanager')

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
                        <a class="nav-link active" href="../admin/event">
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
                        <a class="nav-link " href="../Admin/addresident">
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
                <div class="col-lg-12">
                    <h1 class="p-1 fw-bolder">Create Barangay Event</h1>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="showmessageevent">
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                    <div>
                                    Fill up the form
                                </div>
                            </div>
                        </div>
                        <div class="row overflow-auto" style="max-height:20rem; ">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="titleevent" placeholder="Place your Title here" name="titleevent">
                                <label for="title">Write your Title Here...</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="startdateeven" name="startdateeven" >
                                <label for="startdateeven">Start date</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="enddateeven" name="enddateeven" >
                                <label for="enddateeven">End date</label>
                            </div>
                        </div>
                <div class="col-lg-12">
                    <br>
                    <div class="mb-3">
                        <label for="editor_events">Content of an Events <span class="text-danger">*</span></label>
                        <div id="editor_events" class="form-control" name="content"></div>
                    </div>
                </div>
            </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary event-btn">Submit</button>
                        </div>
                    </div>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="display-12 mb-5 text-primary"><i>Barangay Events</i></h1>
                        <table class="table table-hover" id="myevents">
                                <thead>
                                    <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col">Published Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableevents">
                            </tbody>
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
        </main>
<!-- Update modal event-->
<div class="modal fade " id="updateforevents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="upateLabel">Update Barangay Events</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="showmessageevent">
                   <div class="alert alert-primary d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                      <div>
                       Fill up the form
                   </div>
               </div>
           </div>
        <div class="row overflow-auto" style="max-height:20rem; ">
            <div class="col-lg-12">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="updatetitleevent" placeholder="Place your Title here" name="titleevent">
                  <label for="title">Write your Title Here...</label>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <input type="date" class="form-control" id="updatestartdateeven" name="startdateeven" >
                    <label for="startdateeven">Start date</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <input type="date" class="form-control" id="updateenddateeven" name="enddateeven" >
                    <label for="enddateeven">End date</label>
                </div>
            </div>
            <div class="col-lg-12">
                <br>
                <div class="mb-3">
                    <label for="updateeditor_events">Content of an Events <span class="text-danger">*</span></label>
                    <div id="updateeditor_events" class="form-control" name="content"></div>  
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success update-event-btn">Update</button>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
        @endsection