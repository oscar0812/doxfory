$(function() {
  commentForm = $('#commentForm');
  template = $('.media.invisible');


  commentForm.validate({
    // Specify validation rules
    rules: {
      text: {
        required: true,
      }
    },
    messages: {
      text: {
        required: "Comment can't be empty",
      }
    },
    errorPlacement: function(error, element) {
      error.appendTo(element.parent().find('span'));
    },
    submitHandler: function(form) {
      // only submit the form if all is good

      ajaxForm(form, function(data) {
        console.log(data);
        if (data['success']) {
          user = data['User'];
          name = user['FirstName'] + " " + user['LastName'];
          src = user['ProfilePicture'];

          comment = template.clone();
          comment.removeClass('invisible');
          comment.find('img').attr('src', src);

          body = comment.find(".media-body").eq(0);
          time = body.find('.time').clone();
          time.text('JUST NOW');
          heading = body.find('.media-heading').eq(0);
          heading.text(name);
          heading.append(time);
          body.find("p").text(data['Body']);

          // clear out the text box
          commentForm.find('textarea').val("");

          // update commment count
          num = $("#number").text();
          $('#number').text(++num);

          $(".blog-comments").removeClass('invisible').append(comment);

        } else {
          console.log('no success');
        }
      });
    }
  });
});
