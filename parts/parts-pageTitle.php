<?php
/*
 * This is the title part for the page.
 *
 * @package BOUTiQ
 */

// 現在の投稿のIDを取得
$post_id = get_the_ID();

$pageTitle_design   = esc_attr(get_theme_mod('boutiq_page_design_setting', 'title-a-screen00'));

// サブタイトルとページ概要を取得
$subTitle = get_post_meta($post_id, '_custom_subtitle', true);
$pageSummary = get_post_meta($post_id, '_custom_page_summary', true);
?>

<div class="page-title-wrapper <?php echo $pageTitle_design; ?>-wrapper">
    <div class="page-title <?php echo $pageTitle_design; ?>">
        <div class="page-title-feature">
            <div class="page-title-main">
                <h1 class="page-title-text">
                    <?php the_title(); ?>
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
        <?php if (has_post_thumbnail()) : ?>
            <div class="page-title-img"><?php the_post_thumbnail('full'); ?></div>
        <?php endif; ?>
    </div>
</div>