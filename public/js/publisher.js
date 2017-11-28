$(document).ready(function() {
    $('.delete').click(function() {
        $('#lbl_delete_publisher').text('Are you sure want to delete publisher: ' + $(this).data("name"));
        $('#delete_publisher').attr("action", "/admin/publisher/delete/" + $(this).data("id"));
    });
});