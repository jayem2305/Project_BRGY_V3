@extends('layouts.admincertificate')
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
                        <a class="nav-link distinct_cert" id="ftj" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">First Time Job Seeker</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert active" id="indigency" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">Barangay Indigency</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="certificate" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">Barangay Certificate</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="permits" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">Business Permit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="cessation" href="../Admin/certificate">
                            <i class="fas fa-certificate"></i> <span class="link-text">Cessation of Business</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link distinct_cert" id="soloparent" href="../Admin/certificate">
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
                    <div class="d-flex align-items-center">
                        <img src="../pic/logo_TP.png" alt="Logo" class="me-3" style="width: 60px; height: 60px;"> <!-- Adjust the path and size as needed -->
                        <h3 class="d-inline fw-bolder text-secondary">Barangay 781 Zone 85</h3>
                    </div>
                    <button class="btn btn-danger">Logout</button> <!-- Adjust button styles as needed -->
                </div>
                <hr>
                <div class="row gx-2 gy-2 contentadmin">
                    <div class="col-lg-12">
                        <h1 class="p-3 fw-bolder">Barangay Indigency Request</h1>
                    </div>
                    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-clock fa-3x text-warning"></i> <span class="fa-2x align-top">For Approval <span class="float-end">0</span></span> 
                    
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-times-circle fa-3x text-danger"></i> <span class="fa-2x align-top">Unclaimed <span class="float-end">0</span></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-check-circle fa-3x text-success"></i> <span class="fa-2x align-top">Claimed<span class="float-end">0</span></span>
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
                        <button class="btn btn-success me-2"> <!-- Added margin to the end -->
                            <i class="fas fa-check-circle"></i> Approve All
                        </button>
                        <button class="btn btn-danger">
                            <i class="fas fa-times-circle"></i> Decline All
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
                        <tbody>
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
                        <button class="btn btn-primary">
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



@endsection
