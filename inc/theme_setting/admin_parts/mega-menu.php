<?php
/*
 * This is mega menu.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
  Add image field to menu item
--------------------------------------------------------------*/
function add_menu_image_field($item_id, $item, $depth, $args)
{
    $menu_image = get_post_meta($item_id, '_menu_item_image', true);
?>
    <p class="description description-wide">
        <label for="edit-menu-item-image-<?php echo $item_id; ?>">
            <?php echo __('Image URL', 'boutiq') ?><br>
            <input placeholder="<?php echo __('Select image', 'boutiq') ?>" type="text" id="edit-menu-item-image-<?php echo $item_id; ?>" class="widefat edit-menu-item-image" name="menu-item-image[<?php echo $item_id; ?>]" value="<?php echo esc_attr($menu_image); ?>" /><br>
        </label>
    </p>
    <style>
        .menu-item-image {
            max-width: 50px;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
<?php
}
add_action('wp_nav_menu_item_custom_fields', 'add_menu_image_field', 10, 4);

// Save the menu image field
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
    wp_enqueue_script('menu-image-uploader', get_template_directory_uri() . '/inc/theme_setting/admin_parts/js/mega-menu.js', ['jquery'], null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_menu_image_uploader');


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // change the start tag of "sub-menu"
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"mega-menu\">\n<ul class=\"custom-sub-menu\">\n";
    }

    // change end tag of "sub-menu"
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n</div>\n";
    }

    // Customize menu item output
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = !empty($item->classes) ? implode(' ', $item->classes) : '';
        $class_names = esc_attr($class_names);

        $output .= "$indent<li class=\"menu-item $class_names\">";
        $menu_image = get_post_meta($item->ID, '_menu_item_image', true);
        $item_output = '';

        if (!empty($menu_image)) {
            $item_output .= '<div class="mega__menu__img">';
            $item_output .= '<img src="' . esc_url($menu_image) . '" alt="' . esc_attr($item->title) . '" class="menu-item-image" />';
            $item_output .= '</div>';
        } else {
            error_log('メニュー画像が取得できませんでした: ID=' . $item->ID);
        }

        $item_output .= '<a href="' . esc_url($item->url) . '" class="menu-link">';
        $item_output .= esc_html($item->title);
        $item_output .= '</a>';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
