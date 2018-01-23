$(function() {
  login_form = $(".login-form");
  signup_form = $(".register-form");

  /*
      Fullscreen background
  */
  $.backstretch("img/backgrounds/4.jpg");

  // form validation

  login_form.validate({
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
      email = login_form.find('input[name="email"]').val();
      password = login_form.find('input[name="password"]').val();
      logIn(email, password);
    }
  });


  signup_form.validate({
    // Specify validation rules
    rules: {

      username: {
        required: true,
        remote: {
          url: window.location.href + "/username",
          type: "POST",
          data: {
            username: function() {
              return $(signup_form).find('input[name="username"]').val();
            }
          }
        }
      },
      email: {
        required: true,

        // Specify that email should be validated
        // by the built-in "email" rule
        email: true,

        remote: {
          url: window.location.href + "/email",
          type: "POST",
          data: {
            email: function() {
              return $(signup_form).find('input[name="email"]').val();
            }
          }
        }
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
      username: {
        required: "Please enter a username",
        remote: jQuery.validator.format("Username is already taken.")
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirm: {
        required: "You must confirm your password",
        minlength: "Your password must be at least 5 characters long",
        passwordMatch: "Your Passwords Must Match" // custom message for mismatched passwords
      },
      email: {
        required: "Please enter a valid email address",
        remote: jQuery.validator.format("Email is already in use.")
      }
    },
    submitHandler: function(form) {
      // once its successful
      email = signup_form.find('input[name="email"]').val();
      username = signup_form.find('input[name="username"]').val();
      password = signup_form.find('input[name="password"]').val();

      registerUser(email, username, password);
    }
  });


  // helpful validation methods
  jQuery.validator.addMethod('passwordMatch', function(value, element) {

    // The two password inputs
    var password = $(signup_form).find('input[name="password"]').val();
    var confirm = $(signup_form).find('input[name="confirm"]').val();

    // Check for equality with the password inputs
    if (password != confirm) {
      return false;
    } else {
      return true;
    }

  }, "Your Passwords Must Match");

  jQuery.validator.addMethod('passwordRegex', function(value, element) {
    var pattern = /^(?=.*[a-z])(?=.*[@#$%!+=]).{5,}$/;
    return pattern.test(value);
  }, "Password must contain at least 1 special character (@#$%&!+=)");


  // ajax calls to login or register a new account

  function logIn(email, password) {
    console.log(email + ", " + password);
    $.ajax({
      type: "POST",
      data: {
        type: "login",
        email: email,
        password: password
      },
      url: window.location.href,
      success: function(data) {
        if (data['success']) {
          window.location = data['path'];
        } else {
          // show error on top of email box in login form
          login_form.find('label').eq(0).removeClass('sr-only').text("Incorrect email or password");
        }
      }
    });
  }

  function registerUser(email, username, password) {
    $.ajax({
      type: "POST",
      data: {
        type: "register",
        email: email,
        username: username,
        password: password
      },
      url: window.location.href,
      success: function(data) {
        console.log(data);
      }
    });
  }

});
