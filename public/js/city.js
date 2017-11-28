$(document).ready(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'accepts': 'application/json',
        }
    });

    $('#add_city').click(function(e) {
        var form_add_city = '<input type="text" name="name">'
                            +'<button type="submit" class="btn btn-info">'
                            +   '<i class="fa fa-check" aria-hidden="true"></i> OK'
                            +'</button>';
        $(this).after(form_add_city);
        $(this).unbind("click");
    });

    $(".edit_city").click(function() {
        var id = $(this).data("id");
        $("#city" + id).removeClass("input_like_label")
                       .removeAttr("readonly")
                       .after('<button type="submit" class="btn btn-info">'
                            +   '<i class="fa fa-check" aria-hidden="true"></i> OK'
                            +'</button>');
        $(this).unbind("click");
    });

    $('.delete_city').click(function() {
        var id = $(this).data("id");
        $('#lbl_delete_category').text('Are you sure want to delete city: ' + $("#city" + id).val());
        $('#delete_city').attr("action", "/admin/city/delete/" + id);
    });

    $('.add_district')
});