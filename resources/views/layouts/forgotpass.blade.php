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
   

   @yield("content_forgotpass")
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
                      document.addEventListener('DOMContentLoaded', function() {
                        // Get the URL path
                        const urlPath = window.location.pathname;

                        // Extract the regnum from the URL path
                        const regnum = urlPath.split('/').pop();

                        // Log the value to the console
                        console.log("Regnum: " + regnum);

                        // Set the value of the hidden input field
                        document.getElementById('idnumber').value = regnum;
                    });

               const passwordInput = document.getElementById('password');
               const passwordInput2 = document.getElementById('confirmpassword');
               const toggleButton = document.getElementById('togglePassword');
               const toggleButton2 = document.getElementById('togglePassword2');
               const eyeIcon = document.getElementById('eyeIcon');
               const eyeIcon2 = document.getElementById('eyeIcon2');
               document.getElementById('password').addEventListener('input', updatePasswordRequirements);

               let isPasswordVisible = false;

               toggleButton.addEventListener('click', () => {
                if (isPasswordVisible) {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                }
                isPasswordVisible = !isPasswordVisible;
            });
       toggleButton2.addEventListener('click', () => {
                if (isPasswordVisible) {
                    passwordInput2.type = 'password';
                    eyeIcon2.classList.remove('bi-eye');
                    eyeIcon2.classList.add('bi-eye-slash');
                } else {
                    passwordInput2.type = 'text';
                    eyeIcon2.classList.remove('bi-eye-slash');
                    eyeIcon2.classList.add('bi-eye');
                }
                isPasswordVisible = !isPasswordVisible;
            });

function updatePasswordRequirements() {
    var pass = document.getElementById('password').value;
    var passwordRequirements = document.getElementById('password-requirements');
    // Define the password requirements
    var hasMinLength = pass.length >= 8;
    var hasUppercase = /[A-Z]/.test(pass);
    var hasNumber = /\d/.test(pass);
    var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(pass);

    // Update the display based on the requirements
    passwordRequirements.innerHTML = "Password must have at least 8 characters, at least 1 uppercase letter, 1 number, and 1 special character.";
    if (hasMinLength && hasUppercase && hasNumber && hasSpecialChar) {
      passwordRequirements.style.color = 'green';
      passwordRequirements.innerHTML = 'Password meets the requirements.';
  } else {
      passwordRequirements.style.color = 'red';
  }
}
               $(document).ready(function(){
                // Function to get URL parameter
                $(document).on('click', '.forgotpass-btn', function () {
                        $('#load').show();
                        $('#svg').hide();
                        var password = $('#password').val();
                        var confirmpassword = $('#confirmpassword').val();
                        var idnumber = $('#idnumber').val();
                        
                        // Construct the data object
                        var data = {
                            fogorpasschange: 'fogorpasschange',
                            idnumber: idnumber,
                            password: password,
                            confirmpassword: confirmpassword
                        };

                        console.log('Sending AJAX request...');
                        $.ajax({
                            url: "{{ route('password.update') }}", // Assuming you have a route named 'password.update'
                            type: "POST",
                            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                            data: data,
                            success: function (result) {
                                console.log('AJAX request successful:', result);
                                $('#load').hide();
                                $('#svg').show();
                                // Display success message
                                $('#forgotpassuccess').html("<div class='alert alert-success' role='alert'>Password updated successfully! You may now Login <a href='{{route('login')}}'>Here</a></div>");
                            },
                            error: function (xhr, status, error) {
                                console.error('AJAX request failed:', xhr, status, error);
                                // Display error message
                                $('#forgotpassuccess').html('<div class="alert alert-danger" role="alert">Failed to update password. Please try again.</div>');
                            }
                        });
                    });
            });
        </script>
