<?php
/*
 * This is a part to display the CMS in the middle of the page.
 *
 * @package BOUTiQ
 */
$site_name = get_bloginfo();
$cms = get_theme_mod('atq_top_cms_display', false);
$cms_num = esc_attr(get_theme_mod('atq_top_cms_num_setting', '10'));
$cms_design = esc_attr(get_theme_mod('atq_top_cms_design_setting', '01'));
$main_title = esc_html(get_theme_mod('atq_top_cms_main_title_setting', ''));
$sub_title = esc_html(get_theme_mod('atq_top_cms_sub_title_setting', ''));
$btn_text = esc_html(get_theme_mod('atq_top_cms_btn_setting', ''));
$btn_link_design = get_theme_mod('atq_btn_link_setting', '01');
$btn_icon_design = get_theme_mod('atq_btn_link_icon_setting', '01');
// Text Link design type
$text_link_design = get_theme_mod('atq_text_link_setting', '01');
$text_icon_design = get_theme_mod('atq_text_link_icon_setting', '01');

$link_type = get_theme_mod('cms_link_type', '01');
$topCms_btn_link   = esc_url(get_theme_mod('atq_top_cms_btn_link_setting'));
$categories = get_categories(array(
    'hide_empty' => true // 投稿がないカテゴリは除外
));

if ($cms_design == 03) : ?>

    <div class="top-cms__wrapper top-cms03__wrapper">
        <div class="top-cms03">
            <div class="top-cms03__title">
                <h2 class="top-cms03__title--main"><?php echo $main_title; ?></h2>
                <p class="top-cms03__title--sub"><?php echo $sub_title; ?></p>
            </div>

            <div class="top-cms03__content">
                <div class="swiper">
                    <div id="all" class="top-cms03__list tab__panel --active swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $cms_num,
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="top-cms03__post swiper-slide">
                                    <a class="top-cms03__post__link" href="<?php the_permalink() ?>">
                                        <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                            <div class="top-cms03__post__thumbnail">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php else : /* 登録されていなかったら */ ?>
                                            <div class="top-cms03__post__thumbnail">
                                                <div class="top-cms03__post__thumbnail__text"><?php echo $site_name ?></div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="top-cms03__post__title">
                                            <?php echo mb_substr($post->post_title, 0, 80) . '...'; ?>
                                        </div>
                                        <div class="top-cms03__post__footer">
                                            <div class="top-cms03__post__cat">
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
                                            <div class="top-cms03__post__data"><?php the_time('Y.m.d'); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>

            <div class="top-cms<?php echo $cms_design; ?>__link">
                <?php if ($link_type == 01) : ?>
                    <div class="c-button c-button<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                        <a class="c-button__link c-button<?php echo $btn_link_design; ?>__link" href='<?php echo $topCms_btn_link; ?>'>
                            <div class="c-button__text c-button__text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                            <div class="c-button__icon c-button__icon<?php echo $btn_icon_design; ?>"></div>
                        </a>
                    </div>
                <?php else : ?>
                    <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                        <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php echo $btn_text; ?></span>
                        <span class="icon<?php echo $text_icon_design; ?>"></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="top-cms__wrapper top-cms<?php echo $cms_design; ?>__wrapper">
        <div class="top-cms<?php echo $cms_design; ?>">
            <div class="top-cms<?php echo $cms_design; ?>__title">
                <h2 class="top-cms<?php echo $cms_design; ?>__title--main"><?php echo $main_title; ?></h2>
                <p class="top-cms<?php echo $cms_design; ?>__title--sub"><?php echo $sub_title; ?></p>
            </div>

            <div class="top-cms<?php echo $cms_design; ?>__cat">
                <?php
                echo '<ul id="itemTab" class="top-cms' . $cms_design . '__cat__list">';
                echo '<li class="top-cms' . $cms_design . '__cat__item"><a class="--active" href="#all">ALL</a></li>';
                foreach ($categories as $category) {
                    echo '<li class="top-cms' . $cms_design . '__cat__item"><a href="#' . $category->slug . '">' . esc_html($category->name) . '</a></li>'; // カテゴリ名を表示
                }
                echo '</ul>';
                ?>
            </div>
            <div class="top-cms<?php echo $cms_design; ?>__link">
                <?php if ($link_type == 01) : ?>
                    <div class="c-button c-button<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                        <a class="c-button__link c-button<?php echo $btn_link_design; ?>__link" href='<?php echo $topCms_btn_link; ?>'>
                            <div class="c-button__text c-button__text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                            <div class="c-button__icon c-button__icon<?php echo $btn_icon_design; ?>"></div>
                        </a>
                    </div>
                <?php else : ?>
                    <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                        <span class="linkText__main linkText<?php echo $text_link_design; ?>__main"><?php echo $btn_text; ?></span>
                        <span class="icon<?php echo $text_icon_design; ?>"></span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="top-cms<?php echo $cms_design; ?>__content">
                <div id="all" class="top-cms<?php echo $cms_design; ?>__list tab__panel --active">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $cms_num,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="top-cms<?php echo $cms_design; ?>__post">
                                <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                    <div class="top-cms<?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="top-cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else : /* 登録されていなかったら */ ?>
                                    <div class="top-cms<?php echo $cms_design; ?>__post__thumbnail">
                                        <a class="top-cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/dummy.jpg" alt="">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="top-cms<?php echo $cms_design; ?>__post__cat">
                                    <?php the_category(' '); ?>
                                </div>
                                <div class="top-cms<?php echo $cms_design; ?>__post__data"><?php the_time('Y.m.d'); ?></div>
                                <div class="top-cms<?php echo $cms_design; ?>__post__title">
                                    <a class="top-cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
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
                        <div id="<?php echo esc_html($category->slug); ?>" class="top-cms<?php echo $cms_design; ?>__list tab__panel">

                            <?php while ($query->have_posts()) :
                                $query->the_post(); ?>
                                <div class="top-cms<?php echo $cms_design; ?>__post">
                                    <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                        <div class="top-cms<?php echo $cms_design; ?>__post__thumbnail">
                                            <a class="top-cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php else : /* 登録されていなかったら */ ?>
                                        <div class="top-cms<?php echo $cms_design; ?>__post__thumbnail">
                                            <a class="top-cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/dummy.png" alt="">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="top-cms<?php echo $cms_design; ?>__post__cat">
                                        <?php the_category(' '); ?>
                                    </div>
                                    <div class="top-cms<?php echo $cms_design; ?>__post__data"><?php the_time('Y.m.d'); ?></div>
                                    <div class="top-cms<?php echo $cms_design; ?>__post__title">
                                        <a class="top-cms<?php echo $cms_design; ?>__post__link" href="<?php the_permalink() ?>">
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
<?php endif; ?>