<?php
if (!isset($parentIndex)) {
    $parentIndex = 0;
}

if (!isset($parent) || !is_array($parent)) {
    $parent = array(
        'block_name' => '',
        'block_class' => '',
        'title' => '',
        'title_image' => '',
        'subtitle' => '',
        'children' => array(),
        'content' => '',
        'background_image' => '',
    );
}

echo '<div class="parent-repeater-group">';

echo '<div class="parent-repeater-header">';
echo '<p class="parent-repeater-header-title">';
$block_title = esc_attr($parent['block_name'] ?? '');
echo ($block_title) ? $block_title : 'ブロック' . ($parentIndex + 1);
echo '</p>';
echo '<p class="parent-repeater-header-option">';
echo ' <button type="button" class="button copy-parent-repeater">複製</button>';
echo ' <button type="button" class="button remove-parent-repeater">削除</button>';
echo '</p>';
echo '</div>'; // .parent-repeater-header

echo '<div class="parent-repeater-content">';

echo '<div class="parent-block-header">';

echo '<h3>ブロック設定</h3>';
echo '<div class="parent-block-header-box">';

echo '<div class="parent-block-header-text">';



$content_display = $parent['content_display'] ?? '';

echo '<div class="content-type-field">';
echo '<p class="content-type-field-title">コンテンツ表示</p>';
echo '<p>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][content_display]" value="on" ' . checked($content_display, 'on', false) . '> 表示';
echo '</label>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][content_display]" value="off" ' . checked($content_display, 'off', false) . '> 非表示';
echo '</label>';
echo '</p>';
echo '</div>';

$content_type = $parent['content_type'] ?? '';
echo '<div class="content-type-field">';
echo '<p class="content-type-field-title">コンテンツ種別</p>';
echo '<p>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][content_type]" value="r_content" ' . checked($content_type, 'r_content', false) . '> コンテンツ';
echo '</label>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][content_type]" value="r_news" ' . checked($content_type, 'r_news', false) . '> お知らせ';
echo '</label>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][content_type]" value="r_common" ' . checked($content_type, 'r_common', false) . '> 共通パーツ';
echo '</label>';
echo '</p>';
echo '</div>';

$content_tab = $parent['content_tab'] ?? '';
echo '<div class="content-type-field">';
echo '<p class="content-type-field-title">タブを使用する</p>';
echo '<p>';
echo '<label>';
echo '<input type="checkbox" name="page_custom_repeater[parents][' . $parentIndex . '][content_tab]" value="1" ' . checked($content_tab, '1', false) . '>ON';
echo '</label>';
echo '</p>';
echo '</div>';

// ブロック名
echo '<p><label>ブロック名</label><br />';
echo '<input type="text" name="page_custom_repeater[parents][' . $parentIndex . '][block_name]" value="' . esc_attr($parent['block_name'] ?? '') . '" /></p>';

// ブロッククラス名
echo '<p><label>ブロッククラス名（共通パーツ使用の場合投稿IDを入力）</label><br />';
echo '<input type="text" name="page_custom_repeater[parents][' . $parentIndex . '][block_class]" value="' . esc_attr($parent['block_class'] ?? '') . '" /></p>';

echo '</div>'; // .parent-block-header-text

echo '<div class="parent-block-header-image">';
// ブロック背景画像
$bg_img_url = esc_url($parent['background_image'] ?? '');
echo '<p><label>ブロック背景画像</label></p>';
echo '<div class="image-block">';

echo '<div class="image-block-button">';
echo '<input type="hidden" name="page_custom_repeater[parents][' . $parentIndex . '][background_image]" value="' . $bg_img_url . '" class="image-url-field" />';
echo '<button type="button" class="button select-image-button">メディアを追加</button> ';
echo '<button type="button" class="button remove-image-button">メディアをクリア</button>';
echo '</div>'; // .image-block-button

if ($bg_img_url) {
    echo '<div class="image-preview-wrapper">';
    echo '<img src="' . $bg_img_url . '" alt="" />';
    echo '</div>';
} else {
    echo '<div class="image-preview-wrapper">';
    echo '<img src="" alt="" style="display:none;" />';
    echo '</div>';
}

echo '</div>'; // .parent-block-header-box
echo '</div>';
echo '</div>';

echo '</div>';

echo '<div class="parent-block-body">';
// ブロックタイトルBOX
echo '<div class="parent-block-title">';
echo '<h3>ブロックタイトル</h3>';
echo '<div class="parent-block-title-box">';
echo '<div class="parent-block-title-text">';
// タイトル
echo '<p><label>タイトル</label><br />';
echo '<textarea name="page_custom_repeater[parents][' . $parentIndex . '][title]" rows="2">' . esc_textarea($parent['title'] ?? '') . '</textarea></p>';
// サブタイトル
echo '<p><label>サブタイトル</label><br />';
echo '<textarea name="page_custom_repeater[parents][' . $parentIndex . '][subtitle]" rows="2">' . esc_textarea($parent['subtitle'] ?? '') . '</textarea></p>';

echo '</div>'; // .parent-block-title-text

echo '<div class="parent-block-title-image">';
// タイトル画像画像
$title_img_url = esc_url($parent['title_image'] ?? '');
echo '<p><label>タイトル画像</label></p>';
echo '<div class="image-block">';

echo '<div class="image-block-button">';
echo '<input type="hidden" name="page_custom_repeater[parents][' . $parentIndex . '][title_image]" value="' . $title_img_url . '" class="image-url-field" />';
echo '<button type="button" class="button select-image-button">メディアを追加</button> ';
echo '<button type="button" class="button remove-image-button">メディアをクリア</button>';
echo '</div>'; // /image-block-button

if ($title_img_url) {
    echo '<div class="image-preview-wrapper">';
    echo '<img src="' . $title_img_url . '" alt="" />';
    echo '</div>'; // .image-preview-wrapper
} else {
    echo '<div class="image-preview-wrapper">';
    echo '<img src="" alt="" style="display:none;" />';
    echo '</div>'; // .image-preview-wrapper
}

echo '</div>'; // /image-block
echo '</div>'; // .parent-block-title-image
echo '</div>'; // .parent-block-title-box
echo '</div>'; // .parent-block-title

// 子セットループ
$children = $parent['children'] ?? array();

echo '<div class="children-wrapper">';

foreach ($children as $childIndex => $child) {
    //echo render_child_block($child, $parentIndex, $childIndex, $parent);
    require get_template_directory() . '/inc/page_custom_field/admin_parts/repeater-child-template.php';
}

echo '</div>'; // .children-wrapper

// 子ブロック追加ボタン
echo '<div class="add-child-repeater">';
echo '<button type="button" class="button button-primary button-large add-child-button">子ブロックを追加</button>';
echo '</div>'; // .add-child-repeater

// コンテンツ
echo '<p><label>コンテンツ</label><br />';
wp_editor(
    $parent['content'] ?? '',
    'page_custom_repeater_parents_' . $parentIndex . '_content',
    array(
        'textarea_name' => 'page_custom_repeater[parents][' . $parentIndex . '][content]',
        'textarea_rows' => 6,
        'media_buttons' => true,
        'teeny' => false,
        'quicktags' => true,
        'tinymce' => false,
        'editor_class' => 'custom-repeater-editor',
    )
);

echo '</div>'; // .parent-block-body
echo '</div>'; // .parent-repeater-content
echo '</div>'; // .parent-repeater-group
