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
    ajaxForm(e.target, function(data) {
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
    });
  });


  payment_input = $('input[name="payment_info"]');
  setNumMask(payment_input);

  $('select[name="payment_select"]').on('change', function() {
    payment_input.val('');
    if ($(this).val() == "IsBarter") {
      // barter
      payment_input.inputmask('remove');
      payment_input.attr('placeholder', 'Couch');
    } else {
      setNumMask(payment_input);
      payment_input.attr('placeholder', '$10.00');
    }
  });

  function setNumMask(selector) {
    $(selector).inputmask({
      // 3 optional digits in front
      mask: "$9[9][9][9].99",
      greedy: false
    });
  }

  mainForm.validate({
    // Specify validation rules
    rules: {
      title: {
        required: true,
      },
      description: {
        required: true,
      },
      payment_info: {
        required: true,
      }
    },
    messages: {
      title: {
        required: "Please provide a title",
      },
      description: {
        required: "Please provide a description",
      },
      payment_info: {
        required: "Please fill out payment"
      }
    },
    errorPlacement: function(error, element) {
      error.appendTo(element.parent().find('span'));
    },
    submitHandler: function(form) {
      // only submit the form if all is good
      ajaxForm(form, function(data) {
        alert = $('#small-alert');
        if (data['success']) {
          alert.removeClass('text-danger');
          alert.addClass('text-success');
          alert.text('Successfully submitted job, redirecting to all jobs...');

          setTimeout(
            function() {
              // wait a little to let user see message
              window.location.href = alert.attr('data-url');
            }, 500);

        } else {
          alert.addClass('text-danger');
          alert.removeClass('text-success');
          alert.text('Error while submitting job');
        }
      });
    }
  });

});
