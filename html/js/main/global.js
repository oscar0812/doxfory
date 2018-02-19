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
  if (!$.isArray(fields)) {
    fields = [fields];
  }
  $(search_bar).on('input', function() {
    search_text = $(this).val();
    // search all the rows
    $(search_object).each(function() {
      obj = $(this);

      // assume the object doenst contain the search text
      show_object = false;
      $.each(fields, function(i, value) {
        elements = obj.find(value);
        $(elements).each(function() {
          if (contains($(this).text(), search_text)) {
            show_object = true;
          }
        })
      });

      // show_object == true only when any of the fields
      // contains the search text
      show_object ? obj.show() : obj.hide();

    });
  });
}

// this function simply puts a click listener to input and then calls
// editInputOn, callback will be called when the editing is done
function editInput(input, callback) {
  $(input).click(function() {
    editInputOn(this, callback);
  });
}

// when this function is called, an input mask will cover the text
// making an input appear
function editInputOn(input, callback) {
  text = $(input).text();

  elt = $("<textarea rows='3' cols='90' class='form-control'>");
  elt.val($(input).text());

  // get on text changed listener
  $(elt).on("input", function() {
    str = $(this).val();

    // max 512 letters on column in db
    if (str.length > 511) {
      str = str.substring(0, 512);
      $(elt).val(this);
    }
  });

  elt.on("blur", function() {
    editInputOff($(this), callback);
  });

  $(input).text('');
  $(input).append(elt);
  $(elt).focus();
  $(input).off('click');
}

// once the input is done, this will be called
function editInputOff(child, callback) {

  parent = $(child).parent();
  parent.text($(child).val());
  parent.on('click', function() {
    editInput(parent, callback);
  });

  text = $(parent).text();

  $(child).remove();

  callback(text);
}
