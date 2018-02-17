// a global js so we can reduce repetitive work on other js files

$('.url').on('click', function() {
  window.location.href = $(this).attr('data-url');
});

function ajaxForm(form, callback) {
  var data = new FormData(form);
  $.ajax({
    url: form.action,
    method: form.method,
    processData: false,
    contentType: false,
    data: data,
    processData: false,
    success: callback
  });
}

// return true if all contains substring
// ex: true if contains('hello', 'hell');
function contains(all, substring) {
  return all.toUpperCase().indexOf(substring.toUpperCase()) != -1;
}
