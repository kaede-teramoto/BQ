<?php
/*
 * Template name: Password page
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();
get_header(); ?>

<?php // Content for page
get_template_part('parts/parts', 'pageTitle'); ?>

<?php if (!post_password_required($post->ID)) :  ?>

<?php // Content for page
    get_template_part('parts/parts', 'pageContent'); ?>
  
 <?php else:  ?>
  
 <?php echo get_the_password_form(); ?>
  
 <?php endif;  ?>

 <?php get_footer(); ?>