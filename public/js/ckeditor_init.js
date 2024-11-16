// public/js/ckeditor_init.js

document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#description'), {
            // CKEditor configurations
        })
        .catch(error => {
            console.error(error);
        });
});
