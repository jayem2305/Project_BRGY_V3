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
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
    // JavaScript to handle certificate search
            $(document).ready(function () {
                $('#Searchbar').on('input', function () {
                    var searchValue = $(this).val().toLowerCase();

            // Move matched cards to the top and set the layout class
                    $('#certificateCards .card').each(function () {
                        var certificateName = $(this).find('.card-title').text().toLowerCase();
                        if (certificateName.includes(searchValue)) {
                            $(this).prependTo('#certificateCards');
                    $(this).addClass('col-lg-4 mb-3 mb-sm-0') // Change the layout class as needed
                } else {
                    $(this).addClass('col-lg-4 mb-3 mb-sm-0'); // Reset the layout class
                }
            });

            // Hide non-matching cards
                    $('#certificateCards .card').each(function () {
                        var certificateName = $(this).find('.card-title').text().toLowerCase();
                        if (certificateName.includes(searchValue)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });

            // Show all cards if search is empty
                    if (searchValue === '') {
                $('#certificateCards .card').show().addClass('col-lg-4 mb-3 mb-sm-0');  // Reset the layout class
            }

            // Handle case when no matching certificates are found
            var visibleCards = $('#certificateCards .card:visible').length;
            if (visibleCards === 0) {
                alert('No matching certificates found.');
                // You can also add logic to display a message or perform other actions.
            }
        });
            });

// Assuming you're using jQuery
// Ajax Call
var selectedValue; // Define selectedValue outside of event handlers
var selectedAge = null;
var selectedImageFilename = null;
$('.names_display').change(function() {
    // Get the selected option's value and text
    selectedValue = $(this).val(); // Update the value of selectedValue
    var selectedText = $(this).find('option:selected').text();
    
    // Update the text of a separate element to display the selected option
    $('.selected_option_display').text(selectedText);
});




$('.names_display').click(function() {
    $.ajax({
        url: '{{ route("related-data") }}',
        type: 'GET',
        success: function(data) {
            // Clear existing options before populating new ones
            $('.names_display').empty();
            // Add a default option
            // Check if data is not empty
            if (data.length > 0) {
                // Loop through fetched data and append options
                $.each(data, function(index, fullName) {
                    $('.names_display').append($('<option>', {
                        value: fullName.name,
                        text: fullName.name
                    }));
                    if (fullName.name === selectedValue) {
                        selectedAge = fullName.age;
                        
                    }
                    selectedImageFilename = fullName.profile2x2;
                    
                });
            } else {
                console.log('No data found');
            }
            // If there's a selected value, set it as selected
            if (selectedValue) {
                $('.names_display').val(selectedValue);
            }
           
            if (selectedAge && selectedAge < 18) {
                document.getElementById("minordisplay").style.display = "block";
            } else {
                document.getElementById("minordisplay").style.display = "none";
            }
            $('#childdisplay').empty();
            if (selectedImageFilename) {
                $.each(data, function(index, fullName) {
            if (fullName.profile2x2) {
                var imageUrl = '../residentprofile/' + fullName.profile2x2; // Update the path to your image directory
                var imageElement = $('<img>', {
                    src: imageUrl,
                    alt: fullName.name + ' Image',
                    class: 'img-thumbnail mx-auto d-block',
                    height: '150', // Set the height here (e.g., '100px', '50%', etc.)
                    width: '150' // Set the width here (e.g., '100px', '50%', etc.)
                });
                var labelElement = fullName.name;
                var checkboxElement = $('<input>', {
                    type: 'checkbox',
                    text: fullName.name,
                    value: fullName.name,
                    class: 'form-check-input mt-0'
                });
                var colDiv = $('<div>', {
                    class: 'col-3 text-center'
                }).append(imageElement,checkboxElement,labelElement);
                $('#childdisplay').append(colDiv);
            }
        });
            } else {
                // If no image filename is available, clear the childdisplay div
                $('#childdisplay').empty();
            }
        

        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
        var purposeSelect = document.getElementById("purpose");
        var purposecertSelect = document.getElementById("purposecert");
        var otherPurposeInput = document.getElementById("otherpurpose");
        var otherPurposecertInput = document.getElementById("otherpurposecert");

        purposeSelect.addEventListener("change", function() {
            if (purposeSelect.value === "Others") {
                otherPurposeInput.style.display = "block";
            } else {
                otherPurposeInput.style.display = "none";
            }
        });
        purposecertSelect.addEventListener("change", function() {
            if (purposecertSelect.value === "Others") {
                otherPurposecertInput.style.display = "block";
            } else {
                otherPurposecertInput.style.display = "none";
            }
        });
    });
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
        displaytable();
    $('.upload-indigency').click(function (e) {
        var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters').val();
    var name = $('#names_display').val();
    var copy = $('#copy').val();
    var purpose = $('#purpose').val();
    var otherpurpose = $('#otherpurpose').val();
    var fileInput = $('#requirements')[0].files[0];
    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('requirements', fileInput);
    formData.append('purpose', purpose);
    formData.append('otherpurpose', otherpurpose);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.indigency.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            displaytable();
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
$('.upload-bpermit').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('.voters').val();
    var name = $('#names_display_bpermit').val();
    var copy = $('#copy_bpermit').val();
    var bname = $('#bname').val();
    var baddress = $('#baddress').val();
    var fileInput = $('#requirements_bpermit')[0].files[0];
    var formData = new FormData(); // Assuming your form is within the #modalBpermit modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('bname', bname);
    formData.append('baddress', baddress);
    formData.append('requirements_bpermit', fileInput);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.business.permit") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
        toggleSpinner(button, false);

            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#modalBpermit').modal('hide');
            $('.voters, #names_display_bpermit, #bname, #baddress').val('');
            $('#copy_bpermit').val(1);
            $('#requirements_bpermit').val(null);
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
$('.upload-cessation').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters_cessation').val();
    var name = $('#names_display').val();
    var copy = $('#copy_cessation').val();
    var bname = $('#cbname').val();
    var CEOname = $('#CEOname').val();
    var cbaddress = $('#cbaddress').val();
    var fileInput = $('#requirements_display')[0].files[0];
    var formData = new FormData();
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy_cessation', copy);
    formData.append('bname', bname);
    formData.append('CEOname', CEOname);
    formData.append('cbaddress', cbaddress);
    formData.append('requirements', fileInput);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.cessation") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
        toggleSpinner(button, false);
            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#modalBcessation').modal('hide');
            $('#voters_cessation, #names_display, #cbname, #CEOname, #cbaddress').val('');
            $('#copy_cessation').val(1);
            $('#requirements_display').val(null);

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

$('.upload-certifictae').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters_cert').val();
    var name = $('#names_display_cert').val();
    var copy = $('#copy_cert').val();
    var purpose = $('#purposecert').val();
    var otherpurpose = $('#otherpurposecert').val();
    var fileInput = $('#requirements_cert')[0].files[0];
    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('requirements', fileInput);
    formData.append('purpose', purpose);
    formData.append('otherpurpose', otherpurpose);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.certificate.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // Show success toast message
        toggleSpinner(button, false);
            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#exampleModalCertificate').modal('hide');
            $('#otherpurposecert').val('');
            $('#voters_cert, #names_display_cert, #purposecert, #otherpurposecert, #requirements_cert').val('');
            $('#copy_cert').val(1);
            $('#requirements_display').val(null);
            
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

$('.upload-soloparent').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters_solo').val();
    var name = $('#names_display_solo').val();
    var copy = $('#copy_solo').val();
    var fileInput = $('#requirements_solo')[0].files[0];
    var selectedChildren = [];
    $('#childdisplay input[type="checkbox"]').each(function() {
        if ($(this).is(':checked')) {
            selectedChildren.push($(this).val());
        }
    });
    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('requirements', fileInput);
    formData.append('selectedChildren', JSON.stringify(selectedChildren));

    console.log(selectedChildren);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.soloparent.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // Show success toast message
        toggleSpinner(button, false);
            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#otherpurposecert').val('');
            $('#exampleModalsolo').modal('hide');
            $('#voters_solo, #names_display_solo, #requirements_solo, #childdisplay').val('');
            $('#copy_solo').val(1);
            $('#requirements_display').val(null);

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

$('.upload-ftj').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters_ftj').val();
    var name = $('#names_display_ftj').val();
    var copy = $('#copy_ftj').val();
    var fileInput = $('#requirements_ftj')[0].files[0];
    var type = $('#ftjtypes').val();
    var numlive = $('#numberofliving').val();
    var dayslive = $('#typeofdays').val();
    var number_day = numlive + " " + dayslive;
    var pname = $('#pname').val();
    var page = $('#page').val();
    var paddress = $('#paddress').val();
    var fileInputparent = $('#requirements_parents_ftj')[0].files[0];

    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('requirements', fileInput);
    formData.append('type', type);
    formData.append('pname', pname);
    formData.append('page', page);
    formData.append('paddress', paddress);
    formData.append('fileInputparent', fileInputparent);
    formData.append('number_day', number_day);

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.ftj.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // Show success toast message
        toggleSpinner(button, false);
            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#otherpurposecert').val('');
            $('#exampleModalftjcert').modal('hide');
            $('#voters_ftj, #names_display_ftj, #requirements_ftj, #ftjtypes,#numberofliving,#typeofdays,#pname,#page,#paddress ').val('');
            $('#copy_ftj').val(1);
            $('#requirements_display').val(null);
            $('#requirements_parents_ftj').val(null);
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

$('.upload-goodmoral').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters_goodmoral').val();
    var name = $('#names_display_goodmoral').val();
    var copy = $('#copy_goodmoral').val();
    var purpose = $('#goodmoral').val();
    var fileInput = $('#requirements_goodmoral')[0].files[0];
    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('requirements', fileInput);
    formData.append('purpose', purpose);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.goodmoral.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // Show success toast message
        toggleSpinner(button, false);
            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#exampleModalgoodmoral').modal('hide');
            //$('#otherpurposecert').val('');
            $('#voters_goodmoral, #names_display_goodmoral, #goodmoral, #requirements_goodmoral').val('');
            $('#copy_goodmoral').val(1);
            $('#requirements_goodmoral').val(null);
            
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

$('.upload-lawincome').click(function (e) {
    var button = this; // Reference to the clicked button
    toggleSpinner(button, true);
    e.preventDefault();
    var voters = $('#voters_lawincome').val();
    var name = $('#names_display_lawincome').val();
    var copy = $('#copy_lawincome').val();
    var purpose = $('#lawincome').val();
    var fileInput = $('#requirements_lawincome')[0].files[0];
    var formData = new FormData(); // Assuming your form is within the #exampleModal modal
    formData.append('voters', voters);
    formData.append('name', name);
    formData.append('copy', copy);
    formData.append('requirements', fileInput);
    formData.append('purpose', purpose);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '{{ route("submit.lawincome.request") }}',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // Show success toast message
        toggleSpinner(button, false);
            displaytable();
            $('#display').text('successfully Requested');
            $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
            $('.toast-body').text('Request submitted successfully.');
            $('.toast').toast('show');
            $('#exampleModallawincome').modal('hide');
            //$('#otherpurposecert').val('');
            $('#voters_lawincome, #names_display_lawincome, #lawincome, #requirements_lawincome').val('');
            $('#copy_lawincome').val(1);
            $('#requirements_lawincome').val(null);
            
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
var idInput;
function displaytable(){
    var dataTable = $('#myTable').DataTable();
    $.ajax({
        url: '{{ route("getData") }}',
        type: 'GET',
        success: function (response) {
            console.log(response);
            // Clear existing table data
            dataTable.clear().draw();
            var counter = 1;
            var button;
            
            // Process the response and update the HTML table
            $.each(response, function (key, value) {
                if (Array.isArray(value)) {
                    value.forEach(function (item) {
                        
                        if(item.status == "Cancelled"){
                            button = $('<h4>').text('Cancelled').addClass('text-danger text-center'); 
                        }else if(item.status == "Approved"){
                            button = $('<h4>').text('In Process').addClass('text-warning text-center'); 
                        }else if(item.status == "Ready To Claim"){
                            button = $('<h4>').text('Ready To claim').addClass('text-success text-center'); 
                        }else if(item.status == "Claimed"){
                            button = $('<h4>').text('Claimed').addClass('text-success text-center'); 
                        }else if(item.status == "Declined"){
                            button = $('<h4>').text('Declined').addClass('text-danger text-center'); 
                        }
                        else{
                            var icon = $('<i>').addClass('bi bi-x-circle-fill'); // Create the icon element
                            button = $('<button>').addClass('btn btn-danger btn-lg d-grid gap-2 mx-auto cancel-request').append(icon).attr('type', 'submit').click(function () {}); // Append the icon to the button
                                                }   

                       
                        var formattedDate = formatDate(item.created_at);
                        var formattedtimes = formattime(item.created_at);
                        var formatDatecontrolls = formatDatecontroll(item.created_at);
                        var controlNumber = getControlNumber(key, formatDatecontrolls, item.id);
                        var buttonHtml = '<input type="hidden" class="row-id" value="' + item.id + '">' + '<input type="hidden" class="row-type" value="' + item.type + '">' + button.prop('outerHTML');
                        var purpose = item.otherpurpose != null ? item.otherpurpose : item.purpose;
                        idInput = item.id;
                        if(key == "first_time_job_seeker"){
                            purpose = item.type;
                        }else if(key == "solo_parent"){
                            purpose = item.type;
                        }else if(key == "business_permit"){
                            purpose = item.type;
                        }else if(key == "business_cessation"){
                            purpose = item.type;
                        }
                        dataTable.row.add([
                            counter++, 
                            controlNumber,
                            formattedDate,
                            formattedtimes,
                            item.name,
                            item.type,
                            purpose,
                            item.copy,
                            buttonHtml
                        ]).draw(false);
                        
                    });
                    
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}
$(document).ready(function() {
    // Attach click event handler to a parent element (e.g., #myTable)
    $('#myTable').on('click', '.cancel-request', function (e) {
        e.preventDefault(); // Prevent default action of the click event

        // Ask for user permission
        var confirmCancel = confirm("Are you sure you want to cancel this request?");
        if (!confirmCancel) {
            return; // Exit if the user cancels
        }

        var button = this; // Reference to the clicked button
        toggleSpinner(button, true);
        var id = $(this).closest('tr').find('.row-id').val(); // Retrieve the ID from the hidden input field in the same row as the clicked button
        var type = $(this).closest('tr').find('.row-type').val(); // Retrieve the type from the hidden input field in the same row as the clicked button
        console.log(id + " " + type);

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route("cancel.request") }}',
            type: 'POST',
            data: {
                id: id,
                type: type
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                console.log(response);
                // Reload table data after successful cancellation
                toggleSpinner(button, false);
                displaytable();
                // Show success toast message
                $('#display').text('Request Cancelled');
                $('.toast').removeClass('text-bg-danger').addClass('text-bg-success');
                $('.toast-body').text('Request cancelled successfully.');
                $('.toast').toast('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseJSON);
                var errorMessage = xhr.responseJSON.error;
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

// Function to generate control number based on table and date
function getControlNumber(table, date, id) {
    var prefix = '';
    switch (table) {
        case 'indigency_requests':
            prefix = 'BI';
            break;
        case 'certificate':
            prefix = 'CERT';
            break;
        case 'business_permit':
            prefix = 'BP';
            break;
        case 'business_cessation':
            prefix = 'BC';
            break;
        case 'first_time_job_seeker':
            prefix = 'FTJ';
            break;
        case 'solo_parent':
            prefix = 'SP';
            break;
        default:
            prefix = 'UNKNOWN';
            break;
    }
    return prefix + '_' + date + '_' + id;
}

});
function formatDate(dateString) {
    var date = new Date(dateString);
    var options = { year: 'numeric', month: 'short', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}
function formattime(dateString) {
    var date = new Date(dateString);
    var hour = date.getHours().toString().padStart(2, '0'); // Adding leading zero
    var minute = date.getMinutes().toString().padStart(2, '0'); // Adding leading zero
    var second = date.getSeconds().toString().padStart(2, '0'); // Adding leading zero
    var ampm = (hour >= 12) ? 'PM' : 'AM';
    hour = (hour % 12 === 0) ? 12 : hour % 12; // Convert to 12-hour format
    return hour + ':' + minute + ':' + second + ' ' + ampm;
}

function formatDatecontroll(dateString) {
    var date = new Date(dateString);
    var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Adding leading zero
    var day = date.getDate().toString().padStart(2, '0'); // Adding leading zero
    var year = date.getFullYear();
    return month + day + year;
}
$(document).ready(function() {
    $('.logout-btn').click(function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Make an AJAX request to the logout endpoint
        $.ajax({
            url: '/logout',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                // Handle success response
                console.log(response.message);
                // Redirect to homepage or do other actions if needed
                window.location.href = '/';
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                // Redirect to homepage or do other actions if needed
                window.location.href = '/';
            }
        });
    });
});
    
        </script>