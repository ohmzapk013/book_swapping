$('#change_avatar').click(function() {
    $('input[name="change_avatar"]').click();
});

$('#change_cover').click(function() {
    $('input[name="change_cover"]').click();
});

// show image to preview before upload
$(document).ready(function() {
    function readURL(input, flag) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
              if (flag === 'avatar') {
                $('.img-profile').attr('src', e.target.result);
              }
              if (flag === 'cover') {
                $('.img-cover').attr('src', e.target.result);
              }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('input[name="change_avatar"]').change(function(){
        readURL(this, 'avatar');
    });

    $('input[name="change_cover"]').change(function(){
        readURL(this, 'cover');
    });
});