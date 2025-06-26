jQuery(document).ready(function ($) {
  let frame;

  $('.sub-image-upload').on('click', function (e) {
    e.preventDefault();

    const button = $(this);
    const input = button.siblings('input[type=hidden]');
    const preview = button.siblings('.sub-image-preview');

    if (frame) {
      frame.open();
      return;
    }

    frame = wp.media({
      title: 'Select or Upload an Image',
      button: { text: 'Use this image' },
      multiple: false,
    });

    frame.on('select', function () {
      const attachment = frame.state().get('selection').first().toJSON();
      input.val(attachment.url);
      preview.html('<img src="' + attachment.url + '" style="max-width:150px; height:auto;">');
    });

    frame.open();
  });

  $('.sub-image-remove').on('click', function (e) {
    e.preventDefault();

    const button = $(this);
    const input = button.siblings('input[type=hidden]');
    const preview = button.siblings('.sub-image-preview');

    input.val('');
    preview.empty();
  });
});
