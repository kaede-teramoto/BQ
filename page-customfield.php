<?php
/*
 * Template name: カスタムページ
 *
 * @package BOUTiQ
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php // Content for page
        get_template_part('parts/parts', 'pageTitle'); ?>

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
<?php get_footer(); ?>