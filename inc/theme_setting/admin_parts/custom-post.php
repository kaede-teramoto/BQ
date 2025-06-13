<?php
/*
 * This is custom post.
 *
 * @package BOUTiQ
 */
/*--------------------------------------------------------------
  カスタムポストタイプ「common_parts」を登録
--------------------------------------------------------------*/
function register_common_parts_post_type()
{
  $labels = array(
    'name'                  => __('Common parts', 'boutiq'),
    'singular_name'         => __('Common parts', 'boutiq'),
    'menu_name'             => __('Common parts', 'boutiq'),
    'name_admin_bar'        => __('Common parts', 'boutiq'),
    'add_new'               => __('New common parts added', 'boutiq'),
    'add_new_item'          => __('Add common parts', 'boutiq'),
    'new_item'              => __('New common parts', 'boutiq'),
    'edit_item'             => __('Edit common parts', 'boutiq'),
    'view_item'             => __('Show common parts', 'boutiq'),
    'all_items'             => __('List of common parts', 'boutiq'),
    'search_items'          => __('Find common parts', 'boutiq'),
    'not_found'             => __('No common parts found', 'boutiq'),
    'not_found_in_trash'    => __('Trash cans have no common parts', 'boutiq'),
  );

  $capability_actions = [
    'edit_common_part',
    'edit_common_parts',
    'edit_others_common_parts',
    'edit_private_common_parts',
    'publish_common_parts',
    'read_common_part',
    'read_private_common_parts',
    'delete_common_part',
    'delete_common_parts',
    'delete_others_common_parts',
    'delete_private_common_parts',
    'edit_published_common_parts',
    'delete_published_common_parts',
  ];

  $capabilities = array_combine($capability_actions, $capability_actions);

  $args = array(
    'labels'             => $labels,
    'public'             => false,
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_admin_bar'  => true,
    'menu_position'      => 3,
    'menu_icon'          => 'dashicons-admin-generic',
    'capability_type'    => 'common_part',
    'capabilities'       => $capabilities,
    'map_meta_cap'       => true,
    'supports'           => array('title', 'editor', 'thumbnail', 'author'),
    'has_archive'        => false,
    'rewrite'            => false,
    'query_var'          => false,
  );

  register_post_type('common_parts', $args);
}
add_action('init', 'register_common_parts_post_type');

/*--------------------------------------------------------------
  管理者・編集者に「common_parts」の全権限を付与
--------------------------------------------------------------*/
function add_common_parts_capabilities()
{
  $roles = ['administrator', 'editor'];
  $capability_actions = [
    'edit_common_part',
    'edit_common_parts',
    'edit_others_common_parts',
    'edit_private_common_parts',
    'publish_common_parts',
    'read_common_part',
    'read_private_common_parts',
    'delete_common_part',
    'delete_common_parts',
    'delete_others_common_parts',
    'delete_private_common_parts',
    'edit_published_common_parts',
    'delete_published_common_parts',
  ];

  foreach ($roles as $role_name) {
    $role = get_role($role_name);
    if ($role) {
      foreach ($capability_actions as $cap) {
        $role->add_cap($cap);
      }
    }
  }
}
add_action('admin_init', 'add_common_parts_capabilities');


/*--------------------------------------------------------------
  custom post
--------------------------------------------------------------*/
function add_dynamic_custom_post_type_image_settings()
{
  add_options_page(
    __('Custom Post Type Image Settings', 'boutiq'),
    __('Post Type Image Settings', 'boutiq'),
    'manage_options',
    'dynamic-custom-post-type-images',
    'render_dynamic_custom_post_type_image_settings'
  );
}
add_action('admin_menu', 'add_dynamic_custom_post_type_image_settings');
function render_dynamic_custom_post_type_image_settings()
{
  $args = array(
    'public'   => true,
    '_builtin' => false
  );
  $custom_post_types = get_post_types($args, 'objects');

  // 1件以上のカスタム投稿タイプがある場合のみ表示
  if (count($custom_post_types) === 0) {
    echo '<div class="notice notice-warning"><p>' . __('No custom post types registered. Please register at least one custom post type.', 'boutiq') . '</p></div>';
    return;
  }

  // 保存処理
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_post_type_images_nonce'])) {
    if (wp_verify_nonce($_POST['custom_post_type_images_nonce'], 'custom_post_type_images')) {
      foreach ($custom_post_types as $post_type => $post_type_obj) {
        if (isset($_FILES["custom_post_type_image_{$post_type}"]) && $_FILES["custom_post_type_image_{$post_type}"]['size'] > 0) {
          $image_id = media_handle_upload("custom_post_type_image_{$post_type}", 0);
          if (!is_wp_error($image_id)) {
            update_option("custom_post_type_image_{$post_type}", $image_id);
          } else {
            error_log("Image upload error: " . $image_id->get_error_message());
          }
        }

        if (isset($_POST["delete_custom_post_type_image_{$post_type}"])) {
          delete_option("custom_post_type_image_{$post_type}");
        }
      }
    }
  }

  // 出力
?>
  <div class="wrap">
    <h1><?php echo __('Custom Post Type Image Settings', 'boutiq'); ?></h1>
    <form method="post" enctype="multipart/form-data">
      <?php wp_nonce_field('custom_post_type_images', 'custom_post_type_images_nonce'); ?>

      <?php foreach ($custom_post_types as $post_type => $post_type_obj): ?>
        <?php
        $image_id = get_option("custom_post_type_image_{$post_type}");
        $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
        ?>
        <h2><?php echo esc_html($post_type_obj->label); ?> <?php echo __('Image', 'boutiq') ?></h2>
        <?php if ($image_url): ?>
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html($post_type); ?>" style="max-width: 300px;"><br>
          <label>
            <input type="checkbox" name="delete_custom_post_type_image_<?php echo esc_attr($post_type); ?>"> <?php echo __('delete image', 'boutiq'); ?>
          </label><br>
        <?php endif; ?>
        <input type="file" name="custom_post_type_image_<?php echo esc_attr($post_type); ?>"><br><br>
      <?php endforeach; ?>

      <input type="submit" value="<?php echo __('Save', 'boutiq') ?>" class="button-primary">
    </form>
  </div>
<?php
}

// カスタム投稿タイプの画像URLを取得する関数
function get_dynamic_custom_post_type_image($post_type)
{
  $image_id = get_option("custom_post_type_image_{$post_type}");
  if ($image_id) {
    return wp_get_attachment_url($image_id);
  }
  return false; // 明示的にfalseを返す
}

// 画像を表示する関数（修正版）
function display_custom_post_type_image()
{
  // 現在の投稿タイプを取得
  $current_post_type = get_post_type();
  if (!$current_post_type && is_archive()) {
    $current_post_type = get_query_var('post_type'); // アーカイブの場合はクエリ変数を使用
  }

  // 画像URLを取得
  $image_url = get_dynamic_custom_post_type_image($current_post_type);
  $post_type_object = get_post_type_object($current_post_type);

  // 画像を表示
  if ($image_url) {
    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_html($post_type_object->labels->name) . '">';
  } else {
    $theme_url = get_template_directory_uri();
    echo '<img src="' .  $theme_url . '/assets/images/thumbnails/thumbnail.webp" alt="' . esc_html($post_type_object->labels->name) . '">';
  }
}
