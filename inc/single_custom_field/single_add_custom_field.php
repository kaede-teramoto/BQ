<?php

// add_action('init', function () {

//     $fields = [
//         ['id' => 'open_start', 'label' => '(OPEN / START)', 'type' => 'textarea'],
//         ['id' => 'ava_door', 'label' => '(ADV / DOOR)', 'type' => 'textarea'],
//         ['id' => 'line_up', 'label' => '(LINE UP)', 'type' => 'textarea'],
//         // RADIO BUTTON
//         [
//             'id' => 'ticket_status',
//             'label' => 'TICKET STATUS',
//             'type' => 'radio',
//             'options' => [
//                 'before_sale' => '販売前',
//                 'on_sale' => '販売中',
//                 'sold_out' => '売り切れ',
//             ]
//         ],
//         ['id' => 'ticket_link', 'label' => 'チケット', 'type' => 'url'],
//     ];

//     new Custom_Flexible_Fields(
//         'post',                   // 投稿タイプ
//         'custom_fields_area',     // メタボックスID
//         'イベント情報',            // タイトル
//         $fields,                  // フィールド定義（配列）
//         'normal',                 // 表示位置
//         'high'                    // 表示順
//     );
// });


/* SETTING --------------------------------------------------------
// post type
post, page, custom_post_name


// fields --------------------------------------------------------
// TEXT
['id' => 'title', 'label' => 'タイトル', 'type' => 'text'],
// TEXTAREA
['id' => 'summary', 'label' => '概要', 'type' => 'textarea'],
// CHECK BOX
['id' => 'featured', 'label' => '注目記事', 'type' => 'checkbox'],
[
    'id' => 'categories',
    'label' => 'カテゴリ選択',
    'type' => 'checkbox_multi',
    'options' => [
        'design' => 'デザイン',
        'code' => '開発',
        'seo' => 'SEO',
    ]
],
// RADIO BUTTON
[
    'id' => 'layout_type',
    'label' => 'レイアウト形式',
    'type' => 'radio',
    'options' => [
        'simple' => 'シンプル',
        'detailed' => '詳細',
    ]
],
// SELECT
[
    'id' => 'status',
    'label' => '状態',
    'type' => 'select',
    'options' => [
        'draft' => '下書き',
        'publish' => '公開',
        'archive' => 'アーカイブ'
    ]
],
// URL TEXT
['id' => 'external_link', 'label' => '関連URL', 'type' => 'url'],
// IMAGE
['id' => 'thumbnail', 'label' => 'サムネイル画像', 'type' => 'image']



// EXPORT --------------------------------------------------------
// TEXTAREA
// 例：投稿IDを取得
$post_id = get_the_ID();

// 単一のテキストエリアを出力
$open_start = get_post_meta($post_id, 'open_start', true);
if (!empty($open_start)) {
    echo '<p><strong>OPEN / START:</strong><br>' . nl2br(esc_html($open_start)) . '</p>';
}

// チェックボックス
$featured = get_post_meta($post_id, 'featured', true);
if ($featured === '1') {
    echo '<p>注目記事です！</p>';
}

// 複数チェックボックス（checkbox_multi）
$categories = get_post_meta($post_id, 'categories', true);
if (!empty($categories) && is_array($categories)) {
    echo '<ul>';
    foreach ($categories as $category) {
        echo '<li>' . esc_html($category) . '</li>';
    }
    echo '</ul>';
}

// ラジオ・セレクト
$status = get_post_meta($post_id, 'status', true);
if ($status === 'publish') {
    echo '<p>公開状態です</p>';
}

// 画像
$image_id = get_post_meta($post_id, 'thumbnail', true);
if ($image_id) {
    $image_url = wp_get_attachment_image_url($image_id, 'medium');
    if ($image_url) {
        echo '<img src="' . esc_url($image_url) . '" alt="">';
    }
}

// 一括出力
$custom_fields = ['open_start', 'ava_door', 'line_up'];

foreach ($custom_fields as $field_id) {
    $value = get_post_meta(get_the_ID(), $field_id, true);
    if (!empty($value)) {
        echo '<p><strong>' . esc_html($field_id) . ':</strong><br>' . nl2br(esc_html($value)) . '</p>';
    }
}

*/