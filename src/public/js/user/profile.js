$(function() {
  pfpModal = $("#pfpModal");

  $("#pfp").on("click", function() {
    pfpModal.modal("show");
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
        $('#result').text(data)
        console.log(data);
      }
    })
  })

});
