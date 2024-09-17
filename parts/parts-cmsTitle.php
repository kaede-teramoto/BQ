<?php
/*
 * This is the title part for the cms page.
 *
 * @package BOUTiQ
 */

// 現在の投稿のIDを取得
$post_id = get_option('page_for_posts');
$page_title = esc_html(get_the_title($post_id));

$pageTitle_design   = esc_attr(get_theme_mod('boutiq_page_design_setting', '01'));

$post_type = get_post_type(); // 現在の投稿タイプを取得
$post_type_object = get_post_type_object($post_type); // 投稿タイプのオブジェクトを取得


if (is_category()) {
    // カテゴリーページの場合
    $category_id = get_queried_object_id();
    $subTitle = get_term_meta($category_id, 'sub_title', true);
    $pageSummary = category_description($category_id);
} elseif (is_tag()) {
    // タグページの場合
    $tag_id = get_queried_object_id();
    $subTitle = get_term_meta($tag_id, 'sub_title', true);
    $pageSummary = tag_description($tag_id);
} elseif ($post_type !== 'post') {
    // タグページの場合
    $post_type_id = '';
    if ($post_type_object && !empty($post_type_object->labels->singular_name)) {
        $subTitle = $post_type_object->labels->singular_name;
    } else {
        $subTitle = '';
    }
    $pageSummary = esc_html($post_type_object->description);
} else {
    // その他のページ（投稿など）
    $subTitle = get_post_meta($post_id, '_custom_subtitle', true);
    $pageSummary = get_post_meta($post_id, '_custom_page_summary', true);
}
?>

<div class="page-title__wrapper page-title<?php echo $pageTitle_design; ?>__wrapper">
    <div class="page-title page-title<?php echo $pageTitle_design; ?>">
        <div class="page-title__feature page-title<?php echo $pageTitle_design; ?>__feature">
            <div class="page-title__main page-title<?php echo $pageTitle_design; ?>__main">
                <h1 class="page-title__title--main page-title<?php echo $pageTitle_design; ?>__title--main">
                    <?php if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif ($post_type !== 'post') {
                        echo esc_html($post_type_object->labels->name);
                    } else {
                        echo esc_html($page_title);
                    }
                    ?>

                </h1>
            </div>
            <?php if ($subTitle) : ?>
                <div class="page-title__sub page-title<?php echo $pageTitle_design; ?>__sub">
                    <p class="page-title__title--sub page-title<?php echo $pageTitle_design; ?>__title--sub"><?php echo $subTitle; ?></p>
                </div>
            <?php endif; ?>
            <?php if ($pageSummary) : ?>
                <div class="page-title__text page-title<?php echo $pageTitle_design; ?>__text">
                    <div><?php echo $pageSummary; ?></div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (has_post_thumbnail($post_id)) :
            $thumbnail_html = get_the_post_thumbnail($post_id, 'full', ['class' => 'cms__post__thumbnail']); ?>
            <div class="page-title__img page-title<?php echo $pageTitle_design; ?>__img">
                <?php echo $thumbnail_html; ?>
            </div>
        <?php endif; ?>
    </div>
</div>