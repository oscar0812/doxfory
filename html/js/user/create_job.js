$(function() {
  jobPicModal = $('#jobPicModal');

  $('#upload').on('click', function() {
    jobPicModal.modal('show');
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
});
