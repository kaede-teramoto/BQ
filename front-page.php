<?php
/*
 * this is front page.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();
$cms = get_theme_mod('cms_top_display', false);

get_header();

if (!empty($post->post_content)) {
    the_content();
}
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $custom_repeater = get_post_meta(get_the_ID(), '_page_custom_repeater', true);

        if (!empty($custom_repeater['parents']) && is_array($custom_repeater['parents'])) {
            foreach ($custom_repeater['parents'] as $parent_index => $parent) {
                echo render_parent_block($parent, $parent_index);
            }
        }
        ?>

<?php endwhile;
endif; ?>

<?php // Export CMS
if ($cms) :
    get_template_part('parts/parts', 'top_cms'); ?>
<?php endif; ?>

<?php get_footer(); ?>