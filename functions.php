<?php
/*
 * this is functions.
 *
 * @package BOUTiQ
 */

if (!isset($content_width)) {
    $content_width = 640;
}

load_theme_textdomain('boutiq');

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
get_template_part('theme_support/titles');
get_template_part('theme_support/scripts');
get_template_part('theme_support/tgm-config');
//get_template_part('theme_support/breadcrumbs'); //パンくずリストが不要な時は使用しない
//get_template_part('theme_support/search'); //検索が不要な時は使用しない

// theme_customizer
get_template_part('theme_customizer/customizer-header');
get_template_part('theme_customizer/customizer-footer');
get_template_part('theme_customizer/customizer-page');
get_template_part('theme_customizer/customizer-cms');
get_template_part('theme_customizer/customizer-follow_button');
get_template_part('theme_customizer/customizer-sns');
get_template_part('theme_customizer/customizer-hamburger');
get_template_part('theme_customizer/customizer-sp');
get_template_part('theme_customizer/customizer-top');
get_template_part('theme_customizer/customizer-404');
get_template_part('theme_customizer/customizer-design');
get_template_part('theme_customizer/customizer-export');
