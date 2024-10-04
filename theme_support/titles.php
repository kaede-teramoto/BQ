<?php
/*
 * This is titles
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
  titletag
--------------------------------------------------------------*/
add_theme_support('title-tag');


/*--------------------------------------------------------------
  title　tag
--------------------------------------------------------------*/
if (!function_exists('_wp_render_title_tag')) {
  function theme_slug_render_title()
  {
?>
    <title><?php wp_title('|', true, 'right'); ?></title>
  <?php
  }
  add_action('wp_head', 'theme_slug_render_title');
}




/*--------------------------------------------------------------
  sub title for page
--------------------------------------------------------------*/
// カスタムメタボックスを追加
function custom_add_meta_box()
{
  add_meta_box(
    'custom_meta_box', // メタボックスID
    'サブタイトルとページ概要', // メタボックスタイトル
    'custom_meta_box_callback', // コールバック関数
    'page', // 投稿タイプ（ここではページ）
    'normal', // 表示位置
    'high' // 表示優先度
  );
}
add_action('add_meta_boxes', 'custom_add_meta_box');

// メタボックスの内容を表示するコールバック関数
function custom_meta_box_callback($post)
{
  wp_nonce_field(basename(__FILE__), 'custom_meta_box_nonce'); // セキュリティフィールド
  $subTitle = get_post_meta($post->ID, '_custom_subtitle', true);
  $pageSummary = get_post_meta($post->ID, '_custom_page_summary', true);
  ?>
  <p>
    <label for="custom_subtitle">サブタイトル（ページデザイン07の時はコピーになります）</label>
    <input type="text" name="custom_subtitle" id="custom_subtitle" value="<?php echo esc_attr($subTitle); ?>" style="width:100%;" />
  </p>
  <p>
    <label for="custom_page_summary">ページ概要</label>
    <?php
    $settings = array(
      'textarea_name' => 'custom_page_summary',
      'textarea_rows' => 5,
      'media_btns' => true,
    );
    wp_editor($pageSummary, 'custom_page_summary', $settings);
    ?>
  </p>
<?php
}

// メタボックスのデータを保存
function custom_save_meta_box_data($post_id)
{
  if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['custom_subtitle'])) {
    update_post_meta($post_id, '_custom_subtitle', sanitize_text_field($_POST['custom_subtitle']));
  }

  if (isset($_POST['custom_page_summary'])) {
    update_post_meta($post_id, '_custom_page_summary', $_POST['custom_page_summary']);
  }
}
add_action('save_post', 'custom_save_meta_box_data');


/*--------------------------------------------------------------
  sub title for category
--------------------------------------------------------------*/
// カテゴリー編集画面に「sub_title」カスタムフィールドを追加
function add_subtitle_field_to_category($term)
{
  // 現在のカテゴリーのIDを取得
  $term_id = $term->term_id;

  // 現在の「sub_title」の値を取得
  $sub_title = get_term_meta($term_id, 'sub_title', true);
?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="sub_title"><?php _e('Subtitle', 'your-text-domain'); ?></label>
    </th>
    <td>
      <input type="text" name="sub_title" id="sub_title" value="<?php echo esc_attr($sub_title); ?>" size="40">
      <p class="description"><?php _e('Enter a subtitle for this category', 'your-text-domain'); ?></p>
    </td>
  </tr>
<?php
}
add_action('category_edit_form_fields', 'add_subtitle_field_to_category');

// 新規カテゴリー作成画面に「sub_title」カスタムフィールドを追加
function add_subtitle_field_to_new_category()
{
?>
  <div class="form-field">
    <label for="sub_title"><?php _e('Subtitle', 'your-text-domain'); ?></label>
    <input type="text" name="sub_title" id="sub_title" value="" size="40">
    <p class="description"><?php _e('Enter a subtitle for this category', 'your-text-domain'); ?></p>
  </div>
<?php
}
add_action('category_add_form_fields', 'add_subtitle_field_to_new_category');

// カテゴリーのカスタムフィールドの値を保存
function save_category_subtitle($term_id)
{
  if (isset($_POST['sub_title'])) {
    $sub_title = sanitize_text_field($_POST['sub_title']);
    update_term_meta($term_id, 'sub_title', $sub_title);
  }
}
add_action('edited_category', 'save_category_subtitle');
add_action('create_category', 'save_category_subtitle');

// カテゴリーのカスタムフィールド「sub_title」を表示するための関数
function get_category_subtitle($term_id)
{
  return get_term_meta($term_id, 'sub_title', true);
}


/*--------------------------------------------------------------
  sub title for tag
--------------------------------------------------------------*/
// 新規タグ作成画面に「sub_title」カスタムフィールドを追加
function add_subtitle_field_to_new_tag()
{
?>
  <div class="form-field">
    <label for="sub_title"><?php _e('Subtitle', 'your-text-domain'); ?></label>
    <input type="text" name="sub_title" id="sub_title" value="" size="40">
    <p class="description"><?php _e('Enter a subtitle for this tag', 'your-text-domain'); ?></p>
  </div>
<?php
}
add_action('post_tag_add_form_fields', 'add_subtitle_field_to_new_tag');

// タグ編集画面に「sub_title」カスタムフィールドを追加
function edit_subtitle_field_for_tag($term)
{
  $sub_title = get_term_meta($term->term_id, 'sub_title', true);
?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="sub_title"><?php _e('Subtitle', 'your-text-domain'); ?></label>
    </th>
    <td>
      <input type="text" name="sub_title" id="sub_title" value="<?php echo esc_attr($sub_title); ?>" size="40">
      <p class="description"><?php _e('Enter a subtitle for this tag', 'your-text-domain'); ?></p>
    </td>
  </tr>
<?php
}
add_action('post_tag_edit_form_fields', 'edit_subtitle_field_for_tag');

// タグのカスタムフィールドの値を保存
function save_tag_subtitle($term_id)
{
  if (isset($_POST['sub_title'])) {
    $sub_title = sanitize_text_field($_POST['sub_title']);
    update_term_meta($term_id, 'sub_title', $sub_title);
  }
}
add_action('edited_post_tag', 'save_tag_subtitle');
add_action('create_post_tag', 'save_tag_subtitle');

// タグのカスタムフィールド「sub_title」を表示するための関数
function get_tag_subtitle($term_id)
{
  return get_term_meta($term_id, 'sub_title', true);
}
