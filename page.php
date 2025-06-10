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

<?php
if (have_posts()) : while (have_posts()) : the_post();
        echo '<section class="section">';
        echo '<div class="section-inner">';
        the_content();
        echo '</div>';
        echo '</section>';
    endwhile;
endif;
?>

<?php get_footer(); ?>