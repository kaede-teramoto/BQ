<?php

if (!isset($parentIndex)) {
    $parentIndex = 0;
}
if (!isset($childIndex)) {
    $childIndex = 0;
}

echo '<div class="child-repeater-group">';

echo '<div class="child-repeater-header">';
echo '<p class="child-repeater-header-title">';
echo '小ブロック ' . ($childIndex + 1);
echo '</p>';
echo '<p class="child-repeater-header-option">';
echo ' <button type="button" class="button copy-child-repeater">複製</button>';
echo ' <button type="button" class="button remove-child-repeater">削除</button>';
echo '</p>';
echo '</div>'; // .child-repeater-header

echo '<div class="child-repeater-content">';

$content_display = $child['content_display'] ?? 'on';

echo '<div class="content-type-field">';
echo '<p class="content-type-field-title">コンテンツの表示</p>';
echo '<p>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex  . '][content_display]" value="on" ' . checked($content_display, 'on', false) . '> 表示';
echo '</label>';
echo '<label>';
echo '<input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex  . '][content_display]" value="off" ' . checked($content_display, 'off', false) . '> 非表示';
echo '</label>';
echo '</p>';

$content_toggle = $child['content_toggle'] ?? '';
echo '<p class="content-type-field-title">開閉式にする</p>';
echo '<p>';
echo '<label>';
echo '<input type="checkbox" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex  . '][content_toggle]" value="0" ' . checked($content_toggle, '1', false) . '>ON';
echo '</label>';
echo '</p>';
echo '</div>';

// 小タイトル
echo '<p><label>小タイトル</label><br />';
echo '<textarea name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][subtitle]" rows="2">' . esc_textarea($child['subtitle'] ?? '') . '</textarea></p>';

// サブタイトル
echo '<p><label>サブタイトル</label><br />';
echo '<textarea name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][subtitle_sub]" rows="2">' . esc_textarea($child['subtitle_sub'] ?? '') . '</textarea></p>';

// 小コンテンツ
echo '<div><p style="margin-bottom: 0;"><label>小コンテンツ</label></p>';
wp_editor(
    $child['subcontent'] ?? '',
    'page_custom_repeater_parents_' . $parentIndex . '_children_' . $childIndex . '_subcontent',
    array(
        'textarea_name' => 'page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][subcontent]',
        'textarea_rows' => 6,
        'media_buttons' => true,
        'teeny' => false,
        'quicktags' => true,
        'tinymce' => false,
        'editor_class' => 'custom-repeater-editor',
    )
);

echo '</div>';

echo '<div class="child-repeater-option">';
echo '<div class="child-repeater-image">';

// 画像を横並び チェックボックス
$is_checked = !empty($child['image_inline']) ? 'checked' : '';

echo '<div class="child-repeater-image-header"><h3>画像</h3><label><input type="checkbox" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][image_inline]" value="1" ' . $is_checked . '> テキストをまとめて画像を分割する</label></div>';

// 画像
$img_url = esc_url($child['image'] ?? '');

echo '<div class="image-block">';

echo '<div class="image-block-button">';
echo '<input type="hidden" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][image]" value="' . $img_url . '" class="image-url-field" />';
echo '<button type="button" class="button select-image-button">メディアを追加</button> ';
echo '<button type="button" class="button remove-image-button">メディアをクリア</button>';
echo '</div>'; // /image-block-button

if ($img_url) {
    echo '<div class="image-preview-wrapper">';
    echo '<img src="' . $img_url . '" alt="" />';
    echo '</div>'; // .image-preview-wrapper
} else {
    echo '<div class="image-preview-wrapper">';
    echo '<img src="" alt="" style="display:none;" />';
    echo '</div>'; // .image-preview-wrapper
}

echo '</div>';

echo '</div>';

echo '<div class="child-repeater-button">';
echo '<div class="child-repeater-button-header"><h3>ボタン</h3></div>';
// ボタンテキスト
echo '<div class="child-repeater-button-body">';
echo '<p><label>ボタンテキスト</label><br />';
echo '<input type="text" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][button_text]" value="' . esc_attr($child['button_text'] ?? '') . '" /></p>';

// ボタンURL
echo '<p><label>ボタンURL</label><br />';
echo '<input type="text" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][button_url]" value="' . esc_attr($child['button_url'] ?? '') . '" /></p>';

// ボタン形状 ラジオボタン
$button_type = $child['button_type'] ?? 'button';

echo '<p><label>ボタン形状</label><br />';
echo '<label><input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][button_type]" value="button" ' . checked($button_type, 'button', false) . '> ボタンタイプ</label>　';
echo '<label><input type="radio" name="page_custom_repeater[parents][' . $parentIndex . '][children][' . $childIndex . '][button_type]" value="text" ' . checked($button_type, 'text', false) . '> テキストタイプ</label>';
echo '</p>';


echo '</div>'; // .child-repeater-body
echo '</div>'; // .child-repeater-button
echo '</div>'; // .child-repeater-option

echo '</div>'; // .child-repeater-content
echo '</div>'; // .child-repeater-group
