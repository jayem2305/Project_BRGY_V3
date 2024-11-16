@extends('layouts.statistics')

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
                        <a class="nav-link active" aria-current="page" href="../Admin">
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
                    <h1 class="p-1 fw-bolder">Admin Dashboard</h1>
                </div>
                    <div class="col-lg-6">
                        <div class="row gx-2 gy-2">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-muted mb-1">Total Number of Residents</p>
                                            <h3 id="residences_num">0</h3> <!-- Number of residents -->
                                        </div>
                                        <div class="icon-circle d-flex justify-content-center align-items-center" style="background-color: #3B7DDD; width: 50px; height: 50px; border-radius: 50%;">
                                            <i class="fas fa-users text-white" style="font-size: 24px;"></i> <!-- Font Awesome people icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-muted mb-1">Total Number of Residents <span class="text-primary fw-bolder">(Males)</span></p>
                                            <h3 id="male_num">0</h3> <!-- Number of residents -->
                                        </div>
                                        <div class="icon-circle d-flex justify-content-center align-items-center" style="background-color: #3B7DDD; width: 50px; height: 50px; border-radius: 50%;">
                                            <i class="fas fa-male text-white" style="font-size: 24px;"></i> <!-- Font Awesome people icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-muted mb-1">Total Number of Residents <span class="text-primary fw-bolder">(Females)</span></p>
                                            <h3 id="female_num">0</h3> <!-- Number of residents -->
                                        </div>
                                        <div class="icon-circle d-flex justify-content-center align-items-center" style="background-color: #3B7DDD; width: 50px; height: 50px; border-radius: 50%;">
                                            <i class="fas fa-female text-white" style="font-size: 24px;"></i> <!-- Font Awesome people icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-muted mb-1">Total Number of Residents <span class="text-primary fw-bolder">(Seniors)</span></p>
                                            <h3 id="senior_num">0</h3> <!-- Number of residents -->
                                        </div>
                                        <div class="icon-circle d-flex justify-content-center align-items-center" style="background-color: #3B7DDD; width: 50px; height: 50px; border-radius: 50%;">
                                            <i class="fas fa-user-alt text-white" style="font-size: 24px;"></i> <!-- Font Awesome people icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-muted mb-1">Total Number of Residents <span class="text-primary fw-bolder">(Minors)</span></p>
                                            <h3 id="minor_num">0</h3> <!-- Number of residents -->
                                        </div>
                                        <div class="icon-circle d-flex justify-content-center align-items-center" style="background-color: #3B7DDD; width: 50px; height: 50px; border-radius: 50%;">
                                            <i class="fas fa-child text-white" style="font-size: 24px;"></i> <!-- Font Awesome people icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Resident Population Chart
                        </div>
                        <div class="card-body">
                            <canvas id="myLineChart" height="175"></canvas> <!-- Graph container -->
                        </div>
                    </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Certificates Issued Chart
                        </div>
                        <div class="card-body">
                            <canvas id="myBarChart"height="220"></canvas> <!-- Graph container -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="card">
                <div class="card-header">
                        Numerical Report of Requested Certificates
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                            <select class="form-select" aria-label="Large select example" id="yearSelect" name="selectedYear">
                                <option selected>Select a Year</option>
                            </select>
                                    <button id="exportButtontable" class="btn btn-success"><i class="bi bi-printer-fill" ></i> PRINT REPORT</button>
                            </div> 
                        </div>
                        <br>
                            <div class="row">
                                <table class="table table-striped table-hover" id="tablemonths">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>1st Week</th>
                                            <th>2nd Week</th>
                                            <th>3rd Week</th>
                                            <th>4th Week</th>
                                            <th class="text-bg-primary">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h2>List of Residences</h2>
                                </div>
                                <div class="col-lg-6 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button id="exportButton" class="btn btn-success" ><i class="bi bi-printer-fill" width="32" height="32"></i> PRINT REPORT</button>
                                </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-lg" id="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Min. Age</label>
                                <div class="input-group mb-3">
                                <input type="number" class="form-control form-control-lg" id="minage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" min="0" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Max. Age</label>
                                <div class="input-group mb-3">
                                <input type="number" class="form-control form-control-lg" id="maxage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" min="0" >
                            </div>
                        </div>
                        <!--<div class="col-lg-2">
                        <label for="formGroupExampleInput" class="form-label">Address</label>
                            <div class="input-group mb-3">
                            <input type="hidden" class="form-control form-control-lg" id="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>-->
                    <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Voters</label>
                        <div class="input-group mb-3">
                            <select class="form-select form-select-lg mb-3" id="voters" aria-label="Large select example">
                                <option disabled>----</option>
                                <option value="All">All</option>
                                <option value="Voters">Voters</option>
                                <option value="Non-Voters">Non-Voters</option>      
                            </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">Sex</label>
                    <div class="input-group mb-3">
                    <select class="form-select form-select-lg mb-3" id="sex" aria-label="Large select example">
                                <option disabled>----</option>
                                <option value="All">All</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>      
                        </select>
                            </div>
                        </div>
                                <table class="table" id="tableResident">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Voters/Non-Voters</th>
                                            <th scope="col">HouseHold</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Population Categories
                        </div>
                        <div class="card-body">
                            <canvas id="myPieChart"></canvas> <!-- Pie chart container -->
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>
        @endsection