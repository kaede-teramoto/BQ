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
  現在のタクソノミーアーカイブでターム名と説明を出力する関数
--------------------------------------------------------------*/
/**
 * 現在のタクソノミーアーカイブでターム名を出力する関数
 */
function taxonomy_term_title()
{
  $term = get_queried_object();

  if ($term && !is_wp_error($term) && isset($term->name)) {
    echo esc_html($term->name);
  }
}

// 出力方法（以下のコードを出力したいところに記載する
// タイトル
// taxonomy_term_title();


/*--------------------------------------------------------------
  Taxonomy Subtitle + Image Upload Field (for Category, Tag, CPT Taxonomies)
--------------------------------------------------------------*/

// フォーム出力（編集画面）
function add_custom_fields_to_taxonomy_edit_form($term)
{
  $term_id = $term->term_id;
  $subtitle = get_term_meta($term_id, 'sub_title', true);
  $image_url = get_term_meta($term_id, 'sub_image', true);
?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="sub_title"><?php _e('Subtitle', 'boutiq'); ?></label>
    </th>
    <td>
      <input type="text" name="sub_title" id="sub_title" value="<?php echo esc_attr($subtitle); ?>" size="40">
      <p class="description"><?php _e('Enter a subtitle for this term', 'boutiq'); ?></p>
    </td>
  </tr>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="sub_image"><?php _e('Image', 'boutiq'); ?></label>
    </th>
    <td>
      <input type="hidden" name="sub_image" id="sub_image" value="<?php echo esc_attr($image_url); ?>">
      <button class="button sub-image-upload"><?php _e('Select Image', 'boutiq'); ?></button>
      <button class="button sub-image-remove"><?php _e('Remove Image', 'boutiq'); ?></button>
      <div class="sub-image-preview" style="margin-top:10px;">
        <?php if ($image_url): ?>
          <img src="<?php echo esc_url($image_url); ?>" style="max-width:150px; height:auto;">
        <?php endif; ?>
      </div>
    </td>
  </tr>
<?php
}

// フォーム出力（新規追加画面）
function add_custom_fields_to_taxonomy_add_form()
{
?>
  <div class="form-field">
    <label for="sub_title"><?php _e('Subtitle', 'boutiq'); ?></label>
    <input type="text" name="sub_title" id="sub_title" value="" size="40">
    <p class="description"><?php _e('Enter a subtitle for this term', 'boutiq'); ?></p>
  </div>
  <div class="form-field">
    <label for="sub_image"><?php _e('Image', 'boutiq'); ?></label>
    <input type="hidden" name="sub_image" id="sub_image" value="">
    <button class="button sub-image-upload"><?php _e('Select Image', 'boutiq'); ?></button>
    <button class="button sub-image-remove"><?php _e('Remove Image', 'boutiq'); ?></button>
    <div class="sub-image-preview" style="margin-top:10px;"></div>
  </div>
<?php
}

// 保存処理
function save_taxonomy_custom_fields($term_id)
{
  if (isset($_POST['sub_title'])) {
    update_term_meta($term_id, 'sub_title', sanitize_text_field($_POST['sub_title']));
  }
  if (isset($_POST['sub_image'])) {
    update_term_meta($term_id, 'sub_image', esc_url_raw($_POST['sub_image']));
  }
}

// JS読み込み
function enqueue_taxonomy_custom_field_scripts($hook)
{
  if (!in_array($hook, ['edit-tags.php', 'term.php'])) return;
  wp_enqueue_media();
  wp_enqueue_script('taxonomy-image-field', get_template_directory_uri() . '/theme_support/js/taxonomy-image-field.js', ['jquery'], null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_taxonomy_custom_field_scripts');

// 適用タクソノミーにフックを追加
function apply_custom_fields_to_taxonomies()
{
  $excluded = ['category', 'post_tag'];
  $taxonomies = get_taxonomies([], 'names');
  foreach ($taxonomies as $taxonomy) {
    if (taxonomy_exists($taxonomy)) {
      add_action("{$taxonomy}_edit_form_fields", 'add_custom_fields_to_taxonomy_edit_form');
      add_action("{$taxonomy}_add_form_fields", 'add_custom_fields_to_taxonomy_add_form');
      add_action("edited_{$taxonomy}", 'save_taxonomy_custom_fields');
      add_action("create_{$taxonomy}", 'save_taxonomy_custom_fields');
    }
  }
}
add_action('init', 'apply_custom_fields_to_taxonomies');
