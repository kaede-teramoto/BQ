<?php
/*
 * this is content for page parts.
 *
 * @package BOUTiQ
 */


$slug = get_post_field('post_name', get_post());

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
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');

// Text Link design type
$text_link_design = get_theme_mod('text_link_setting', '01');
$text_icon_design = get_theme_mod('text_link_icon_setting', '01');

if (!empty($post->post_content)) {
    the_content();
}

// 繰り返しフィールドの値を格納するための変数
$block_contents = [];
$block_titles = [];

if (have_rows('content_block')) : $i = 1;
    while (have_rows('content_block')) : the_row();
        $block_design_type = get_sub_field('block_design_type');
        $block_class = get_sub_field('block_class');
        $block_title = get_sub_field('block_title');

        $block_text_color = get_sub_field('block_text_color');
        $text_color_set = $block_text_color ? 'color:' . $block_text_color . ';' : '';

        $block_title_color = get_sub_field('block_title_color');
        $title_color_set = $block_title_color ? 'color:' . $block_title_color . ';' : '';

        $border_color_set = $block_text_color ? 'border-color:' . $block_text_color . ';' : '';

        $block_bg_color = get_sub_field('block_bg_color');
        $bg_color_set = $block_bg_color ? 'background-color:' . $block_bg_color . ';' : '';

        $block_bg_image = get_sub_field('block_bg_image');
        $bg_image_set = $block_bg_image ? 'background-image:url(' . $block_bg_image . ');' : '';

        if ($block_design_type === 'form01' || $block_design_type === 'form02' || $block_design_type === 'form03' || $block_design_type === 'form04') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">

                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">

                            <?php if (get_sub_field('block_title_image')) : ?>
                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
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
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?> js-fadeIn">

                                    <?php if (get_sub_field('block_parts_title')) : ?>
                                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_text')) : ?>
                                        <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif ($block_design_type === 'original') :

            $section_slug = get_sub_field('block_subtitle');
            $section_name = $slug . '_' . $section_slug;

            get_template_part('page/content', $section_name);

        elseif ($block_design_type === 'news') :

            get_template_part('parts/parts', 'top_cms');

        elseif ($block_design_type === 'loop01'): ?>
            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <?php if (have_rows('block_parts')) : ?>
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
            </section>

        <?php elseif ($block_design_type === 'common') :

            if ($block_design_type === 'common' && $block_title) {
                // 既に $block_title が処理されているかを確認
                if (!array_key_exists($block_title, $block_contents)) {
                    // 投稿のコンテンツを取得して $block_contents に格納
                    $post_content = get_post_field('post_content', $block_title);
                    $block_contents[$block_title] = $post_content;
                }

                // コンテンツを出力
                $block_content = $block_contents[$block_title];
                echo wp_kses_post($block_content);
            }

        ?>

        <?php elseif ($block_design_type === 'cta01' || $block_design_type === 'cta02' || $block_design_type === 'cta03') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <?php // Content for page
                get_template_part('parts/parts', 'cta'); ?>
            </section>

        <?php elseif ($block_design_type === 'cta04') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner js-fadeIn">
                    <div class="section__<?php echo $block_design_type; ?>__left">

                        <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                            <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">

                                <?php if (get_sub_field('block_title_image')) : ?>
                                    <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                        <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
                                    </div>
                                <?php endif; ?>

                                <?php if (get_sub_field('block_title')) : ?>
                                    <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text">
                                        <?php the_sub_field('block_title'); ?>
                                    </span>
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
                                            <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('block_parts_link_url')) : ?>

                                            <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                                <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                    <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                        <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                            <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                            <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="section__parts__<?php echo $block_design_type; ?>__link">
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
                            <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                                <?php the_sub_field('block_free_area'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="section__<?php echo $block_design_type; ?>__right">
                        <div class="section__img section__<?php echo $block_design_type; ?>__img">
                            <img src="<?php echo $block_bg_image; ?>" alt="<?php the_sub_field('block_title'); ?>">
                        </div>
                    </div>

                </div>
            </section>

        <?php elseif ($block_design_type === 'cta05') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner js-fadeIn">

                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">

                            <?php if (get_sub_field('block_title_image')) : ?>
                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
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
                        <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>">
                            <?php while (have_rows('block_parts')) : the_row(); ?>
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?>">
                                    <a class="section__parts__<?php echo $block_design_type; ?>__link" href="<?php the_sub_field('block_parts_link_url'); ?>"></a>

                                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle" style="<?php echo $text_color_set; ?>"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_parts_title')) : ?>
                                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_parts_text')) : ?>
                                        <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target" style="<?php echo $text_color_set; ?>"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_parts_image')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif ($block_design_type === 'company01' || $block_design_type === 'company02' || $block_design_type === 'company03' || $block_design_type === 'company04') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner js-fadeIn">


                    <?php if (get_sub_field('block_title')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                            <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
                            <?php if (get_sub_field('block_subtitle')) : ?>
                                <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle section__<?php echo $block_design_type; ?>__block-subtitle"><?php the_sub_field('block_subtitle'); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (have_rows('block_parts')) : ?>
                        <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
                            <?php while (have_rows('block_parts')) : the_row(); ?>
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?>">
                                    <dl class="section__parts__dl">
                                        <?php if (get_sub_field('block_parts_title')) : ?>
                                            <dt class="section__parts__dt section__parts__<?php echo $block_design_type; ?>__dt"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></dt>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('block_parts_editor')) : ?>
                                            <dd class="section__parts__dd section__parts__<?php echo $block_design_type; ?>__dd"><?php the_sub_field('block_parts_editor'); ?></dd>
                                        <?php endif; ?>
                                    </dl>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif ($block_design_type === 'company05') : ?>
            <div class="section__wrapper">

                <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                    <div class="section__inner section__<?php echo $block_design_type; ?>__inner js-fadeIn">

                        <?php if (get_sub_field('block_title')) : ?>
                            <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                                <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
                            </h2>
                        <?php endif; ?>

                        <?php if (have_rows('block_parts')) : ?>
                            <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
                                <?php while (have_rows('block_parts')) : the_row(); ?>
                                    <div class="section__parts section__parts__<?php echo $block_design_type; ?>">
                                        <dl class="section__parts__dl">
                                            <?php if (get_sub_field('block_parts_title')) : ?>
                                                <dt class="section__parts__dt section__parts__<?php echo $block_design_type; ?>__dt"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></dt>
                                            <?php endif; ?>

                                            <?php if (get_sub_field('block_parts_editor')) : ?>
                                                <dd class="section__parts__dd section__parts__<?php echo $block_design_type; ?>__dd"><?php the_sub_field('block_parts_editor'); ?></dd>
                                            <?php endif; ?>
                                        </dl>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_sub_field('block_free_area')) : ?>
                            <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                                <?php the_sub_field('block_free_area'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </div>

        <?php elseif ($block_design_type === 'design06') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">

                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                            <?php if (get_sub_field('block_title_image')) : ?>

                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
                                </div>

                            <?php endif; ?>
                            <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
                            <?php if (get_sub_field('block_subtitle')) : ?>
                                <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle section__<?php echo $block_design_type; ?>__block-subtitle"><?php the_sub_field('block_subtitle'); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (have_rows('block_parts')) : ?>
                        <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
                            <?php while (have_rows('block_parts')) : the_row(); ?>
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?> js-fadeIn">

                                    <div class="section__parts section__parts__<?php echo $block_design_type; ?>__left js-fadeIn">
                                        <?php if (get_sub_field('block_parts_title')) : ?>
                                            <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                            <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('block_parts_text')) : ?>
                                            <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('block_parts_link_url')) : ?>

                                            <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                                <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                    <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                        <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                            <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                            <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                    <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php the_sub_field('block_parts_link_url'); ?>" style="<?php echo $border_color_set; ?>">
                                                        <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php the_sub_field('block_parts_link_text'); ?></span>
                                                        <span class="icon<?php echo $text_icon_design; ?>"></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </div>

                                    <?php if (get_sub_field('block_parts_editor')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__editor js-target"><?php the_sub_field('block_parts_editor'); ?></div>
                                    <?php elseif (get_sub_field('block_parts_image')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php elseif ($block_design_type === 'design07' || $block_design_type === 'design08') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">

                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">

                            <?php if (get_sub_field('block_title_image')) : ?>
                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
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
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?> js-fadeIn">

                                    <?php if (get_sub_field('block_parts_title')) : ?>
                                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_text')) : ?>
                                        <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_link_url')) : ?>

                                        <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                            <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                    <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                        <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                        <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php the_sub_field('block_parts_link_url'); ?>" style="<?php echo $border_color_set; ?>">
                                                    <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php the_sub_field('block_parts_link_text'); ?></span>
                                                    <span class="icon<?php echo $text_icon_design; ?>"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_editor')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__editor js-target"><?php the_sub_field('block_parts_editor'); ?></div>
                                    <?php elseif (get_sub_field('block_parts_image')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif ($block_design_type === 'design15') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">

                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">

                            <?php if (get_sub_field('block_title_image')) : ?>
                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
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
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?> js-fadeIn">

                                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_title')) : ?>
                                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                    <?php endif; ?>

                                    <div class="section__parts__inner">
                                        <?php if (get_sub_field('block_parts_text') || get_sub_field('block_parts_link_url')) : ?>
                                            <div class="section__parts__inner__left">
                                                <?php if (get_sub_field('block_parts_text')) : ?>
                                                    <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                                <?php endif; ?>

                                                <?php if (get_sub_field('block_parts_link_url')) : ?>

                                                    <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                                        <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                            <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                                <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                                    <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                                    <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                            <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php the_sub_field('block_parts_link_url'); ?>" style="<?php echo $border_color_set; ?>">
                                                                <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php the_sub_field('block_parts_link_text'); ?></span>
                                                                <span class="icon<?php echo $text_icon_design; ?>"></span>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="section__parts__inner__right">
                                            <?php if (get_sub_field('block_parts_image')) : ?>
                                                <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if (get_sub_field('block_parts_editor')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__editor js-target"><?php the_sub_field('block_parts_editor'); ?></div>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif ($block_design_type === 'follow01' || $block_design_type === 'follow02' || $block_design_type === 'follow03') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">
                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                            <?php if (get_sub_field('block_title_image')) : ?>

                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
                                </div>

                            <?php endif; ?>
                            <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
                            <?php if (get_sub_field('block_subtitle')) : ?>
                                <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle section__<?php echo $block_design_type; ?>__block-subtitle"><?php the_sub_field('block_subtitle'); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>
                    <div class="section__parts__cover section__parts__cover__<?php echo $block_design_type; ?>">

                        <?php if (have_rows('block_parts')) : $count = 1; ?>
                            <div class="section__parts__nav__wrapper section__parts__nav__wrapper__<?php echo $block_design_type; ?> js-toggle">
                                <nav class="section__parts__nav section__parts__nav__<?php echo $block_design_type; ?>">
                                    <ul class="section__parts__nav__list section__parts__nav__list__<?php echo $block_design_type; ?>">
                                        <?php while (have_rows('block_parts')) : the_row(); ?>
                                            <li class="section__parts__nav__item section__parts__nav__item__<?php echo $block_design_type; ?>" style="<?php echo $title_color_set; ?>">
                                                <a href="#section<?php echo $i; ?>__parts0<?php echo $count; ?>" class="section__parts__nav__link section__parts__nav__link__<?php echo $block_design_type; ?>">
                                                    <?php the_sub_field('block_parts_title'); ?><span class="versatile"></span>
                                                </a>
                                            </li>
                                        <?php $count++;
                                        endwhile; ?>
                                    </ul>
                                </nav>
                            </div>
                        <?php endif; ?>

                        <?php if (have_rows('block_parts')) : $count = 1; ?>
                            <div class="section__parts__content__wrapper section__parts__content__wrapper__<?php echo $block_design_type; ?>">
                                <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
                                    <?php while (have_rows('block_parts')) : the_row(); ?>
                                        <div id="section<?php echo $i; ?>__parts0<?php echo $count; ?>" class="section__parts section__parts__<?php echo $block_design_type; ?> js-fadeIn">
                                            <?php if (get_sub_field('block_parts_title')) : ?>
                                                <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                                <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                            <?php endif; ?>

                                            <?php if (get_sub_field('block_parts_text')) : ?>
                                                <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                            <?php endif; ?>

                                            <?php if (get_sub_field('block_parts_image')) : ?>
                                                <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('block_parts_link_url')) : ?>

                                                <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                                    <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                            <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                                <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                                <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php the_sub_field('block_parts_link_url'); ?>" style="<?php echo $border_color_set; ?>">
                                                            <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php the_sub_field('block_parts_link_text'); ?></span>
                                                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>

                                            <?php endif; ?>

                                        </div>
                                        <?php $count++; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif ($block_design_type === 'tab01') : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">
                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                            <?php if (get_sub_field('block_title_image')) : ?>

                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
                                </div>

                            <?php endif; ?>
                            <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
                            <?php if (get_sub_field('block_subtitle')) : ?>
                                <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle section__<?php echo $block_design_type; ?>__block-subtitle"><?php the_sub_field('block_subtitle'); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (have_rows('block_parts')) : $t = 1; ?>
                        <div class="tab__panels">
                            <?php while (have_rows('block_parts')) : the_row(); ?>
                                <?php if (get_sub_field('block_parts_title')) : ?>
                                    <div class="tab__panel<?php echo $t === 1 ? ' is-active' : ''; ?>">
                                        <?php the_sub_field('block_parts_title'); ?>
                                    </div>
                                <?php endif; ?>
                            <?php $t++;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('block_parts')) : $t = 1; ?>
                        <div class="tab__contents section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
                            <?php while (have_rows('block_parts')) : the_row(); ?>
                                <div class="tab__content<?php echo $t === 1 ? ' is-active' : ''; ?> section__parts section__parts__<?php echo $block_design_type; ?>">
                                    <?php if (get_sub_field('block_parts_title')) : ?>
                                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_text')) : ?>
                                        <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_image')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_editor')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__editor js-target"><?php the_sub_field('block_parts_editor'); ?></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_link_url')) : ?>

                                        <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                            <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                    <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                        <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                        <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php the_sub_field('block_parts_link_url'); ?>" style="<?php echo $border_color_set; ?>">
                                                    <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php the_sub_field('block_parts_link_text'); ?></span>
                                                    <span class="icon<?php echo $text_icon_design; ?>"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                    <?php endif; ?>


                                </div>
                            <?php $t++;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('block_free_area')) : ?>
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>



        <?php else : ?>

            <section id="section<?php echo $i; ?>" class="<?php echo $block_class; ?> section section__<?php echo $block_design_type; ?>" style="<?php echo $bg_color_set; ?><?php echo $bg_image_set; ?>">
                <div class="section__inner section__<?php echo $block_design_type; ?>__inner">
                    <?php if (get_sub_field('block_title') || get_sub_field('block_title_image') || get_sub_field('block_subtitle')) : ?>
                        <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?> section__<?php echo $block_design_type; ?>__block-title" style="<?php echo $title_color_set; ?><?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                            <?php if (get_sub_field('block_title_image')) : ?>

                                <div class="section__block__title__image section__block__title<?php echo $content_title_setting; ?>__image section__<?php echo $block_design_type; ?>__block-title__image">
                                    <img src="<?php the_sub_field('block_title_image'); ?>" alt="">
                                </div>

                            <?php endif; ?>
                            <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text"><?php the_sub_field('block_title'); ?></span>
                            <?php if (get_sub_field('block_subtitle')) : ?>
                                <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle section__<?php echo $block_design_type; ?>__block-subtitle"><?php the_sub_field('block_subtitle'); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (have_rows('block_parts')) : ?>
                        <div class="section__parts__wrapper section__parts__wrapper__<?php echo $block_design_type; ?>" style="<?php echo $text_color_set; ?>">
                            <?php while (have_rows('block_parts')) : the_row(); ?>
                                <div class="section__parts section__parts__<?php echo $block_design_type; ?> js-fadeIn">
                                    <?php if (get_sub_field('block_parts_title')) : ?>
                                        <h3 class="section__parts__title section__parts__<?php echo $block_design_type; ?>__title js-toggle" style="<?php echo $title_color_set; ?>"><?php the_sub_field('block_parts_title'); ?><span class="versatile"></span></h3>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('block_parts_subtitle')) : ?>
                                        <p class="section__parts__subtitle section__parts__<?php echo $block_design_type; ?>__subtitle"><?php the_sub_field('block_parts_subtitle'); ?></p>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_text')) : ?>
                                        <div class="section__parts__text section__parts__<?php echo $block_design_type; ?>__text js-target"><?php the_sub_field('block_parts_text'); ?><span class="versatile"></span></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_image')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__img"><img src="<?php the_sub_field('block_parts_image'); ?>" alt="<?php the_sub_field('block_parts_subtitle'); ?>"></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_editor')) : ?>
                                        <div class="section__parts__<?php echo $block_design_type; ?>__editor js-target"><?php the_sub_field('block_parts_editor'); ?></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('block_parts_link_url')) : ?>

                                        <?php if (get_sub_field('block_parts_link_type') === 'btn') : ?>
                                            <div class="section__parts__<?php echo $block_design_type; ?>__link">
                                                <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                                    <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php the_sub_field('block_parts_link_url'); ?>'>
                                                        <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php the_sub_field('block_parts_link_text'); ?></div>
                                                        <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="section__parts__<?php echo $block_design_type; ?>__link">
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
                        <div class="section__block__lib section__<?php echo $block_design_type; ?>__block__lib js-fadeIn">
                            <?php the_sub_field('block_free_area'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

    <?php
        $i++;
    endwhile;

    ?>
<?php endif; ?>