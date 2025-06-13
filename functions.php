<?php
/*
 * this is functions.
 *
 * @package BOUTiQ
 */

if (!isset($content_width)) {
    $content_width = 640;
}


function sanitize_textarea_content($input)
{
    //return wp_kses_post(wpautop($text));
    return wp_kses_post($input);
}

// theme_support
//get_template_part('theme_support/init');


require_once get_template_directory() . '/inc/theme_setting/admin_parts/init.php';
require_once get_template_directory() . '/inc/theme_setting/admin_parts/scripts.php';
require_once get_template_directory() . '/inc/theme_setting/admin_parts/custom-post.php';
require_once get_template_directory() . '/inc/theme_setting/admin_parts/titles.php';
require_once get_template_directory() . '/inc/theme_setting/admin_parts/tgm-config.php';
require_once get_template_directory() . '/inc/theme_setting/admin_parts/mega-menu.php';
require_once get_template_directory() . '/inc/page_custom_field/admin_parts/page_custom_fild.php';
require_once get_template_directory() . '/inc/customizer/init_customizer.php';
require_once get_template_directory() . '/inc/customizer/base/base_export_customizer.php';
