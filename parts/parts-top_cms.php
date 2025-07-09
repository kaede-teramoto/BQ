<?php
/*
 * This is a part to display the CMS in the middle of the page.
 *
 * @package BOUTiQ
 */
$site_name = get_bloginfo();
$cms = get_theme_mod('cms_top_display', false);
$cms_num = esc_attr(get_theme_mod('cms_top_num_setting', '10'));
$cms_design = esc_attr(get_theme_mod('cms_top_design_setting', 'news-a-normal00'));
$main_title = esc_html(get_theme_mod('cms_top_main_title_setting', ''));
$sub_title = esc_html(get_theme_mod('cms_top_sub_title_setting', ''));
$btn_text = esc_html(get_theme_mod('cms_top_btn_setting', ''));
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');
// Text Link design type
$text_link_design = get_theme_mod('text_link_setting', '01');
$text_icon_design = get_theme_mod('text_link_icon_setting', '01');

$link_type = get_theme_mod('cms_link_type_setting', '01');
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
if ($cms_design == 'news-original') :
    get_template_part('parts/parts', 'originalCms');
elseif ($cms_design == 'news-b-normal00' || $cms_design == 'news-e-normal00') : ?>

    <div class="top-cms-wrapper <?php echo $cms_design; ?>-wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">

            <div class="top-cms-title">
                <h2 class="js-fadeIn section-block-title section-block-title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section-block-title-text section-block-title<?php echo $content_title_setting; ?>-text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section-block-title-subtitle section-block-title<?php echo $content_title_setting; ?>-subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <div class="top-cms-content">
                <div class="swiper">
                    <div id="all" class="top-cms-list tab-panel --active swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $cms_num,
                            'orderby'   => 'date',
                            'order'     => 'ASC'
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="top-cms-post swiper-slide">
                                    <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                        <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                            <div class="top-cms-post-thumbnail">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php else : /* 登録されていなかったら */ ?>
                                            <div class="top-cms-post-thumbnail">
                                                <div class="top-cms-post-thumbnail-text"><?php echo $site_name ?></div>
                                            </div>
                                        <?php endif; ?>
                                    </a>

                                    <div class="top-cms-post-title">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>"><?php echo mb_substr($post->post_title, 0, 80) . '...'; ?></a>
                                    </div>

                                    <div class="top-cms-post-footer">
                                        <div class="top-cms-post-cat">
                                            <?php
                                            $categories = get_the_category();
                                            $separator = ' '; // カテゴリーの区切り文字

                                            if (! empty($categories)) {
                                                $output = '';
                                                foreach ($categories as $category) {
                                                    $cat_link = esc_url(get_category_link($category->term_id));
                                                    $cat_name = esc_html($category->name);
                                                    $output .= '<a href="' . $cat_link . '" class="link">' . $cat_name . '</a>' . $separator;
                                                }
                                                echo trim($output, $separator);
                                            }

                                            ?>
                                        </div>
                                        <div class="top-cms-post-date"><?php the_time('Y.m.d'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="cms-pagination"></div>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms-link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn-link c-btn<?php echo $btn_link_design; ?>-link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn-text c-btn-text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn-icon c-btn-icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText-main linkText<?php echo $text_link_design; ?>-main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php elseif ($cms_design == 'news-a-normal00' || $cms_design == 'news-a-text00') : ?>
    <div class="top-cms-wrapper <?php echo $cms_design; ?>-wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms-title">
                <h2 class="js-fadeIn section-block-title section-block-title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section-block-title-text section-block-title<?php echo $content_title_setting; ?>-text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section-block-title-subtitle section-block-title<?php echo $content_title_setting; ?>-subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <div class="top-cms-cat">
                <?php
                echo '<ul id="itemTab" class="top-cms-cat-list">';
                echo '<li class="top-cms-cat-item"><a class="top-cms-cat-link --active" href="#all">ALL</a></li>';
                foreach ($categories as $category) {
                    echo '<li class="top-cms-cat-item"><a class="top-cms-cat-link" href="#' . $category->slug . '">' . esc_html($category->name) . '</a></li>'; // カテゴリ名を表示
                }
                echo '</ul>';
                ?>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms-link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn-link c-btn<?php echo $btn_link_design; ?>-link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn-text c-btn-text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn-icon c-btn-icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText-main linkText<?php echo $text_link_design; ?>-main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="top-cms-content">
                <div id="all" class="top-cms-list tab-panel --active">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $cms_num,
                        'orderby'   => 'date',
                        'order'     => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="top-cms-post">
                                <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                    <div class="top-cms-post-thumbnail">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else : /* 登録されていなかったら */ ?>
                                    <div class="top-cms-post-thumbnail">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="eager">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="top-cms-post-cat">
                                    <?php cat_link(); ?>
                                </div>
                                <div class="top-cms-post-date"><?php the_time('Y.m.d'); ?></div>
                                <div class="top-cms-post-title">
                                    <a class="top-cms-post-link" href="<?php the_permalink() ?>">
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
                        <div id="<?php echo esc_html($category->slug); ?>" class="top-cms-list tab-panel">

                            <?php while ($query->have_posts()) :
                                $query->the_post(); ?>
                                <div class="top-cms-post">
                                    <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                        <div class="top-cms-post-thumbnail">
                                            <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php else : /* 登録されていなかったら */ ?>
                                        <div class="top-cms-post-thumbnail">
                                            <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="lazy">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="top-cms-post-cat">
                                        <?php the_category(' '); ?>
                                    </div>
                                    <div class="top-cms-post-date"><?php the_time('Y.m.d'); ?></div>
                                    <div class="top-cms-post-title">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>">
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

<?php elseif ($cms_design == 'news-c-normal00' || $cms_design == 'news-d-normal00' || $cms_design == 'news-e-normal00') : ?>
    <div class="top-cms-wrapper <?php echo $cms_design; ?>-wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms-title">
                <h2 class="js-fadeIn section-block-title section-block-title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section-block-title-text section-block-title<?php echo $content_title_setting; ?>-text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section-block-title-subtitle section-block-title<?php echo $content_title_setting; ?>-subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms-link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn-link c-btn<?php echo $btn_link_design; ?>-link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn-text c-btn-text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn-icon c-btn-icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText-main linkText<?php echo $text_link_design; ?>-main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="top-cms-content">
                <div id="all" class="top-cms-list tab-panel --active">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $cms_num,
                        'orderby'   => 'date',
                        'order'     => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="top-cms-post">
                                <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                    <div class="top-cms-post-thumbnail">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else : /* 登録されていなかったら */ ?>
                                    <div class="top-cms-post-thumbnail">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="eager">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="top-cms-post-cat">
                                    <?php cat_link(); ?>
                                </div>
                                <div class="top-cms-post-date"><?php the_time('Y.m.d'); ?></div>
                                <div class="top-cms-post-title">
                                    <a class="top-cms-post-link" href="<?php the_permalink() ?>">
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
                        <div id="<?php echo esc_html($category->slug); ?>" class="top-cms-list tab-panel">

                            <?php while ($query->have_posts()) :
                                $query->the_post(); ?>
                                <div class="top-cms-post">
                                    <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                                        <div class="top-cms-post-thumbnail">
                                            <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php else : /* 登録されていなかったら */ ?>
                                        <div class="top-cms-post-thumbnail">
                                            <a class="top-cms-post-link" href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnails/thumbnail.webp" alt="" loading="lazy">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="top-cms-post-cat">
                                        <?php the_category(' '); ?>
                                    </div>
                                    <div class="top-cms-post-date"><?php the_time('Y.m.d'); ?></div>
                                    <div class="top-cms-post-title">
                                        <a class="top-cms-post-link" href="<?php the_permalink() ?>">
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
    <div class="top-cms-wrapper <?php echo $cms_design; ?>-wrapper js-fadeIn">
        <div class="top-cms <?php echo $cms_design; ?>">
            <div class="top-cms-title">
                <h2 class="js-fadeIn section-block-title section-block-title<?php echo $content_title_setting; ?>" style="<?php echo $title_underline; ?><?php echo $title_underline_thickness; ?><?php echo $title_underline_color; ?>">
                    <?php if ($main_title) : ?>
                        <span class="section-block-title-text section-block-title<?php echo $content_title_setting; ?>-text">
                            <?php echo $main_title; ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($sub_title) : ?>
                        <span class="section-block-title-subtitle section-block-title<?php echo $content_title_setting; ?>-subtitle">
                            <?php echo $sub_title; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <?php if ($btn_text && $topCms_btn_link): ?>
                <div class="top-cms-link">
                    <?php if ($link_type == 01) : ?>
                        <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-btn-link c-btn<?php echo $btn_link_design; ?>-link" href='<?php echo $topCms_btn_link; ?>'>
                                <div class="c-btn-text c-btn-text<?php echo $btn_link_design; ?>"><?php echo $btn_text; ?></div>
                                <div class="c-btn-icon c-btn-icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="linkText linkText<?php echo $text_link_design; ?>" href="<?php echo $topCms_btn_link; ?>">
                            <span class="linkText-main linkText<?php echo $text_link_design; ?>-main"><?php echo $btn_text; ?></span>
                            <span class="icon<?php echo $text_icon_design; ?>"></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="top-cms-content">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $cms_num,
                    'orderby'   => 'date',
                    'order'     => 'ASC'
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class=" top-cms-post">

                            <div class="top-cms-post-cat">
                                <?php cat_link(); ?>
                            </div>
                            <div class="top-cms-post-date"><?php the_time('Y.m.d'); ?></div>
                            <div class="top-cms-post-title">
                                <a class="top-cms-post-link" href="<?php the_permalink() ?>">
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