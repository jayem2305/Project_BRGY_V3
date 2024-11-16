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
</head>
  <body>
   

   @yield("contentmanager")
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
$(document).ready(function(){
    $('#myevents').DataTable();
    $('#myproject').DataTable();
    $('#myannouncement').DataTable();
});

function fetchEventsData() {
    var image;
    var btn;
    $.ajax({
        url: "{{ route('events.index') }}",  // Make sure this route returns both events and projects
        type: "GET",
        dataType: "json",
        success: function(response) {
            var events = response.events;   // assuming response has events and project data
            var projects = response.project;
            var announcement = response.announcement;

            // Clear the tables before adding new data
            $('#myevents').DataTable().clear().draw();
            $('#myproject').DataTable().clear().draw();
            $('#myannouncement').DataTable().clear().draw();
            
            // Process events and add them to myevents table
            events.forEach(function(event) {
                var rowData = formatRowData(event);
                $('#myevents').DataTable().row.add(rowData).draw();
            });

            // Process projects and add them to myproject table
            projects.forEach(function(project) {
                var rowData = formatRowData(project);
                $('#myproject').DataTable().row.add(rowData).draw();
            });
            announcement.forEach(function(announcement) {
                var rowData = formatRowData(announcement);
                $('#myannouncement').DataTable().row.add(rowData).draw();
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

// Function to format row data for both events and projects
function formatRowData(item) {
    var image;
    var btn;

    // Check if the image exists, if not use default image
    if(item.image == null){
        image = "<img src='../barangayprorfile/logo.png' alt='default' width='50' class='rounded-circle mx-auto d-block'>";
    }else{
        image = '<img src="../barangayprorfile/'+item.image+'" alt="poster" width="50" class="rounded-circle mx-auto d-block">';
    }

    // Format the created date and time
    var createdDate = new Date(item.created_at);
    var formattedDate = createdDate.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    });
    var formattedTime = createdDate.toLocaleTimeString('en-US', {
        hour: 'numeric',
        minute: '2-digit',
        hour12: true
    });

    // Generate the action buttons based on status
    if(item.status == "Archive"){
        btn = '<button type="submit" class="btn btn-warning btn-restore" data-event-id="'+ item.id + '">Restore</button>';
    }else{
        btn = '<button type="button" class="btn btn-success btn-update" data-event-id="'+ item.id + '" data-event-type="'+ item.Type_of_event + '">Update</button>'+
              '<button type="submit" class="btn btn-danger btn-archive" data-event-id="'+ item.id + '">Archive</button>';
    }

    // Return the formatted row data as an array
    return [
        item.Type_of_event,
        image,
        item.title,
        formattedDate,
        formattedTime,
        btn
    ];
}



// Function to handle edit action
function handleEditAction(eventId) {
    fetchEventsData();
    // Implement your edit logic here
    // After successful edit, call fetchEventsData() to update the table
    
}

// Function to handle delete action
function handleDeleteAction(eventId) {
    // Implement your delete logic here
    // After successful delete, call fetchEventsData() to update the table
    $.ajax({
        url: '/events/' + eventId + '/archive',
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Update the status in the UI if needed
            console.log(response); // Log response for debugging
            fetchEventsData();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
function handlerestoreAction(eventId) {
    // Implement your delete logic here
    // After successful delete, call fetchEventsData() to update the table
    $.ajax({
        url: '/events/' + eventId + '/restore',
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Update the status in the UI if needed
            console.log(response); // Log response for debugging
            fetchEventsData();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
       $(document).ready(function() {
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#editor_announcement'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
            .then(editor => {
                // Event handler for form submission
                $('.announce-btn').click(function(event) {
                    event.preventDefault();

                    // Retrieve title
                    var title = $('#title').val();

                    // Retrieve content from CKEditor instance
                    var content = editor.getData();

                    // Send an AJAX request to your Laravel backend
                    $.ajax({
                        url: '{{ route("events.store") }}',
                        method: 'POST',
                        data: {
                            type: "Announcement",
                            status: "Active",
                            content: content,
                            title: title
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            fetchEventsData();
                            $('#staticBackdrop').modal('hide');
                            $('#liveToast .toast-header').removeClass('text-danger').addClass('text-success');
                            $('#liveToast .me-auto').text('Barangay Announcement');
                            $('#liveToast .toast-body').removeClass('text-bg-danger').addClass('text-bg-success')
                            $('#liveToast .toast-body').text('SuccessFully Added');
                            $('#liveToast').toast('show');
                        
                            // Optionally, close the modal or show a success message
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            var errorMessage = "An error occurred. Please try again."; // Default error message
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                errorMessage = xhr.responseJSON.errors[Object.keys(xhr.responseJSON.errors)[0]][0];
                            }
                            $('#liveToast .toast-header').removeClass('text-success').addClass('text-danger');
                            $('#liveToast .me-auto ').text('Barangay Announcement');
                            $('#liveToast .toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
                            $('#liveToast .toast-body').text(errorMessage); // Display error message
                            $('#liveToast').toast('show');
                        }
                    });
                });
            })
            .catch(error => {
                console.error(error);
            });
    
        ClassicEditor
        .create( document.querySelector( '#editor_events' ), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
        
        .then(editor => {
                // Event handler for form submission
                $('.event-btn').click(function(event) {
                    event.preventDefault();

                    // Retrieve title
                    var title = $('#titleevent').val();
                    // Retrieve content from CKEditor instance
                    var start_time = $('#startdateeven').val();
                    var end_time = $('#enddateeven').val();
                    var content = editor.getData();

                    // Send an AJAX request to your Laravel backend
                    $.ajax({
                        url: '{{ route("events.store_event") }}',
                        method: 'POST',
                        data: {
                            type: "Event",
                            status: "Active",
                            start_time: start_time,
                            end_time: end_time,
                            content: content,
                            title: title
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            fetchEventsData();
                            $('#staticBackdropforevents').modal('hide');
                            $('#liveToast .toast-header').removeClass('text-danger').addClass('text-success');
                            $('#liveToast .me-auto').text('Barangay Events');
                            $('#liveToast .toast-body').removeClass('text-bg-danger').addClass('text-bg-success')
                            $('#liveToast .toast-body').text('SuccessFully Added');
                            $('#liveToast').toast('show');
                        
                            // Optionally, close the modal or show a success message
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            var errorMessage = "Something is not Right, Please Check the Information."; // Default error message
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                errorMessage = xhr.responseJSON.errors[Object.keys(xhr.responseJSON.errors)[0]][0];
                            }
                            $('#liveToast .toast-header').removeClass('text-success').addClass('text-danger');
                            $('#liveToast .me-auto ').text('Barangay Events');
                            $('#liveToast .toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
                            $('#liveToast .toast-body').text(errorMessage); // Display error message
                            $('#liveToast').toast('show');
                        }
                    });
                });
            })
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#editor_project' ) , {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
        .then(editor => {
                // Event handler for form submission
                $('.project-btn').click(function(event) {
                    event.preventDefault();

                    // Retrieve title
                    var title = $('#titleproject').val();
                    // Retrieve content from CKEditor instance
                    var start_time = $('#startdateproject').val();
                    var end_time = $('#enddateproject').val();
                    var image = $('#filetypeproject').prop('files')[0];
                    var content = editor.getData();
                    //alert(image);
                    // Create a FormData object
                    var formData = new FormData();
                    formData.append('type', 'Project');
                    formData.append('status', 'Active');
                    formData.append('image', image);
                    formData.append('start_time', start_time);
                    formData.append('end_time', end_time);
                    formData.append('content', content);
                    formData.append('title', title);

                    // Send an AJAX request to your Laravel backend
                    $.ajax({
                        url: '{{ route("events.store_project") }}',
                        method: 'POST',
                        data: formData,
                        contentType: false, // Don't set contentType
                        processData: false, // Don't process the data
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            fetchEventsData();
                            $('#staticBackdropforproject').modal('hide');
                            $('#liveToast .toast-header').removeClass('text-danger').addClass('text-success');
                            $('#liveToast .me-auto').text('Barangay Project');
                            $('#liveToast .toast-body').removeClass('text-bg-danger').addClass('text-bg-success')
                            $('#liveToast .toast-body').text('SuccessFully Added');
                            $('#liveToast').toast('show');
                        
                            // Optionally, close the modal or show a success message
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            var errorMessage = "An error occurred. Please try again."; // Default error message
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                errorMessage = xhr.responseJSON.errors[Object.keys(xhr.responseJSON.errors)[0]][0];
                            }
                            $('#liveToast .toast-header').removeClass('text-success').addClass('text-danger');
                            $('#liveToast .me-auto ').text('Barangay Project');
                            $('#liveToast .toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
                            $('#liveToast .toast-body').text(errorMessage); // Display error message
                            $('#liveToast').toast('show');
                        }
                    });
                });
            })
        .catch( error => {
            console.error( error );
        } );
// Variable to store the CKEditor instance
var editorAnnouncementUpdate;

$(document).on('click', '.btn-update', function() {
    var eventId = $(this).data('event-id');
    var eventType = $(this).data('event-type');

    if (eventType === 'Announcement') {
        $('#updateAnnouncement').modal('show');
    } else if (eventType === 'Event') {
        $('#updateforevents').modal('show');
    } else if (eventType === 'Project') {
        $('#updateforproject').modal('show');
    }

    // Perform AJAX request to fetch data based on event ID
    $.ajax({
        url: "/events/" + eventId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.Type_of_event === 'Announcement') {
                var content = response.content;
                var title;
                var announcementId = response.id;
                console.log('Title:', response.title);
                title =  $('#titleaanouncement_update').val(response.title);
                
                // Check if CKEditor instance already exists
                if (!editorAnnouncementUpdate) {
                    // Create CKEditor instance if not already initialized
                    ClassicEditor
                        .create(document.querySelector('#editor_announcement_update'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
                        .then(editor => {
                            // Store the CKEditor instance
                            editorAnnouncementUpdate = editor;
                            // Set the data to the editor instance
                            editor.setData(content);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                } else {
                    // Set the data to the existing CKEditor instance
                    editorAnnouncementUpdate.setData(content);
                }
                $('.announce-update-btn').data('announcement-id', announcementId);
            }else if (response.Type_of_event === 'Event') {
                var content = response.content;
                var title;
                var start_time;
                var end_time;
                var announcementeventId = response.id;
                console.log('Title:', response.title);
                title =  $('#updatetitleevent').val(response.title);
                start_time =  $('#updatestartdateeven').val(response.start_time);
                end_time =  $('#updateenddateeven').val(response.end_time);
                
                // Check if CKEditor instance already exists
                if (!editorAnnouncementUpdate) {
                    // Create CKEditor instance if not already initialized
                    ClassicEditor
                        .create(document.querySelector('#updateeditor_events'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
                        .then(editor => {
                            // Store the CKEditor instance
                            editorAnnouncementUpdate = editor;
                            // Set the data to the editor instance
                            editor.setData(content);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                } else {
                    // Set the data to the existing CKEditor instance
                    editorAnnouncementUpdate.setData(content);
                }
                $('.update-event-btn').data('event-id', announcementeventId);
            }else if (response.Type_of_event === 'Project') {
                var content = response.content;
                var title;
                var start_time;
                var end_time;
                var image;
                var projectId = response.id;
                console.log('Title:', response.title);
                title =  $('#updatetitleproject').val(response.title);
                $('#fileInputNameDisplay').html('<img src="../barangayprorfile/' + response.image + '" class="img-thumbnail mx-auto d-block" width=100">');
                start_time =  $('#updatestartdateproject').val(response.start_time);
                end_time =  $('#updateenddateproject').val(response.end_time);
                
                // Check if CKEditor instance already exists
                if (!editorAnnouncementUpdate) {
                    // Create CKEditor instance if not already initialized
                    ClassicEditor
                        .create(document.querySelector('#updateeditor_project'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
                        .then(editor => {
                            // Store the CKEditor instance
                            editorAnnouncementUpdate = editor;
                            // Set the data to the editor instance
                            editor.setData(content);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                } else {
                    // Set the data to the existing CKEditor instance
                    editorAnnouncementUpdate.setData(content);
                }
                $('.update-project-btn').data('project-id', projectId);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

});

// Event listener for update button
$(document).on('click', '.announce-update-btn', function() {
    // Get the updated content from the CKEditor instance
    var updatedContent = editorAnnouncementUpdate.getData();
    var updatedTitle = $('#titleaanouncement_update').val(); 
    var announcementId = $(this).data('announcement-id');
    // Perform AJAX request to update the announcement content
    $.ajax({
        url: "{{ route('announcement.update') }}", // Update the URL with your Laravel route
        type: 'POST',
        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
        data: {
            id: announcementId,
            content: updatedContent,
            title: updatedTitle
        },
        success: function(response) {
            // Handle success response
            console.log('Announcement updated successfully:', response);
            var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-danger').addClass('text-success');
            toast.removeClass('text-bg-danger').addClass('text-bg-success');
            toast.find('.headerupdate').text('Successful Update');
            toast.find('.toast-body').text(response.message);
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            fetchEventsData();
            $('#updateAnnouncement').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            var errorMessage = "An error occurred while updating the announcement.";
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors;
                // Iterate over each error and append it to the toast body
                $.each(errors, function(field, messages) {
                    $.each(messages, function(index, message) {
                        errorMessage += "\n" + message;
                        // Show each error message in toast individually
                        var toast = $('#liveToast');
            toast.find('.toast-header').removeClass('text-success').addClass('text-danger');
            toast.removeClass('text-bg-success').addClass('text-bg-danger');
           toast.find('.toast-body').text(message);
            toast.find('.toast-header').text('Unsuccessful Update');
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
                    });
                });
            }else {
                var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
            toast.removeClass('text-bg-success').addClass('text-bg-danger');
           toast.find('.toast-body').text(errorMessage);
            toast.find('.headerupdate').text('Unsuccessful Update');
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            }
           
        }
    });
});
$(document).on('click', '.update-event-btn', function() {
    // Get the updated content from the CKEditor instance
    var updatedContent = editorAnnouncementUpdate.getData();
    var title =  $('#updatetitleevent').val();
    var start_time =  $('#updatestartdateeven').val();
    var end_time =  $('#updateenddateeven').val();
    var eventId = $(this).data('event-id');
    // Perform AJAX request to update the announcement content
    $.ajax({
        url: "{{ route('Event.update') }}", // Update the URL with your Laravel route
        type: 'POST',
        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
        data: {
            id: eventId,
            content: updatedContent,
            start_time: start_time,
            end_time: end_time,
            title: title
        },
        success: function(response) {
            // Handle success response
            console.log('Event updated successfully:', response);
            var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-danger').addClass('text-success');
            toast.removeClass('text-bg-danger').addClass('text-bg-success');
            toast.find('.headerupdate').text('Successful Update');
            toast.find('.toast-body').text(response.message);
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            fetchEventsData();
            $('#updateforevents').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            var errorMessage = "An error occurred while updating the Event.";
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors;
                // Iterate over each error and append it to the toast body
                $.each(errors, function(field, messages) {
                    $.each(messages, function(index, message) {
                        errorMessage += "\n" + message;
                        // Show each error message in toast individually
                        var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
            toast.removeClass('text-bg-success').addClass('text-bg-danger');
           toast.find('.toast-body').text(message);
            toast.find('.headerupdate').text('Unsuccessful Update');
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
                    });
                });
            }else {
                var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
            toast.removeClass('text-bg-success').addClass('text-bg-danger');
           toast.find('.toast-body').text(errorMessage);
            toast.find('.headerupdate').text('Unsuccessful Update');
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            }
           
        }
    });
});
$(document).on('click', '.update-project-btn', function() {
    // Get the updated content from the CKEditor instance
    var updatedContent = editorAnnouncementUpdate.getData();
    var title =  $('#updatetitleproject').val();
    var start_time =  $('#updatestartdateproject').val();
    var end_time =  $('#updateenddateproject').val();
    var image =  $('#updatefiletypeproject').prop('files')[0];
    console.log(image);
    var projectId = $(this).data('project-id');
    var formData = new FormData();
formData.append('id', projectId);
formData.append('content', updatedContent);
formData.append('start_time', start_time);
formData.append('end_time', end_time);
formData.append('title', title);
formData.append('image', image);

    // Perform AJAX request to update the announcement content
    $.ajax({
        url: "{{ route('Project.update') }}", // Update the URL with your Laravel route
        type: 'POST',
        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle success response
            console.log('Project updated successfully:', response);
            var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-danger').addClass('text-success');
            toast.removeClass('text-bg-danger').addClass('text-bg-success');
            toast.find('.headerupdate').text('Successful Update');
            toast.find('.toast-body').text(response.message);
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            fetchEventsData();
            $('#updateforproject').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            var errorMessage = "An error occurred while updating the Event.";
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors;
                // Iterate over each error and append it to the toast body
                $.each(errors, function(field, messages) {
                    $.each(messages, function(index, message) {
                        errorMessage += "\n" + message;
                        // Show each error message in toast individually
                        var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
            toast.removeClass('text-bg-success').addClass('text-bg-danger');
           toast.find('.toast-body').text(message);
            toast.find('.headerupdate').text('Unsuccessful Update');
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
                    });
                });
            }else {
                var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
            toast.removeClass('text-bg-success').addClass('text-bg-danger');
           toast.find('.toast-body').text(errorMessage);
            toast.find('.headerupdate').text('Unsuccessful Update');
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            }
           
        }
    });
});
ClassicEditor
    .create(document.querySelector('#updatemission'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
    .then(editor => {
        // Set the data to the editor instance
        editorAnnouncementUpdateMission = editor;
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#updatevission'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
    .then(editor => {
        // Set the data to the editor instance
        editorAnnouncementUpdateVission = editor;
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#updatehistory'), {
            toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo'
            ]
    },
        language: 'en'})
    .then(editor => {
        // Set the data to the editor instance
        editorAnnouncementUpdateHistory = editor;
    })
    .catch(error => {
        console.error(error);
    });
// Fetch data when the page loads
$(document).ready(function() {
    fetchInfo();
});
    function fetchInfo() {
    $.ajax({
        url: "{{ route('info.fetch') }}", // Assuming you have a route to fetch the info
        type: 'GET',
        success: function(response) {
            if (response.info) {
                // If info exists, populate the fields
                editorAnnouncementUpdateMission.setData(response.info.mission);
                editorAnnouncementUpdateVission.setData(response.info.vission);
                editorAnnouncementUpdateHistory.setData(response.info.history);
                // Optionally, you can also display the logo if it exists
                if (response.info.logo) {
                    // Display the logo image
                    $('#logodisplay').html('<img src="../uploads/' + response.info.logo + '" class="img-thumbnail mx-auto d-block" width=100">');
                }
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}


$(document).on('click', '.update-info-btn', function() {
    // Get the updated content from the CKEditor instances
    var updatedContentMission = editorAnnouncementUpdateMission.getData();
    var updatedContentVission = editorAnnouncementUpdateVission.getData();
    var updatedContentHistory = editorAnnouncementUpdateHistory.getData();
    var logo = $('#updatelogo').prop('files')[0];
    console.log(logo);
    var projectId = $(this).data('project-id');

    var formData = new FormData();
    formData.append('mission', updatedContentMission);
    formData.append('vission', updatedContentVission);
    formData.append('history', updatedContentHistory);
    formData.append('logo', logo);

    // Perform AJAX request to update the project
    $.ajax({
        url: "{{ route('info.update') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle success response
            console.log('Updated successfully:', response);
            var toast = $('#liveToast');
            toast.find('.headerupdate').removeClass('text-danger').addClass('text-success');
            toast.removeClass('text-bg-danger').addClass('text-bg-success');
            toast.find('.headerupdate').text('Successful Update');
            toast.find('.toast-body').text(response.message);
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            fetchEventsData();
            $('#updateforproject').modal('hide');
            fetchInfo();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            var errorMessage = "An error occurred while updating the Event.";
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors;
                // Iterate over each error and append it to the toast body
                $.each(errors, function(field, messages) {
                    $.each(messages, function(index, message) {
                        errorMessage += "\n" + message;
                        // Show each error message in toast individually
                        var toast = $('#liveToast');
                        toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
                        toast.removeClass('text-bg-success').addClass('text-bg-danger');
                        toast.find('.toast-body').text(message);
                        toast.find('.headerupdate').text('Unsuccessful Update');
                        var bsToast = new bootstrap.Toast(toast);
                        bsToast.show();
                    });
                });
            } else {
                var toast = $('#liveToast');
                toast.find('.headerupdate').removeClass('text-success').addClass('text-danger');
                toast.removeClass('text-bg-success').addClass('text-bg-danger');
                toast.find('.toast-body').text(errorMessage);
                toast.find('.headerupdate').text('Unsuccessful Update');
                var bsToast = new bootstrap.Toast(toast);
                bsToast.show();
            }
        }
    });
});


    // Event handler for delete button click
    $(document).on('click', '.btn-archive', function() {
        var eventId = $(this).data('event-id');

        handleDeleteAction(eventId);
    });
    $(document).on('click', '.btn-restore', function() {
        var eventId = $(this).data('event-id');

        handlerestoreAction(eventId);
    });
    fetchInfo();
    fetchEventsData();
    });
    
</script>

