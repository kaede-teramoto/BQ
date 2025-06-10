<?php

/**
 * page-custom.php
 * カスタムページ用 カスタムメタボックス＋出力関数 クラス版
 */

class Custom_Page_Repeater_Meta_Box
{
    public static function init()
    {
        add_action('add_meta_boxes', [__CLASS__, 'register_meta_box']);
        add_action('save_post', [__CLASS__, 'save_meta_box']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_assets']);
        add_action('wp_ajax_get_parent_repeater_template', [__CLASS__, 'ajax_get_parent_template']);
        add_action('wp_ajax_get_child_repeater_template', [__CLASS__, 'ajax_get_child_template']);
    }

    public static function register_meta_box()
    {
        global $post;

        if (! $post) {
            return;
        }

        $template = get_post_meta($post->ID, '_wp_page_template', true);

        if (strpos($template, 'page-customfield.php') !== false) {
            add_meta_box(
                'custom_meta_box_id',
                'コンテンツ',
                [__CLASS__, 'display_meta_box'],
                'page',
                'normal',
                'high'
            );
        }
    }

    public static function display_meta_box($post)
    {
        $value = get_post_meta($post->ID, '_page_custom_repeater', true);
        if (!is_array($value)) {
            $value = array();
        }

        wp_nonce_field(basename(__FILE__), 'custom_meta_box_nonce');

        echo '<div class="parent-repeater-wrapper">';

        $parents = $value['parents'] ?? array();

        if (empty($parents)) {
            $parents[] = array(
                'block_name' => '',
                'content_type'  => 'r_content',
                'block_class' => '',
                'title' => '',
                'title_image' => '',
                'subtitle' => '',
                'child_count' => 0,
                'children' => array(),
                'content' => '',
                'background_image' => '',
            );
        }

        foreach ($parents as $parentIndex => $parent) {
            require get_template_directory() . '/theme_support/parent-repeater-template.php';
        }

        echo '</div>'; // .parent-repeater-wrapper
        echo '<div class="add-parent-repeater">';
        echo '<button type="button" class="button button-primary button-large add-parent-button">ブロックを追加</button>';
        echo '</div>'; // .add-parent-repeater
    }

    public static function save_meta_box($post_id)
    {
        if (
            ! isset($_POST['custom_meta_box_nonce']) ||
            ! wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))
        ) {
            return $post_id;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // 🔸 プレビュー時は保存スキップ
        if (isset($_POST['wp-preview']) && $_POST['wp-preview'] === 'dopreview') {
            return $post_id;
        }

        if ('page' !== $_POST['post_type'] || ! current_user_can('edit_page', $post_id)) {
            return $post_id;
        }

        $value = $_POST['page_custom_repeater'] ?? array();

        $parents = array();

        if (isset($value['parents']) && is_array($value['parents'])) {
            foreach ($value['parents'] as $parent_index => $parent_item) {

                // === バリデーション ===
                $block_name = trim($parent_item['block_name'] ?? '');
                if ($block_name === '') {
                    // ブロック名が空 → スキップ
                    continue;
                }

                $children = array();
                if (isset($parent_item['children']) && is_array($parent_item['children'])) {
                    $child_limit = 10; // 最大10件
                    $child_count = 0;

                    foreach ($parent_item['children'] as $child_item) {
                        // 子項目 いずれかが入力されている場合のみ保存
                        $has_value = false;

                        if (
                            ! empty(trim($child_item['subtitle'] ?? '')) ||
                            ! empty(trim($child_item['subtitle_sub'] ?? '')) ||
                            ! empty(trim($child_item['subcontent'] ?? '')) ||
                            ! empty(trim($child_item['image'] ?? '')) ||
                            ! empty(trim($child_item['button_text'] ?? '')) ||
                            ! empty(trim($child_item['button_url'] ?? ''))
                        ) {
                            $has_value = true;
                        }

                        if (! $has_value) {
                            continue; // 完全空なら skip
                        }

                        if ($child_count >= $child_limit) {
                            break; // 最大件数超えたら終了
                        }

                        $children[] = array(
                            'subtitle'     => sanitize_text_field($child_item['subtitle'] ?? ''),
                            'subtitle_sub' => sanitize_textarea_field($child_item['subtitle_sub'] ?? ''),
                            'subcontent'   => wp_kses_post($child_item['subcontent'] ?? ''),
                            'image'        => esc_url_raw($child_item['image'] ?? ''),
                            'image_inline' => !empty($child_item['image_inline']) ? '1' : '',
                            'button_text'  => sanitize_text_field($child_item['button_text'] ?? ''),
                            'button_url'   => esc_url_raw($child_item['button_url'] ?? ''),
                            'button_type'  => in_array(($child_item['button_type'] ?? ''), array('button', 'text')) ? $child_item['button_type'] : 'button',
                        );

                        $child_count++;
                    }
                }

                $parents[] = array(
                    'block_name'          => sanitize_text_field($block_name),
                    'content_type'        => sanitize_text_field($parent_item['content_type'] ?? ''),
                    'block_class'         => sanitize_text_field($parent_item['block_class'] ?? ''),
                    'title'               => sanitize_textarea_field($parent_item['title'] ?? ''),
                    'title_image'         => esc_url_raw($parent_item['title_image'] ?? ''),
                    'subtitle'            => sanitize_textarea_field($parent_item['subtitle'] ?? ''),
                    'child_count'         => count($children), // 保存時は **実際の子セット数に上書き**
                    'children'            => $children,
                    'content'             => wp_kses_post($parent_item['content'] ?? ''),
                    'background_image'    => esc_url_raw($parent_item['background_image'] ?? ''),
                );
            }
        }

        $new_value = array(
            'parents' => $parents,
        );

        update_post_meta($post_id, '_page_custom_repeater', $new_value);
    }


    public static function enqueue_assets($hook)
    {
        if ($hook === 'post.php' || $hook === 'post-new.php') {
            wp_enqueue_script(
                'sortable-js',
                'https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js',
                array(),
                null,
                true
            );

            wp_enqueue_script(
                'custom-meta-repeater',
                get_template_directory_uri() . '/theme_support/js/custom-meta-repeater.js',
                array('jquery'),
                null,
                true
            );

            wp_localize_script(
                'custom-meta-repeater',
                'customMetaRepeaterData',
                array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'nonce'    => wp_create_nonce('custom_meta_repeater_nonce')
                )
            );

            wp_enqueue_style(
                'custom-meta-repeater-style',
                get_template_directory_uri() . '/theme_support/css/custom-meta-repeater.css',
                array(),
                null
            );
        }
    }

    public static function ajax_get_parent_template()
    {
        check_ajax_referer('custom_meta_repeater_nonce', 'nonce');

        $parentIndex = isset($_POST['parentIndex']) ? intval($_POST['parentIndex']) : 0;

        $parent = array(
            'block_name' => '',
            'content_type' => 'r_content',
            'block_class' => '',
            'title' => '',
            'title_image' => '',
            'subtitle' => '',
            'child_count' => 0,
            'children' => array(),
            'content' => '',
            'background_image' => '',
        );

        ob_start();
        require get_template_directory() . '/theme_support/parent-repeater-template.php';
        $html = ob_get_clean();

        wp_send_json_success(array('html' => $html));
    }

    public static function ajax_get_child_template()
    {
        check_ajax_referer('custom_meta_repeater_nonce', 'nonce');

        $parentIndex = isset($_POST['parentIndex']) ? intval($_POST['parentIndex']) : 0;
        $childIndex = isset($_POST['childIndex']) ? intval($_POST['childIndex']) : 0;

        $child = array(
            'subtitle' => '',
            'subcontent' => '',
            'image' => '',
            'button_text' => '',
            'button_url' => '',
        );

        ob_start();
        require get_template_directory() . '/theme_support/child-repeater-template.php';
        $html = ob_get_clean();

        wp_send_json_success(array('html' => $html));
    }
}

/*--------------------------------------------------------------
 出力関数
--------------------------------------------------------------*/
function render_parent_block($parent, $parent_index = 0)
{
    ob_start();
    get_template_part('template-parts/custom/parent-block', null, array(
        'parent' => $parent,
        'parent_index' => $parent_index,
    ));
    return ob_get_clean();
}


function render_child_block($child)
{
    ob_start();
    get_template_part('template-parts/custom/child-block', null, array('child' => $child));
    return ob_get_clean();
}

/*--------------------------------------------------------------
 クラス初期化
--------------------------------------------------------------*/
Custom_Page_Repeater_Meta_Box::init();
