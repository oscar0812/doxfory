$(function() {
  mainForm = $('#main_form');

  jobImageModal = $('#jobImageModal');
  jobModalAlert = jobImageModal.find('.alert').eq(0);

  $('#upload').on('click', function() {
    jobImageModal.modal('show');
  });

  // -- job image upload through ajax --
  $('#jobImageForm').on('submit', function(e) {
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
          // successfully posted
          jobModalAlert.addClass('invisible');
          jobModalAlert.modal('hide');

          // show image
          $('#image').attr('src', data['img']);
          jobImageModal.modal('hide');

        } else {
          jobModalAlert.removeClass('invisible');
          jobModalAlert.addClass('alert-danger');
          jobModalAlert.text(data['msg']);
        }
      }
    })
  });

  // -- job form upload through ajax --
  $(mainForm).on('submit', function(e) {
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
      }
    })
  });

  payment_input = $('input[name="payment_info"]');
  setNumMask(payment_input);

  $('select[name="payment_select"]').on('change', function() {
    if ($(this).val() == 2) {
      // barter
      payment_input.inputmask('remove');
      payment_input.attr('placeholder', 'Couch');
    } else {
      setNumMask(payment_input);
    }
  });

  function setNumMask(selector) {
    $(selector).inputmask({
      // 3 optional digits in front
      mask: "$9[9][9][9].99",
      greedy: false
    });
  }

});
