<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","781 Zone 85")</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../pic/brgy_logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <linkhref="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

     <!-- Libraries Stylesheet -->
     <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
   <style type="text/css">
#hero {
 background-repeat: no-repeat;
 animation: carousel 100s linear infinite;
}
@keyframes carousel {
 0%, 100% {
   background-position: 0 0;
}
25% {
   background-position: 100% 0;
}
50% {
   background-position: 200% 0;
}
75% {
   background-position: 300% 0;
}
}
.toast-container {
        z-index: 9999;

    }
    .circle-number-color {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        background-color: #1C2035; /* Dark background color */
        color: #fff; /* Text color */
        margin-right: 10px; /* Adjust spacing */
    }

    .circle-number {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #1C2035; /* Set border color */
        color: #1C2035; /* Text color */
        margin-right: 10px; /* Adjust spacing */
    }
    
</style>
<style>
    .valid-secondary::before {
        content: "\f05a"; /* Unicode for the Font Awesome info-circle icon */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #0d6efd; /* Choose your desired color */
         /* Adjust spacing as needed */
    }
</style>
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
</head>
  <body>
   

   @yield("contentresidentlistAdmin")
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script src="../lib/wow/wow.min.js"></script>
                    <script src="../lib/easing/easing.min.js"></script>
                    <script src="../lib/waypoints/waypoints.min.js"></script>
                    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
                    <script src="../lib/lightbox/js/lightbox.min.js"></script>
                    <!-- Template Javascript -->
                    <script src="../js/main.js"></script>
                    <script>
 $(document).ready(function() {
        $.ajax({
            url:"{{ route('admin.residents') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#residences_num').text(data.totalResidences);
                $('#senior_num').text(data.totalSeniors);
                $('#minor_num').text(data.totalMinors);
                $('#male_num').text(data.totalMales);
                $('#female_num').text(data.totalFemales);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


                        $(document).ready(function () {
                            $(document).ajaxComplete(function () {
                                $('#myTable').DataTable();
                            });
                        });
                        $(document).ready(function () {
                            $(document).ajaxComplete(function () {
                                $('#myOfficials').DataTable();
                            });
                        });


                      
    $(document).ready(function() {
        function showToast(message) {
    // Set the message content
    $('#liveToast .toast-body').text(message);
    // Show the toast
    $('.toastset').toast('show');
}
    var table = $('#myTable').DataTable();
    var ext;
   
    function showModal(residentName) {
        $('#restrictionModal').modal('show');
        $('#residentName').text(residentName);
    }
    // Make AJAX request to fetch resident data
    function updateTableData() {
    $.ajax({
        url: "{{ route('admin.getresident') }}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Clear existing table rows
            table.clear().draw();

            var residents = data.residents;
            var members = data.members;
            var viewBtn;
            // Create a map of reg_number to address for residents
            var addressMap = {};
            $.each(residents, function(index, resident) {
                addressMap[resident.reg_number] = resident.address;
            });

            // Combine residents and members, updating member addresses
            var combinedData = [];
            $.each(members, function(index, member) {
                if (member.address == null || member.address === "") {
                    member.address = addressMap[member.reg_num] || "No Address";
                 
                }
                combinedData.push(member);
            });
            combinedData = combinedData.concat(residents);

            // Populate table body with combined resident and member data
            $.each(combinedData, function(index, resident) {
                if (resident.ext == null) {
                    ext = "";
                } else {
                    ext = resident.ext;
                }
                var regNumber = resident.reg_number || resident.id;
                var restrictBtn = '<button type="button" class="btn btn-danger btn-lg btn-restrict" data-toggle="modal" data-target="#restrictionModal" data-reg='+ regNumber +'><i class="bi bi-lock-fill"></i></button>';
                var viewBtn = '<input type="hidden" value="'+ regNumber +'" id="viewbtnid"><button type="button" class="btn btn-warning btn-lg btn-view" data-viewset="'+ regNumber +'"><i class="bi bi-eye-fill"></i></button>' + restrictBtn;

                // Check if status is "Restricted", if yes, render different buttons
                if (resident.Status === 'Restricted' || resident.status === 'Restricted' ) {
                    viewBtn = '<input type="hidden" value="'+ regNumber +'" id="unrestricted"><button type="button" class="btn btn-warning btn-lg btn-unrestrict"><span id="unrestrictbtn"><i class="bi bi-unlock-fill"></i></span><div class="spinner-border" style="display: none;" role="status"><span class="visually-hidden">Loading...</span></div></button>';
                }
                var imageUrl = resident.image_filename ? "../residentprofile/" + resident.image_filename : "../residentprofile/" + resident.profile2x2;
        
        console.log(imageUrl);
                table.row.add([
                    "<img src=" + imageUrl + " class='rounded-circle mx-auto d-block' alt='...' width=50 height=50>",
                    resident.lname + ", " + resident.fname + " " + resident.mname + " " + ext,
                    resident.household,
                    resident.address,
                    resident.gender,
                    viewBtn
                ]).draw();
            });

            // Add click event listener to the "Restrict" button
            $('#myTable tbody').on('click', '.btn-restrict', function() {
                var rowData = table.row($(this).parents('tr')).data();
                var residentName = rowData[0]; // Get resident name from the clicked row
                var regNumber = $(this).data('reg');
                $('#regid').val(regNumber);
                showModal(residentName);
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

$('#myTable tbody').on('click', '.btn-unrestrict', function() {
    var regNumbers = $('#unrestricted').val();
    $(this).find('#unrestrictbtn').hide();
    $(this).find('.spinner-border').show();
     // Assuming registration number is in the second column

    // Perform AJAX request to update the status
    $.ajax({
        url: '{{ route("admin.updatestatus") }}',
        type: 'POST',
        data: {
            regNumbers: regNumbers,
            status: 'Unrestricted'
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Handle success response
            console.log("Status updated successfully:", response);
            $('#restrictionModal').modal('hide');
            $('#restrict').find('#spinner').hide();
            // Refresh table data
            updateTableData();
            showToast('Account Unrestrict successfully');
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
});
    //fetchResidentData();
    // Handle click event for the "Restrict" button in the modal
$('#btnRestrict').click(function() {
    var reason = $('#restrictionReason').val();
    var regNumber  = $('#regid').val(); // Assuming you have a hidden input for registration number
    // Perform AJAX request to send data to Laravel route
    $(this).find('#restrict').hide();
    $(this).find('.spinner-border').show();
    $.ajax({
        url: '{{ route("save.restriction") }}',
        type: 'POST',
        data: {
            name: "Barangay 781 Zone 85",
            regNumber: regNumber,
            reason: reason
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Handle success response
            console.log("Data saved successfully:", response);
            // Close the modal
            $('#restrict').show();
            $('.spinner-border').hide();
            $('#restrictionModal').modal('hide');
            $('#residentDetailsModal').modal('hide');
            updateTableData();
            showToast('Account Restricted successfully');
            //showSuccessToast('Account Restricted successfully');

        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error saving data:", error);
            // Close the modal
            $('#restrict').show();
            $('.spinner-border').hide();
            showToast('I Advised to state your reason why is it Restricted');


        }
    });
});
// Add click event listener to the "View" button
$('#myTable tbody').on('click', '.btn-view', function() {
    // var rowData = table.row($(this).parents('tr')).data(); // Assuming resident data is in the first column
    var regNumber = $(this).data('viewset'); // Get regNumber from data-viewset attribute of the clicked button

    $.ajax({
        url: '{{ route("admin.getResidentsview") }}',
        type: 'POST',
        data: {
            regNumber: regNumber
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(resident) {
            // Populate modal with resident details
            //console.log(resident);
            if (resident.household == "Head of The Family" && typeof regNumber === 'string' && regNumber.startsWith('REG_')) {
                populateModal(resident);
                $('#residentDetailsModal').modal('show');
            }else {
                populateModalmember(resident);
                $('#residentdetails').modal('show');
            }
            // Show the modal
            console.log("Resident Object:",regNumber);
            
        },
        error: function(xhr, status, error) {
            console.error("Error fetching resident details:", error);
        }
    });
});



// Function to populate modal with resident details
function populateModal(resident) {
    var regNumber = $('#viewbtnid').val();
    console.log("Resident Object:", resident.reg_number);
    var ext;

    if (resident.ext == null) {
        ext = "";
    } else {
        ext = resident.ext + ".";
    }
    if (resident.proof_of_owner == null) {
        proof_of_owner = "empty.png";
    } else {
        proof_of_owner = resident.proof_of_owner;
    }
    if (resident.voters_filename == null) {
        voters_filename = "empty.png";
    } else {
        voters_filename = resident.voters_filename;
    }
    var personalStatus = checkNullValues(resident.indicate_if);
    
    // Update the display in the modal
    $('#personaldisplay').text("Personal Status: " + personalStatus);

    // Populate modal content with resident details
    $('#residentDetailsModal .modal-body').html(`
        <div class="row">
            <div class="col-lg-4">
            <img src="../residentprofile/${resident.image_filename}"class="rounded-circle mx-auto d-block" alt="Profile pic" width="200" height="200" >
            <br>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 text-start"><p><strong>Contoll #:</strong> ${resident.reg_number}</p></div>
                    <div class="col-lg-6 text-end"><p><strong>Status:</strong> ${resident.status}</p></div>
                    <h1 class="text-center"> ${resident.lname}, ${resident.fname} ${resident.mname} ${ext}</h1>
                    <h3 class="text-center text-primary text-decoration-underline"> ${resident.email}</h3>
                    <h3 class="text-center"><strong> ${resident.household}</strong></h3>
                </div>    
            </div>
            <div class="col-lg-3">  <p><strong>Birthday:</strong> ${resident.birthday}</p> </div>
            <div class="col-lg-3">  <p><strong>Age:</strong> ${resident.age} Years old</p> </div>
            <div class="col-lg-3">  <p><strong>Birt Place:</strong> ${resident.Birth}</p></div>
            <div class="col-lg-3">  <p><strong>Gender:</strong> ${resident.gender}</p></div>
            <div class="col-lg-4">  <p><strong>Occupation:</strong> ${resident.occupation}</p></div>
            <div class="col-lg-4">  <p><strong>Civil Status:</strong> ${resident.civil}</p></div>
            <div class="col-lg-4">  <p><strong>Citizenship:</strong> ${resident.citizenship}</p></div>
            <div class="col-lg-4">  <p><strong>Contact Number:</strong>0${resident.cnum}</p></div>
            <div class="col-lg-4">  <p><strong>Uri ng Pag-Pagmamayari:</strong> ${resident.owner_type}</p></div>
            <div class="col-lg-4">  <p><strong>Pangalan ng May-Ari:</strong> ${resident.owner_name}</p></div>
            <div class="col-lg-6">  <p id="personaldisplay"><strong >Personal Status:</strong> ${personalStatus}</p></div>
            <div class="col-lg-6">  <p><strong>Number of Members of Family:</strong> ${resident.number_of_family}</p></div>
            <hr><div class="col-lg-12">  <p><strong>Valid ID:<br></strong>
            <img src="../residentprofile/${resident.valid_id_filename}"class="rounded mx-auto d-block" alt="Profile pic" width="700" height="300" ></p>
            </div>
            <div class="col-lg-6">  <p><strong>Proof of Owner:</strong> <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                            If applicable
                            </div><img src="../residentprofile/${proof_of_owner}"class="rounded float-start mx-auto d-block" alt="Profile pic" width="300" height="300" ></p>
            </div>
        <div class="col-lg-6">  <p><strong>Voters Certificate:</strong> <div class="valid-secondary text-primary" style="margin-top: -1rem;">
                            If applicable
                            </div><img src="../residentprofile/${voters_filename}"class="rounded float-start mx-auto d-block" alt="Profile pic" width="300" height="300" ></p>
            </div>
        </div>
        <br>
        `);

}
function populateModalmember(member) {
    if (member.ext == null) {
        ext = "";
    } else {
        ext = member.ext + ".";
    }
    var personalStatus = checkNullValues(member.indicate_if);
console.log(member.Status);
    // Populate modal content with member details
    $('#profilePic').attr('src', '../uploads/' + member.profile2x2);
    $('#controll').text("REG_MEMBER_"+member.id);
    $('#statusacc').text(member.Status);
    $('#nameidsplay').text(member.lname + ', ' + member.fname + ' ' + member.mname + ' '+ ext);
    $('#birthdaydsiplay').text('Birthday: ' + member.birthday);
    $('#statusdisplay').text(member.household);
    $('#agedisplay').text('Age: ' + member.age + ' years old');
    $('#birthdisplay').text('Birth Place: ' + member.birthplace);
    $('#genderdisplay').text('Gender: ' + member.gender);
    $('#occupationdisplay').text('Occupation: ' + member.occupation);
    $('#civildisplay').text('Civil Status: ' + member.civil_status);
    $('#citizendisplay').text('Citizenship: ' + member.citizenship);
    $('#personaldisplaymember').text('Personal Status: ' + personalStatus);
    
    // Show the modal
   // $('#residentDetailsModal').modal('show');
}

function checkNullValues(dataString) {
    if (!dataString || dataString === 'null') return ''; // If the string is null or 'null', return an empty string
    var values = dataString.split(','); // Split the string by comma
    // Filter out 'null' values
    values = values.filter(function(item) {
        return item.trim() !== 'null';
    });
    // Join the filtered values back into a string
    return values.join(', ');
}

updateTableData();
});

$(document).ready(function() {
    $('.btn-confirm-primary').click(function() {
        var name = $('#name').val();
        var position = $('#position').val();
        var profile = $('#profile')[0].files[0];
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('name', name);
        formData.append('position', position);
        formData.append('profile', profile);

        $.ajax({
            url: "{{ route('official.add') }}", // Update this to match your route URL
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success response
                console.log('Data added successfully');
                // Clear any previous error messages
                $('#liveToast').removeClass('text-bg-danger').addClass('text-bg-success');
                $('#liveToast strong').removeClass('text-danger').addClass('text-success').html('<i class="bi bi-check-circle"></i> Valid Official');
                $('.toast-body').text("Data added successfully");
                    var toast = new bootstrap.Toast($('#liveToast'));
                    toast.show();
                    fetchAndPopulateOfficials();
            },
            error: function(xhr, status, error) {
                console.error('An error occurred:', error);
                // Display error message to the user
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        var errorElement = $('#error-' + key);
                        errorElement.text(value[0]).show(); // Display error message
                    });
                } else {
                    // If condition is not followed, display toast message
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An error occurred while processing the request';
                    $('.toast-body').text(errorMessage);
                    $('#liveToast').removeClass('text-bg-success').addClass('text-bg-danger');
                    $('#liveToast strong').removeClass('text-success').addClass('text-danger').html('<i class="bi bi-check-circle"></i> Invalid Official');
                    var toast = new bootstrap.Toast($('#liveToast'));
                    toast.show();
                }
            }
        });
    });
    // Function to fetch officials and populate the table
    function fetchAndPopulateOfficials() {
    $.ajax({
        url: "{{ route('officials.index') }}", // Update with your route to fetch officials
        type: 'GET',
        success: function(response) {
            // Clear existing rows
            $('#myOfficials').DataTable().clear().draw();

            // Append rows for each official
            response.forEach(function(official) {
                var createdAtString = official.created_at;
                var createdAtDate = new Date(createdAtString);

                // Format the date and time
                var formattedDate = formatDate(createdAtDate);

                // Function to format date
                function formatDate(date) {
                    var options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: 'numeric',
                        second: 'numeric',
                        hour12: true // Use 12-hour clock
                    };
                    return date.toLocaleDateString('en-US', options);
                }

                // Set the button text and class based on the official's status
                var viewBtn;
                if (official.status === 'Archive') {
                    viewBtn = '<button class="btn btn-lg btn-warning restore-official" data-id="' + official.id + '">Restore</button>';
                } else {
                    viewBtn = ' <button class="btn btn-lg btn-success edit-official" data-id="' + official.id + '">Update</button>'+
                    '   <button class="btn btn-lg btn-danger delete-official" data-id="' + official.id + '">Archive</button>';
                }

                // Construct the new row data
                var rowData = [
                    '<img src="../residentprofile/' + official.profile_path + '" alt="' + official.profile_path + '" width="50" class="rounded-circle mx-auto d-block">',
                    official.name,
                    official.position,
                    formattedDate,
                    viewBtn
                ];

                // Add the new row to the DataTable instance
                $('#myOfficials').DataTable().row.add(rowData).draw();
            });
        },
        error: function(xhr, status, error) {
            console.error('An error occurred while fetching officials:', error);
        }
    });
}



// Call fetchAndPopulateOfficials initially to populate the list
fetchAndPopulateOfficials();

// Add click event listener to the "Archive" button
$(document).on('click', '.restore-official', function() {
    var officialId = $(this).data('id');
    var button = $(this);
        // Perform AJAX request to update the status to "Archive"
        $.ajax({
            url: "{{ route('official.updateStatus') }}", // Update the URL with your route
            type: 'POST',
            data: {
                id: officialId,
                status: 'active'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response
                fetchAndPopulateOfficials();
                console.log("Official Member Restore successfully!");
                showSuccessToast('Resotred successfully.');

                //alert("Official Member Archived successfully!");
                // You may need to reload the page or update the UI accordingly
                //fetchAndPopulateOfficials();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error("Error Restoring official:", error);
                alert("Error Restoring official. Please try again later.");
            }
        });
    
});
$(document).on('click', '.delete-official', function() {
    var officialId = $(this).data('id');
    var button = $(this);
    // Confirm if user wants to archive the official
    if (confirm("Are you sure you want to archive this official?")) {
        // Perform AJAX request to update the status to "Archive"
        $.ajax({
            url: "{{ route('official.updateStatus') }}", // Update the URL with your route
            type: 'POST',
            data: {
                id: officialId,
                status: 'Archive'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response
                console.log("Official Member Archived successfully!");
                // You may need to reload the page or update the UI accordingly
                fetchAndPopulateOfficials(response);
            showErrorToast('Official Member Archived successfully!');

            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error("Error archiving official:", error);
                alert("Error archiving official. Please try again later.");
            }
        });
    }
    
});
$(document).on('click', '.archive-all-officials', function() {
    if (confirm("Are you sure you want to archive All the officials?")) {
    $.ajax({
        url: "{{ route('officials.archiveAll') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Success message or any other action after archiving all officials
            console.log('All official members archived successfully');
            // Update the officials list after archiving all officials
            fetchAndPopulateOfficials();
            showErrorToast('All Officials Are Archived');

        },
        error: function(xhr, status, error) {
            console.error('An error occurred while archiving all officials:', error);
            // Handle error scenario
        }
    });
}
});



$(document).ready(function() {
    $(document).on('click', '.edit-official', function(){
    var officialId = $(this).data('id');

    // Fetch data using AJAX
    $.ajax({
      url: '/officials/' + officialId + '/edit',
      method: 'GET',
      
      success: function(data) {
        // Populate the form fields with the existing data
        $('#updatename').val(data.name);
        $('#updateposition').val(data.position);
        // Show the modal
        $('#updateofficials').modal('show');
        $('.btn-confirm-update').data('id', officialId);
      }
    });
  });

  // Handle form submission
  $('.btn-confirm-update').on('click', function(e) {
    e.preventDefault();
    var officialId = $(this).data('id');
    var formData = new FormData();
    formData.append('name', $('#updatename').val());
    formData.append('position', $('#updateposition').val());
    if ($('#updateprofile')[0].files.length > 0) {
      formData.append('profile', $('#updateprofile')[0].files[0]);
    }
    $.ajax({
      url: '/officials/' + officialId,
      method: 'POST',
      data: formData,
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      processData: false,
      contentType: false,
      success: function(response) {
        // Handle success (e.g., close modal, show a success message)
        $('#updateofficials').modal('hide');
        showSuccessToast('Official updated successfully.');
        // Call fetchAndPopulateOfficials initially to populate the list
fetchAndPopulateOfficials();

        //location.reload(); // Refresh the page or update the UI accordingly
      },
      error: function(xhr) {
        console.log(xhr.responseText);
        if (xhr.responseJSON && xhr.responseJSON.errors) {
          var errorMessages = parseErrorMessages(xhr.responseJSON.errors);
          showErrorToast(errorMessages);
        } else {
          showErrorToast('An error occurred while updating the official.');
        }
      }
    });
  });

function showSuccessToast(message) {
    var toastElement = $('#liveToastupdate');
    toastElement.removeClass('text-bg-danger').addClass('text-bg-success');
    $('#toastTitle').removeClass('text-danger').addClass('text-success').text('Success');
    $('.toast-body').text(message);
    var successToast = new bootstrap.Toast(toastElement);
    successToast.show();
  }

  function showErrorToast(message) {
    var toastElement = $('#liveToastupdate');
    toastElement.removeClass('text-bg-success').addClass('text-bg-danger');
    $('#toastTitle').removeClass('text-success').addClass('text-danger').text('Error');
    $('.toast-body').text(message);
    var errorToast = new bootstrap.Toast(toastElement);
    errorToast.show();
  }
  function parseErrorMessages(errors) {
    var messages = '';
    for (var key in errors) {
      if (errors.hasOwnProperty(key)) {
        messages += errors[key].join('<br>');
      }
    }
    return messages;
  }
});
});
</script>