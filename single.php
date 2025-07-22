<?php
/*
 * this is single.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();
get_header();

//$cms_design = esc_attr(get_theme_mod('cms_top_design_setting', '01'));
$cms_single_design = esc_attr(get_theme_mod('cms_single_design_setting', 'single-a-normal00'));
//$main_title = esc_html(get_theme_mod('cms_top_main_title_setting', ''));
//$sub_title = esc_html(get_theme_mod('cms_top_sub_title_setting', ''));
//$btn_text = esc_html(get_theme_mod('cms_top_btn_setting', ''));
//$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');
//$btn_link_design = get_theme_mod('common_link_btn_url_setting', '01');
//$topCms_btn_link = esc_url(get_theme_mod('cms_top_btn_link_setting'));
$categories = get_categories(array(
    'hide_empty' => true // 投稿がないカテゴリは除外
));

if ($cms_single_design === 'single-d-normal00') :
?>
    <div class="post-container <?php echo $cms_single_design; ?>-container">

        <?php if (have_posts()) : ?>
            <?php // Content for page
            //get_template_part('parts/parts', 'pageTitle'); 
            ?>
            <div class="post-main <?php echo $cms_single_design; ?>-main">
                <?php while (have_posts()) : the_post(); ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail"><?php the_post_thumbnail('full'); ?></div>
                    <?php endif; ?>

                    <article class="entry-wrapper">
                        <div class="entry-header">
                            <div class="entry-common">
                                <?php
                                cat_link();
                                ?>
                                <div class="entry-data">
                                    <?php the_time('Y.m.d'); ?>
                                </div>
                            </div>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </div>
                        <div class="entry-body">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="entry-footer">
                            <?php previous_post_link('%link', '前の記事へ'); ?>
                            <?php next_post_link('%link', '次の記事へ'); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

<?php else : ?>
    <div class="post-container <?php echo $cms_single_design; ?>-container">

        <?php if (have_posts()) : ?>
            <?php // Content for page
            //get_template_part('parts/parts', 'pageTitle'); 
            ?>
            <div class="post-main <?php echo $cms_single_design; ?>-main">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="entry-wrapper">
                        <div class="entry-header">
                            <div class="entry-common">
                                <?php
                                cat_link();
                                ?>
                                <div class="entry-data">
                                    <?php the_time('Y.m.d'); ?>
                                </div>
                            </div>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="entry-thumbnail"><?php the_post_thumbnail('full'); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="entry-body">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="entry-footer">
                            <?php previous_post_link('%link', '前の記事へ'); ?>
                            <?php next_post_link('%link', '次の記事へ'); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>