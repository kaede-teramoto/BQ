<?php
/*
 * Template name: Law Page
 *
 *
 * @package BOUTiQ
 */

get_header(); ?>
<div class="p-law__wrapper">

    <div class="p-law__heading">
        <h1 class="p-law__title">
            <?php the_title(); ?>
        </h1>
    </div>

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

</div>
<?php get_footer(); ?>