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

get_header(); ?>

<?php // Content for page
get_template_part('parts/parts', 'pageContent'); ?>

<?php // Export CMS
if ($cms) :
    get_template_part('parts/parts', 'top_cms'); ?>
<?php endif; ?>

<?php get_footer(); ?>