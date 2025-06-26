<?php
/*
 * This is script.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
  editor custom field css
--------------------------------------------------------------*/
function enqueue_custom_admin_styles($hook)
{
  wp_enqueue_style(
    'custom-admin-editor-style',
    get_template_directory_uri() . '/assets/css/editor-style.css',
    array(),
    null
  );
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');
