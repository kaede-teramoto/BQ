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

/*--------------------------------------------------------------
  editor custom field css
--------------------------------------------------------------*/
function enqueue_custom_admin_styles($hook)
{
  // 投稿編集画面と固定ページ編集画面だけに限定（不要ならこのif文は省略OK）
  if ($hook === 'post.php' || $hook === 'post-new.php') {
    wp_enqueue_style(
      'custom-admin-editor-style',
      get_template_directory_uri() . '/assets/css/editor-style.css',
      array(),
      null
    );
  }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');
