<?php
/*
 * this is functions.
 *
 * @package BOUTiQ
 */

if (!isset($content_width)) {
    $content_width = 640;
}

function customizer_custom_scripts()
{
    // カスタマイザーのページでのみスクリプトを読み込む
    if (is_customize_preview()) {
        wp_enqueue_script('customizer-custom-script', get_template_directory_uri() . '/theme_customizer/customizer.js', array('jquery', 'customize-controls'), '', true);
    }
}
add_action('customize_controls_enqueue_scripts', 'customizer_custom_scripts');

function sanitize_textarea_content($input)
{
    //return wp_kses_post(wpautop($text));
    return wp_kses_post($input);
}

// theme_support
get_template_part('theme_support/init');
get_template_part('theme_support/custom-post');
get_template_part('theme_support/titles');
get_template_part('theme_support/scripts');
get_template_part('theme_support/tgm-config');
get_template_part('theme_support/mega-menu');
require_once get_template_directory() . '/theme_support/page-custom.php';
//get_template_part('theme_support/search'); //検索が不要な時は使用しない

// theme_customizer
//get_template_part('theme_customizer/customizer-header');
//get_template_part('theme_customizer/customizer-footer');
//get_template_part('theme_customizer/customizer-page');
//get_template_part('theme_customizer/customizer-cms');
get_template_part('theme_customizer/customizer-followBtn');
get_template_part('theme_customizer/customizer-sns');
get_template_part('theme_customizer/customizer-hamburger');
get_template_part('theme_customizer/customizer-sp');
// get_template_part('theme_customizer/customizer-top');
//get_template_part('theme_customizer/customizer-404');
get_template_part('theme_customizer/customizer-loading');
//get_template_part('theme_customizer/customizer-design');
get_template_part('theme_customizer/customizer-export');

require_once get_template_directory() . '/inc/customizer/init_customizer.php';
