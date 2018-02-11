$(function() {

  // -- PFP FORM --
  pfp = $('#pfp');
  pfpModal = $('#pfpModal');
  pfpAlert = pfpModal.find('.alert').eq(0);

  pfp.on('click', function() {
    pfpModal.modal('show');
  });

  // -- Pfp image upload through ajax --
  $('#pfpForm').on('submit', function(e) {
    e.preventDefault();
    var form = e.target;
    var data = new FormData(form);
    $.ajax({
      url: form.action,
      method: form.method,
      processData: false,
      contentType: false,
      data: data,
      processData: false,
      success: function(data) {
        if (data['success']) {
          pfpAlert.addClass('invisible');
          pfp.attr('src', data['path'] + '?' + (new Date).getTime());
          pfpModal.modal('hide');
        } else {
          pfpAlert.removeClass('invisible');
          pfpAlert.addClass('alert-danger');
          pfpAlert.text(data['msg']);
        }
      }
    })
  });

  // -- CONTACT --
  contactModal = $('#contactModal');
  contactAlert = contactModal.find('.alert').eq(0);
  startingUrl = contactModal.find('#startingUrl');
  $('#contact-buttons').on('click', '.fa', function() {
    // show a modal or send to link, depeding on visiting status
    name = $(this).attr('data-name');
    url = $(this).attr('data-url');
    value = $(this).attr('data-value');

    visiting = $('body').attr('data-visiting') == 1;
    if (visiting && name != 'Phone Number') {
      // phone numbers dont have a specific link
      window.location.href = url + value;
    }

    // set the modal title to whatever contact button was clicked
    contactModal.find('.modal-title').text(name);
    input = contactModal.find('#contactInput');
    if (name == 'Phone Number') {
      input.mask('(999) 999-9999');
    }
    input.val(value);

    startingUrl.text(url);

    // remove alert that was maybe set before when setting a previous setting
    contactAlert.addClass('invisible');

    // show the modal
    contactModal.modal('show');
    return false;
  });

  contactModal.find('#submit-contact').on('click', function() {
    // name needed to change info is modal-title without spaces
    name = contactModal.find('.modal-title').text();
    key = name.replace(/ /g, '');
    value = contactModal.find('#contactInput').val();
    updateContactInfo(name, key, value);
    return false;
  });

  function updateContactInfo(name, key, value) {
    $.ajax({
      type: "POST",
      data: {
        key: key,
        value: value
      },
      url: window.location.href,
      success: function(data) {
        contactAlert.removeClass('invisible');
        if (data['success']) {
          // changed contact info successfully
          contactAlert.addClass('alert-success');
          contactAlert.removeClass('alert-danger');
          contactAlert.text("Successfully changed " + name);

        } else {
          // an error occured
          contactAlert.addClass('alert-danger');
          contactAlert.removeClass('alert-success');
          contactAlert.text("Error when changing " + name);
        }
      }
    });
  }

});
