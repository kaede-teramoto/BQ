<?php
/*
 * This is Initial setting
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
  feed
--------------------------------------------------------------*/
add_theme_support('automatic-feed-links');

/*--------------------------------------------------------------
  thumbnail
--------------------------------------------------------------*/
function boutiq_thumbnail_size()
{
  add_theme_support('post-thumbnails');
  add_image_size('list-thumbnail', 300, 300, true);
}
add_action('after_setup_theme', 'boutiq_thumbnail_size');


/*--------------------------------------------------------------
  menu
--------------------------------------------------------------*/
register_nav_menus(array(
  'headerNav' => esc_attr(__('HEADER MENU', 'boutiq')),
  'headerNavSub' => esc_attr(__('HEADER SUB MENU', 'boutiq')),
  'footerNavMain' => esc_attr(__('FOOTER MENU', 'boutiq')),
  'footerNavLeft' => esc_attr(__('FOOTER LEFT MENU', 'boutiq')),
  'footerNavRight' => esc_attr(__('FOOTER RIGHT MENU', 'boutiq')),
  'footerNavInfo' => esc_attr(__('FOOTER INFO MENU', 'boutiq')),
  'hamburgerNavLeft' => esc_attr(__('HAMBURGER MENU LEFT MENU', 'boutiq')),
  'hamburgerNavRight' => esc_attr(__('HAMBURGER MENU RIGHT MENU', 'boutiq')),
  'hamburgerNavInfo' => esc_attr(__('HAMBURGER MENU INFO MENU', 'boutiq')),
));

/*--------------------------------------------------------------
Delete the automatically assigned ID and class from the custom menu and add the specified class.
--------------------------------------------------------------*/
function custom_nav_menu_classes($classes, $item)
{
  $new_classes = array('nav-item');

  // "current" state detection
  if (
    in_array('current-menu-item', $classes) ||
    in_array('current_page_item', $classes) ||
    in_array('current-menu-ancestor', $classes) ||
    in_array('current-menu-parent', $classes) ||
    in_array('current_page_parent', $classes) ||
    in_array('current_page_ancestor', $classes)
  ) {

    $new_classes[] = 'current-item';
  }

  return $new_classes;
}
add_filter('nav_menu_css_class', 'custom_nav_menu_classes', 10, 2);

function remove_nav_menu_item_id($id, $item, $args, $depth)
{
  return '';
}
add_filter('nav_menu_item_id', 'remove_nav_menu_item_id', 10, 4);

/*--------------------------------------------------------------
  excerpt_length
--------------------------------------------------------------*/
function boutiq_excerpt_length($length)
{
  return 150;
}
add_filter('excerpt_length', 'boutiq_excerpt_length');

function boutiq_excerpt_more($post)
{
  return esc_attr(__('...more', 'boutiq'));
}
add_filter('excerpt_more', 'boutiq_excerpt_more');


/*--------------------------------------------------------------
  translation
--------------------------------------------------------------*/
function boutiq_languages()
{
  load_theme_textdomain('boutiq', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'boutiq_languages');

/*--------------------------------------------------------------
  html5
--------------------------------------------------------------*/
add_theme_support('html5', array(
  'search-form',
  'comment-form',
  'comment-list',
  'gallery',
  'caption',
  'style',
  'script',
));

/*--------------------------------------------------------------
  Function to automatically generate post slugs (duplicate-proof version)
--------------------------------------------------------------*/
/**
 * @param string $slug
 * @param int    $post_ID
 * @param string $post_status
 * @param string $post_type
 * @return string
 */
function auto_post_slug_with_date($slug, $post_ID, $post_status, $post_type)
{

  if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
    $post_date = get_post_field('post_date', $post_ID);
    $formatted_date = date('Ymd', strtotime($post_date));
    $slug = sanitize_title($post_type) . '-' . $formatted_date . '-' . $post_ID;
  }
  return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug_with_date', 10, 4);


/*--------------------------------------------------------------
  date set
--------------------------------------------------------------*/
function boutiq_the_post()
{
  global $previousday;
  $previousday = '';
}
add_action('the_post', 'boutiq_the_post');

/*--------------------------------------------------------------
  Stop updating 'All-in-One WP Migration'
--------------------------------------------------------------*/
function disable_plugin_update_allIn($data)
{
  $plugin_path = 'all-in-one-wp-migration/all-in-one-wp-migration.php';
  if (isset($data->response[$plugin_path])) {
    unset($data->response[$plugin_path]);
  }
  return $data;
}
add_filter('site_option__site_transient_update_plugins', 'disable_plugin_update_allIn');

/*--------------------------------------------------------------
  Delete p tag from contact form 7
--------------------------------------------------------------*/
if (function_exists('is_plugin_active') && is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
  add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<p[^>]*>/', '', $content);
    $content = str_replace('</p>', '', $content);
    return $content;
  });
}

function load_recaptcha_js()
{
  if (is_page('contact')) {
    wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js', [], null, true);
  } else {
    wp_deregister_script('google-recaptcha');
  }
}
add_action('wp_enqueue_scripts', 'load_recaptcha_js', 100);

/*--------------------------------------------------------------
  Category link
--------------------------------------------------------------*/
function cat_link()
{
  if (get_post_type() === 'post') {
    $categories = get_the_category();
    if (! empty($categories)) {
      echo '<div class="cat">';
      foreach ($categories as $category) {
        echo '<a class="cat-link cat-' . esc_html($category->slug) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
      }
      echo '</div>';
    }
  } else {
    // For custom post types
    $post_type = get_post_type();
    $taxonomies = get_object_taxonomies($post_type, 'objects');

    if (! empty($taxonomies)) {
      foreach ($taxonomies as $taxonomy) {
        $terms = get_the_terms(get_the_ID(), $taxonomy->name);
        if (! empty($terms) && ! is_wp_error($terms)) {
          echo '<div class="cat">';
          foreach ($terms as $term) {
            echo '<a class="cat-link cat-' . esc_html($term->slug) . '" href="' . esc_url(get_category_link($term->term_id)) . '">' . esc_html($term->name) . '</a>';
          }
          echo '</div>';
        }
      }
    }
  }
}

/*--------------------------------------------------------------
  Tag link
--------------------------------------------------------------*/
function tag_link()
{
  // Get the tags associated with the current post
  $tags = get_the_tags();

  if (!empty($tags)) {
    echo '<div class="tag">';
    foreach ($tags as $tag) {
      echo '<a class="tag__link tag__' . esc_html($tag->slug) . '" href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
    }
    echo '</div>';
  }
}

/*--------------------------------------------------------------
  Function to check if “at least one post exists” for a custom post type (or normal post type)
--------------------------------------------------------------*/
function has_posts_in_custom_post_type($post_type)
{
  if (empty($post_type)) {
    return false;
  }

  // Check if there is a post in the specified post type
  $posts = get_posts(array(
    'post_type'      => $post_type,
    'posts_per_page' => 1,
    'post_status'    => 'publish'
  ));

  return !empty($posts);
}

/*--------------------------------------------------------------
  Hide the visual editor only on fixed page edit screens
--------------------------------------------------------------*/
function disable_visual_editor_in_page()
{
  global $typenow;

  if ($typenow === 'page') {
    $post_id = isset($_GET['post']) ? (int) $_GET['post'] : 0;
    if ($post_id > 0) {
      $template = get_page_template_slug($post_id);
      if ($template === 'page-customfield.php') {
        add_filter('user_can_richedit', '__return_false');
      }
    }
  }
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');


/*--------------------------------------------------------------
  Removed “Comments” menu from the admin page.
--------------------------------------------------------------*/
function remove_comments_menu()
{
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_menu');

// Remove admin bar links related to comments
function remove_comments_from_admin_bar($wp_admin_bar)
{
  $wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'remove_comments_from_admin_bar', 999);

// hide comment-related widgets
function remove_dashboard_widgets()
{
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// Hide comment-related screen options
function disable_comments_screen_options()
{
  global $pagenow;

  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', 'disable_comments_screen_options');


/*--------------------------------------------------------------
  ID取得関数
--------------------------------------------------------------*/
function get_current_context_id()
{
  if (is_singular()) {
    return get_the_ID();
  } elseif (is_home()) {
    return get_option('page_for_posts');
  } elseif (is_category() || is_tag() || is_tax()) {
    return get_queried_object()->term_id;
  }
  return null;
}
