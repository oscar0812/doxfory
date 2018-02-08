$(function() {

  // -- PFP FORM --
  pfp = $('#pfp');
  pfpModal = $('#pfpModal');
  alert = pfpModal.find('.alert').eq(0);

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
        console.log(data);
        if (data['success']) {
          alert.addClass('invisible');
          pfp.attr('src', data['path'] + '?' + (new Date).getTime());
          pfpModal.modal('hide');
        } else {
          alert.removeClass('invisible');
          alert.addClass('alert-danger');
          alert.text(data['msg']);
        }
      }
    })
  });

  // -- CONTACT --
  contactModal = $('#contactModal');
  startingUrl = contactModal.find('#startingUrl');
  $('#contact-buttons').on('click', '.fa', function() {
    // show a modal
    url = $(this).attr('data-url');

    // set the modal title to whatever contact button was clicked
    contactModal.find('.modal-title').text($(this).attr('data-name'));
    contactModal.find('#contactInput').val($(this).attr('data-value'));

    startingUrl.text(url);
    contactModal.modal('show');
    return false;
  });

});
