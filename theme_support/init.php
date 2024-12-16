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
//load_theme_textdomain('boutiq', get_template_directory() . '/languages');

// テーマの翻訳ファイルを読み込む
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
));

/*--------------------------------------------------------------
  自動的に投稿スラッグを生成する関数。
--------------------------------------------------------------*/
/**
 * @param string $slug       現在のスラッグ。
 * @param int    $post_ID    投稿ID。
 * @param string $post_status 投稿ステータス。
 * @param string $post_type  投稿タイプ。
 * @return string 修正されたスラッグ。
 */
function auto_post_slug_with_date($slug, $post_ID, $post_status, $post_type)
{
  // スラッグがURLエンコードされた文字を含む場合にのみ処理。
  if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
    // 投稿の日付を取得し、YYYYMMDD形式にフォーマット。
    $post_date = get_post_field('post_date', $post_ID);
    $formatted_date = date('Ymd', strtotime($post_date));

    // 投稿タイプとフォーマットされた日付を組み合わせたスラッグを生成。
    $slug = sanitize_title($post_type) . '-' . $formatted_date;
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
  Contact form 7 のpタグ削除
--------------------------------------------------------------*/
<<<<<<< HEAD
add_filter( 'wpcf7_form_elements', function( $content ) {
    $content = preg_replace( '/<p[^>]*>/', '', $content );
    $content = str_replace( '</p>', '', $content );
    return $content;
=======
add_filter('wpcf7_form_elements', function ($content) {
  $content = preg_replace('/<p[^>]*>/', '', $content);
  $content = str_replace('</p>', '', $content);
  return $content;
>>>>>>> origin/main
});
if (function_exists('is_plugin_active') && is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
  add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<p[^>]*>/', '', $content);
    $content = str_replace('</p>', '', $content);
    return $content;
  });
}


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
  if (get_post_type() === 'post') {
    $categories = get_the_category();
    if (! empty($categories)) {
      echo '<div class="cat">';
      foreach ($categories as $category) {
        echo '<a class="cat__link cat__' . esc_html($category->slug) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
      }
      echo '</div>';
    }
  } else {
    // カスタム投稿タイプの場合
    $post_type = get_post_type(); // 現在の投稿タイプを取得
    $taxonomies = get_object_taxonomies($post_type, 'objects'); // 投稿タイプに紐付くタクソノミーを取得

    if (! empty($taxonomies)) {
      foreach ($taxonomies as $taxonomy) {
        $terms = get_the_terms(get_the_ID(), $taxonomy->name); // 現在の投稿に紐付くタームを取得
        if (! empty($terms) && ! is_wp_error($terms)) {
          echo '<div class="cat">';
          foreach ($terms as $term) {
            echo '<a class="cat__link cat__' . esc_html($term->slug) . '" href="' . esc_url(get_category_link($term->term_id)) . '">' . esc_html($term->name) . '</a>';
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
  // 現在の投稿に関連付けられたタグを取得
  $tags = get_the_tags();

  // タグが存在するかチェック
  if (!empty($tags)) {
    echo '<div class="tag">';
    foreach ($tags as $tag) {
      echo '<a class="tag__link tag__' . esc_html($tag->slug) . '" href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
    }
    echo '</div>';
  }
}

/*--------------------------------------------------------------
  Tag link
--------------------------------------------------------------*/
function has_posts_in_custom_post_type($post_type) {
  if (empty($post_type)) {
      return false; // ポストタイプが無効の場合は false
  }

  // 指定されたポストタイプに投稿があるか確認
  $posts = get_posts(array(
      'post_type'      => $post_type,
      'posts_per_page' => 1,        // 1件だけ取得
      'post_status'    => 'publish' // 公開済みの記事のみ
  ));

  return !empty($posts); // 配列が空でなければ投稿あり
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

/*--------------------------------------------------------------
  カスタムフィールドのHTMLタグを保持するフィルターを追加
--------------------------------------------------------------*/
// ACFのblock_titleフィールドにHTMLタグを許可
function allow_html_in_acf_textarea($value, $post_id, $field)
{
  // フィールド名が 'block_title' の場合にHTMLタグを許可
  if ($field['name'] === 'block_title') {
    $value = wp_kses_post($value);  // 基本的なHTMLタグを許可
  }
  return $value;
}
add_filter('acf/update_value', 'allow_html_in_acf_textarea', 10, 3);


// カスタムフィールドのHTMLをそのまま表示
//echo wp_kses( $block_title, custom_allowed_html_tags() );


/*--------------------------------------------------------------
  タクソノミーに画像登録を追加（プラグイン：カスタムフィールドを有効時のみ使用可能）
--------------------------------------------------------------*/
if (function_exists('acf_add_local_field_group')):

  acf_add_local_field_group(array(
    'key' => 'group_67533e80a716f',
    'title' => 'カテゴリーに画像を追加',
    'fields' => array(
      array(
        'key' => 'field_67533e8ac704a',
        'label' => 'この項目に画像を登録します。',
        'name' => 'cat_img',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'taxonomy',
          'operator' => '==',
          'value' => 'all',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

endif;
