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
});
