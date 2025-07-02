<?php
// btn design type
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');

// Text Link design type
$text_link_design = get_theme_mod('text_link_setting', '01');
$text_icon_design = get_theme_mod('text_link_icon_setting', '01');

$child = $args['child'] ?? array();

$child_content_display = $args['child']['content_display'] ?? '';
if ($child_content_display === 'on') {

    // 子項目が全て空なら .child-block 出さない  → 高度版はこうするが、まずは 各項目のみ対応から実装開始
    echo '<div class="parts-inner js-fadeIn">';


    if (!empty($child['image_inline'])) {
        echo '<div class="parts-text">';
    }

    // 小タイトル → 必須項目 → これは出す
    if (!empty($child['subtitle'])) {
        echo '<h3 class="parts-title">' . esc_html($child['subtitle'] ?? '') . '</h3>';
    }

    // サブタイトル → 空なら出さない
    if (!empty($child['subtitle_sub'])) {
        echo '<p class="parts-subtitle">' . apply_filters('the_content', $child['subtitle_sub'] ?? '') . '</p>';
    }

    // 小コンテンツ → 空なら出さない
    if (!empty($child['subcontent'])) {
        echo '<div class="parts-content">' . apply_filters('the_content', $child['subcontent']) . '</div>';
    }

    // ボタンテキスト → 空なら出さない
    if (!empty($child['button_text']) && !empty($child['button_url'])) {

        $button_type = $child['button_type'];
        if ('button' === $button_type) {
            echo '<div class="parts-button">';
            echo '<div class="c-btn c-btn' . $btn_link_design . ' btn' . $btn_link_design . '">';
            echo '<a class="c-btn-link c-btn' . $btn_link_design . '-link" href="' . esc_url($child['button_url']) . '">';
            echo '<span class="c-btn-text c-btn-text' . $btn_link_design . '">' . esc_html($child['button_text']) . '</span>';
            echo '<span class="c-btn-icon c-btn-icon' . $btn_icon_design . '"></span>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="parts-link">';
            echo '<a class="link-text link-text' . $text_link_design . '" href="' . esc_url($child['button_url']) . '">';
            echo '<span class="link-text-main link-text' . $text_link_design . '-main">' . esc_html($child['button_text']) . '</span>';
            echo '<span class="icon' . $text_icon_design . '"></span>';
            echo '</a>';
            echo '</div>';
        }
    }

    if (!empty($child['image_inline'])) {
        echo '</div>';
    }

    // 画像 → 空なら出さない（既存）
    if (!empty($child['image'])) {
        echo '<div class="parts-image"><img src="' . esc_url($child['image']) . '" alt="' . esc_html($child['subtitle'] ?? '') . '" loading="lazy"></div>';
    }

    echo '</div>'; // .section-parts
}
