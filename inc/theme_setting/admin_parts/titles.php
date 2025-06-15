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
// Add custom metabox
function page_subtitle_add_meta_box()
{
  add_meta_box(
    'page_subtitle_meta_box', // metabox ID
    'サブタイトルとページ概要', // metabox title
    'page_subtitle_meta_box_callback', // callback function
    'page', // post type
    'normal', // start position
    'high' // display priority
  );
}
add_action('add_meta_boxes', 'page_subtitle_add_meta_box');

// Callback function to display the contents of the metabox
function page_subtitle_meta_box_callback($post)
{
  wp_nonce_field(basename(__FILE__), 'page_subtitle_meta_box_nonce'); // セキュリティフィールド
  $subTitle = get_post_meta($post->ID, '_custom_subtitle', true);
  $pageSummary = get_post_meta($post->ID, '_custom_page_summary', true);
  ?>
  <p>
    <label for="custom_subtitle"><?php echo __('Subtitle (will be a copy when page design 07)', 'boutiq'); ?></label>
    <input type="text" name="custom_subtitle" id="custom_subtitle" value="<?php echo esc_attr($subTitle); ?>" style="width:100%;" />
  </p>
  <p>
    <label for="custom_page_summary"><?php echo __('Page summary', 'boutiq'); ?></label>
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

// Save the metabox data
function custom_save_meta_box_data($post_id)
{
  if (!isset($_POST['page_subtitle_meta_box_nonce']) || !wp_verify_nonce($_POST['page_subtitle_meta_box_nonce'], basename(__FILE__))) {
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
  A function that outputs the term names and descriptions for the current taxonomy archive.
--------------------------------------------------------------*/
// A function that outputs the term names in the current taxonomy archive.
function taxonomy_term_title()
{
  $term = get_queried_object();

  if ($term && !is_wp_error($term) && isset($term->name)) {
    esc_html($term->name);
  }
}

// Export title
// taxonomy_term_title();


/*--------------------------------------------------------------
  Taxonomy Subtitle + Image Upload Field (for Category, Tag, CPT Taxonomies)
--------------------------------------------------------------*/

// Form output (edit screen)
function add_custom_fields_to_taxonomy_edit_form($term)
{
  $term_id = $term->term_id;
  $subtitle = get_term_meta($term_id, 'sub_title', true);
  $image_url = get_term_meta($term_id, 'sub_image', true);
?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="sub_title"><?php __('Subtitle', 'boutiq'); ?></label>
    </th>
    <td>
      <input type="text" name="sub_title" id="sub_title" value="<?php echo esc_attr($subtitle); ?>" size="40">
      <p class="description"><?php __('Enter a subtitle for this term', 'boutiq'); ?></p>
    </td>
  </tr>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="sub_image"><?php __('Image', 'boutiq'); ?></label>
    </th>
    <td>
      <input type="hidden" name="sub_image" id="sub_image" value="<?php echo esc_attr($image_url); ?>">
      <button class="button sub-image-upload"><?php __('Select Image', 'boutiq'); ?></button>
      <button class="button sub-image-remove"><?php __('Remove Image', 'boutiq'); ?></button>
      <div class="sub-image-preview" style="margin-top:10px;">
        <?php if ($image_url): ?>
          <img src="<?php echo esc_url($image_url); ?>" style="max-width:150px; height:auto;">
        <?php endif; ?>
      </div>
    </td>
  </tr>
<?php
}

// Form output (new addition screen)
function add_custom_fields_to_taxonomy_add_form()
{
?>
  <div class="form-field">
    <label for="sub_title"><?php __('Subtitle', 'boutiq'); ?></label>
    <input type="text" name="sub_title" id="sub_title" value="" size="40">
    <p class="description"><?php __('Enter a subtitle for this term', 'boutiq'); ?></p>
  </div>
  <div class="form-field">
    <label for="sub_image"><?php __('Image', 'boutiq'); ?></label>
    <input type="hidden" name="sub_image" id="sub_image" value="">
    <button class="button sub-image-upload"><?php __('Select Image', 'boutiq'); ?></button>
    <button class="button sub-image-remove"><?php __('Remove Image', 'boutiq'); ?></button>
    <div class="sub-image-preview" style="margin-top:10px;"></div>
  </div>
<?php
}

// Save process
function save_taxonomy_custom_fields($term_id)
{
  if (isset($_POST['sub_title'])) {
    update_term_meta($term_id, 'sub_title', sanitize_text_field($_POST['sub_title']));
  }
  if (isset($_POST['sub_image'])) {
    update_term_meta($term_id, 'sub_image', esc_url_raw($_POST['sub_image']));
  }
}

// JS loading
function enqueue_taxonomy_custom_field_scripts($hook)
{
  if (!in_array($hook, ['edit-tags.php', 'term.php'])) return;
  wp_enqueue_media();
  wp_enqueue_script('taxonomy-image-field', get_template_directory_uri() . '/inc/theme_setting/admin_parts/js/taxonomy-image-field.js', ['jquery'], null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_taxonomy_custom_field_scripts');

// Add a hook to the applicable taxonomy
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

// Subtitle output function
function get_taxonomy_subtitle($term_id)
{
  return get_term_meta($term_id, 'sub_title', true);
}

// Export ---------------------------------------------------------------------
// $subtitle = get_taxonomy_subtitle($term_id);

// if ($subtitle) {
//     echo '<h2 class="taxonomy-subtitle">' . esc_html($subtitle) . '</h2>';
// }
// ----------------------------------------------------------------------------

// Image output function
function get_taxonomy_image_url($term_id)
{
  return get_term_meta($term_id, 'sub_image', true);
}

// Export ---------------------------------------------------------------------
// $image_url = get_taxonomy_image_url($term_id);

// if ($image_url) {
//   echo '<img src="' . esc_url($image_url) . '" alt="" style="max-width:100%; height:auto;">';
// }
// ----------------------------------------------------------------------------