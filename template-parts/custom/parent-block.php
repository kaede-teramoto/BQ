<?php

//page
if (is_front_page()) {
    $content_title_setting = get_theme_mod('boutiq_top_content_title_setting', '01');
    $content_title_underline = get_theme_mod('top_content_title_underline', false);
    $content_title_underline_color = get_theme_mod('top_content_title_underline_color', '#999999');
    $content_title_underline_width = get_theme_mod('top_content_title_underline_width', '2px');

    if ($content_title_underline) {
        $title_underline = 'margin-bottom: 50px; border-bottom-style: solid;';
        $title_underline_color = 'border-bottom-color:' . $content_title_underline_color . ';';
        $title_underline_thickness = 'border-bottom-width:' . $content_title_underline_width . ';';
    } else {
        $title_underline = '';
        $title_underline_color = '';
        $title_underline_thickness = '';
    }
} else {
    $content_title_setting = get_theme_mod('content_title_setting', '01');
    $content_title_underline = get_theme_mod('content_title_underline', false);
    $content_title_underline_color = get_theme_mod('content_title_underline_color', '#999999');
    $content_title_underline_width = get_theme_mod('content_title_underline_width', '2px');

    if ($content_title_underline) {
        $title_underline = 'margin-bottom: 50px; border-bottom-style: solid;';
        $title_underline_color = 'border-bottom-color:' . $content_title_underline_color . ';';
        $title_underline_thickness = 'border-bottom-width:' . $content_title_underline_width . ';';
    } else {
        $title_underline = '';
        $title_underline_color = '';
        $title_underline_thickness = '';
    }
}

if ($title_underline || $title_underline_thickness || $title_underline_color) {
    $title_style = 'style="' . $title_underline . $title_underline_thickness . $title_underline_color . '"';
} else {
    $title_style = '';
}

$parent = $args['parent'] ?? array();
$parent_index = $args['parent_index'] ?? 0;

$block_bg_image = esc_url($parent['background_image']);
if ($block_bg_image) {
    $block_bg_image_style = 'style="background-image: url(' . $block_bg_image . ');"';
} else {
    $block_bg_image_style = '';
}

echo '<section id="section' . ($parent_index + 1) . '" class="section ' . esc_html($parent['block_class'] ?? '') . '" ' . $block_bg_image_style . '>';
echo '<div class="section-inner">';

echo '<h2 class="js-fadeIn block-title block-title' . $content_title_setting . '" ' . $title_style . '>';
echo '<span class="block-title-text">' . nl2br(esc_html($parent['title'] ?? '')) . '</span>';
echo '<span class="block-subtitle-text">' . nl2br(esc_html($parent['subtitle'] ?? '')) . '</span>';

if (!empty($parent['title_image'])) {
    echo '<img class="block-title-image" src="' . esc_url($parent['title_image']) . '" alt="' . nl2br(esc_html($parent['title'] ?? '')) . '" loading="lazy">';
}

echo '</h2>';

echo '<div class="block-parts">';

// 子セット
if (!empty($parent['children']) && is_array($parent['children'])) {
    foreach ($parent['children'] as $child) {
        echo render_child_block($child);
    }
}

echo '</div>'; // .section-parts
echo '<div class="block-lib">' . apply_filters('the_content', $parent['content'] ?? '') . '</div>';
echo '</div>'; // .section-inner
echo '</section>'; // .parent-block
