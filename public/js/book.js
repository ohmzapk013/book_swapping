$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
        var name = [];
      // for (var i = 0; i < filesLength; i++) {
      //   name.push(files[i].name);
      //   var f = files[i];
      //   var fileReader = new FileReader();
      //     fileReader.onload = (function(e) {
      //       console.log(i);
      //       var file = e.target;
      //       $("<span class=\"pip\">" +
      //         "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + name.shift() + "\"/>" +
      //         "<br/><span class=\"remove\">Remove image</span>" +
      //         "</span>").appendTo("#show_image_list");
      //       $(".remove").click(function(){
      //         $(this).parent(".pip").remove();
      //       });
      //   });
      //   fileReader.readAsDataURL(f);
      // }

      $.each(files, function( index, file ) {
        name.push(file.name);
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
              $(this).parent(".pip").remove();
            });
        });
        fileReader.readAsDataURL(f);
      });
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});