document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.edit-menu-item-image');

    buttons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const customUploader = wp.media({
                title: '画像を選択',
                button: {
                    text: 'この画像を使用'
                },
                multiple: false
            });

            customUploader.on('select', function () {
                const attachment = customUploader.state().get('selection').first().toJSON();
                button.value = attachment.url;
            });

            customUploader.open();
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.menu-item');

    items.forEach(function (item, index) {
        if (item.classList.contains('menu-item-depth-0')) {
            const next = items[index + 1];
            const hasChild = next && next.classList.contains('menu-item-depth-1');

            if (!hasChild) {
                const imageField = item.querySelector('.menu-item-image-field');
                if (imageField) imageField.style.display = 'none';
            }
        }
    });
});
