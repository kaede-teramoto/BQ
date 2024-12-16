<?php
/*
 * This is custom post.
 *
 * @package BOUTiQ
 */



/*--------------------------------------------------------------
  custom post
--------------------------------------------------------------*/
// 管理画面に設定ページを追加
function add_dynamic_custom_post_type_image_settings()
{
  add_options_page(
    'カスタム投稿タイプ画像設定',
    '投稿タイプ画像設定',
    'manage_options',
    'dynamic-custom-post-type-images',
    'render_dynamic_custom_post_type_image_settings'
  );
}
add_action('admin_menu', 'add_dynamic_custom_post_type_image_settings');

// 設定ページの内容を描画
function render_dynamic_custom_post_type_image_settings()
{
  // 登録済みカスタム投稿タイプを取得（標準投稿タイプは除外）
  $args = array(
    'public'   => true,
    '_builtin' => false // 標準の投稿タイプ（post, page）は除外
  );
  $custom_post_types = get_post_types($args, 'objects');

  // フォーム送信時の処理
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_post_type_images_nonce'])) {
    if (wp_verify_nonce($_POST['custom_post_type_images_nonce'], 'custom_post_type_images')) {
      foreach ($custom_post_types as $post_type => $post_type_obj) {
        // 画像アップロード処理
        if (isset($_FILES["custom_post_type_image_{$post_type}"]) && $_FILES["custom_post_type_image_{$post_type}"]['size'] > 0) {
          $image_id = media_handle_upload("custom_post_type_image_{$post_type}", 0);
          if (!is_wp_error($image_id)) {
            update_option("custom_post_type_image_{$post_type}", $image_id);
          } else {
            error_log("画像アップロードエラー: " . $image_id->get_error_message());
          }
        }

        // 画像削除処理
        if (isset($_POST["delete_custom_post_type_image_{$post_type}"])) {
          delete_option("custom_post_type_image_{$post_type}");
        }
      }
    }
  }

?>
  <div class="wrap">
    <h1>カスタム投稿タイプ画像設定</h1>
    <form method="post" enctype="multipart/form-data">
      <?php wp_nonce_field('custom_post_type_images', 'custom_post_type_images_nonce'); ?>
      <?php
      foreach ($custom_post_types as $post_type => $post_type_obj) {
        $image_id = get_option("custom_post_type_image_{$post_type}");
        $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
      ?>
        <h2><?php echo esc_html($post_type_obj->label); ?> の画像</h2>
        <?php if ($image_url): ?>
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html($post_type); ?>" style="max-width: 300px;">
          <br>
          <label>
            <input type="checkbox" name="delete_custom_post_type_image_<?php echo esc_attr($post_type); ?>"> 画像を削除
          </label>
          <br>
        <?php endif; ?>
        <input type="file" name="custom_post_type_image_<?php echo esc_attr($post_type); ?>">
        <br><br>
      <?php
      }
      ?>
      <input type="submit" value="保存" class="button-primary">
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

  // デバッグ用: 現在の投稿タイプをログに出力（必要に応じてコメントアウト）
  // error_log('現在の投稿タイプ: ' . $current_post_type);

  // 画像URLを取得
  $image_url = get_dynamic_custom_post_type_image($current_post_type);
  $post_type_object = get_post_type_object($current_post_type);

  // 画像を表示
  if ($image_url) {
    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_html($post_type_object->labels->name) . '" class="category-image">';
  } else {
    $theme_url = get_template_directory_uri();
    echo '<img src="' .  $theme_url . '/assets/images/thumbnails/thumbnail.webp" alt="' . esc_html($post_type_object->labels->name) . '" class="category-image">';
  }
}
