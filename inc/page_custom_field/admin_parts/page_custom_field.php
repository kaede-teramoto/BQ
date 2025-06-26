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
        add_filter('get_post_metadata', [__CLASS__, 'filter_preview_custom_repeater_meta'], 10, 4);
        add_action('init', [__CLASS__, 'register_custom_meta']);
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
            require get_template_directory() . '/inc/page_custom_field/admin_parts/repeater-parent-template.php';
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

        if (wp_is_post_autosave($post_id)) {
            // autosaveはOK
        } elseif (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        if ('page' !== $_POST['post_type'] || ! current_user_can('edit_page', $post_id)) {
            return $post_id;
        }

        // 判定用
        $is_preview = (
            (defined('REST_REQUEST') && REST_REQUEST && isset($_GET['context']) && $_GET['context'] === 'edit')
            || (isset($_POST['wp-preview']) && $_POST['wp-preview'] === 'dopreview')
            || (isset($_REQUEST['preview']) && $_REQUEST['preview'] === 'true')
        );

        // ここは return しない！ ↓↓↓ この判定だけでOK
        // $meta_key_to_save を判定
        $meta_key_to_save = $is_preview ? '_page_custom_repeater_preview' : '_page_custom_repeater';

        $value = $_POST['page_custom_repeater'] ?? array();

        $parents = array();

        if (isset($value['parents']) && is_array($value['parents'])) {
            foreach ($value['parents'] as $parent_index => $parent_item) {

                $block_name = trim($parent_item['block_name'] ?? '');
                if ($block_name === '') {
                    continue;
                }

                $children = array();
                if (isset($parent_item['children']) && is_array($parent_item['children'])) {
                    $child_limit = 10;
                    $child_count = 0;

                    foreach ($parent_item['children'] as $child_item) {
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
                            continue;
                        }

                        if ($child_count >= $child_limit) {
                            break;
                        }

                        $allowed_iframe_tags = array(
                            'iframe' => array(
                                'src'             => true,
                                'width'           => true,
                                'height'          => true,
                                'frameborder'     => true,
                                'allowfullscreen' => true,
                                'allow'           => true,
                                'loading'         => true,
                                'referrerpolicy'  => true,
                            ),
                        );

                        // 既存の許可タグに iframe を追加
                        $allowed_tags = wp_kses_allowed_html('post');
                        $allowed_tags = array_merge($allowed_tags, $allowed_iframe_tags);

                        $children[] = array(
                            'subtitle'     => sanitize_text_field($child_item['subtitle'] ?? ''),
                            'subtitle_sub' => sanitize_textarea_field($child_item['subtitle_sub'] ?? ''),
                            'subcontent' => wp_kses($child_item['subcontent'] ?? '', $allowed_tags),
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
                    'child_count'         => count($children),
                    'children'            => $children,
                    'content'             => wp_kses_post($parent_item['content'] ?? ''),
                    'background_image'    => esc_url_raw($parent_item['background_image'] ?? ''),
                );
            }
        }

        $new_value = array(
            'parents' => $parents,
        );

        update_post_meta($post_id, $meta_key_to_save, $new_value);

        // ⭐️ 本体保存時は preview用metaを削除しておく（後始末）
        if (!$is_preview) {
            delete_post_meta($post_id, '_page_custom_repeater_preview');
        }
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
                get_template_directory_uri() . '/inc/page_custom_field/admin_parts/js/custom-meta-repeater.js',
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
                get_template_directory_uri() . '/inc/page_custom_field/admin_parts/css/custom-meta-repeater.css',
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
        require get_template_directory() . '/inc/page_custom_field/admin_parts/repeater-parent-template.php';
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
        require get_template_directory() . '/inc/page_custom_field/admin_parts/repeater-child-template.php';
        $html = ob_get_clean();

        wp_send_json_success(array('html' => $html));
    }

    public static function filter_preview_custom_repeater_meta($value, $object_id, $meta_key, $single)
    {
        if ($meta_key !== '_page_custom_repeater') {
            return $value;
        }

        // ⭐️ REST API Preview Request → php://input から読み取る
        if (defined('REST_REQUEST') && REST_REQUEST && isset($_GET['context']) && $_GET['context'] === 'edit') {
            // php://input 読み込み (最初の1回だけグローバル変数にキャッシュ)
            static $rest_request_body = null;
            if ($rest_request_body === null) {
                $rest_request_body = json_decode(file_get_contents('php://input'), true);
            }

            if (isset($rest_request_body['meta']['_page_custom_repeater'])) {
                return array($rest_request_body['meta']['_page_custom_repeater']);
            }

            // fallbackとして _page_custom_repeater_preview
            $preview_meta = get_metadata('post', $object_id, '_page_custom_repeater_preview', true);
            if (! empty($preview_meta)) {
                return array($preview_meta);
            }
        }

        // クラシック preview
        if (isset($_POST['wp-preview']) && $_POST['wp-preview'] === 'dopreview' && isset($_POST['page_custom_repeater'])) {
            $custom_repeater = $_POST['page_custom_repeater'];
            $parents = $custom_repeater['parents'] ?? [];

            return array(array(
                'parents' => $parents,
            ));
        }

        // fallback
        return $value;
    }

    public static function register_custom_meta()
    {
        register_meta('post', '_page_custom_repeater', array(
            'show_in_rest' => array(
                'schema' => array(
                    'type'  => 'object',
                ),
                'prepare_callback' => function ($meta_value, $request, $object_type) {
                    $post_id = $request->get_param('id');
                    // Gutenberg Preview時は _page_custom_repeater_preview を返す
                    if (isset($_GET['preview']) && $_GET['preview'] === 'true') {
                        $preview_meta = get_post_meta($post_id, '_page_custom_repeater_preview', true);
                        if (!empty($preview_meta)) {
                            return $preview_meta;
                        }
                    }
                    // 通常は本体meta
                    return $meta_value;
                },
            ),
            'single' => true,
            'auth_callback' => function () {
                return current_user_can('edit_posts');
            },
        ));

        register_meta('post', '_page_custom_repeater_preview', array(
            'show_in_rest' => true,
            'single' => true,
            'type' => 'object',
            'auth_callback' => function () {
                return current_user_can('edit_posts');
            },
        ));
    }
}

/*--------------------------------------------------------------
 出力関数
--------------------------------------------------------------*/
function render_parent_block($parent, $parent_index = 0)
{
    ob_start();
    get_template_part('inc/page_custom_field/template_parts/parent-block', null, array(
        'parent' => $parent,
        'parent_index' => $parent_index,
    ));
    return ob_get_clean();
}

function render_child_block($child, $parent_index = 0, $child_index = 0)
{
    ob_start();
    get_template_part('inc/page_custom_field/template_parts/child-block', null, array(
        'child' => $child,
    ));
    return ob_get_clean();
}

/*--------------------------------------------------------------
 クラス初期化
--------------------------------------------------------------*/
Custom_Page_Repeater_Meta_Box::init();
