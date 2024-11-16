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

    .valid-secondary::before {
        content: "\f05a"; /* Unicode for the Font Awesome info-circle icon */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #0d6efd; /* Choose your desired color */
         /* Adjust spacing as needed */
    }
</style>
</head>
  <body>
   

   @yield("content")
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script src="../lib/wow/wow.min.js"></script>
                    <script src="../lib/easing/easing.min.js"></script>
                    <script src="../lib/waypoints/waypoints.min.js"></script>
                    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
                    <script src="../lib/lightbox/js/lightbox.min.js"></script>
                    <script>
    document.getElementById('employed').addEventListener('change', function() {
        const unemployedCheckbox = document.getElementById('unemployed');
        unemployedCheckbox.disabled = this.checked;
    });
    document.getElementById('unemployed').addEventListener('change', function() {
        const employedCheckbox = document.getElementById('employed');
        employedCheckbox.disabled = this.checked;
    });
    document.getElementById('student').addEventListener('change', function() {
        const OSYCheckbox = document.getElementById('OSY');
        const OSCCheckbox = document.getElementById('OSC');
        OSYCheckbox.disabled = this.checked;
        OSCCheckbox.disabled = this.checked;
    });
    document.getElementById('OSY').addEventListener('change', function() {
        const studentCheckbox = document.getElementById('student');
        const OSCCheckbox = document.getElementById('OSC');
        studentCheckbox.disabled = this.checked;
        OSCCheckbox.disabled = this.checked;
    });
    document.getElementById('OSC').addEventListener('change', function() {
        const studentCheckbox = document.getElementById('student');
        const OSYCheckbox = document.getElementById('OSY');
        OSYCheckbox.disabled = this.checked;
        studentCheckbox.disabled = this.checked;
    });
////////
    document.getElementById('employed_addmember').addEventListener('change', function() {
        const unemployedCheckbox = document.getElementById('unemployed_addmember');
        unemployedCheckbox.disabled = this.checked;
    });
    document.getElementById('unemployed_addmember').addEventListener('change', function() {
        const employedCheckbox = document.getElementById('employed_addmember');
        employedCheckbox.disabled = this.checked;
    });
    document.getElementById('student_addmember').addEventListener('change', function() {
        const OSYCheckbox = document.getElementById('OSY_addmember');
        const OSCCheckbox = document.getElementById('OSC_addmember');
        OSYCheckbox.disabled = this.checked;
        OSCCheckbox.disabled = this.checked;
    });
    document.getElementById('OSY_addmember').addEventListener('change', function() {
        const studentCheckbox = document.getElementById('student_addmember');
        const OSCCheckbox = document.getElementById('OSC_addmember');
        studentCheckbox.disabled = this.checked;
        OSCCheckbox.disabled = this.checked;
    });
    document.getElementById('OSC_addmember').addEventListener('change', function() {
        const studentCheckbox = document.getElementById('student_addmember');
        const OSYCheckbox = document.getElementById('OSY_addmember');
        OSYCheckbox.disabled = this.checked;
        studentCheckbox.disabled = this.checked;
    });
    ///////
    document.getElementById('employed_editmember').addEventListener('change', function() {
        const unemployedCheckbox = document.getElementById('unemployed_editmember');
        unemployedCheckbox.disabled = this.checked;
    });
    document.getElementById('unemployed_editmember').addEventListener('change', function() {
        const employedCheckbox = document.getElementById('employed_editmember');
        employedCheckbox.disabled = this.checked;
    });
    document.getElementById('student_editmember').addEventListener('change', function() {
        const OSYCheckbox = document.getElementById('OSY_editmember');
        const OSCCheckbox = document.getElementById('OSC_editmember');
        OSYCheckbox.disabled = this.checked;
        OSCCheckbox.disabled = this.checked;
    });
    document.getElementById('OSY_editmember').addEventListener('change', function() {
        const studentCheckbox = document.getElementById('student_editmember');
        const OSCCheckbox = document.getElementById('OSC_editmember');
        studentCheckbox.disabled = this.checked;
        OSCCheckbox.disabled = this.checked;
    });
    document.getElementById('OSC_editmember').addEventListener('change', function() {
        const studentCheckbox = document.getElementById('student_editmember');
        const OSYCheckbox = document.getElementById('OSY_editmember');
        OSYCheckbox.disabled = this.checked;
        studentCheckbox.disabled = this.checked;
    });
</script>
                    <!-- Template Javascript -->
                    <script src="../js/main.js"></script>
   <script>
    
    // JavaScript to show the modal on page load
                        $(document).ready(function(){
                            displaymember();
                          $('#autoShowModal').modal('show');
                      });
                      $(document).ready(function(){
                          $('#termscondition').modal('show');
                      });
                      $(document).ready(function() {
        // Make an AJAX call to fetch the image
        $.ajax({
            url: "{{ route('get.image') }}",
            type: "GET",
            success: function(response) {
                var image;
    console.log(response.logo); // Log the response to the console
    if (response.logo) {
        // Update the image container with the fetched image
        image = $('#imageContainer').html('<img src="{{ asset("../uploads") }}/' + response.logo + '"class=" rounded-circle mx-auto d-block" alt="logo" width="200" height="200" ">');
    } else {
        // Handle if no image is found
        $('#imageContainer').html('<p>No image found</p>');
    }
    console.log(image);

},
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).ready(function() {
    // Ajax request to fetch projects
    $.ajax({
        url: "{{ route('get.project') }}",
        type: 'GET',
        success: function(response) {
            var projects = response.projects;
            var projectHtml = '';

            // Loop through projects and generate HTML
            projects.forEach(function(project) {
                projectHtml += '<div class="col-lg-6 mb-4">';
                projectHtml += '<div class="card" >';
                projectHtml += ' <img src="../barangayprorfile/' + project.image +'" class="card-img-top" alt="...">';
                projectHtml += '<div class="card-body">';
                projectHtml += '<h5 class="card-title">' + project.title + '</h5>';
                projectHtml += '<p class="card-text fw-light " >' + project.content + '</p>';
                projectHtml += '<p class="card-text text-xl-end text-secondary font-monospace">' + formatDate(project.created_at) + '</p>';
                projectHtml += '</div></div></div>';
            });

            // Append HTML to displayprojects div
            $('#displayprojects').html(projectHtml);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
    function formatDate(date) {
    return moment(date).fromNow(); // Format date as "a minute ago", "last month", etc.
}
    // Ajax request to fetch news and events
    $.ajax({
        url: "{{ route('get.events') }}",
        type: 'GET',
        success: function(response) {
            var events = response.events;
            var newsHtml = '';
            var eventsHtml = '';

            // Loop through events and generate HTML
            events.forEach(function(event) {
                if(event.Type_of_event == "Event" ){
                    var formattedDate = moment(event.start_time).format('MMMM DD, YYYY');
                    var formattedDateend = moment(event.end_time).format('MMMM DD, YYYY');
                eventsHtml += '<div class="col-lg-12 mb-4">';
                eventsHtml += '<div class="card"><div class="row g-0">';
                eventsHtml += '<div class="col-lg-3 text-white" style="background-color:#1C2035;">';
                eventsHtml += '<h5 class="card-title text-center">Event</h5></div>';
                eventsHtml += '<div class="col-lg-9"><div class="card-body"><h3 class="card-title">' + event.title + '</h3><p class="card-text text-decoration-underline"><i class="bi bi-calendar-event"></i> ' + formattedDate + ' - <i class="bi bi-calendar-event"></i> ' + formattedDateend + '</p>';
                eventsHtml += '<p class="card-text">' + event.content + '</p>';
                eventsHtml += '<p class="card-text text-xl-end text-secondary font-monospace">' + formatDate(event.created_at) + '</p></div>';
                eventsHtml += '</div>';
                eventsHtml += '</div></div></div>';
                }else{
                    eventsHtml += '<div class="col-lg-12 mb-4">';
                    eventsHtml += '<div class="card">';
                    eventsHtml += '<div class="card-body">';
                    eventsHtml += '<p class="card-text text-xl-start text-secondary font-monospace">' + event.Type_of_event + '</p>';
                    eventsHtml += '<h5 class="card-title">' + event.title + '</h5>';
                    eventsHtml += '<p class="card-text">' + event.content + '</p>';
                    eventsHtml += '<p class="card-text text-xl-end text-secondary font-monospace">' + formatDate(event.created_at) + '</p>';
                    eventsHtml += '</div></div></div>';
                }
                
            });

            // Append HTML to displayevent div
            $('#displayevent').html(eventsHtml);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>
<script>
    $(document).ready(function(){
        refreshprofile();
        function refreshprofile() {
            
        // Ajax request when document is ready
        $.ajax({
            url: "{{ route('user.profile_user') }}", // URL of the profile route
            type: 'GET',
            dataType: 'json',
            success: function(response){
                
                console.log(response); // Log the entire response object to console
                var ext;
                if(response.user.ext == null){
                    ext = " ";
                }else{
                    ext = response.user.ext;
                }
                var user = response.user; // Access the 'user' object from the response
            // Update modal input fields with user data
            $('#id').val(user.reg_number);
            $('#id_addmember').val(user.reg_number);
            $('#fname').val(user.fname);
            $('#lname').val(user.lname);
            $('#mname').val(user.mname);
            $('#ext').val(user.ext);
            $('#address').val(user.address);
            $('#household').val(user.household);
            $('#Birth').val(user.Birth);
            $('#birthday').val(user.birthday);
            $('#age').val(user.age);
            $('#cnum').val(user.cnum);
            $('#gender').val(user.gender);
            $('#civil').val(user.civil);
            $('#citizenship').val(user.citizenship);
            $('#occupation').val(user.occupation);
            $('#owner').val(user.owner);
            $('#ownername').val(user.ownername);
            $('#numberoffam').val(user.numberoffam);
            $('#proofofowner').val(user.proofofowner);
            $('#numberoffam').val(user.number_of_family);
                $('#ownername').val(user.owner_name);
                $('#owner').val(user.owner_type);
                if(response.user.proof_of_owner == null){
                    $('#letter img').attr('src', "../residentprofile/1714143806_empty.png");
                }else{
                    $('#letter img').attr('src', "../residentprofile/"+response.user.proof_of_owner);   
                }
                $('#2x2 img').attr('src', "../residentprofile/"+response.user.image_filename);
                // Update HTML content with user data
                $('#userProfile h3').text(response.user.fname + ' ' + response.user.lname + ' ' + ext);
                $('#userProfile p').text(response.user.email);
                $('#image_profile img').attr('src', "../residentprofile/"+response.user.image_filename);
                
                $('#info_num').text(response.user.cnum);
                $('#info_address').text(response.user.address);
                $('#info_head').text(response.user.household);
                // Check if the response.indicate_if has the bit set for each checkbox and if the data exists
                function checkCheckbox(value, dataString) {
    if (!dataString || dataString === 'null') return false; // If the string is null or 'null', return false
    var values = dataString.split(','); // Split the string by comma
    // Filter out 'null' values
    values = values.filter(function(item) {
        return item.trim() !== 'null';
    });
    console.log('Original values:', dataString); // Log the original values
    console.log('Values after removing null:', values); // Log the values after removing null
    // Check if the desired value exists in the filtered values
    for (var i = 0; i < values.length; i++) {
        console.log('Checking value:', values[i].trim());
        if (values[i].trim() === value) {
            return true;
        }
    }
    return false;
}
console.log('Response indicate_if:', user.indicate_if);
// Test the function with the provided data
// Function to handle initial checkbox state based on the dataString
function handleInitialCheckboxState(dataString) {
    $('#employed').prop('checked', checkCheckbox('Employed', dataString));
    $('#unemployed').prop('checked', checkCheckbox('Unemployed', dataString));
    $('#PWD').prop('checked', checkCheckbox('PWD', dataString));
    $('#OFW').prop('checked', checkCheckbox('OFW', dataString));
    $('#soloparent').prop('checked', checkCheckbox('Solo Parent', dataString));
    $('#OSY').prop('checked', checkCheckbox('Out of School Youth (OSY)', dataString));
    $('#student').prop('checked', checkCheckbox('Student', dataString));
    $('#OSC').prop('checked', checkCheckbox('Out of School Children (OSC)', dataString));

    // Disable checkboxes based on initial state
    const employedCheckbox = document.getElementById('employed');
    const unemployedCheckbox = document.getElementById('unemployed');
    unemployedCheckbox.disabled = employedCheckbox.checked;

    const studentCheckbox = document.getElementById('student');
    const OSYCheckbox = document.getElementById('OSY');
    const OSCCheckbox = document.getElementById('OSC');
    OSYCheckbox.disabled = studentCheckbox.checked;
    OSCCheckbox.disabled = studentCheckbox.checked;
}

// Call the function with the provided data
handleInitialCheckboxState(user.indicate_if);

// Event listeners to handle changes in checkbox state
document.getElementById('employed').addEventListener('change', function() {
    const unemployedCheckbox = document.getElementById('unemployed');
    unemployedCheckbox.disabled = this.checked;
});
document.getElementById('unemployed').addEventListener('change', function() {
    const employedCheckbox = document.getElementById('employed');
    employedCheckbox.disabled = this.checked;
});
document.getElementById('student').addEventListener('change', function() {
    const OSYCheckbox = document.getElementById('OSY');
    const OSCCheckbox = document.getElementById('OSC');
    OSYCheckbox.disabled = this.checked;
    OSCCheckbox.disabled = this.checked;
});
document.getElementById('OSY').addEventListener('change', function() {
    const studentCheckbox = document.getElementById('student');
    const OSCCheckbox = document.getElementById('OSC');
    studentCheckbox.disabled = this.checked;
    OSCCheckbox.disabled = this.checked;
});
document.getElementById('OSC').addEventListener('change', function() {
    const studentCheckbox = document.getElementById('student');
    const OSYCheckbox = document.getElementById('OSY');
    OSYCheckbox.disabled = this.checked;
    studentCheckbox.disabled = this.checked;
});





            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    }
    });

    $(document).ready(function(){
    // Function to handle form submission
    function updateProfile() {
        // Collect data from input fields
        var data = new FormData();
    data.append('reg_number', $('#id').val());
    data.append('fname', $('#fname').val());
    data.append('lname', $('#lname').val());
    data.append('mname', $('#mname').val());
    data.append('ext', $('#ext').val());
    data.append('address', $('#address').val());
    data.append('household', $('#household').val());
    data.append('Birth', $('#Birth').val());
    data.append('birthday', $('#birthday').val());
    data.append('age', $('#age').val());
    data.append('cnum', $('#cnum').val());
    data.append('gender', $('#gender').val());
    data.append('civil', $('#civil').val());
    data.append('citizenship', $('#citizenship').val());
    data.append('occupation', $('#occupation').val());
    data.append('owner', $('#owner').val());
    data.append('ownername', $('#ownername').val());
    data.append('numberoffam', $('#numberoffam').val());
    data.append('proofofowner', $('#proofofowner')[0].files[0]);
    data.append('image_filenme', $('#profile2x2')[0].files[0]);
    data.append('employed', $('#employed').is(':checked') ? $('#employed').val() : null);
        data.append('unemployed', $('#unemployed').is(':checked') ? $('#unemployed').val() : null);
        data.append('PWD', $('#PWD').is(':checked') ? $('#PWD').val() : null);
        data.append('OFW', $('#OFW').is(':checked') ?  $('#OFW').val() : null);
        data.append('soloparent', $('#soloparent').is(':checked') ?  $('#soloparent').val() : null);
        data.append('OSY', $('#OSY').is(':checked') ?  $('#OSY').val() : null);
        data.append('student', $('#student').is(':checked') ?  $('#student').val() : null);
        data.append('OSC', $('#OSC').is(':checked') ?  $('#OSC').val() : null);

    // Ajax request to update the profile
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Ajax request to update the profile
        $.ajax({
            url: "{{ route('user.update_profile') }}", // URL for updating the profile
            type: 'POST',
            headers: {
        'X-CSRF-TOKEN': csrfToken
    },
            data: data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response){
                
                // Handle success response
                // Check if proofofowner file field is empty and update the image accordingly
                if (response.proof_of_owner == null) {
                    $('#letter img').attr('src', "../residentprofile/1714143806_empty.png");
                } else {
                    $('#letter img').attr('src', "../residentprofile/" + response.proof_of_owner);   
                }
                // Set the input fields as valid after successful submission
                $('input, select, textarea').addClass('is-valid').removeClass('is-invalid');
                $('.valid-feedback').remove();
                $('.invalid-feedback').remove();
                $('input, select, textarea').parent().append('<div class="valid-feedback">Good.</div>');
                //refreshprofile();
                var message = "Updated successfully";
            // Show the toast notification with the dynamic message
            $('#liveToast .toast-body').text(message);
            $('#liveToast').toast('show');
            location.reload();
            },
            error: function(xhr, status, errorThrown) {
    console.error('AJAX request failed:', xhr, status, errorThrown);
    // Display validation errors
    if (xhr.responseJSON && xhr.responseJSON.errors) {
        $.each(xhr.responseJSON.errors, function(key, value) {
            var input = $('#' + key);
            input.addClass('is-invalid');
            input.parent().find('.valid-feedback').remove();
            input.parent().find('.invalid-feedback').remove(); // Remove previous error message
            input.parent().append('<div class="invalid-feedback">' + value + '</div>');
        });
    }else{
        $.each(xhr.responseJSON.errors, function(key, value) {
            var input = $('#' + key);
            input.addClass('is-valid');
            input.parent().find('.valid-feedback').remove();
            input.parent().find('.invalid-feedback').remove(); // Remove previous error message
            input.parent().append('<div class="valid-feedback">' + value + '</div>');
        });
    }
    $('input, select, textarea').each(function() {
        var input = $(this);
        var key = input.attr('name');

        // Check if the field has no error in the response JSON
        if (xhr.responseJSON && xhr.responseJSON.errors && !xhr.responseJSON.errors[key]) {
            // Check the input against specific validation rules
            if (key === 'lname' && input.val().match(/^[a-zA-Z\s ]+$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'fname' && input.val().match(/^[a-zA-Z\s ]+$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.invalid-feedback').remove();
                input.parent().find('.valid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            }else if (key === 'Birth' && input.val()) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'birthday' && input.val()) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'age' && input.val() && !isNaN(input.val()) && parseInt(input.val()) >= 15) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'cnum' && input.val().match(/[0-9]{2}-[0-9]{3}-[0-9]{4}/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.invalid-feedback').remove();
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'citizenship' && input.val().match(/^[a-zA-Z\s ]+$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'occupation' && input.val().match(/^[a-zA-Z\s ]+$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'email' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.val())) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'password' && /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/.test(input.val())) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            }else if (key === 'mname' && input.val().match(/^[a-zA-Z\s ]*$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'ext' && input.val().match(/^[a-zA-Z\s ]*$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'address' && input.val().match(/^[a-zA-Z0-9 .,()-]*$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'gender' && input.val() !== '') {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'civil' && input.val() !== '') {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'email' && input.val().match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            } else if (key === 'password' && input.val().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&_])[A-Za-z\d$@$!%*?&]{8,}$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            }else if (key === 'household' && input.val().match(/^[0-9]+$/)) {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
                input.parent().find('.valid-feedback').remove();
                input.parent().find('.invalid-feedback').remove();
                input.parent().append('<div class="valid-feedback">Good.</div>');
            }
            // Add similar checks for other fields
            // Add more conditions as needed for other fields
        }
    });
    
            }
        });
    }

    // Event listener for save changes button click
    $('.update-btn').click(function(){
        
        $('input, select, textarea').removeClass('is-invalid is-valid').siblings('.valid-feedback, .invalid-feedback').remove();
        updateProfile(); // Call the updateProfile function
    });
});
$(document).ready(function () {
        // Attach an event listener to the role select element
        $('#owner').on('change', function () {
            // Check if the selected value is 'owner'
            if ($(this).val() === 'May-Ari') {
                // If 'owner' is selected, display lname, fname, and mname in nameowner
                displayOwnerInfo();
                // Disable the nameowner input
                $('#ownername').prop('readonly', true);
                $('#proofofowner').prop('disabled', true);
            } else {
                // If another role is selected, clear nameowner and enable the input
                clearOwnerInfo();
                $('#ownername').prop('readonly', false);
                $('#proofofowner').prop('disabled', false);  
            }
        });
    function displayOwnerInfo() {
        var lname = $('#lname').val();
        var fname = $('#fname').val();
        var mname = $('#mname').val();
        var ext = $('#ext').val();
        $('#proofofowner').prop('disabled', true);
        // Concatenate lname, fname, and mname and set it as the value of nameowner
        $('#ownername').val(lname + ', ' + fname + ' ' + mname+' ' + ext);
    }
    function clearOwnerInfo() {
        // Clear the value of nameowner
        $('#ownername').val('');
    }  
    });
    function calculateAge() {
        var dob = document.getElementById("birthday_addmember").value;
        var today = new Date();
        var birthDate = new Date(dob);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        document.getElementById("age_addmember").value = age;
    }

    const birthdayInput = document.getElementById('birthday');
                    const ageInput = document.getElementById('age');
                    const age_member = document.getElementById('age_member');
                    const bday_member = document.getElementById('bday_member');

                    // Add event listener to the birthday input
                    birthdayInput.addEventListener('change', function() {
                        // Get the selected birthday value
                        const selectedDate = new Date(this.value);
                        const today = new Date();

                        // Calculate the age
                        let age = today.getFullYear() - selectedDate.getFullYear();
                        const monthDiff = today.getMonth() - selectedDate.getMonth();
                        
                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < selectedDate.getDate())) {
                            age--;
                        }

                        // Update the age input value
                        ageInput.value = age;
                    });
                 
                    const mobileInput = document.getElementById('cnum');

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
<!-- JavaScript/jQuery code to collect data and send AJAX request -->
<script>
$(document).ready(function() {
    $('.addmember-btn').click(function() {
        $('input, select, textarea').removeClass('is-invalid').addClass('is-valid');
    $('.valid-feedback').remove();
    $('.invalid-feedback').remove();
    $('input, select, textarea').removeClass('is-invalid is-valid');
    $('.valid-feedback, .invalid-feedback').remove();
        // Collect data from modal fields
        var lname = $('#lname_addmember').val();
        var fname = $('#fname_addmember').val();
        var mname = $('#mname_addmember').val();
        var ext = $('#ext_addmember').val();
        var household = $('#household_addmember').val();
        var birthplace = $('#Birth_addmember').val();
        var birthday = $('#birthday_addmember').val();
        var age = $('#age_addmember').val();
        var cnum = $('#cnum_addmember').val();
        var gender = $('#gender_addmember').val();
        var civil_status = $('#civil_addmember').val();
        var citizenship = $('#citizenship_addmember').val();
        var occupation = $('#occupation_addmember').val();
        var profile2x2 = $('#profile2x2_addmember')[0].files[0]; // File input
        var voters = $('#voters')[0].files[0]; // File input

        // Create a FormData object to send files
        var formData = new FormData();
        formData.append('lname', lname);
        formData.append('fname', fname);
        formData.append('mname', mname);
        formData.append('ext', ext);
        formData.append('household', household);
        formData.append('birthplace', birthplace);
        formData.append('birthday', birthday);
        formData.append('age', age);
        formData.append('gender', gender);
        formData.append('civil_status', civil_status);
        formData.append('citizenship', citizenship);
        formData.append('occupation', occupation);
        formData.append('profile2x2', profile2x2);
        formData.append('voters', voters);
        formData.append('employed', $('#employed_addmember').is(':checked') ? $('#employed_addmember').val() : null);
        formData.append('unemployed', $('#unemployed_addmember').is(':checked') ? $('#unemployed_addmember').val() : null);
        formData.append('PWD', $('#PWD_addmember').is(':checked') ? $('#PWD_addmember').val() : null);
        formData.append('OFW', $('#OFW_addmember').is(':checked') ?  $('#OFW_addmember').val() : null);
        formData.append('soloparent', $('#soloparent_addmember').is(':checked') ?  $('#soloparent_addmember').val() : null);
        formData.append('OSY', $('#OSY_addmember').is(':checked') ?  $('#OSY_addmember').val() : null);
        formData.append('student', $('#student_addmember').is(':checked') ?  $('#student_addmember').val() : null);
        formData.append('OSC', $('#OSC_addmember').is(':checked') ?  $('#OSC_addmember').val() : null);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Send AJAX request
        $.ajax({
            url: "{{ route('user.store') }}",
            method: 'POST',
            data: formData,
            headers: {
        'X-CSRF-TOKEN': csrfToken
    },
            contentType: false,
            processData: false,
            success: function(response) {
            // Clear form fields
            $('input, select, textarea').val('');
            
            // Remove validation classes and messages
            $('input, select, textarea').removeClass('is-invalid').addClass('is-valid');
            $('.valid-feedback').remove();
            $('.invalid-feedback').remove();
            
            // Append "Good" feedback to form elements
            $('input, select, textarea').parent().append('<div class="valid-feedback">Good.</div>');
            
            // Close the modal
            $('#addmember').modal('hide');
            
            // Set the message for the toast notification
            var message = "Family Member added successfully";
            // Show the toast notification with the dynamic message
            $('#liveToast .toast-body').text(message);
            $('#liveToast').toast('show');
            displaymember();
            // Log success response
            console.log(response);
            location.reload();
            },

            error: function(xhr, status, errorThrown) {
                console.error('AJAX request failed:', xhr, status, errorThrown);
                
        // Display validation errors
        // Display validation errors
if (xhr.responseJSON && xhr.responseJSON.errors) {
    $.each(xhr.responseJSON.errors, function(key, value) {
        $('#liveToastdanger .toastdanger').text(value);
            $('#liveToastdanger').toast('show');
    });
} else {
    // Clear previous error messages
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    // Check for success messages
    if (xhr.responseJSON && xhr.responseJSON.success) {
        $.each(xhr.responseJSON.success, function(key) {
            var input = $('#' + key + '_addmember');
            input.removeClass('is-invalid').addClass('is-valid');
            input.parent().find('.valid-feedback').remove();
            input.parent().find('.invalid-feedback').remove(); // Remove previous error message
            input.parent().append('<div class="valid-feedback">Good.</div>');
        });
    } else {
        // Display a generic error message if no success message found
        $('#error-message-container').html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
    }
}

  
            }
        });
    });

});
function displaymember() {
$.ajax({
    url:  "{{ route('user.display') }}",
    type: 'GET',
    success: function(response) {
        $('#team-container').empty(); 
        // Assuming response is an array of member objects
        $.each(response, function(index, member) {
            var mname;
            var ext;

            if(member.mname == null){
                mname = "";
            }else{
                mname = member.mname ;
            }
            if(member.ext == null){
                ext = "";
            }else{
                ext = member.ext ;
            }
             
            var html = '<div class="col-12 col-sm-6 col-md-4 col-lg-3">';
            html += '<div class="our-team">';
            html += '<div class="picture">';
            html += '<img class="img-fluid rounded-circle" src="../residentprofile/' + member.profile2x2 + '" style="width: 356px; height: 356px;">';
            html += '</div>';
            html += '<div class="team-content">';
            html += '<h3 class="name">' + member.lname+", " + member.fname  +" "+ mname + ext +'</h3>';
            html += '<h4 class="title">' + member.household + '</h4>';
            html += '</div>';
            html += '<ul class="social">';
            html += '<li><a href="' + member.id + '" class="view-member-link" data-member-id="' + member.id + '">👁 View</a></li>';
            html += '<li><a href="' + member.id + '" class="edit-member-link" data-member-id="' + member.id + '">✎ Edit</a></li>';
            html += '<li><a href="' + member.id + '" class="delete-member" data-member-id="' + member.id + '">🗑 Delete</a></li>';
            html += '</ul>';
            html += '</div>';
            html += '</div>';

            // Append the generated HTML to the container
            $('#team-container').append(html);
        });
        $('.delete-member').click(function(e) {
                e.preventDefault();
                var memberId = $(this).data('member-id');
                // Call a function to delete the member with memberId
                deleteMember(memberId);
            });
       // Add click event listener to the edit link for each member
$('.edit-member-link').click(function(e) {
    e.preventDefault();
    
    // Get the member ID from the data attribute of the edit link
    var memberId = $(this).data('member-id');
    
    // Fetch member data using AJAX
    $.ajax({
        url: '/User/edit/' + memberId, // Replace with your API endpoint to fetch member data
        type: 'GET',
        success: function(response) {
            // Populate input fields with member data
            $('#lname_editmember').val(response.lname);
            $('#id_editmember').val(response.id);
            $('#fname_editmember').val(response.fname);
            $('#mname_editmember').val(response.mname);
            $('#ext_editmember').val(response.ext);
            $('#household_editmember').val(response.household);
            $('#Birth_editmember').val(response.birthplace);
            $('#birthday_editmember').val(response.birthday);
            $('#age_editmember').val(response.age);
            $('#gender_editmember').val(response.gender);
            $('#civil_editmember').val(response.civil_status);
            $('#citizenship_editmember').val(response.citizenship);
            $('#occupation_editmember').val(response.occupation);
            function checkCheckbox(value, dataString) {
    if (!dataString || dataString === 'null') return false; // If the string is null or 'null', return false
    var values = dataString.split(','); // Split the string by comma
    // Filter out 'null' values
    values = values.filter(function(item) {
        return item.trim() !== 'null';
    });
    console.log('Original values:', dataString); // Log the original values
    console.log('Values after removing null:', values); // Log the values after removing null
    // Check if the desired value exists in the filtered values
    for (var i = 0; i < values.length; i++) {
        console.log('Checking value:', values[i].trim());
        if (values[i].trim() === value) {
            return true;
        }
    }
    return false;
}
console.log('Response indicate_if_members:', response.indicate_if);
// Test the function with the provided data
$('#employed_editmember').prop('checked', checkCheckbox('Employed', response.indicate_if));
$('#unemployed_editmember').prop('checked', checkCheckbox('Unemployed', response.indicate_if));
$('#PWD_editmember').prop('checked', checkCheckbox('PWD', response.indicate_if));
$('#OFW_editmember').prop('checked', checkCheckbox('OFW', response.indicate_if));
$('#soloparent_editmember').prop('checked', checkCheckbox('Solo Parent', response.indicate_if));
$('#OSY_editmember').prop('checked', checkCheckbox('Out of School Youth (OSY)', response.indicate_if));
$('#student_editmember').prop('checked', checkCheckbox('Student', response.indicate_if));
$('#OSC_editmember').prop('checked', checkCheckbox('Out of School Children (OSC)', response.indicate_if));
            // Show the modal with the populated data
            $('#editMemberModal').modal('show');
        },
        error: function(xhr, status, errorThrown) {
            console.error('AJAX request failed:', xhr, status, errorThrown);
            // Handle error response
        }
    });
});
$('.view-member-link').click(function(e) {
    e.preventDefault();
    
    // Get the member ID from the data attribute of the edit link
    var memberId = $(this).data('member-id');
    var mname;
    var ext;
    // Fetch member data using AJAX
    $.ajax({
        url: '/User/edit/' + memberId, // Replace with your API endpoint to fetch member data
        type: 'GET',
        success: function(response) {
            if(response.mname == null){
                mname = " ";
            }else{
                mname= response.mname;
            }
            if(response.ext == null){
                ext =" ";
            }else{
                ext= response.ext;
            }
            // Populate input fields with member data
            $('#nameidsplay').text(response.lname + ' ' + response.fname + ' ' + mname + ' ' + ext);
            $('#profilePic').attr('src', "../residentprofile/"+response.profile2x2);
            $('#birthdaydsiplay').text("Birthday: "+response.birthday);
            $('#agedisplay').text("Age: "+response.age);
            $('#birthdisplay').text("Birth Place: "+response.birthplace);
            $('#genderdisplay').text("Gender: "+response.gender);
            $('#occupationdisplay').text("Occupation: "+response.occupation);
            $('#civildisplay').text("Civil Status: "+response.civil_status);
            $('#citizendisplay').text("Citizenship: "+response.citizenship);
            $('#personaldisplay').text("Perosnal Status: "+response.indicate_if);
            $('#statusdisplay').text(response.household);
            $('#controll').text("REG_MEMBER_"+response.id);
            $('#statusacc').text(response.Status);
            function checkCheckbox(value, dataString) {
    if (!dataString || dataString === 'null') return false; // If the string is null or 'null', return false
    var values = dataString.split(','); // Split the string by comma
    // Filter out 'null' values
    values = values.filter(function(item) {
        return item.trim() !== 'null';
    });
    console.log('Original values:', dataString); // Log the original values
    console.log('Values after removing null:', values); // Log the values after removing null
    $('#personaldisplay').text("Perosnal Status: "+values);
    // Check if the desired value exists in the filtered values
    for (var i = 0; i < values.length; i++) {
        console.log('Checking value:', values[i].trim());
        if (values[i].trim() === value) {
            return true;
        }
    }
    return false;
}
console.log('Response indicate_if_members:', response.indicate_if);
// Test the function with the provided data
$('#employed_editmember').prop('checked', checkCheckbox('Employed', response.indicate_if));
$('#unemployed_editmember').prop('checked', checkCheckbox('Unemployed', response.indicate_if));
$('#PWD_editmember').prop('checked', checkCheckbox('PWD', response.indicate_if));
$('#OFW_editmember').prop('checked', checkCheckbox('OFW', response.indicate_if));
$('#soloparent_editmember').prop('checked', checkCheckbox('Solo Parent', response.indicate_if));
$('#OSY_editmember').prop('checked', checkCheckbox('Out of School Youth (OSY)', response.indicate_if));
$('#student_editmember').prop('checked', checkCheckbox('Student', response.indicate_if));
$('#OSC_editmember').prop('checked', checkCheckbox('Out of School Children (OSC)', response.indicate_if));
            // Show the modal with the populated data
            $('#residentDetailsModal').modal('show');
        },
        error: function(xhr, status, errorThrown) {
            console.error('AJAX request failed:', xhr, status, errorThrown);
            // Handle error response
        }
    });
});

    },
    error: function(xhr, status, errorThrown) {
        console.error('AJAX request failed:', xhr, status, errorThrown);
    }
});
}
function deleteMember(memberId) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Send AJAX request to delete the member
    if (confirm('Are you sure you want to delete this member?')) {
    $.ajax({
        url: '/User/members/' + memberId, // Correct route URL
        type: 'DELETE',
        headers: {
        'X-CSRF-TOKEN': csrfToken
    },
        contentType: false,
        processData: false,
        success: function(response) {
            // Handle success response
            console.log('Member deleted successfully:', response);
            // Refresh the member list after deletion
            displaymember();
        },
        error: function(xhr, status, errorThrown) {
            console.error('AJAX request failed:', xhr, status, errorThrown);
            // Handle error response
        }
    });
}
}


$('.editmember-btn').click(function(e) {
    e.preventDefault();

var memberId = $('#id_editmember').val();
var lname = $('#lname_editmember').val();
$('input, select, textarea').removeClass('is-invalid is-valid');
    $('.valid-feedback, .invalid-feedback').remove();
var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Gather updated member data from the modal's input fields
    var updatedData = new FormData();

// Append data to the FormData object
updatedData.append('id', memberId);
updatedData.append('lname',lname);
updatedData.append('fname', $('#fname_editmember').val());
updatedData.append('mname', $('#mname_editmember').val());
updatedData.append('ext', $('#ext_editmember').val());
updatedData.append('household', $('#household_editmember').val());
updatedData.append('Birth', $('#Birth_editmember').val());
updatedData.append('birthday', $('#birthday_editmember').val());
updatedData.append('age', $('#age_editmember').val());
updatedData.append('gender', $('#gender_editmember').val());
updatedData.append('civil_status', $('#civil_editmember').val());
updatedData.append('citizenship', $('#citizenship_editmember').val());
updatedData.append('occupation', $('#occupation_editmember').val());
updatedData.append('profile2x2', $('#profile2x2_editmember')[0].files[0]);
updatedData.append('voters', $('#votersupdate')[0].files[0]);

// Checkboxes
updatedData.append('employed', $('#employed_editmember').is(':checked') ? $('#employed_editmember').val() : null);
updatedData.append('unemployed', $('#unemployed_editmember').is(':checked') ? $('#unemployed_editmember').val() : null);
updatedData.append('PWD', $('#PWD_editmember').is(':checked') ? $('#PWD_editmember').val() : null);
updatedData.append('OFW', $('#OFW_editmember').is(':checked') ? $('#OFW_editmember').val() : null);
updatedData.append('soloparent', $('#soloparent_editmember').is(':checked') ? $('#soloparent_editmember').val() : null);
updatedData.append('OSY', $('#OSY_editmember').is(':checked') ? $('#OSY_editmember').val() : null);
updatedData.append('student', $('#student_editmember').is(':checked') ? $('#student_editmember').val() : null);
updatedData.append('OSC', $('#OSC_editmember').is(':checked') ? $('#OSC_editmember').val() : null);

    console.log("This is the lname: "+lname);
    // Send AJAX request to update member data
    $.ajax({
        url: "{{route('members.update')}}", // Replace with your update route
        type: 'Post', // Use PUT method for updates
        data: updatedData,
        headers: {
        'X-CSRF-TOKEN': csrfToken
    },
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('AJAX request Success:', response);
            $('input, select, textarea').val('');
            
            // Remove validation classes and messages
            $('input, select, textarea').removeClass('is-invalid').addClass('is-valid');
            $('.valid-feedback').remove();
            $('.invalid-feedback').remove();
            
            // Append "Good" feedback to form elements
            $('input, select, textarea').parent().append('<div class="valid-feedback">Good.</div>');
            
            // Close the modal
            $('#addmember').modal('hide');
            
            // Set the message for the toast notification
            var message = "Family Member Updated successfully";
            // Show the toast notification with the dynamic message
            $('#liveToast .toast-body').text(message);
            $('#liveToast').toast('show');
            displaymember();
            // Log success response
            console.log(response);
            location.reload();
            // Handle success response
            $('#editMemberModal').modal('hide'); // Close modal after successful update
            // You might want to show a success message or update the UI here
            
        },
        error: function(xhr, status, errorThrown) {
                console.error('AJAX request failed:', xhr, status, errorThrown);
                    // Display validation errors
                    // Display validation errors
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function(key, value) {
                    var input = $('#' + key + '_editmember');
                    input.addClass('is-invalid').removeClass('is-valid');
                    input.parent().find('.valid-feedback').remove();
                    input.parent().find('.invalid-feedback').remove(); // Remove previous error message
                    input.parent().append('<div class="invalid-feedback">' + value + '</div>');
                });
            } else {
                // Clear previous error messages
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                // Check for success messages
                if (xhr.responseJSON && xhr.responseJSON.success) {
                    $.each(xhr.responseJSON.success, function(key) {
                        var input = $('#' + key + '_editmember');
                        input.removeClass('is-invalid').addClass('is-valid');
                        input.parent().find('.valid-feedback').remove();
                        input.parent().find('.invalid-feedback').remove(); // Remove previous error message
                        input.parent().append('<div class="valid-feedback">Good.</div>');
                    });
                } else {
                    // Display a generic error message if no success message found
                    $('#error-message-container').html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
                }
            }
        }
    });
});

</script>

 

</body>
</html>