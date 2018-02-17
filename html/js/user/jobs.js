$(function() {

  $('main').on('click', '.agency-box', function() {
    // redirect to specific job
    url = $(this).attr('data-url');
    window.location.href = url;
  });

  $('#search').on('input', function() {
    search_text = $(this).val();
    // search all the rows
    $('#main>.row').each(function() {
      title = $(this).find('.search-title').eq(0).text();
      description = $(this).find('.search-description').eq(0).text();
      if (contains(title, search_text) || contains(description, search_text)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});
