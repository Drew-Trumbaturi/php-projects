$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#registration-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#passwordConfirm");
    let $error = $("#confirmation_error");

    // if ($password.length < 8) {
    //   $error.text("Password must be at least 8 characters");
    //   event.preventDefault();
    // }

    if ($password.val() === $confirm.val()) {
      return true;
    } else {
      $error.text("Passwords do not match");
      event.preventDefault();
    }
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $("#register .upload-profile-image .img").attr("src", e.target.result);
      $("#register .upload-profile-image .camera-icon").css({
        display: "none",
      });
    };
    reader.readAsDataURL(input.files[0]);
  }
}
