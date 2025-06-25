<?php
if (!class_exists('Custom_Flexible_Fields')) {
    class Custom_Flexible_Fields
    {
        private $post_type;
        private $meta_box_id;
        private $meta_box_title;
        private $fields;

        public function __construct($post_type, $meta_box_id, $meta_box_title, $fields, $context = 'normal', $priority = 'default')
        {
            $this->post_type = $post_type;
            $this->meta_box_id = $meta_box_id;
            $this->meta_box_title = $meta_box_title;
            $this->fields = $fields;
            $this->context = $context;
            $this->priority = $priority;

            add_action('add_meta_boxes', [$this, 'add_single_meta_box']);
            add_action('save_post', [$this, 'save_single_meta_box']);
            add_action('admin_enqueue_scripts', [$this, 'enqueue_media_uploader']);
        }

        public function enqueue_media_uploader()
        {
            wp_enqueue_media();
            wp_enqueue_script('custom-media-uploader', '', [], false, true);
        }

        public function add_single_meta_box()
        {
            add_meta_box(
                $this->meta_box_id,
                $this->meta_box_title,
                [$this, 'render_meta_box'],
                $this->post_type,  // ← 正しい： 'post', 'page', など
                $this->context,    // ← 'normal', 'side'
                $this->priority    // ← 'high', 'default'
            );
        }

        public function render_meta_box($post)
        {
            wp_nonce_field(basename(__FILE__), $this->meta_box_id . '_nonce');

            foreach ($this->fields as $field) {
                $id = esc_attr($field['id']);
                $label = esc_html($field['label']);
                $type = $field['type'] ?? 'text';
                $value = get_post_meta($post->ID, $id, true);

                echo '<p>';
                echo "<label for='{$id}'><strong>{$label}</strong></label><br>";

                switch ($type) {
                    case 'textarea':
                        echo "<textarea id='{$id}' name='{$id}' rows='2' style='width:100%;'>" . esc_textarea($value) . "</textarea>";
                        break;
                    case 'checkbox':
                        $checked = $value ? 'checked' : '';
                        echo "<input type='checkbox' id='{$id}' name='{$id}' value='1' {$checked}> {$label}";
                        break;
                    case 'checkbox_multi':
                        $saved = is_array($value) ? $value : [];
                        foreach ($field['options'] as $opt_value => $opt_label) {
                            $checked = in_array($opt_value, $saved) ? 'checked' : '';
                            echo "<label><input type='checkbox' name='{$id}[]' value='{$opt_value}' {$checked}> " . esc_html($opt_label) . "</label><br>";
                        }
                        break;
                    case 'radio':
                        echo '<div style="display: flex;gap: 10px;flex-wrap: wrap;">';
                        foreach ($field['options'] as $opt_value => $opt_label) {
                            $checked = $value === $opt_value ? 'checked' : '';
                            echo "<label><input type='radio' name='{$id}' value='{$opt_value}' {$checked}> " . esc_html($opt_label) . "</label><br>";
                        }
                        echo '</div>';
                        break;
                    case 'select':
                        echo "<select name='{$id}' id='{$id}' style='width:100%;'>";
                        foreach ($field['options'] as $opt_value => $opt_label) {
                            $selected = $value === $opt_value ? 'selected' : '';
                            echo "<option value='{$opt_value}' {$selected}>" . esc_html($opt_label) . "</option>";
                        }
                        echo "</select>";
                        break;
                    case 'image':
                        $image_url = $value ? wp_get_attachment_image_url($value, 'medium') : '';
                        echo "<input type='hidden' name='{$id}' id='{$id}' value='" . esc_attr($value) . "'>";
                        echo "<div id='{$id}_preview'>" . ($image_url ? "<img src='{$image_url}' style='max-width:200px;'>" : '') . "</div>";
                        echo "<button type='button' class='button upload_image_button' data-target='{$id}'>画像を選択</button>";
                        break;
                    case 'url':
                        echo "<input type='url' id='{$id}' name='{$id}' value='" . esc_attr($value) . "' style='width:100%;'>";
                        break;
                    case 'text':
                    default:
                        echo "<input type='text' id='{$id}' name='{$id}' value='" . esc_attr($value) . "' style='width:100%;'>";
                        break;
                }

                echo '</p>';
            }

            // JS for image uploader
            echo <<<JS
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.upload_image_button').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const targetInputId = button.dataset.target;
            const imageInput = document.getElementById(targetInputId);

            const frame = wp.media({
                title: '画像を選択',
                button: { text: '選択' },
                multiple: false
            });

            frame.on('select', function () {
                const attachment = frame.state().get('selection').first().toJSON();
                imageInput.value = attachment.id;
                document.getElementById(targetInputId + '_preview').innerHTML = '<img src="' + attachment.url + '" style="max-width:200px;">';
            });

            frame.open();
        });
    });
});
</script>
JS;
        }

        public function save_single_meta_box($post_id)
        {
            if (
                !isset($_POST[$this->meta_box_id . '_nonce']) ||
                !wp_verify_nonce($_POST[$this->meta_box_id . '_nonce'], basename(__FILE__))
            ) {
                return;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

            if (!current_user_can('edit_post', $post_id)) return;

            foreach ($this->fields as $field) {
                $id = $field['id'];
                $type = $field['type'] ?? 'text';

                if ($type === 'checkbox') {
                    $value = isset($_POST[$id]) ? '1' : '';
                } elseif ($type === 'checkbox_multi') {
                    $value = isset($_POST[$id]) ? array_map('sanitize_text_field', (array) $_POST[$id]) : [];
                } else {
                    $value = isset($_POST[$id]) ? sanitize_text_field($_POST[$id]) : '';
                }

                update_post_meta($post_id, $id, $value);
            }
        }
    }
}
