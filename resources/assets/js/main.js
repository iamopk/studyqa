$( document ).ready(function() {
  $('#btnPictureChange').click(function (event) {
    event.preventDefault();
    $('#imgPicture').hide();
    $('#btnPictureChange').hide();
    $('#picFormControl').show();
  });

  $('.gallery-image').click(function (event) {
    $('#imageModal').modal('show');
    $('#gallery-modal-image').attr('src', $(event.target).attr('src'));
    $('#gallery-modal-title').text($(event.target).attr('alt'));
  });
});
