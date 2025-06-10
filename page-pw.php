<?php
/*
 * Template name: Password page
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();
get_header();

get_template_part('parts/parts', 'pageTitle');

if (!post_password_required($post->ID)) :
    echo '<section class="section">';
    echo '<div class="section-inner">';
    the_content();
    echo '</div>';
    echo '</section>';
else:
    echo get_the_password_form();
endif;
get_footer();
