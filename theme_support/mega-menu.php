<?php
/*
 * This is mega menu.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
  メニュー項目に画像フィールドを追加
--------------------------------------------------------------*/
function add_menu_image_field($item_id, $item, $depth, $args)
{
    $menu_image = get_post_meta($item_id, '_menu_item_image', true);
?>
    <p class="description description-wide">
        <label for="edit-menu-item-image-<?php echo $item_id; ?>">
            画像URL<br>
            <input placeholder="画像を選択してください" type="text" id="edit-menu-item-image-<?php echo $item_id; ?>" class="widefat edit-menu-item-image" name="menu-item-image[<?php echo $item_id; ?>]" value="<?php echo esc_attr($menu_image); ?>" /><br>
        </label>
    </p>
    <style>
        .menu-item-image {
            max-width: 50px;
            /* 必要に応じてサイズを調整 */
            margin-right: 10px;
            /* テキストとの間隔 */
            vertical-align: middle;
        }
    </style>
<?php
}
add_action('wp_nav_menu_item_custom_fields', 'add_menu_image_field', 10, 4);

// メニュー画像フィールドの保存
function save_menu_image_field($menu_id, $menu_item_db_id)
{
    if (isset($_POST['menu-item-image'][$menu_item_db_id])) {
        $image_url = sanitize_text_field($_POST['menu-item-image'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_image', $image_url);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_image');
    }
}

add_action('wp_update_nav_menu_item', 'save_menu_image_field', 10, 2);


function enqueue_menu_image_uploader($hook)
{
    if ('nav-menus.php' !== $hook) return;
    wp_enqueue_media();
    wp_enqueue_script('menu-image-uploader', get_template_directory_uri() . '/theme_support/mega-menu.js', ['jquery'], null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_menu_image_uploader');


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // sub-menuの開始タグを変更
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"megaMenu\">\n<ul class=\"custom-sub-menu\">\n";
    }

    // sub-menuの終了タグを変更
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n</div>\n<div class=\"megaMenu__bg\"></div>\n";
    }

    // メニューアイテムの出力をカスタマイズ
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = !empty($item->classes) ? implode(' ', $item->classes) : '';
        $class_names = esc_attr($class_names);

        // メニュー項目のリストタグ
        $output .= "$indent<li class=\"menu-item $class_names\">";

        // 画像フィールドを取得
        $menu_image = get_post_meta($item->ID, '_menu_item_image', true);
        $item_output = '';

        if (!empty($menu_image)) {
            $item_output .= '<div class="mega__menu__img">';
            $item_output .= '<img src="' . esc_url($menu_image) . '" alt="' . esc_attr($item->title) . '" class="menu-item-image" />';
            $item_output .= '</div>';
        } else {
            error_log('メニュー画像が取得できませんでした: ID=' . $item->ID);
        }

        // メニューリンクの出力
        $item_output .= '<a href="' . esc_url($item->url) . '" class="menu-link">';
        $item_output .= esc_html($item->title);
        $item_output .= '</a>';

        // メニューアイテムの出力に追加
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}






// class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
// {
//     // sub-menuの開始タグを変更
//     public function start_lvl(&$output, $depth = 0, $args = null)
//     {
//         $indent = str_repeat("\t", $depth);
//         $output .= "\n$indent<div class=\"megaMenu\"><div class=\"megaMenu__bg\"></div>\n<ul class=\"custom-sub-menu\">\n";
//     }

//     // sub-menuの終了タグを変更
//     public function end_lvl(&$output, $depth = 0, $args = null)
//     {
//         $indent = str_repeat("\t", $depth);
//         $output .= "$indent</ul>\n</div>\n";
//     }

//     // メニューアイテムの出力をカスタマイズ
//     public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
//     {
//         $indent = ($depth) ? str_repeat("\t", $depth) : '';
//         $class_names = !empty($item->classes) ? implode(' ', $item->classes) : '';
//         $output .= "$indent<li class=\"menu-item $class_names\">";
//         $menu_image = get_post_meta($item->ID, '_menu_item_image', true);
//         if (!empty($menu_image)) {
//             $item_output = '<div class="mega__menu__img"><img src="' . esc_url($menu_image) . '" alt="' . esc_attr($item->title) . '" class="menu-item-image" /></div>' . $item_output;
//         }
//         $output .= '<a href="' . esc_url($item->url) . '">' . $item->title . '</a>';
//     }

//     public function end_el(&$output, $item, $depth = 0, $args = null)
//     {
//         $output .= "</li>\n";
//     }
// }


// //メニューで画像フィールドを取得
// function add_menu_image_to_nav($item_output, $item, $depth, $args)
// {
//     $menu_image = get_post_meta($item->ID, '_menu_item_image', true);
//     if (!empty($menu_image)) {
//         $item_output = '<div class="mega__menu__img"><img src="' . esc_url($menu_image) . '" alt="' . esc_attr($item->title) . '" class="menu-item-image" /></div>' . $item_output;
//     }
//     return $item_output;
// }
// add_filter('walker_nav_menu_start_el', 'add_menu_image_to_nav', 10, 4);