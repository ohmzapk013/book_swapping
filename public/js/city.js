$(document).ready(function() {

    $('#add_city').click(function(e) {
        $(this).next().toggle();
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

    $('.add_district').click(function() {
        $(this).next().toggle();
    });

    $('.edit_district').click(function() {
        $(this).parent().prev().find("input[name='name']")
                      .removeClass("input_like_label")
                      .removeAttr("readonly");
        $(this).parent().next().toggle();
        $(this).parent().toggle();
    })

    $('.close_edit').click(function() {
        $(this).parents().find("input[name='name']")
                      .addClass("input_like_label")
                      .attr("readonly", "");
        $(this).parent().prev().toggle();
        $(this).parent().toggle();
    })

    $('.delete_district').click(function() {
        var id = $(this).data("id");
        $('#lbl_delete_district').text('Are you sure want to delete destrict ?');
        $('#delete_district').attr("action", "/admin/district/delete/" + id);
    });

});