$(function() {

  // -- PFP FORM --
  pfp = $('.pfp').eq(0);
  pfpModal = $('#pfpModal');
  pfpAlert = pfpModal.find('.alert').eq(0);

  pfp.on('click', function() {
    pfpModal.modal('show');
  });

  // -- Pfp image upload through ajax --
  $('#pfpForm').on('submit', function(e) {
    e.preventDefault();
    ajaxForm(e.target, function(data) {
      if (data['success']) {
        pfpAlert.addClass('invisible');
        pfp.attr('src', data['path'] + '?' + (new Date).getTime());
        pfpModal.modal('hide');
      } else {
        pfpAlert.removeClass('invisible');
        pfpAlert.addClass('alert-danger');
        pfpAlert.text(data['msg']);
      }
    });
  });

  // -- CONTACT --
  contactModal = $('#contactModal');
  contactAlert = contactModal.find('.alert').eq(0);
  startingUrl = contactModal.find('#startingUrl');
  $('#contact-buttons').on('click', '.show-modal', function() {
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
      input.inputmask('(999) 999-9999');
    } else {
      input.inputmask('remove');
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
        column: "contact",
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
          change = $('[data-name="' + name + '"]');
          change.attr('data-value', value).attr('data-original-title', value);
        } else {
          // an error occured
          contactAlert.addClass('alert-danger');
          contactAlert.removeClass('alert-success');
          contactAlert.text("Error when changing " + name);
        }
      }
    });
  }

  aboutModal = $('#aboutModal');
  // about me pencil clicked
  $('span').on('click', '#edit-about', function(e) {
    e.preventDefault();

    // set the textarea text (user about me)
    aboutModal.find('textarea').val(aboutModal.attr('data-text'));
    aboutModal.modal('show');
  });

  aboutModal.find('.submit').on('click', function() {
    // about me modal submit button clicked
    text = aboutModal.find('textarea').val();

    $.ajax({
      type: "POST",
      data: {
        column: "about",
        text: text
      },
      url: window.location.href,
      success: function(data) {
        if (data['success']) {
          text = data['text'];
          // clone the pencil or it'll get lost when setting the about text
          pencil = $('#edit-about').clone();

          // set the text to about on profile page
          $('#about-section').text(text);

          // add the pencil back
          $('#about-section').append(' ').append(pencil);

          // set the attr for when the pencil is clicked again
          aboutModal.attr('data-text', text);
        } else {
          console.log(data);
        }
      }
    });
  });

  // get list of languages from languages.json
  $.getJSON('../../app/languages.json', function(json){
    console.log(json);
  });
});
