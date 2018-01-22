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

    email = $(this).find('input[name=form-email]').val();
    password = $(this).find('input[name=form-password]').val();

    if (!has_errors) {
      logIn(email, password);
    }

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
        e.preventDefault();
        $(this).addClass('input-error');
      } else {
        $(this).removeClass('input-error');
      }
    });

  });


  function logIn(email, password) {
    $.ajax({
      type: "POST",
      data: {
        type: "1",
        id: "id",
      },
      url: window.location.href,
      //dataType: "json",
      success: function(data) {
        console.log(data);
      }
    });
  }


});
