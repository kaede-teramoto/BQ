<?php


//page
if (is_front_page()) {
    $content_title_setting = get_theme_mod('boutiq_top_content_title_setting', '01');
    $content_title_underline = get_theme_mod('top_content_title_underline', false);
    $content_title_underline_color = get_theme_mod('top_content_title_underline_color', '#999999');
    $content_title_underline_width = get_theme_mod('top_content_title_underline_width', '2px');

    if ($content_title_underline) {
        $title_underline = 'margin-bottom: 50px; border-bottom-style: solid;';
        $title_underline_color = 'border-bottom-color:' . $content_title_underline_color . ';';
        $title_underline_thickness = 'border-bottom-width:' . $content_title_underline_width . ';';
    } else {
        $title_underline = '';
        $title_underline_color = '';
        $title_underline_thickness = '';
    }
} else {
    $content_title_setting = get_theme_mod('content_title_setting', '01'); // デフォルト値は 'type1'
    $content_title_underline = get_theme_mod('content_title_underline', false);
    $content_title_underline_color = get_theme_mod('content_title_underline_color', '#999999');
    $content_title_underline_width = get_theme_mod('content_title_underline_width', '2px');

    if ($content_title_underline) {
        $title_underline = 'margin-bottom: 50px; border-bottom-style: solid;';
        $title_underline_color = 'border-bottom-color:' . $content_title_underline_color . ';';
        $title_underline_thickness = 'border-bottom-width:' . $content_title_underline_width . ';';
    } else {
        $title_underline = '';
        $title_underline_color = '';
        $title_underline_thickness = '';
    }
}

// btn design type
$btn_link_design = get_theme_mod('common_btn_design_setting', 'button-ac00');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', 'icon-ac00');

// Text Link design type
$text_link_design = get_theme_mod('text_link_setting', '01');
$text_icon_design = get_theme_mod('text_link_icon_setting', '01');


$block_design_type = get_sub_field('block_design_type');

$block_text_color = get_sub_field('block_text_color');
$text_color_set = $block_text_color ? 'color:' . $block_text_color . ';' : '';

$block_title_color = get_sub_field('block_title_color');
$title_color_set = $block_title_color ? 'color:' . $block_title_color . ';' : '';

$border_color_set = $block_text_color ? 'border-color:' . $block_text_color . ';' : '';

$block_bg_color = get_sub_field('block_bg_color');
$bg_color_set = $block_bg_color ? 'background-color:' . $block_bg_color . ';' : '';

$block_bg_image = get_sub_field('block_bg_image');
$bg_image_set = $block_bg_image ? 'background-image:url(' . $block_bg_image . ');' : '';

?>
<div class="section__inner section__<?php echo $block_design_type; ?>__inner js-fadeIn">

    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
        <h2 class="section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">

            <?php if (get_sub_field('block_title_image')) : ?>
                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="" loading="lazy">
                </div>
            <?php endif; ?>

            <?php if (get_sub_field('block_title')) : ?>
                <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
            <?php endif; ?>

            <?php if (get_sub_field('block_subtitle')) : ?>
                <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle section__<?php echo $block_design_type; ?>__block-subtitle"><?php the_sub_field('block_subtitle'); ?></span>
            <?php endif; ?>
        </h2>
    <?php endif; ?>

    <?php if (have_rows('block_parts')) : ?>
        <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
            <?php while (have_rows('block_parts')) : the_row(); ?>
                <div class="section__parts section__parts__<?php echo $block_design_type; ?>">
                    <?php if (get_sub_field('block_parts_title')) : ?>
                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                    <?php endif; ?>
                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                    <?php endif; ?>
                    <?php if (get_sub_field('block_parts_text')) : ?>
                        <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                    <?php endif; ?>
                    <?php if (get_sub_field('block_parts_image')) : ?>
                        <div class="section__parts__img section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>" loading="lazy"></div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_parts_link_url')) : ?>
                        <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                            <div class="section__parts__link section__parts__<?php echo $block_design_type; ?>__link">
                                <div class="c-btn c-btn<?php echo $btn_link_design; ?>">
                                    <a class="c-btn-link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                        <div class="c-btn-text"><?php the_sub_field('block_parts_link_text'); ?></div>
                                        <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="section__parts__link section__parts__<?php echo $block_design_type; ?>__link">
                                <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php the_sub_field('block_parts_link_url'); ?>" style="<?php echo $border_color_set; ?>">
                                    <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php the_sub_field('block_parts_link_text'); ?></span>
                                    <span class="icon<?php echo $text_icon_design; ?>"></span>
                                </a>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php if (get_sub_field('block_free_area')) : ?>
        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib">
            <?php the_sub_field('block_free_area'); ?>
        </div>
    <?php endif; ?>
</div>