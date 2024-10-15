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
function custom_nav_item_classes($classes, $item, $args, $depth)
{
  $classes = array();
  if (in_array('current-menu-item', $item->classes)) {
    $classes[] = 'nav__item current__item';
  } else {
    $classes[] = 'nav__item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_item_classes', 10, 4);

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
load_theme_textdomain('boutiq', get_template_directory() . '/languages');


/*--------------------------------------------------------------
  html5
--------------------------------------------------------------*/
add_theme_support('html5', array(
  'search-form',
  'comment-form',
  'comment-list',
  'gallery',
  'caption',
));

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
  Stop updating 'Custom Fields'
--------------------------------------------------------------*/
function disable_plugin_update($data)
{
  $plugin_path = 'advanced-custom-fields/acf.php';
  if (isset($data->response[$plugin_path])) {
    unset($data->response[$plugin_path]);
  }
  return $data;
}
add_filter('site_option__site_transient_update_plugins', 'disable_plugin_update');

/*--------------------------------------------------------------
  Category link
--------------------------------------------------------------*/
function cat_link()
{
  $categories = get_the_category();
  if (!empty($categories)) {
    echo '<div class="cat">';
    foreach ($categories as $category) {
      echo '<a class="cat__link" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
    }
    echo '</div>';
  }
}

/*--------------------------------------------------------------
  Tag link
--------------------------------------------------------------*/
function tag_link()
{
  // 現在の投稿に関連付けられたタグを取得
  $tags = get_the_tags();

  // タグが存在するかチェック
  if (!empty($tags)) {
    echo '<div class="tag">';
    foreach ($tags as $tag) {
      echo '<a class="tag__link" href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
    }
    echo '</div>';
  }
}

/*--------------------------------------------------------------
  固定ページの編集画面のみビジュアルエディタを非表示にする
--------------------------------------------------------------*/
function disable_visual_editor_in_page()
{
  global $typenow;
  if ($typenow == 'page') {
    add_filter('user_can_richedit', 'disable_visual_editor_filter');
  }
}
function disable_visual_editor_filter()
{
  return false;
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');




/*--------------------------------------------------------------
  カスタムポストタイプ「common_parts」を登録
--------------------------------------------------------------*/
function register_common_parts_post_type()
{
  $labels = array(
    'name'               => '共通パーツ',
    'singular_name'      => '共通パーツ',
    'menu_name'          => '共通パーツ',
    'name_admin_bar'     => '共通パーツ',
    'add_new'            => '新規追加',
    'add_new_item'       => '共通パーツを追加',
    'new_item'           => '新しい共通パーツ',
    'edit_item'          => '共通パーツを編集',
    'view_item'          => '共通パーツを表示',
    'all_items'          => '共通パーツ一覧',
    'search_items'       => '共通パーツを検索',
    'not_found'          => '共通パーツが見つかりませんでした',
    'not_found_in_trash' => 'ゴミ箱に共通パーツはありません',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => false,  // フロントエンドでは表示しない
    'exclude_from_search' => true,    // 検索結果に含めない
    'publicly_queryable' => false,   // クエリで公開しない
    'show_ui'            => true,    // 管理画面のUIを表示
    'show_in_menu'       => true,    // 管理画面のメニューに表示
    'show_in_admin_bar'  => true,    // 管理バーに表示
    'menu_position'      => 3,       // 管理画面での表示順序
    'menu_icon'          => 'dashicons-admin-generic',  // アイコン
    'capability_type'    => 'post',  // 権限を「post」に準拠
    'supports'           => array('title', 'editor', 'thumbnail'), // サポートする機能
    'has_archive'        => false,   // アーカイブページは作成しない
    'rewrite'            => false,   // リライトルールを無効化
    'query_var'          => false,   // クエリ変数無効
  );

  register_post_type('common_parts', $args);
}

// フックに登録
add_action('init', 'register_common_parts_post_type');
