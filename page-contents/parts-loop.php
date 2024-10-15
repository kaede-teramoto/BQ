<?php
// loop

$block_design_type = get_sub_field('block_design_type');
if (have_rows('block_parts')) : ?>
    <div class="section__inner section__<?php echo $block_design_type; ?>__inner js-fadeIn">
        <?php while (have_rows('block_parts')) : the_row(); ?>
            <?php if (get_sub_field('block_parts_image')) : ?>
                <div class="section__parts__<?php echo $block_design_type; ?>__img parts__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php if (have_rows('block_parts')) : ?>
    <div class="section__inner section__<?php echo $block_design_type; ?>__inner">
        <?php while (have_rows('block_parts')) : the_row(); ?>
            <?php if (get_sub_field('block_parts_image')) : ?>
                <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>