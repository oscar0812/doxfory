$(function() {
  commentForm = $('#commentForm');
  template = $('#commentTemplate');

  commentForm.on('submit', function(e) {
    e.preventDefault();
    ajaxForm(e.target, function(data) {
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

        $(".blog-comments").append(comment);

      } else {
        console.log('no success');
      }
    });
  });
});
