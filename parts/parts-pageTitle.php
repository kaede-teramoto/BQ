<?php
/*
 * This is the title part for the page.
 *
 * @package BOUTiQ
 */

// 現在の投稿のIDを取得
$post_id = get_the_ID();

$pageTitle_design   = esc_attr(get_theme_mod('boutiq_page_design_setting', 'titleAS00'));

// サブタイトルとページ概要を取得
$subTitle = get_post_meta($post_id, '_custom_subtitle', true);
$pageSummary = get_post_meta($post_id, '_custom_page_summary', true);

?>

<div class="page-title__wrapper <?php echo $pageTitle_design; ?>__wrapper">
    <div class="page-title <?php echo $pageTitle_design; ?>">
        <div class="page-title__feature <?php echo $pageTitle_design; ?>__feature">
            <div class="page-title__main <?php echo $pageTitle_design; ?>__main">
                <h1 class="page-title__title--main <?php echo $pageTitle_design; ?>__title--main">
                    <?php the_title(); ?>
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
        <?php if (has_post_thumbnail()) : ?>
            <div class="page-title__img <?php echo $pageTitle_design; ?>__img"><?php the_post_thumbnail('full'); ?></div>
        <?php endif; ?>
    </div>
</div>