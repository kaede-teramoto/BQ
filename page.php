<?php
/*
 * this is default page.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();
get_header(); ?>

<?php // Content for page
get_template_part('parts/parts', 'pageTitle'); ?>

<?php // Content for page
get_template_part('parts/parts', 'pageContent'); ?>

<?php get_footer(); ?>