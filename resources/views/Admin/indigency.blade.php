@extends('layouts.indigencyAdmin')
@section('title', 'Barangay 781 Zone 85')

@section('certificate')
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
                        <a class="nav-link distinct_cert active" id="indigency" href="../Admin/indigency">
                            <i class="fas fa-certificate"></i> <span class="link-text">Barangay Indigency</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="certificate" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">Barangay Certificate</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="permits" href="../Admin/permit">
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
                        <a class="nav-link " href="../Admin/forum">
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
                        <h1 class="p-3 fw-bolder">Barangay Indigency Request</h1>
                    </div>
                    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-clock fa-3x text-warning"></i> <span class="fa-2x align-top">For Approval <span class="float-end" id="indigency_pending">0</span></span> 
                    
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-times-circle fa-3x text-danger"></i> <span class="fa-2x align-top">Unclaimed <span class="float-end"  id="indigency_unclaimed">0</span></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-check-circle fa-3x text-success"></i> <span class="fa-2x align-top">Claimed<span class="float-end" id="indigency_claimed">0</span></span>
               <!-- Example number -->
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" >
                <div class="row">
                    <div class="col-lg-6">
                        <h3>For Approval of Certificate Requests</h3>
                    </div>
                    <div class="col-lg-6 text-end"> <!-- Added text-end for right alignment -->
                        <button class="btn btn-success me-2 shadow-lg rounded-pill green" data-bs-toggle="modal" data-bs-target="#approveAllModal" style="font-size: 1.1rem; padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #28a745, #218838); transition: transform 0.2s ease;">
                            <i class="fas fa-check-circle me-2"></i> Approve All
                        </button>
                        <button type="button" class="btn btn-primary shadow-lg rounded-pill blue" style="font-size: 1.1rem; padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #0d6efd, #0d6efd); transition: transform 0.2s ease;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Request Indigency
                        </button>
                    </div>
                </div>
                <table class="table" id="ApprovalTable">
                        <thead>
                            <tr>
                                <th scope="col">Controll #</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Address</th>
                                <th scope="col">Certificate</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ApprovalTableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" >
                <div class="row">
                    <div class="col-lg-6">
                        <h3>In process Certificate Requests</h3>
                    </div>
                    <div class="col-lg-6 text-end"> <!-- Added text-end for right alignment -->
                        <button type="button" class="btn btn-primary shadow-lg rounded-pill blue" data-bs-toggle="modal" data-bs-target="#printall" style="font-size: 1.1rem; padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #0d6efd, #0d6efd); transition: transform 0.2s ease;">
                            <i class="fas fa-print"></i> Print All
                        </button>
                    </div>
                </div>
                <table class="table" id="ClaimTable">
                    <thead>
                        <tr>
                            <th scope="col">Controll #</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Address</th>
                            <th scope="col">Certificate</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                </div>
        </main>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="approveAllModal" tabindex="-1" aria-labelledby="approveAllModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn">
        <div class="modal-content shadow-lg border-0 rounded-3" style="overflow: hidden;">
            <div class="modal-header bg-success text-white py-3">
                <h5 class="modal-title d-flex align-items-center" id="approveAllModalLabel">
                    <i class="fas fa-exclamation-circle me-2"></i> Confirm Approval
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-question-circle fa-3x text-warning mb-3"></i>
                <p class="fs-5">Are you sure you want to approve all <strong>Indigency Certificate Requests</strong>?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i> Cancel
                </button>
                <button id="confirmApprove" class="btn btn-success">
                    <span id="spinners" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                    Approve All
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="printall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kagawad Signatory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="formGroupExampleInput" class="form-label">Select a name of Kagawad: <span class="text-danger">*</span></label>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="official_display_solos" id="official_display_solos">
           
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary printall">Convert to PDF</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">View Requested Document</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-4">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="voters" id="voters"  readonly>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="names_display" id="names_display"  readonly>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="copy" readonly>
            </div>
            <div class="col-lg-9">
            <label for="formGroupExampleInput" class="form-label">Purpose of Barangay Certificate <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="purpose" id="purpose" readonly>
            </div>
            <div class="col-lg-12" id="childdisplay_view">
            <label for="formGroupExampleInput" class="form-label text-primary">Name of Child/Children:<span class="text-danger">*</span></label>
                <div class="row gx-2" id="childdisplay">
                    
                   
                </div>
            </div>
        </div>
            <div class="col-lg-12">
                <br>
                <label for="formGroupExampleInput" class="form-label">Uploaded PDF Requirements <span class="text-danger">*</span></label>
                <div id="pdfViewer">
                    <!-- PDF will be displayed here -->
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="modalBpermit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">View Requested Document</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
        <div class="row gy-3">
        <div class="col-lg-4">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="voters" id="voters_permit"  readonly>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="names_display" id="names_display_permit"  readonly>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="copy_permit" readonly>
            </div>
            <div class="col-lg-9">
            <label for="formGroupExampleInput" class="form-label">Business Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Business Name" name="bname" id="bname" readonly>
            </div>
            <div class="col-lg-12" id="ceo_display">
            <label for="formGroupExampleInput" class="form-label">CEO Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" name="ceo" id="ceo" readonly>
            </div>
            <div class="col-lg-12">
            <label for="formGroupExampleInput" class="form-label">Business Address: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Business Address" name="baddress" id="baddress" readonly>
            </div>
            <div class="col-12">
            <label for="formGroupExampleInput" class="form-label">Purpose <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="purpose" id="purpose_permit" readonly>
            </div>
            <div class="col-lg-12">
                <br>
                <label for="formGroupExampleInput" class="form-label">Uploaded PDF Requirements <span class="text-danger">*</span></label>
                <div id="pdfViewer_permit">
                    <!-- PDF will be displayed here -->
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModalftjcert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">View Requested Document</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
        <div class="row gy-3">
            <div class="col-lg-4">
            <input type="hidden" class="form-control" value="First-Time Job Seeker" name="cbpermit" id="cbpermit">
            <label for="formGroupExampleInput" class="form-label">Are you a voters of Manila ? <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-lg" name="voters" id="voters_ftj" readonly>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-lg" name="names_display" id="names_display_ftj" readonly>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg" id="copy_ftj" max="5" min="1" value="1" readonly>
            </div>
            <div class="col-lg-9">
            <label for="formGroupExampleInput" class="form-label">Type of First-Time Job Seeker<span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-lg" name="ftjtypes" id="ftjtypes" readonly>
            </div>
            <div class="col-lg-12">
                <label for="formGroupExampleInput" class="form-label">Uploaded PDF Requirements</label>
                <div id="requirements_ftj" ></div>
            </div>
            <div class="col-lg-12" style="display: none;" id="minordisplay">
                <div class="row">
                    <hr>
                    <h4>Guardian Information</h4>
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Guardian Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Guardian's Name" name="pname" id="pname" readonly>
                    </div>
                    <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">Guardians age: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-lg" placeholder="Guardian Age" name="page" id="page" min="18"readonly>
                    </div>
                    <div class="col-lg-12">
                    <label for="formGroupExampleInput" class="form-label">Guardians Current Address: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Guardian Current Address" name="paddress" id="paddress" readonly >
                    </div>
                    <div class="col-lg-12">
                    <label for="formGroupExampleInput" class="form-label">Approval of Guardian With Valid ID <span class="text-danger">*</span> </label>
                    <div id="requirements_parents_ftj"></div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="kagawadsignatory" data-bs-backdrop="static" tabindex="-1" aria-labModalLabel" aria-hidden="true">elledby="example
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kagawad Signatory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="formGroupExampleInput" class="form-label">Select a name of Kagawad: <span class="text-danger">*</span></label>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="official_display_solo" id="official_display_solo">
           
        </select>
        <input type="hidden" class="form-control form-control-lg" id="setid">
        <input type="hidden" class="form-control form-control-lg" id="typeofcert">
        <input type="hidden" class="form-control form-control-lg" id="emaiapprove">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary pdfconvert">Convert to PDF</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Generated PDF</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe id="pdfFrame" src="" style="width: 100%; height: 500px;" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModalLabel">Decline Reason</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 id="userName">To Mr./Ms. : <span id="user-name"></span></h3>
        <label for="declineReason">Why is it Declined?</label>
        <input type="hidden" class="form-control form-control-lg" id="setid_decline">
        <input type="hidden" class="form-control form-control-lg" id="typeofcert_decline">
        <input type="hidden" class="form-control form-control-lg" id="emaildecline">
        <input type="hidden" class="form-control form-control-lg" id="controlnum">
        <textarea class="form-control" id="declineReason" rows="3" required></textarea>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger decline_requests" id="submitDeclineReason"><span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>
        <i>Decline</i></button>
      </div>
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-success">
      <strong class="toast-header me-auto">Document Status</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-bg-success">
      Document Declined Successfully
    </div>
  </div>
</div>
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
                <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="voters" id="voters-indigency">
                    <option selected disabled>-----</option>
                    <option value="Non-Voters">Non-Voters</option>
                    <option value="Voters">Voters</option>
                </select>
            </div>
            <div class="col-lg-8">
                <label for="formGroupExampleInput" class="form-label">Name of Requester <span class="text-danger">*</span></label>
                <input class="form-control form-control-lg mb-3" aria-label="Large select example" name="names_display" id="names_display-indigency" placeholder="Enter the name of Requester" >
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="formGroupExampleInput" class="form-label">Complete Address<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="address-indigency" placeholder="Complete Address" name="address" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="formGroupExampleInput" class="form-label">Age<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control form-control-lg" id="age-indigency" placeholder="Age" name="age" min="15" >
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
                                <input type="tel" class="form-control form-control-lg" id="cnum-indigency" placeholder="xx-xxx-xxxx" name="cnum"pattern="[0-9]{2}-[0-9]{3}-[0-9]{4}" maxlength="11" >
                            </div>
                            </div>
                        </div>
                    </div>
            <div class="col-lg-12">
                <label for="formGroupExampleInput" class="form-label">Email<span class="text-danger">*</span></label>
                <input class="form-control form-control-lg mb-3" aria-label="Large select example" name="email_display" id="email_display" required >
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">Number of copies <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="copy-indigency" max="5" min="1" value="1">
            </div>
                <input type="hidden" class="form-control" id="requirements-indigency"value="Approved.pdf">
                <div class="col-lg-9">
                    <label for="purpose" class="form-label">Purpose of Barangay Indigency <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg mb-3" name="purposes" id="purposes">
                        <option selected disabled>-----</option>
                        <option value="Financial Assistance">Financial Assistance</option>
                        <option value="School Requirement">School Requirement</option>
                        <option value="Burial Assistance">Burial Assistance</option>
                        <option value="Educational Assistance">Educational Assistance</option>
                        <option value="Medical Assistance">Medical Assistance</option>
                        <option value="Hospital Requirement">Hospital Requirement</option>
                        <option value="Scholarship Application">Scholarship Application</option>
                        <option value="Social Pension for Indigent Senior Citizen Application">Social Pension for Indigent Senior Citizen Application</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-lg-12">
    <span class="text-primary"><i class="bi bi-info-circle"></i> Specify The Purpose if Others is selected</span>
    <input type="text" class="form-control" placeholder="Specify other purpose" name="others" id="otherpurpose" style="display: none;">
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var purposeSelect = document.getElementById("purposes");
    var otherPurposeInput = document.getElementById("otherpurpose");
    
    purposeSelect.addEventListener("change", function() {
        if (this.value === "Others") {
            otherPurposeInput.style.display = "block";  // Show input if "Others" is selected
        } else {
            otherPurposeInput.style.display = "none";   // Hide input if another option is selected
        }
    });
});
</script>
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

@endsection
