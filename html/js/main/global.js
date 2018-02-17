// a global js so we can reduce repetitive work on other js files
$(function() {
  $('.url').on('click', function() {
    window.location.href = $(this).attr('data-url');
  });
});
