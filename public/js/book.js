$(document).ready(function() {

/* ADD BOOK */
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'accepts': 'application/json',
        }
    });

    var imageList = [];
    if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
            var date = new Date();
            var prefixName = date.getTime();
            var files = e.target.files,
            filesLength = files.length;
            var name = [];
            //send image to server
            var tmpName = [];
            for (i = 0; i < filesLength; i++) {
              tmpName.push(prefixName + files[i].name);
            }
            data = new FormData($('#form_add_book')[0]);
            data.append('image_name', tmpName);
            $.ajax({
              url: "/upload-images",
              type: "post",
              processData: false,
              contentType: false,
              data: data,

              success: function (data) {
                console.log(data);
              }
            });

            $.each(files, function(index, file ) {
                fileName = prefixName + file.name;
                name.push(fileName);
                imageList.push(fileName);
                $('input[name="image_list_upload"]').val(imageList.join());
                var f = file;
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                  console.log(index);
                  var file = e.target;
                  $("<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + name[index] + "\"/>" +
                    "<br/><span class=\"remove\">Remove image</span>" +
                    "</span>").appendTo("#show_image_list");
                  $(".remove").click(function(){
                    removeTitle = $(this).parent().find('img').attr('title');
                    var removeIndex = imageList.indexOf(removeTitle);
                    if (removeIndex !== -1) {
                      //remove image on server
                      $.ajax({
                        url: "/delete-image/" + imageList[removeIndex],
                        type: "post",
                        success: function (data) {
                          console.log(data);
                        }
                      });
                      imageList.splice(removeIndex, 1);
                    }
                    $(this).parent(".pip").remove();
                    $('input[name="image_list_upload"]').val(imageList.join());
                  });
                });
                fileReader.readAsDataURL(f);
            });

        });
    } else {
        alert("Your browser doesn't support to File API")
    }

    $('select[name="city_id"]').change(function() {
        var city_id = $(this).val();
        $.ajax({
            url: '/admin/city/'+ city_id + '/get_all_district',
            type: 'post',
            data: { city: city_id, test: 'test'},
            success: function (data) {
                var districts = JSON.parse(data);
                show_districts = '';
                for (var i = 0; i < districts.length; i++) {
                    show_districts += "<option value=\""+ i +"\">" + districts[i] + "</option>";
                }
                $('select[name="district_id"]').empty();
                $('select[name="district_id"]').append('<option class="bs-title-option" value>Choose a district</option>' + show_districts);
            },
            error: function () {
                $('select[name="district_id"]').empty();
                $('select[name="district_id"]').append('<option class="bs-title-option" value>No result</option>');
            }
        });
    });

    $('#price').hide();
    $('select[name="want_to"]').change(function() {
        $('#price').hide();
        var val = $('select[name="want_to"] option:selected').val();
        console.log(val);
        if (val == 1) {
            $('#price').show();
        }
    });

/* DETAIL BOOK */
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd = '0'+dd
    } 
    if(mm<10) {
        mm = '0'+mm
    } 
    today = dd + '/' + mm + '/' + yyyy;
    $('button[name="add_comment"]').click(function() {
        var bookId  = $('input[name="book_id"]').val();
        var userId  = $('input[name="user_id"]').val();
        var content = $('#comment_content').val();
        data = {
            book_id: bookId,
            user_id: userId,
            content: content
        }
        //send Ajax
        $.ajax({
            url: "/add-comment/" + bookId,
            type: "post",
            data: data,
            success: function() {
            }
        });
        //add comment DOM
        var avatar = $('.thumbnail img').attr('src');
        var name = $('input[name="user_name"]').val();
        var comment = generateComment(avatar, name, content, today);
        $('#all_comment').prepend(comment);
        //reset content value
        $('#comment_content').val("");
    });

    $('button[name="reply"]').click(function() {
        $(this).parent().next().find('.reply_comment').toggle();
    });

    $('button[name="add_sub_comment"]').click(function() {
        var bookId  = $('input[name="book_id"]').val();
        var userId  = $('input[name="user_id"]').val();
        var content = $(this).prev().val();
        console.log(content);
        var parentId = $(this).data('parent');
        data = {
            book_id: bookId,
            user_id: userId,
            content: content
        }
        //send Ajax
        $.ajax({
            url: "/add-sub-comment/" + bookId + "/" + parentId,
            type: "post",
            data: data,
            success: function() {
            }
        });
        //add comment DOM
        var avatar = $('.thumbnail img').attr('src');
        var name = $('input[name="user_name"]').val();
        var comment = generateComment(avatar, name, content, today);
        $('#all_sub_comment_' + parentId).prepend(comment);
        //reset content value
        $(this).prev().val("");
    });

    $('#show_map').click(function() {
        $('#map').toggle();
    });
});

function generateComment(avatar, name, content, date) {
            return '<div class="row">'+
'                        <div class="col-md-1">'+
'                            <div class="thumbnail" style="">'+
'                            <img class="img-responsive user-photo img-thumbnail" src="'+ avatar +'">'+
'                            </div>'+
'                        </div>'+
'                        <div class="col-md-11">'+
'                            <div class="panel panel-default">'+
'                                <div class="panel-heading">'+
'                                    <strong>' + name + '</strong>'+
'                                    <span class="text-muted">commented at ' + date + '</span>'+
'                                </div>'+
'                                <div class="panel-body">'+
'                                       '+ content +'   '+
'                                </div><!-- /panel-body -->'+
'                                <button type="button" class="btn btn-outline-info"><i class="fa fa-reply" aria-hidden="true"></i> Reply</button>'+
'                            </div>'+
'                        </div>'+
'                    </div>';
}
