<?php
/*
 * This is the title part for the cms page.
 *
 * @package BOUTiQ
 */

$theme_url = get_stylesheet_directory_uri();

// 現在の投稿のIDを取得
// $post_id = get_option('page_for_posts');
// $page_title = esc_html(get_the_title($post_id));

$pageTitle_design   = esc_attr(get_theme_mod('boutiq_page_design_setting', '01'));

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

    // カスタムポストの一覧ページ
    if ($post_type_object && !empty($post_type_object->labels->singular_name)) {
        $page_title = $post_type_object->labels->name;
        $subTitle = $post_type_object->labels->singular_name;
    } else {
        $subTitle = NULL;
    }
    $pageSummary = esc_html($post_type_object->description);
} elseif (is_tax()) {

    $subTitle = get_term_meta($object_id, 'sub_title', true);
    $pageSummary = wp_kses_post(wpautop($term->description));
} else {

    $subTitle = get_term_meta($object_id, 'sub_title', true);
    $pageSummary = category_description($object_id);
}

?>

<div class="page-title__wrapper <?php echo $pageTitle_design; ?>__wrapper">
    <div class="page-title <?php echo $pageTitle_design; ?>">
        <div class="page-title__feature <?php echo $pageTitle_design; ?>__feature">
            <div class="page-title__main <?php echo $pageTitle_design; ?>__main">
                <h1 class="page-title__title--main <?php echo $pageTitle_design; ?>__title--main">
                    <?php if (is_search()) {
                        echo esc_html('検索結果');
                    } else {
                        echo $page_title;
                    }
                    ?>
                </h1>
            </div>
            <?php if ($subTitle) : ?>
                <div class="page-title__sub <?php echo $pageTitle_design; ?>__sub">
                    <p class="page-title__title--sub <?php echo $pageTitle_design; ?>__title--sub"><?php echo $subTitle; ?></p>
                </div>
            <?php endif; ?>
            <?php if ($pageSummary) : ?>
                <div class="page-title__text <?php echo $pageTitle_design; ?>__text">
                    <div><?php echo $pageSummary; ?></div>
                </div>
            <?php endif; ?>
        </div>
        <?php

        if (is_search()) {
        } elseif (is_post_type_archive()) {
            $post_type_slug = get_query_var('post_type');
            // 投稿タイプのオブジェクトを取得
            $post_type_object = get_post_type_object($post_type_slug);

            if ($post_type_object) {
                echo '<div class="page-title__img ' . $pageTitle_design . '__img">';
                display_custom_post_type_image();
                echo '</div>';
            }
        } else {

            $image_url = get_taxonomy_image_url($object_id);

            if ($term && isset($term->name)) {
                if ($image_url) {
                    echo '<div class="page-title__img ' . $pageTitle_design . '__img">';
                    echo '<img src="' . esc_url($image_url) . '" alt="' . $page_title . '">';
                    echo '</div>';
                }
            }
        }

        /*        if (is_category()) {

            $image_url = get_taxonomy_image_url($object_id);

            if ($term && isset($term->name)) {
                if ($image_url) {
                    echo '<div class="page-title__img ' . $pageTitle_design . '__img">';
                    echo '<img src="' . esc_url($image_url) . '" alt="' . $page_title . '">';
                    echo '</div>';
                }
            }
        } elseif (is_tag()) {

            $image = get_taxonomy_image_url($object_id);

            if ($term && isset($term->name)) {
                if ($image) {
                    echo '<div class="page-title__img ' . $pageTitle_design . '__img">';
                    echo '<img src="' . esc_url($image) . '" alt="' . $page_title . '">';
                    echo '</div>';
                }
            }
        } elseif (is_tax()) {
            $image_url = get_taxonomy_image_url($object_id);

            if ($term && isset($term->name)) {
                if ($image_url) {
                    echo '<div class="page-title__img ' . $pageTitle_design . '__img">';
                    echo '<img src="' . esc_url($image_url) . '" alt="' . $page_title . '">';
                    echo '</div>';
                }
            }
        } elseif (is_post_type_archive()) {

            $post_type_slug = get_query_var('post_type');
            // 投稿タイプのオブジェクトを取得
            $post_type_object = get_post_type_object($post_type_slug);

            if ($post_type_object) {
                echo '<div class="page-title__img ' . $pageTitle_design . '__img">え';
                display_custom_post_type_image();
                echo '</div>';
            }
        } else {

            if (has_post_thumbnail($post_id)) :
                $thumbnail_html = get_the_post_thumbnail($post_id, 'full', ['class' => 'cms__post__thumbnail']); ?>
                <div class="page-title__img <?php echo $pageTitle_design; ?>__img">
                    <?php echo $thumbnail_html; ?>
                </div>
        <?php endif;
        } */  ?>
    </div>
</div>