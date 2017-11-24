$(document).ready(function() {
    $('.edit').click(function() {
        $('#edit_name').val($(this).data("name"));
        $('#edit_description').val($(this).data("description"));
        $('#edit_category').attr("action", "/admin/category/" + $(this).data("id"));
    });

    $('.delete').click(function() {
        $('#lbl_delete_category').text('Are you sure want to delete category: ' + $(this).data("name"));
        $('#delete_category').attr("action", "/admin/category/delete/" + $(this).data("id"));
    });
});