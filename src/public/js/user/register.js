jQuery(document).ready(function() {

  /*
      Fullscreen background
  */
  $.backstretch("img/backgrounds/4.jpg");

  /*
      Login form validation
  */
  $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    $(this).removeClass('input-error');
  });

  // login button clicked
  $('.login-form').on('submit', function(e) {

    has_errors = false;

    $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
      if ($(this).val() == "") {
        has_errors = true;
        $(this).addClass('input-error');
      } else {
        $(this).removeClass('input-error');
      }

      e.preventDefault();
    });

    return false;

  });

  /*
      Registration form validation
  */
  $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
    $(this).removeClass('input-error');
  });

  $('.registration-form').on('submit', function(e) {

    $(this).find('input[type="text"], textarea').each(function() {
      if ($(this).val() == "") {
        $(this).addClass('input-error');
      } else {
        $(this).removeClass('input-error');
      }
      e.preventDefault();
    });

  });


  // ajax calls to sign in or register a new account
  function logIn(email, password) {
    $.ajax({
      type: "POST",
      data: {
        type: "login",
        email: email,
        password: password
      },
      url: window.location.href,
      success: function(data) {
        console.log(data);
      }
    });
  }



  // form validation

  $(".login-form").validate({
    // Specify validation rules
    rules: {
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
      }
    },
    // Specify validation error messages
    messages: {
      password: {
        required: "Please provide a password",
      },
      email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
      // once its successful
      console.log(form);
    }
  });


  $(".registration-form").validate({
    // Specify validation rules
    rules: {

      username: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5,
        passwordRegex: true
      },
      confirm: {
        required: true,
        passwordMatch: true
      },
    },
    // Specify validation error messages
    messages: {
      username: "Please enter a username",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirm: {
        required: "You must confirm your password",
        minlength: "Your password must be at least 5 characters long",
        passwordMatch: "Your Passwords Must Match" // custom message for mismatched passwords
      },
      email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
      // once its successful
      console.log(form);
    }
  });


  jQuery.validator.addMethod('passwordMatch', function(value, element) {

    // The two password inputs
    var password = $('#pass').val();
    var confirmPassword = $('#confirm').val();

    // Check for equality with the password inputs
    if (password != confirmPassword) {
      return false;
    } else {
      return true;
    }

  }, "Your Passwords Must Match");

  jQuery.validator.addMethod('passwordRegex', function(value, element) {
    var pattern = /^(?=.*[a-z])(?=.*[@#$%&]).{5,}$/;
    return pattern.test(value);
  }, "Password must contain at least 1 special character (@#$%&)");

});
