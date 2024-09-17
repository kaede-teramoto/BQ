/*
 * This is Javascript for placing a progress bar in the customizer.
 *
 * @package BOUTiQ
 */

(function () {
    wp.customize.controlConstructor['progress-bar'] = wp.customize.Control.extend({
        ready: function () {
            var control = this;
            var slider = document.createElement('input');
            slider.type = 'range';
            slider.className = 'progress-bar-slider';
            slider.min = 1;
            slider.max = 100;
            slider.step = 1;
            slider.value = control.setting();

            // スライダーをコントロールに追加
            control.container.append(slider);

            // スライダーの値が変更されたときに、設定値を更新
            slider.addEventListener('input', function () {
                control.setting.set(this.value);
            });

            slider.addEventListener('change', function () {
                control.setting.set(this.value);
            });

            // 設定値が変更されたときにスライダーの値を更新
            control.setting.bind(function (value) {
                slider.value = value;
            });
        }
    });
})();


document.addEventListener('DOMContentLoaded', () => {
    wp.customize.bind('ready', () => {
        document.querySelectorAll('textarea.wp-editor-area').forEach(textarea => {
            tinymce.init({
                selector: `#${textarea.id}`,
                setup: (editor) => {
                    editor.on('change', () => {
                        editor.save();
                        textarea.value = editor.getContent();
                        textarea.dispatchEvent(new Event('change', { bubbles: true }));
                    });
                    editor.on('keyup', () => {
                        editor.save();
                        textarea.value = editor.getContent();
                        textarea.dispatchEvent(new Event('change', { bubbles: true }));
                    });
                }
            });
        });
    });
});
