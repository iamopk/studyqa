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

  $('.summernote').summernote({
    height: 300,
    callbacks: {
      onImageUpload: function(files) {
        var editor = $(this);
        var url = editor.data('image-url');
        var data = new FormData();
        data.append('file', files[0]);
        axios.post(url, data).then(function(response) {
          editor.summernote('insertImage', '/storage/'+response.data);
        })
        .catch(function (error) {
          console.error(error);
        });
      }
    }
  });
});
