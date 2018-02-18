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

// example input would be
// search($('#search'), $('#main>.row'), ['.job-title', '.job-description']);
// searches row according to its title and description throught #search
function search(search_bar, search_object, fields) {
  search_bar.on('input', function() {
    search_text = $(this).val();
    // search all the rows
    search_object.each(function() {
      obj = $(this);

      // assume the object doenst contain the search text
      show_object = false;
      $.each(fields, function(i, value) {
        field = obj.find(value).eq(0).text();

        if (contains(field, search_text)) {
          show_object = true;
        }
      });

      // show_object == true only when any of the fields
      // contains the search text
      if (show_object) obj.show();
      else obj.hide();

    });
  });
}
