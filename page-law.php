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

    <?php // Content for page
    get_template_part('parts/parts', 'pageContent'); ?>
</div>
<?php get_footer(); ?>