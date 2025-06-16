<?php
/*
 * This is the title part for the cms page.
 *
 * @package BOUTiQ
 */

$theme_url = get_stylesheet_directory_uri();

// 現在の投稿のIDを取得
$post_id = get_option('page_for_posts');
$page_title = esc_html(get_the_title($post_id));

$pageTitle_design   = esc_attr(get_theme_mod('boutiq_page_design_setting', 'title-as00'));

$post_type = get_query_var('post_type'); // 現在の投稿タイプを取得
$post_type_object = get_post_type_object($post_type); // 投稿タイプのオブジェクトを取得

$term = get_queried_object();
$object_id = get_queried_object_id();

if ($term && isset($term->name)) {
    $page_title = esc_html($term->name);
} else {
    $page_title = NULL;
}

if (is_search()) {
    $subTitle =  esc_html('「' . get_search_query() . '」の検索結果は' . $wp_query->found_posts . '件');
    $pageSummary = NULL;
} elseif (is_post_type_archive()) {
    $queried_object = get_queried_object();
    $post_type = $queried_object->name ?? null;

    if ($post_type) {
        $page_title = esc_html($queried_object->labels->singular_name);
        $image_url = get_dynamic_custom_post_type_image($post_type);
        $subTitle = get_dynamic_custom_post_type_subtitle($post_type);
        $pageSummary = get_dynamic_custom_post_type_description($post_type);
    }
} elseif (is_tax()) {

    $subTitle = get_term_meta($object_id, 'sub_title', true);
    $pageSummary = wp_kses_post(wpautop($term->description));
} else {

    $subTitle = get_term_meta($object_id, 'sub_title', true);
    $pageSummary = category_description($object_id);
}

?>

<div class="page-title-wrapper <?php echo $pageTitle_design; ?>-wrapper">
    <div class="page-title <?php echo $pageTitle_design; ?>">
        <div class="page-title-feature">
            <div class="page-title-main">
                <h1 class="page-title-text">
                    <?php if (is_search()) {
                        echo esc_html('検索結果');
                    } else {
                        echo $page_title;
                    }
                    ?>
                </h1>
            </div>
            <?php if ($subTitle) : ?>
                <div class="page-subtitle">
                    <p class="page-subtitle-text"><?php echo $subTitle; ?></p>
                </div>
            <?php endif; ?>
            <?php if ($pageSummary) : ?>
                <div class="page-summary">
                    <div><?php echo $pageSummary; ?></div>
                </div>
            <?php endif; ?>
        </div>
        <?php

        if (is_search()) {
        } elseif (is_post_type_archive()) {

            if ($image_url) {
                echo '<div class="page-title-img">';
                echo '<img src="' . esc_url($image_url) . '" alt="' . $page_title . '">';
                echo '</div>';
            }
        } else {

            $image_url = get_taxonomy_image_url($object_id);

            if ($term && isset($term->name)) {
                if ($image_url) {
                    echo '<div class="page-title-img">';
                    echo '<img src="' . esc_url($image_url) . '" alt="' . $page_title . '">';
                    echo '</div>';
                }
            }
        }
        ?>
    </div>
</div>