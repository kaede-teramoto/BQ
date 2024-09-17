<?php
/*
 * This is script.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
  post display css
--------------------------------------------------------------*/
function boutiq_editor_styles()
{
  add_editor_style('/css/editor-style.css');
}
add_action('after_setup_theme', 'boutiq_editor_styles');

/*--------------------------------------------------------------
  customizer display css
--------------------------------------------------------------*/
function boutiq_custom_customizer_style()
{
  wp_enqueue_style('my-customizer-css', get_template_directory_uri() . '/assets/css/customizer-style.css');
}

add_action('customize_controls_enqueue_scripts', 'boutiq_custom_customizer_style');
