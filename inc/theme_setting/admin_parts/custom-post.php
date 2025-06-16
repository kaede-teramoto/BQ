<?php
/*
 * This is custom post.
 *
 * @package BOUTiQ
 */
/*--------------------------------------------------------------
  Register custom post type "common_parts
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
  Grant all “common_parts” permissions to administrators and editors
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
  Custom post type image, subtitle and description settings
--------------------------------------------------------------*/
/*--------------------------------------------------------------
  カスタム投稿タイプ画像・サブタイトル・説明文設定
--------------------------------------------------------------*/
add_action('admin_menu', function () {
  $post_types = get_post_types(['public' => true, '_builtin' => false], 'objects');

  foreach ($post_types as $post_type => $obj) {
    add_submenu_page(
      "edit.php?post_type={$post_type}",
      __('Image Settings', 'your-textdomain'),
      __('画像設定', 'your-textdomain'),
      'manage_options',
      "custom-image-settings-{$post_type}",
      function () use ($post_type, $obj) {
        render_custom_post_type_image_settings($post_type, $obj);
      }
    );
  }
});

function render_custom_post_type_image_settings($post_type, $obj)
{
  // 保存処理
  if (
    isset($_POST['custom_post_type_image_nonce']) &&
    wp_verify_nonce($_POST['custom_post_type_image_nonce'], 'save_image_' . $post_type)
  ) {

    if (isset($_POST['custom_post_type_image_id'])) {
      update_option("custom_post_type_image_{$post_type}", intval($_POST['custom_post_type_image_id']));
    }

    if (isset($_POST['delete_custom_post_type_image'])) {
      delete_option("custom_post_type_image_{$post_type}");
    }

    update_option("custom_post_type_subtitle_{$post_type}", sanitize_text_field($_POST['custom_post_type_subtitle'] ?? ''));
    update_option("custom_post_type_description_{$post_type}", sanitize_textarea_field($_POST['custom_post_type_description'] ?? ''));
  }

  // 値を取得
  $image_id   = get_option("custom_post_type_image_{$post_type}");
  $image_url  = $image_id ? wp_get_attachment_url($image_id) : '';
  $subtitle   = get_option("custom_post_type_subtitle_{$post_type}", '');
  $description = get_option("custom_post_type_description_{$post_type}", '');
?>

  <div class="wrap">
    <h1><?php echo esc_html($obj->labels->name); ?> <?php _e('設定', 'your-textdomain'); ?></h1>
    <form method="post">
      <?php wp_nonce_field('save_image_' . $post_type, 'custom_post_type_image_nonce'); ?>

      <!-- サブタイトル -->
      <h2><?php _e('サブタイトル', 'your-textdomain'); ?></h2>
      <textarea name="custom_post_type_subtitle" rows="2" style="width:100%;"><?php echo esc_textarea($subtitle); ?></textarea>

      <!-- 説明文 -->
      <h2><?php _e('説明文', 'your-textdomain'); ?></h2>
      <textarea name="custom_post_type_description" rows="5" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>

      <!-- 画像プレビュー -->
      <h2><?php _e('画像設定', 'your-textdomain'); ?></h2>
      <div id="custom-image-preview" style="margin-bottom: 15px;">
        <?php if ($image_url): ?>
          <img src="<?php echo esc_url($image_url); ?>" style="max-width:300px;" id="image-preview">
        <?php else: ?>
          <img src="" style="max-width:300px; display:none;" id="image-preview">
        <?php endif; ?>
      </div>

      <input type="hidden" name="custom_post_type_image_id" id="custom-image-id" value="<?php echo esc_attr($image_id); ?>">
      <button type="button" class="button" id="custom-upload-button"><?php _e('メディアを追加', 'your-textdomain'); ?></button>
      <?php if ($image_url): ?>
        <button type="submit" class="button" name="delete_custom_post_type_image" value="1"><?php _e('画像を削除', 'your-textdomain'); ?></button>
      <?php endif; ?>

      <p><input type="submit" class="button button-primary" value="<?php _e('保存', 'your-textdomain'); ?>"></p>
    </form>
  </div>

  <script>
    jQuery(document).ready(function($) {
      $('#custom-upload-button').on('click', function(e) {
        e.preventDefault();

        const mediaUploader = wp.media({
          title: '画像を選択',
          button: {
            text: 'この画像を使う'
          },
          multiple: false
        });

        mediaUploader.on('select', function() {
          const attachment = mediaUploader.state().get('selection').first().toJSON();
          $('#custom-image-id').val(attachment.id);
          $('#image-preview').attr('src', attachment.url).show();
        });

        mediaUploader.open();
      });
    });
  </script>
<?php
}

// メディアライブラリ有効化
add_action('admin_enqueue_scripts', function () {
  wp_enqueue_media();
});

// フロント表示用：画像・サブタイトル・説明を取得
function get_dynamic_custom_post_type_image($post_type)
{
  $image_id = get_option("custom_post_type_image_{$post_type}");
  return $image_id ? wp_get_attachment_url($image_id) : false;
}
function get_dynamic_custom_post_type_subtitle($post_type)
{
  return get_option("custom_post_type_subtitle_{$post_type}", '');
}
function get_dynamic_custom_post_type_description($post_type)
{
  return get_option("custom_post_type_description_{$post_type}", '');
}
