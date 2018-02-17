$(function() {

  $('main').on('click', '.agency-box', function() {
    // redirect to specific job
    url = $(this).attr('data-url');
    window.location.href = url;
  });

});
