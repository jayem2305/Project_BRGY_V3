<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","781 Zone 85")</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../pic/logo_TP.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
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
    <style>
    .green:hover {
        transform: scale(1.05); /* Slight zoom on hover */
        background: linear-gradient(135deg, #218838, #28a745); /* Color shift on hover */
    }

    .modal-content {
        animation: fadeInUp 0.4s ease;
    }

    .modal-body i {
        animation: pulse 1.5s infinite;
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    .blue:hover {
        transform: scale(1.05); /* Slight zoom on hover */
        background: linear-gradient(135deg, #0a58ca, #0d6efd); /* Color shift on hover */
    }
    .red:hover {
        transform: scale(1.05); /* Slight zoom on hover */
        background: linear-gradient(135deg, #c82333, #dc3545); /* Color shift on hover */
    }
</style>
</head>
  <body>
   

   @yield("certificate")
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
                    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
                    <script type="text/javascript">
    function toggleSpinner(button, show) {
        var spinner = $(button).find('.spinner-border');
        var icon = $(button).find('i');

        if (show) {
            spinner.removeClass('d-none');
            icon.addClass('d-none');
        } else {
            spinner.addClass('d-none');
            icon.removeClass('d-none');
        }
    }
    
    $(document).ready(function() {
        // Select all nav links and handle active state
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(link => link.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Initialize DataTables
        $('#ApprovalTable').DataTable();
        $('#ClaimTable').DataTable();

        // Fetch logo information
        $.ajax({
            url: "{{ route('getInfos') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $('#logo').attr('src', '../barangayprorfile/' + response.logo);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

        // Function to update pending counts
        function updatePendingCount() {
            const endpoints = [
                "{{ route('count.pending.indigency') }}"
               
            ];
            endpoints.forEach((url, index) => {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        $('#indigency_pending').text(response.count);
                        $('#indigency_unclaimed').text(response.Readytoclaimcount);
                        $('#indigency_claimed').text(response.claimcount);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        }

        // Call the function on page load
        updatePendingCount();

        // Toggle spinner function
        function toggleSpinner(button, show) {
            var spinner = $(button).find('.spinner-border');
            var icon = $(button).find('i');
            if (show) {
                spinner.removeClass('d-none');
                icon.addClass('d-none');
            } else {
                spinner.addClass('d-none');
                icon.removeClass('d-none');
            }
        }

        // Load certificate data based on type
        var type = 'indigency'; // Example type
        loadCertificateData(type);

        function loadCertificateData(type) {
            var tableId = '#ApprovalTable';
            var claimtableid = '#ClaimTable';

            $.ajax({
                url: '/Admin/certificate/get-data/' + type,
                type: 'GET',
                success: function(response) {
                    $(tableId).DataTable().clear().draw();
                    $(tableId + ' tbody').empty();

                    if (response.length === 0) {
                        $(tableId + ' tbody').html('<tr><td colspan="8" class="text-center">No data available</td></tr>');
                    } else {
                        $.each(response, function(index, item) {
                            var id = "BI_" + formatDatecontroll(item.created_at) + "_" + item.id;
                            var name = item.name;
                            var date = formatDate(item.created_at);
                            var address = item.resident.address;
                            var purpose = item.purpose == "Others" ? item.otherpurpose : item.purpose;
                            var phone_number = item.resident.cnum;
                            var action ="<div class='btn-group ' role='group' aria-label='Basic example'><button class='btn btn-lg btn-warning view-btn' data-control-number='" + item.id + "'><i class='bi bi-eye-fill'></i></button> " +
            "<button class='btn btn-success btn-lg approve-btn' data-control-number='" + item.id + "'>" +
                "<span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>" +
                "<i class='bi bi-check'></i>" +
            "</button> " +
            "<button class='btn btn-danger btn-lg decline-btn' data-control-number='" + item.id + "'>" +
                "<span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>" +
                "<i class='bi bi-x'></i>" +
            "</button>" +
        "</div>"

                            var row = $(tableId).DataTable().row.add([
                                id,
                                name,
                                date,
                                address,
                                item.type,
                                purpose,
                                '0' + phone_number,
                                action
                            ]).draw().node();

                            attachEventListeners(row, item);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            // Load approved certificates
            $.ajax({
                url: '/Admin/certificate/GetdataApproved/' + type,
                type: 'GET',
                success: function(response) {
                    $(claimtableid).DataTable().clear().draw();
                    $(claimtableid + ' tbody').empty();

                    if (response.length === 0) {
                        $(claimtableid + ' tbody').html('<tr><td colspan="8" class="text-center">No data available</td></tr>');
                    } else {
                        $.each(response, function(index, item) {
                            var id = "BI_" + formatDatecontroll(item.created_at) + "_" + item.id;
                            var name = item.name;
                            var date = formatDate(item.created_at);                        
                            if(item.address == null){
                                var address = item.resident.address;
                            }else{
                                var address = item.address;
                            }
                            var type = item.type;
                            var purpose = item.purpose == "Others" ? item.otherpurpose : item.purpose;
                            if(item.cnum == null){
                                var phone_number = item.resident.cnum;
                            }else{
                                var phone_number = item.cnum;
                            }
                            var action = '';

                            if (item.status == "Ready To claim") {
                                action = "<div class='btn-group btn-group-lg' role='group' aria-label='Basic example'>" +
                                    "<button class='btn btn-primary btn-lg pdfconvert_display' data-control-number='" + item.id + "'>" +
                                    "<span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>" +
                                    "<i class='bi bi-printer'></i></button> " +
                                    "<button class='btn btn-success btn-lg claim-btn' data-control-number='" + item.id + "'>" +
                                    "<span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>" +
                                    "<i>Claim</i></button></div>";
                            } else if (item.status == "Claimed") {
                                action = "<h3 class='text-success'>Claimed</h3>";
                            } else {
                                action = "<div class='btn-group btn-group-lg' role='group' aria-label='Basic example'>" +
                                    "<button class='btn btn-primary btn-lg pdfconvert_display' data-control-number='" + item.id + "'>" +
                                    "<span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>" +
                                    "<i class='bi bi-printer'></i></button> " +
                                    "<button class='btn btn-success btn-lg ready_to_claim-btn' data-control-number='" + item.id + "'>" +
                                    "<span class='spinner-border spinner-border-sm d-none' role='status' aria-hidden='true'></span>" +
                                    "<i class='bi bi-check2-circle'></i></button></div>";
                            }

                            var row = $(claimtableid).DataTable().row.add([
                                id,
                                name,
                                date,
                                address,
                                type,
                                purpose,
                                '0' + phone_number,
                                action
                            ]).draw().node();

                            attachClaimEventListeners(row, item);
                            
                        });
                    }
                    loadCertificateData(type);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Attach event listeners for action buttons
        function attachEventListeners(row, item) {
            $(row).find('.view-btn').on('click', function() {
                // Handle view button click
                $('#myModal').modal('show');
                $('#voters').val(item.voters);
                $('#names_display').val(item.name);
                $('#copy').val(item.copy);
                $('#purpose').val(item.purpose);
                $('#childdisplay_view').hide();
                $("#pdfViewer").html("<embed src='../Files_Requirements/" + item.requirements + "' type='application/pdf' width='100%' height='600px' />");
            });

            $(row).find('.approve-btn').on('click', function() {
                var button = this;
                toggleSpinner(button, true);
                $.ajax({
                    url: "{{ route('approvecert') }}",
                    method: 'POST',
                    data: {
                        email: item.email,
                        type: item.type,
                        id: item.id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Email notification sent successfully');
                        //$('#kagawadsignatory').modal('show');
                        updatePendingCount();
                        $('#liveToast .toast-body').text('Document Approve Successfully');
                        var toastElement = new bootstrap.Toast(document.getElementById('liveToast'));
                        toastElement.show();
                        toggleSpinner(button, false);
                        var controlId = $("#setid").val(item.id);
                        var typeofcert = $("#typeofcert").val('Barangay Indigency');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending email notification:', error);
                        toggleSpinner(button, false);
                    }
                });
            });

            $(row).find('.decline-btn').on('click', function() {
                $('#user-name').text(item.name);
                $("#setid_decline").val(item.id);
                $("#emaildecline").val(item.email);
                $("#typeofcert_decline").val(item.type);
                $("#controlnum").val(item.id);
                $('#declineModal').modal('show');
            });
        }

        // Attach event listeners for claim actions
        function attachClaimEventListeners(row, item) {
            $(row).find('.ready_to_claim-btn').on('click', function() {
    // Handle approve button click
    var button = this;
        toggleSpinner(button, true);
                var controlId = $(this).data('control-number');
                $("#setid").val(item.id);
                $("#typeofcert").val(item.type);
                var display_item = item.type; 
                //alert(item.email);
                $.ajax({
                    url: "{{route('claimcert')}}",
                    method: 'POST',
                    data: {
                        email: item.email, // Change this to the actual email
                        type: item.type,
                        id: item.id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Email notification sent successfully');
                        //var controlId = $(this).data('control-number');
                        //$('#kagawadsignatory').modal('show');
                        console.log('Approve button clicked for control number: ' + controlId);
                        console.log('Type of cert: ' + item.type);
                    updatePendingCount();
                    // Check the type and trigger change event accordingly
                        $('#liveToast .toast-body').text('Document Update Successfully');
                         var toastElement = new bootstrap.Toast(document.getElementById('liveToast'));
                        toastElement.show();
                        toggleSpinner(button, false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending email notification:', error);
                        // Handle error response if needed
                        toggleSpinner(button, false);
                    }
                });
            });
            $(row).find('.claim-btn').on('click', function() {
                var button = this;
        toggleSpinner(button, true);
    // Handle approve button click
                var controlId = $(this).data('control-number');
                $("#setid").val(item.id);
                $("#typeofcert").val(item.type);
                var display_item = item.type; 
               // alert(item.email);
                $.ajax({
                    url: "{{route('claimedcert')}}",
                    method: 'POST',
                    data: {
                        email: item.email, // Change this to the actual email
                        type: item.type,
                        id: item.id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Emaiil notfication sent successfully');
                        //var controlId = $(this).data('control-number');
                        //$('#kagawadsignatory').modal('show');
                        console.log('Approve button clicked for control number: ' + controlId);
                        console.log('Type of cert: ' + item.type);
                    updatePendingCount();
                    // Check the type and trigger change event accordingly
                        $('#liveToast .toast-body').text('Document Claimed Successfully');
                        var toastElement = new bootstrap.Toast(document.getElementById('liveToast'));
                        toggleSpinner(button, false);

                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending email notification:', error);
                        toggleSpinner(button, false);
                        // Handle error response if needed
                    }
                });
            });

            
            $(row).find('.pdfconvert_display').on('click', function() {
                        // Handle decline button click
                        var controlId = $(this).data('control-number');
                        // Perform necessary action
                        $("#setid").val(item.id);
                        $("#typeofcert").val(item.type);
                        $('#kagawadsignatory').modal('show');

                        //$('#kagawadsignatory').show();
                        console.log('Approve button clicked for control number: ' + controlId);
                        console.log('Type of cert: ' + item.type);
                    });
                    $(row).find('.pdfconvert').on('click', function() {
                        // Handle decline button click
                        var controlId = $(this).data('control-number');
                        // Perform necessary action
                        $("#setid").val(item.id);
                        $("#typeofcert").val(item.type);
                        $('#kagawadsignatory').modal('show');

                        //$('#kagawadsignatory').show();
                        console.log('Approve button clicked for control number: ' + controlId);
                        console.log('Type of cert: ' + item.type);
                    });
                    $(row).find('.decline-btn').on('click', function() {
                        // Handle decline button click
                        var controlId = $(this).data('control-number');
                        // Perform necessary action
                        var userName = $(this).data('user-name'); // Assuming you have a data attribute with the user name
                        // Populate modal with user information
                        $('#user-name').text(item.name);
                        $("#setid_decline").val(item.id);
                        $("#emaildecline").val(item.email);
                        $("#typeofcert_decline").val(item.type);
                        $("#controlnum").val(id);
                        // Show the modal
                        $('#declineModal').modal('show');
                        console.log('Decline button clicked for control number: ' + controlId);
                    });
        }
        $(claimtableid).DataTable();
    });
    $('.decline_requests').on('click', function() {
            alert("asdf");
    var button = this;
        toggleSpinner(button, true);
    var controlId = $("#setid_decline").val();
    var typeofcert = $("#typeofcert_decline").val();
    var email = $("#emaildecline").val();
    var text = $("#declineReason").val();
    var controlnum = $("#controlnum").val();
    console.log('button clicked for control number: ' + controlId); 
    $.ajax({
        url: "{{route('declined')}}",
        type: 'POST',
        data: {
            id: controlId,
            type: typeofcert,
            email: email,
            text: text,
            controlnum:controlnum

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            $('#liveToast .toast-body').text('Document Declined Successfully');
            var toastElement = new bootstrap.Toast(document.getElementById('liveToast'));
            toastElement.show();
            $('#declineModal').modal('hide');
            console.log(typeofcert);
        updatePendingCount();
        toggleSpinner(button, false);
        $("#declineReason").val('');
        var toast = $('#liveToast');
        toast.find('.toast-header').removeClass('text-danger').addClass('text-success').find('strong').text('Decline Succesfully');
        toast.find('.toast-body').removeClass('text-bg-danger').addClass('text-bg-success');
        toast.find('.toast-body').text("Decline Message Succesfully Send to the Email");
        toast.toast('show');
        },
        error: function(xhr, status, errorThrown) {
    console.error('AJAX request failed:', xhr, status, errorThrown);
    // Handle error response here
    if(xhr.status == 422) {
        var errors = xhr.responseJSON.errors;
        // Display error toast
        var toast = $('#liveToast');
        toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Decline Unsuccesfully');
        toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
        var errorMessage = '';
        for (var key in errors) {
            if (errors.hasOwnProperty(key)) {
                errorMessage += errors[key][0] + '\n'; // Concatenate each error message
            }
        }
        toast.find('.toast-body').text("Declined message is Empty");
        toast.toast('show');
        toggleSpinner(button, false);

    } else {
        // Display generic error message
        var toast = $('#liveToast');
        toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Error');
        toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger').text('An error occurred while adding the forum.');
        toast.toast('show');
        toggleSpinner(button, false);

    }
}
    });
});
    // Function to format dates
    function formatDate(date) {
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(date).toLocaleDateString(undefined, options);
    }

    // Function to format control date
    function formatDatecontroll(date) {
        var d = new Date(date);
        return d.getFullYear() + ('0' + (d.getMonth() + 1)).slice(-2) + ('0' + d.getDate()).slice(-2);
    }
    $('.pdfconvert').on('click', function() {
    var controlId = $("#setid").val();
    var typeofcert = $("#typeofcert").val();
    var offcier = $("#official_display_solo").val();
    console.log('button clicked for control number: ' + controlId);
    
    $.ajax({
        url: '/Admin/generate-pdf',
        type: 'POST',
        data: {
            id: controlId,
            type: typeofcert,
            offcier: offcier
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // PDF generation successful, open the generated PDF in the modal
            $('#pdfFrame').attr('src', response.url);
            $('#pdfModal').modal('show');
            console.log(response);
            
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
});
    var selectedValue; // Define selectedValue outside of event handlers
$('#official_display_solo').change(function() {
    // Get the selected option's value and text
    selectedValue = $(this).val(); // Update the value of selectedValue
    var selectedText = $(this).find('option:selected').text();
    
    // Update the text of a separate element to display the selected option
    $('.selected_option_display_officials').text(selectedText);
});

    $('#official_display_solo').click(function() {
    $.ajax({
        url: '{{ route("related-datas") }}',
        type: 'GET',
        success: function(data) {
            // Clear existing options before populating new ones
            $('#official_display_solo').empty();
            // Add a default option
            // Check if data is not empty
            if (data.length > 0) {
                // Loop through fetched data and append options
                $.each(data, function(index, fullName) {
                    $('#official_display_solo').append($('<option>', {
                        value: fullName.name,
                        text: fullName.name
                    }));   
                });
            } else {
                console.log('No data found');
            }
            // If there's a selected value, set it as selected
            if (selectedValue) {
                $('#official_display_solo').val(selectedValue);
            }

            
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
$(document).ready(function() {
    // Add a click event listener to the "Convert to PDF" button
    $('.printall').click(function() {
        // Get officer value from an input field or other source
        var officer = $('#official_display_solos').val(); // Assuming you have an input field with ID 'officer_name'
       // alert(officer);
        $.ajax({
            url: '/generate-all-approved-pdfs-indigency', // The route you defined in web.php
            type: 'POST',
            data: {
                officer: officer, // Sending officer's name as data
                _token: '{{ csrf_token() }}' // Include CSRF token
            },
            success: function(response) {
                if (response.url) {
                    // Show a success message or do something with the response
                    window.open(response.url, '_blank'); // Open the PDF in a new tab
                }
            },
            error: function(xhr) {
                // Handle any errors that occurred during the request
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
    var selectedValue; // Define selectedValue outside of event handlers
$('#official_display_solos').change(function() {
    // Get the selected option's value and text
    selectedValue = $(this).val(); // Update the value of selectedValue
    var selectedText = $(this).find('option:selected').text();
    
    // Update the text of a separate element to display the selected option
    $('.selected_option_display_officials').text(selectedText);
});

    $('#official_display_solos').click(function() {
    $.ajax({
        url: '{{ route("related-datas") }}',
        type: 'GET',
        success: function(data) {
            // Clear existing options before populating new ones
            $('#official_display_solos').empty();
            // Add a default option
            // Check if data is not empty
            if (data.length > 0) {
                // Loop through fetched data and append options
                $.each(data, function(index, fullName) {
                    $('#official_display_solos').append($('<option>', {
                        value: fullName.name,
                        text: fullName.name
                    }));   
                });
            } else {
                console.log('No data found');
            }
            // If there's a selected value, set it as selected
            if (selectedValue) {
                $('#official_display_solos').val(selectedValue);
            }

            
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
});

    
$(document).ready(function () {
    $('#confirmApprove').click(function () {
        var requestType = 'Barangay Indigency'; // Change this dynamically if needed

        // Disable the button to prevent multiple clicks
        $('#confirmApprove').prop('disabled', true);
        
        // Show the spinner
        $('#spinners').show();

        $.ajax({
            url: '{{ route("approveallcert") }}',  // Update this with the correct route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token
                type: requestType
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    // You can also close the modal here if needed
                    $('#approveAllModal').modal('hide');
                } else {
                    alert('An error occurred: ' + response.error);
                }
            },
            error: function (xhr, status, error) {
                alert('Something went wrong: ' + error);
            },
            complete: function () {
                // Re-enable the button
                $('#confirmApprove').prop('disabled', false);
                
                // Hide the spinner
                $('#spinners').hide();
            }
        });
    });
    
});
$(document).ready(function () {
$('.upload-indigency').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters-indigency').val();
    var name = $('#names_display-indigency').val();
    var copy = $('#copy-indigency').val();
    var age = $('#age-indigency').val();
    var cnum = $('#cnum-indigency').val();
    var address = $('#address-indigency').val();
    var purpose = $('#purposes').val();
    var email = $('#email_display').val();
    var otherpurpose = $('#otherpurpose').val();
    var fileInput = "Approved.pdf";
    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('email', email);
    formData.append('copy', copy);
    formData.append('age', age);
    formData.append('address', address);
    formData.append('cnum', cnum);
    formData.append('requirements', fileInput);
    formData.append('purpose', purpose);
    formData.append('otherpurpose', otherpurpose);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("Admin.submit.indigency.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            //updatePendingCount();
            //loadCertificateData(type);
        toggleSpinner(button, false);
            // Show success toast message
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#exampleModal').modal('hide');
            $('#voters').val('');
            $('#names_display').val('');
            $('#copy').val(1);
            $('#purpose').val('');
            $('#otherpurpose').val('');
            $('#requirements').val('');
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseJSON);
            var errorMessage = xhr.responseJSON.message;
            // Show error toast message
        toggleSpinner(button, false);

            $('#display').text('Please try again.');
            $('.toast').removeClass('text-bg-success').addClass('text-bg-danger');
            $('.toast-body').text(errorMessage);
            $('.toast').toast('show');
        }
    });
});

});
const mobileInput = document.getElementById('cnum-indigency');

                    // Add an event listener to show the format hint
                    mobileInput.addEventListener('input', function () {
                        // Format the input value
                        let formattedValue = this.value.replace(/\D/g, ''); // Remove non-digit characters

                        // Check if the input is empty after formatting
                        if (formattedValue === '') {
                            // Set the input value as empty
                            this.value = '';
                        } else {
                            // Apply formatting as 2-3-4 pattern
                            if (formattedValue.length > 2 && formattedValue.length <= 5) {
                                formattedValue = formattedValue.substring(0, 2) + '-' + formattedValue.substring(2);
                            } else if (formattedValue.length > 5) {
                                formattedValue = formattedValue.substring(0, 2) + '-' + formattedValue.substring(2, 5) + '-' + formattedValue.substring(5, 9);
                            }

                            // Update the input value with the formatted value
                            this.value = formattedValue;
                        }
                    });
</script>
