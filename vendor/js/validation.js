$(document).ready(function () {
  $.validator.addMethod(
    "strongPassword",
    function (value) {
      return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(value);
    },
    "A password must contain UpperCase, LowerCase and a Number"
  );

  $.validator.addMethod(
    "numberCheck",
    function (value) {
      return /^[9]/.test(value);
    },
    "Invalid number format"
  );
  $("#getForm").validate({
    rules: {
      fname: {
        required: true,
        maxlength: 200,
        minlength: 3,
        lettersonly: true,
      },
      lname: {
        required: true,
        maxlength: 200,
        minlength: 3,
        lettersonly: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8,
        maxlength: 30,
        strongPassword: true,
      },
      con_password: {
        required: true,
        equalTo: "#password",
      },
      username: {
        required: true,
        nowhitespace: true,
      },
      contact: {
        required: true,
        numberCheck: true,
        number: true,
        maxlength: 10,
        minlength: 10,
      },
      status: {
        required: true,
      },
    },
    highlight: function (element) {
      $(element).addClass("border-error");
    },
    unhighlight: function (element) {
      $(element).removeClass("border-error");
    },
    messages: {
      name: {
        required: "Name field is mandatory",
        minlength: "Name must be aleast 3 characters",
      },
      email: {
        required: "Email field is mandatory",
        email: "Invalid email",
      },
      contact: {
        minlength: "Contact detail must be of 10 numbers",
        maxlength: "Invalid Number",
      },
    },
  });
});
