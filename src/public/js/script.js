$(function() {
  $("#sign-out").on("click", function() {

    account = "";
    if ($(this).hasClass("home")) {
      account = "home";
    } else {
      account = "admin";
    }

    // sign out with an ajax call
    $.ajax({
      type: "POST",
      data: {
        type: "signout",
        account: account
      },
      url: "../handlers/global.php",
      success: function(data) {
        window.location = "index.php";
      }
    });
  });

  $(".print-window").on("click", function() {
    window.print();
  })

  $('[data-toggle="tooltip"]').tooltip();
});

// transitioning for sign in/create acccount form
$('.message a').click(function() {
  $('form').animate({
    height: "toggle",
    opacity: "toggle"
  }, "slow");
});
