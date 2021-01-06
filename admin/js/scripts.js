$(document).ready(function () {
  // CKEDITOR
  ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
  });

  // SELECT ALL CHECK BOXES POSTS
  $("#selectAllBoxes").click(function (e) {
    if (this.checked) {
      $(".checkBoxes").each(function () {
        this.checked = true;
      });
    } else {
      $(".checkBoxes").each(function () {
        this.checked = false;
      });
    }
  });

  var div_box = "<div id='load-screen'><div id='loading'></div></div>";

  $("body").prepend(div_box);

  $("#load-screen")
    .delay(700)
    .fadeOut(600, function () {
      $(this).remove();
    });
});
