jQuery(document).ready(function ($) {
    $('.edit-menu-item-image').on('click', function (e) {
        e.preventDefault();
        const button = $(this);
        const customUploader = wp.media({
            title: '画像を選択',
            button: {
                text: 'この画像を使用'
            },
            multiple: false
        }).on('select', function () {
            const attachment = customUploader.state().get('selection').first().toJSON();
            button.val(attachment.url);
        }).open();
    });
});
