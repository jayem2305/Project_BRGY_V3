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

                    <!-- Template Javascript -->
                    <script src="../js/main.js"></script>
                    <script>
                        $(document).ready(function(){
                            fetchForumData();
                        var selectedValue; // Define selectedValue outside of event handlers
var selectedAge = null;
var selectedImageFilename = null;
var household = null;
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
                        selectedImageFilename = fullName.profile2x2;
                    }
                });
            } else {
                console.log('No data found');
            }
           
            
            // If there's a selected value, set it as selected
            if (selectedValue) {
                $('.names_display').val(selectedValue);
                var imagePath = '../residentprofile/';
           // console.log(selectedImageFilename);
            $('#displayimage').attr('src', imagePath + selectedImageFilename);
            household = selectedImageFilename;
                $('#picid').val(household);
            }
           
           
            $('#childdisplay').empty();
            if (selectedImageFilename) {
                $.each(data, function(index, fullName) {
            if (fullName.profile2x2) {
                var imageUrl = '../uploads/' + fullName.profile2x2; // Update the path to your image directory
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
function fetchForumData(forumId) {
   // console.log(forumId);
    $.ajax({
        url: "{{ route('User.forum.data') }}",
        type: "GET",
        data: { id: forumId },
        success: function(response) {
            //console.log(response);
            var description;
                if(response.description == null){
                description = " ";
            }else{
                description = response.forums.description;
            }
            if (response.hasOwnProperty('forums')) {
                displayForumData(response.forums); // Display forum data
                    var selectedForum = response.forums.find(function(forum) {
                        return forum.id === forumId; // Assuming forumId is the ID of the selected forum
                    });
                    if (selectedForum) {
                        if(selectedForum.description == null){
                            selectedForum.description = ' ';
                        }else{
                            selectedForum.description = selectedForum.description
                        }
                        $('#forumTopic').html('<h1 class="text-capitalize">' + selectedForum.topic+ '</h1>');
                        $('#forumDescription').html('<p class="text-capitalize">' + selectedForum.description + '</p>');
                        $('#labelname').html('<p class="text-capitalize">' + selectedForum.name + '</p>');
                        $('#inputform').html('<input type="hidden" value="' + selectedForum.id + '" id="id_form" name="id_form">');
                        $('#forumModal').modal('show'); // Show the modal
                    } 
            }
        },
        error: function(xhr, status, errorThrown) {
            console.error('Error fetching forum data:', xhr, status, errorThrown);
        }
    });
}


$(document).on('click', '.btn-forum', function () {
    var name = $('#names_display').val();
    var topic = $('#topic').val();
    var description = $('#description').val();
    var formData = new FormData();
    formData.append('addforum', 'addforum');
    formData.append('name', name);
    formData.append('topic', topic);
    formData.append('description', description);

    // Get the CSRF token from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "{{ route('Admin.forumpost.user') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function(result) {
            console.log('AJAX request successful:', result);
            // Display success toast
            var toast = $('#liveToast');
            toast.find('.toast-header').removeClass('text-danger').addClass('text-success').find('strong').text('Forum Added Successfully');
            toast.find('.toast-body').removeClass('text-bg-danger').addClass('text-bg-success');
            toast.find('.toast-body').text('Your forum has been added successfully.');
            toast.toast('show');
            
            // Fetch and update forum data here
            fetchForumData();
            
            // Reset input fields
            $('#topic').val('');
            $('#description').val('');
            
            // Remove any validation classes and messages
            $('#topic').removeClass('is-invalid');
            $('#valid').removeClass('invalid-feedback');
            $('#valid').text('');
        },
        error: function(xhr, status, errorThrown) {
            console.error('AJAX request failed:', xhr, status, errorThrown);
            // Handle error response here
            if(xhr.status == 422) {
                var errors = xhr.responseJSON.errors;
                // Display error toast
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Forum Added Unsuccessfully');
                toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
                var errorMessage = '';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessage += errors[key][0] + '\n'; // Concatenate each error message
                    }
                }
                toast.find('.toast-body').text(errorMessage.trim());
                toast.toast('show');

            } else {
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Error');
                toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger').text('An error occurred while adding the forum.');
                toast.toast('show');
            }
        }
    });
});


   function displayForumData(forums) {
        var forumHTML = "";
        forums.forEach(function(forum) {
            var createdDate = new Date(forum.created_at);
            var currentTime = new Date();
            var timeDifference = currentTime - createdDate;
            var timeAgo = "";
            var description = "";
            if (timeDifference < 60000) {
                timeAgo = "just now";
            } else if (timeDifference < 3600000) {
                var minutes = Math.floor(timeDifference / 60000);
                timeAgo = minutes + " minute" + (minutes === 1 ? "" : "s") + " ago";
            } else if (timeDifference < 86400000) {
                var hours = Math.floor(timeDifference / 3600000);
                timeAgo = hours + " hour" + (hours === 1 ? "" : "s") + " ago";
            } else if (timeDifference < 604800000) {
                var days = Math.floor(timeDifference / 86400000);
                timeAgo = days + " day" + (days === 1 ? "" : "s") + " ago";
            } else {
                timeAgo = createdDate.toLocaleDateString();
            }

            if(forum.description == null){
                description = " ";
            }else{
                description = forum.description;
            }
            forumHTML += '<div class="card" id="card' + forum.id + '">';
        forumHTML += '<div class="row card-body">';
        forumHTML += '<div class="col-lg-10"><h1 class="card-title">' + forum.topic + '</h1>';
        forumHTML += '<p class="card-text">' + description + '</p></div>';
        forumHTML += '<div class="col-lg-2 " >';
        forumHTML += '<div class="d-grid gap-2 d-md-flex justify-content-md-end" >';
        forumHTML += '<div id="restore-button-container' + forum.id + '"></div><button type="button" class="btn btn-warning btn-lg forum-view" data-id="' + forum.id + '" data-bs-toggle="modal" data-bs-target="#forumModal"><i class="bi bi-eye-fill"></i></button>';
        forumHTML += '</div>';
        forumHTML += '<p class="card-text" style="margin-top:.5rem;margin-left:4rem;"><small class="text-muted">' + timeAgo + '</small></p></div></div>';
        forumHTML += '</div>';
        forumHTML += '</div>';
        });

         // Display the generated HTML inside the #displayform element
    $("#displayform").html(forumHTML);

    // Add event listener for modal trigger
    $('.forum-view').click(function() {
        var forumId = $(this).data('id');
        fetchForumData(forumId);
        displayComments(forumId);
        console.log("Forum ID:", forumId);
    });
    }
    fetchForumData();
    $(document).on('click', '.btn-comment', function () {
    var comment = $('#comment').val();
    var id_form = $('#id_form').val();
    var adminname = $('#names_display').val();
    var profile =  $('#picid').val();
console.log(id_form);
    $.ajax({
        url: "{{ route('admin.forum.store') }}",
        type: 'POST',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'comment': comment,
            'id_form': id_form,
            'adminname': adminname,
            'profile': profile,
        },
        success: function(response) {
            console.log('Comment posted successfully:', response);
            // Assuming fetchForumData() function fetches forum data asynchronously
            fetchForumData(); // Update forum data after posting comment
            displayComments(id_form);
            $('#comment').val(' ')
            var toast = $('#liveToast');
            toast.find('.toast-header').removeClass('text-danger').addClass('text-success').find('strong').text('Comment Added Successfully');
            toast.find('.toast-body').removeClass('text-bg-danger').addClass('text-bg-success');
            toast.find('.toast-body').text('Your Comment has been added successfully.');
            toast.toast('show');
        },
        error: function(xhr, status, errorThrown) {
            console.error('AJAX request failed:', xhr, status, errorThrown);
            // Handle error response here
            if(xhr.status == 422) {
                var errors = xhr.responseJSON.errors;
                // Display error toast
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Comment Added Unsuccessfully');
                toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
                var errorMessage = '';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessage += errors[key][0] + '\n'; // Concatenate each error message
                    }
                }
                toast.find('.toast-body').text(errorMessage.trim());
                toast.toast('show');

            } else {
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Comment Added Unsuccessfully');
                toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger').text('An error occurred while adding the Comment.');
                toast.toast('show');
            }
        }
    });
}); 
function displayComments(forumId) {
    $.ajax({
        url: "/comments/" + forumId,
        type: 'GET',
        success: function(response) {
            var comments = response.comments;
            var commentsHtml = '';
            
            if (comments) {
                comments.forEach(function(comment) {
                    var imageUrl = '../residentprofile/'+ comment.profile;
                    commentsHtml += '<div class="row">';
                    commentsHtml += '<input type="hidden" value="' + comment.id + '" class="idcomments">';
                    commentsHtml += '<div class="profiles col-lg-1 col-sm-1 col-xs-1 col-md-1"><img src='+ imageUrl +' class="rounded-circle me-3" alt="Profile Picture" width="50" height="50"></div>';
                    commentsHtml +=  '<div class="profiles col-lg-11 col-sm-11 col-xs-11 md-lg-11"><div class="card" style="background-color:#D9D9D9;"> <div class="card-body"><b>'+ comment.name + "</b><br>" + comment.comment + '<br><br>';
                    commentsHtml += '<button type="button" class="btn btn-success btn-sm reply-btn" data-comment-id="' + comment.id + '" data-replyname="' + comment.name + '" data-replyimage="' + imageUrl + '">Reply</button>';
                    commentsHtml += '<div style="width: 58rem; height: 20rem;overflow-y: auto;overflow-x: hidden;"><div class="replydisplay" data-comment-id="' + comment.id + '"><br></div></div></div></div></div>'; // Create a placeholder for replies
                    commentsHtml += '<div class="time col-lg-12 text-xl-end text-body-secondary fw-lighter">' + formatTime(comment.created_at) + '</div>';
                    commentsHtml += '</div>';

                    // Fetch and display replies for the current comment
                    displayReplies(comment.id);
                });
                $('#displayComments').html(commentsHtml);
            } else {
                commentsHtml = '<div class="no-comments">No comments found.</div>';
                $('#displayComments').html(commentsHtml);
            }
        },
        error: function(xhr, status, errorThrown) {
            console.error('Error fetching comments:', errorThrown);
        }
    });
}
    var forumId = $('#id_form').val(); // Assuming you have a hidden input field with forum ID
    displayComments(forumId);
    
    // Event listener for the "Reply" button
    $(document).on('click', '.reply-btn', function() {
        // Remove any existing reply forms
        $('.reply-form').remove();

        // Get the comment ID
        var commentId = $(this).data('comment-id');
        var replyNames = $('.names_display').val();
        var replyImages = $(this).data('replyimage');
        // Create and append the input tag and submit button
        var replyFormHtml = '<div class="row"><div class="reply-form mb-3 d-grid gap-2 d-md-flex justify-content-md-end col-lg-12">';
        replyFormHtml += '<input type="text" class="form-control reply-input" placeholder="Type your reply" autofocus>';
        replyFormHtml += '<button type="button" class="btn btn-primary submit-reply" data-comment-id="' + commentId + '"data-name-id="' + replyNames + '"data-pic-id="' + replyImages + '">Submit</button>';
        replyFormHtml += '</div></div>';
        // Append the reply form below the clicked "Reply" button's parent element
        $(this).parent().append(replyFormHtml);
        $(this).parent().siblings('.replydisplay').before(replyFormHtml);
    });

    // Event listener for the submit button within the reply form
    $(document).on('click', '.submit-reply', function() {
        // Get the reply text and comment ID
        var replyText = $(this).siblings('.reply-input').val();
        var commentId = $(this).data('comment-id');
        var replyname = $(this).data('name-id');
        var replyimage = $(this).data('pic-id');
        //console.log(replyimage);

        // Make an AJAX request to save the reply
        $.ajax({
            url: "{{ route('admin.saveReply.store') }}",
            type: 'POST',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'comment_id': commentId,
                'replyname': replyname,
                'replyimage': replyimage,
                'reply_text': replyText
            },
            success: function(response) {
                // Handle the response (e.g., display a success message)
                console.log(response);
                displayReplies(commentId);
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-danger').addClass('text-success').find('strong').text('Reply Added Successfully');
                toast.find('.toast-body').removeClass('text-bg-danger').addClass('text-bg-success');
                toast.find('.toast-body').text('Your Reply has been added successfully.');
                toast.toast('show');
            },
            error: function(xhr, status, errorThrown) {
            console.error('AJAX request failed:', xhr, status, errorThrown);
            // Handle error response here
            if(xhr.status == 422) {
                var errors = xhr.responseJSON.errors;
                // Display error toast
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Reply Added Unsuccessfully');
                toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger');
                var errorMessage = '';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessage += errors[key][0] + '\n'; // Concatenate each error message
                    }
                }
                toast.find('.toast-body').text(errorMessage.trim());
                toast.toast('show');

            } else {
                var toast = $('#liveToast');
                toast.find('.toast-header').removeClass('text-success').addClass('text-danger').find('strong').text('Reply Added Unsuccessfully');
                toast.find('.toast-body').removeClass('text-bg-success').addClass('text-bg-danger').text('An error occurred while adding the Reply.');
                toast.toast('show');
            }
        }
        });
        
        // Optionally, you can remove the reply form after submission
        $(this).closest('.reply-form').remove();
    });
    function formatTime(timestamp) {
    return moment(timestamp).fromNow();
}
function displayReplies(commentid) {
    $.ajax({
        url: "/reply/" + commentid,
        type: 'GET',
        success: function(response) {
            var replies = response.reply;
            var repliesHtml = '';
            
            if (replies && replies.length > 0) {
                replies.forEach(function(reply) {
                    // If the reply was successfully saved, display it
                    repliesHtml += '<div class="row">';
                    repliesHtml += '<div class="profiles col-lg-1 col-sm-1 col-xs-1 col-md-1"><img src='+ reply.replyimage + ' class="rounded-circle me-3" alt="Profile Picture" width="50" height="50"></div>';
                    repliesHtml +=  '<div class="profiles col-lg-11 col-sm-11 col-xs-11 md-lg-11"><div class="card" style="background-color:#D9D9D9;"> <div class="card-body"><b>'+ reply.replyname + "</b><br>" + reply.reply_text + '</div></div></div>';
                    repliesHtml += '<div class="time col-lg-12 text-xl-end text-body-secondary fw-lighter">' + formatTime(reply.created_at) + '</div>';
                    repliesHtml += '</div>';

                });

                // Append the new replies to the appropriate comment's replydisplay container
                $('.replydisplay[data-comment-id="' + commentid + '"]').html(repliesHtml);
            } else {
                // Handle case where no replies are found
                repliesHtml = '<div class="no-comments">No Replies found.</div>';
                $('.replydisplay[data-comment-id="' + commentid + '"]').html(repliesHtml);
            }
        },
        error: function(xhr, status, errorThrown) {
            console.error('Error fetching replies:', errorThrown);
        }
    });
}
});

              </script>