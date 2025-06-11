<?php
/*
 * This is a part to display the CMS in the middle of the page.
 *
 * @package BOUTiQ
 */
$site_name = get_bloginfo();
$cms = get_theme_mod('cms_top_display', false);
$cms_num = esc_attr(get_theme_mod('cms_top_num_setting', '10'));
$cms_design = esc_attr(get_theme_mod('cms_top_design_setting', 'newsAN00'));
$main_title = esc_html(get_theme_mod('cms_top_main_title_setting', ''));
$sub_title = esc_html(get_theme_mod('cms_top_sub_title_setting', ''));
$btn_text = esc_html(get_theme_mod('cms_top_btn_setting', ''));
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');
// Text Link design type
$text_link_design = get_theme_mod('text_link_setting', '01');
$text_icon_design = get_theme_mod('text_link_icon_setting', '01');

$link_type = get_theme_mod('cms_link_type', '01');
$topCms_btn_link   = esc_url(get_theme_mod('cms_top_btn_link_setting'));
$categories = get_categories(array(
    'hide_empty' => true // 投稿がないカテゴリは除外
));

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
}

if ($cms_design == 'newsBN00') : ?>

    <div class="top-cms__wrapper <?php echo $cms_design; ?>__wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms__title <?php echo $cms_design; ?>__title">
                <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>



            <div class="top-cms__content <?php echo $cms_design; ?>__content">
                <div class="swiper">
                    <div id="all" class="top-cms__list <?php echo $cms_design; ?>__list tab__panel --active swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $cms_num,
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="top-cms__post <?php echo $cms_design; ?>__post swiper-slide">
                                    <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                        <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                            <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php else : /* 登録されていなかったら */ ?>
                                            <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                                <div class="top-cms__post__thumbnail__text <?php echo $cms_design; ?>__post__thumbnail__text"><?php echo $site_name ?></div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="top-cms__post__title <?php echo $cms_design; ?>__post__title">
                                            <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                        </div>
                                        <div class="top-cms__post__footer <?php echo $cms_design; ?>__post__footer">
                                            <div class="top-cms__post__cat <?php echo $cms_design; ?>__post__cat">
                                                <?php
                                                $categories = get_the_category();
                                                $separator = ' '; // カテゴリーの区切り文字

                                                if (! empty($categories)) {
                                                    $output = '';
                                                    foreach ($categories as $category) {
                                                        $output .= esc_html($category->name) . $separator;
                                                    }
                                                    echo trim($output, $separator);
                                                }
                                                ?>
                                            </div>
                                            <div class="top-cms__post__date <?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="cms-pagination"></div>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="<?php echo $cms_design; ?>__link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php elseif ($cms_design == 'newsAN00' || $cms_design == 'newsAT00') : ?>
    <div class="top-cms__wrapper <?php echo $cms_design; ?>__wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms__title <?php echo $cms_design; ?>__title">
                <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <div class="top-cms__cat <?php echo $cms_design; ?>__cat">
                <?php
                echo '<ul id="itemTab" class="top-cms__cat__list ' . $cms_design . '__cat__list">';
                echo '<li class="top-cms__cat__item ' . $cms_design . '__cat__item"><a class="--active" href="#all">ALL</a></li>';
                foreach ($categories as $category) {
                    echo '<li class="top-cms__cat__item ' . $cms_design . '__cat__item"><a href="#' . $category->slug . '">' . esc_html($category->name) . '</a></li>'; // カテゴリ名を表示
                }
                echo '</ul>';
                ?>
            </div>
            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms__link <?php echo $cms_design; ?>__link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="top-cms__content <?php echo $cms_design; ?>__content">
                <div id="all" class="top-cms__list <?php echo $cms_design; ?>__list tab__panel --active">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $cms_num,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="top-cms__post <?php echo $cms_design; ?>__post">
                                <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                    <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else : /* 登録されていなかったら */ ?>
                                    <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="eager">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="top-cms__post__cat <?php echo $cms_design; ?>__post__cat">
                                    <?php cat_link(); ?>
                                </div>
                                <div class="top-cms__post__date <?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                                <div class="top-cms__post__title <?php echo $cms_design; ?>__post__title">
                                    <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                        <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <?php
                foreach ($categories as $category) {

                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => $cms_num,
                        'category__in'   => array($category->term_id),
                        'no_found_rows'  => true,
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : ?>
                        <div id="<?php echo esc_html($category->slug); ?>" class="<?php echo $cms_design; ?>__list tab__panel">

                            <?php while ($query->have_posts()) :
                                $query->the_post(); ?>
                                <div class="top-cms__post <?php echo $cms_design; ?>__post">
                                    <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                        <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                            <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php else : /* 登録されていなかったら */ ?>
                                        <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                            <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="lazy">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="top-cms__post__cat <?php echo $cms_design; ?>__post__cat">
                                        <?php the_category(' '); ?>
                                    </div>
                                    <div class="top-cms__post__date <?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                                    <div class="top-cms__post__title <?php echo $cms_design; ?>__post__title">
                                        <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                <?php endif;
                    wp_reset_postdata(); // クエリのリセット
                }
                ?>
            </div>
        </div>
    </div>

<?php elseif ($cms_design == 'newsCN00' || $cms_design == 'newsDN00' || $cms_design == 'newsEN00') : ?>
    <div class="top-cms__wrapper <?php echo $cms_design; ?>__wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms__title <?php echo $cms_design; ?>__title">
                <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms__link <?php echo $cms_design; ?>__link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="top-cms__content <?php echo $cms_design; ?>__content">
                <div id="all" class="top-cms__list <?php echo $cms_design; ?>__list tab__panel --active">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $cms_num,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="top-cms__post <?php echo $cms_design; ?>__post">
                                <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                    <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else : /* 登録されていなかったら */ ?>
                                    <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="eager">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="top-cms__post__cat <?php echo $cms_design; ?>__post__cat">
                                    <?php cat_link(); ?>
                                </div>
                                <div class="top-cms__post__date <?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                                <div class="top-cms__post__title <?php echo $cms_design; ?>__post__title">
                                    <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                        <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <?php
                foreach ($categories as $category) {

                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => $cms_num,
                        'category__in'   => array($category->term_id),
                        'no_found_rows'  => true,
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : ?>
                        <div id="<?php echo esc_html($category->slug); ?>" class="<?php echo $cms_design; ?>__list tab__panel">

                            <?php while ($query->have_posts()) :
                                $query->the_post(); ?>
                                <div class="top-cms__post <?php echo $cms_design; ?>__post">
                                    <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                        <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                            <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php else : /* 登録されていなかったら */ ?>
                                        <div class="top-cms__post__thumbnail <?php echo $cms_design; ?>__post__thumbnail">
                                            <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="lazy">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="top-cms__post__cat <?php echo $cms_design; ?>__post__cat">
                                        <?php the_category(' '); ?>
                                    </div>
                                    <div class="top-cms__post__date <?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                                    <div class="top-cms__post__title <?php echo $cms_design; ?>__post__title">
                                        <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                <?php endif;
                    wp_reset_postdata(); // クエリのリセット
                }
                ?>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="top-cms__wrapper <?php echo $cms_design; ?>__wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms__title <?php echo $cms_design; ?>__title">
                <h2 class="js-fadeIn section__block__title section__block__title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section__block__title__text section__block__title<?php echo $content_title_setting; ?>__text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section__block__title--subtitle section__block__title<?php echo $content_title_setting; ?>--subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms__link <?php echo $cms_design; ?>__link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="top-cms__content <?php echo $cms_design; ?>__content">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $cms_num,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class=" top-cms__post <?php echo $cms_design; ?>__post">

                            <div class="top-cms__post__cat <?php echo $cms_design; ?>__post__cat">
                                <?php cat_link(); ?>
                            </div>
                            <div class="top-cms__post__date <?php echo $cms_design; ?>__post__date"><?php the_time('Y.m.d'); ?></div>
                            <div class="top-cms__post__title <?php echo $cms_design; ?>__post__title">
                                <a class="top-cms__post__link <?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                    <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>