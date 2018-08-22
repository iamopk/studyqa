$( document ).ready(function() {
  $('#btnPictureChange').click(function (event ) {
    event.preventDefault();
    $('#imgPicture').hide();
    $('#btnPictureChange').hide();
    $('#picFormControl').show();
  });
});