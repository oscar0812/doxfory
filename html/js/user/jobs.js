$(function() {

  $('#main_div').on('click', '.row', function() {
    // redirect to specific job 
    url = $(this).attr('data-url');
    window.location.href = url;
  });
});
