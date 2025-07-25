<?php
/*
 * this is header parts.
 *
 * @package BOUTiQ
 */

$site_name = get_bloginfo();
$site_url  = home_url();
$theme_url = get_template_directory_uri();
$site_name = get_bloginfo();

//slug取得
$slug = get_post_field('post_name', get_the_ID());
// design type
$header_design = esc_attr(get_theme_mod('header_design_setting', 'header-a-normal00')); // デフォルト値は 'header-a-normal00'
$hm_design = esc_attr(get_theme_mod('hm_icon_design_setting', '01')); // デフォルト値は 'type1'


// card type
$header_card = get_theme_mod('header_card', false);
// Setting Background color
$header_bg_gradation = get_theme_mod('header_bg_gradation_setting', false);
if ($header_bg_gradation) {
    $header_bg_color = 'style="' . $header_bg_gradation . '"';
} else {
    $header_bg_color = NULL;
}

// Setting underline
$header_under_line = get_theme_mod('header_under_line', false);
if ($header_under_line) {
    $header_under_line = ' header-underline';
} else {
    $header_under_line = null;
}
// Setting blur
$header_filter = get_theme_mod('header_filter', false);
$progress_bar_option = get_theme_mod('progress_bar_option', '0');
if ($header_filter) {
    $header_filter = ' header_filter';
} else {
    $header_filter = null;
}

// First btn
$btn_display_setting = get_theme_mod('header_btn_display_setting', false);
$btn_url = esc_attr(get_theme_mod('header_btn_url_setting', ''));
$btn_text = get_theme_mod('header_btn_text_setting', '');
$btn_link_design = get_theme_mod('header_btn_setting', 'button-ac00');
$btn_bg_color = get_theme_mod('header_btn_bg_color_setting', false);
$btn_icon_design = get_theme_mod('header_btn_icon_setting', 'icon-ac00');
$btn_gradation = get_theme_mod('header_btn_gradation_setting', false);

if ($btn_gradation) {
    $btn_bg_color = 'style="' . $btn_gradation . '"';
} else {
    $btn_bg_color = NULL;
}
$btn_target_setting = get_theme_mod('header_btn_target_setting', false);

// Second btn
$btn_sub_display_setting = get_theme_mod('header_btn_sub_display_setting', false);
$btn_sub_url = esc_attr(get_theme_mod('header_btn_sub_url_setting', ''));
$btn_sub_text = get_theme_mod('header_btn_sub_text_setting', '');
$btn_sub_link_design = get_theme_mod('header_btn_sub_setting', 'button-ac00');
$btn_sub_bg_color = get_theme_mod('header_btn_sub_bg_color_setting', false);
$btn_sub_icon_design = get_theme_mod('header_btn_sub_icon_setting', 'icon-ac00');
$btn_sub_gradation = get_theme_mod('header_btn_sub_gradation_setting', false);

if ($btn_sub_gradation) {
    $btn_sub_bg_color = 'style="' . $btn_sub_gradation . '"';
} else {
    $btn_sub_bg_color = NULL;
}
$btn_sub_target_setting = get_theme_mod('header_btn_sub_target_setting', false);

//page 
$site_default_background_color = get_theme_mod('site_default_background_color', '#FFFFFF');
$page_bg = 'style="background-color: ' . $site_default_background_color . ';"';

$loading_display = esc_html(get_theme_mod('loading_display_setting', false));
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
    if ($header_filter) : ?>
        <style>
            .header_filter {
                backdrop-filter: blur(<?php echo $progress_bar_option; ?>px);
            }
        </style>
    <?php endif; ?>
    <?php
    /* <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> ピンバック　一時廃止 */
    ?>
    <?php wp_head(); ?>
</head>

<?php if (is_page()) : ?>

    <body <?php body_class("page-" . $slug); ?> id="page-<?php echo $slug; ?>" <?php echo $page_bg; ?>>
    <?php else : ?>

        <body <?php body_class("post-" . $slug); ?>>
        <?php endif; ?>

        <?php if ($loading_display) :
            get_template_part('parts/parts', 'loading');
        endif; ?>

        <div class="l-container" id="container">
            <?php if ($header_card) : ?>
                <header class="header <?php echo $header_design; ?>">
                    <div class="header-wrapper header-card" <?php echo $header_bg_color; ?>>
                    <?php else : ?>
                        <header class="header <?php echo $header_design; ?><?php echo $header_filter; ?><?php echo $header_under_line; ?>" <?php echo $header_bg_color; ?>>
                            <div class="header-wrapper">
                            <?php endif; ?>

                            <?php if (has_nav_menu('headerNavSub')) : ?>
                                <div class="header-nav-left">
                                    <nav class="header-nav-wrapper" role="navigation">
                                        <?php wp_nav_menu(array(
                                            'theme_location' => 'headerNavSub',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="header-nav-list">%3$s</ul>',
                                            'li_class' => '',
                                            'a_class' => '',
                                        )); ?>
                                    </nav>
                                </div>
                            <?php endif; ?>

                            <div class="header-logo">
                                <?php
                                /*----------------------------------------------------------------------
                            ロゴ画像が登録されていた場合
                            ----------------------------------------------------------------------*/
                                $header_logo_img = esc_url(get_theme_mod('header_logo_image'));
                                if (!empty($header_logo_img)) : ?>

                                    <a href='<?php echo $site_url; ?>' title='<?php echo $site_name; ?>' rel='home'>
                                        <img class="header-logo-image" src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy">
                                    </a>

                                <?php else :
                                    /*----------------------------------------------------------------------
                                ロゴ画像が登録されていなかった場合
                                ----------------------------------------------------------------------*/
                                ?>
                                    <!-- site_title -->
                                    <a href='<?php echo $site_url; ?>' title='<?php echo $site_name; ?>' rel='home'><?php echo $site_name; ?></a>
                                    <!-- //site_title -->
                                <?php endif;
                                /*----------------------------------------------------------------------
                            ロゴ画像部分ここまで
                            ----------------------------------------------------------------------*/
                                ?>
                            </div>
                            <div class="header-nav">
                                <?php if (has_nav_menu('headerNav')) : ?>
                                    <nav class="header-nav-wrapper" role="navigation">
                                        <?php wp_nav_menu(array(
                                            'theme_location' => 'headerNav',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="header-nav-list">%3$s</ul>',
                                            'li_class' => '',
                                            'a_class' => '',
                                            'walker' => new Custom_Walker_Nav_Menu(),
                                        )); ?>
                                    </nav>
                                <?php endif; ?>

                                <?php if ($header_design !== 'header-f-square00') : // header-f-square00以外のときはボタンをここに表示 
                                ?>
                                    <div class="header-btn">
                                        <?php if ($btn_display_setting) : ?>
                                            <?php if ($btn_target_setting) : ?>
                                                <div class="c-btn <?php echo $btn_link_design; ?> btn--first">
                                                    <a class="c-btn-link" href='<?php echo $btn_url; ?>' target="_blank" <?php echo $btn_bg_color; ?>>
                                                        <div class="c-btn-text"><?php echo $btn_text; ?></div>
                                                        <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="c-btn <?php echo $btn_link_design; ?> btn--first">
                                                    <a class="c-btn-link" href='<?php echo $btn_url; ?>' <?php echo $btn_bg_color; ?>>
                                                        <div class="c-btn-text"><?php echo $btn_text; ?></div>
                                                        <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if ($btn_sub_display_setting) : ?>
                                            <?php if ($btn_sub_target_setting) : ?>
                                                <div class="c-btn <?php echo $btn_sub_link_design; ?> btn--second">
                                                    <a class="c-btn-link" href='<?php echo $btn_sub_url; ?>' target="_blank" <?php echo $btn_sub_bg_color; ?>>
                                                        <div class="c-btn-text"><?php echo $btn_sub_text; ?></div>
                                                        <div class="c-btn-icon <?php echo $btn_sub_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="c-btn <?php echo $btn_sub_link_design; ?> btn--second">
                                                    <a class="c-btn-link" href='<?php echo $btn_sub_url; ?>' <?php echo $btn_sub_bg_color; ?>>
                                                        <div class="c-btn-text"><?php echo $btn_sub_text; ?></div>
                                                        <div class="c-btn-icon <?php echo $btn_sub_icon_design; ?>"></div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="hamburger hamburger<?php echo $hm_design; ?> <?php echo $header_design; ?>__hamburger<?php echo $hm_design; ?>  js-hm-toggle">
                                    <btn type="btn" class="hamburger__btn hamburger<?php echo $hm_design; ?>__btn">
                                        <span class="hamburger__btn__top hamburger<?php echo $hm_design; ?>__btn__top"></span>
                                        <span class="hamburger__btn__center hamburger<?php echo $hm_design; ?>__btn__center"></span>
                                        <span class="hamburger__btn__bottom hamburger<?php echo $hm_design; ?>__btn__bottom"></span>
                                    </btn>
                                </div>

                                <?php get_template_part('parts/parts', 'hMenu'); ?>
                            </div>

                            <?php if ($header_design === 'header-f-square00') : // header-f-square00のときはボタンを外に表示 
                            ?>
                                <div class="header-btn">
                                    <?php if ($btn_display_setting) : ?>
                                        <?php if ($btn_target_setting) : ?>
                                            <div class="c-btn <?php echo $btn_link_design; ?> btn--first">
                                                <a class="c-btn-link" href='<?php echo $btn_url; ?>' target="_blank" <?php echo $btn_bg_color; ?>>
                                                    <div class="c-btn-text"><?php echo $btn_text; ?></div>
                                                    <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                                                </a>
                                            </div>
                                        <?php else : ?>
                                            <div class="c-btn <?php echo $btn_link_design; ?> btn--first">
                                                <a class="c-btn-link" href='<?php echo $btn_url; ?>' target="_blank" <?php echo $btn_bg_color; ?>>
                                                    <div class="c-btn-text"><?php echo $btn_text; ?></div>
                                                    <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if ($btn_sub_display_setting) : ?>
                                        <?php if ($btn_sub_target_setting) : ?>
                                            <div class="c-btn <?php echo $btn_sub_link_design; ?> btn--second">
                                                <a class="c-btn-link" href='<?php echo $btn_sub_url; ?>' <?php echo $btn_sub_bg_color; ?>>
                                                    <div class="c-btn-text"><?php echo $btn_sub_text; ?></div>
                                                    <div class="c-btn-icon <?php echo $btn_sub_icon_design; ?>"></div>
                                                </a>
                                            </div>
                                        <?php else : ?>
                                            <div class="c-btn <?php echo $btn_sub_link_design; ?> btn--second">
                                                <a class="c-btn-link" href='<?php echo $btn_sub_url; ?>' <?php echo $btn_sub_bg_color; ?>>
                                                    <div class="c-btn-text"><?php echo $btn_sub_text; ?></div>
                                                    <div class="c-btn-icon <?php echo $btn_sub_icon_design; ?>"></div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </header>

                        <main class="l-main">

                            <?php if (is_front_page()) :
                                $show_arrows = get_theme_mod('top_fv_slider_arrow', '');
                                $top_fv_slider_pagination = get_theme_mod('top_fv_slider_pagination', '');
                            ?>
                                <?php if (!($show_arrows) || !($top_fv_slider_pagination == 1)) { ?>
                                    <style>
                                        <?php if (!($show_arrows)) {
                                            echo '.swiper-btn { display: none;}';
                                        }
                                        if (!($top_fv_slider_pagination == 1)) {
                                            echo '.swiper-pagination {display: none;}';
                                        } ?>
                                    </style>
                                <?php } ?>

                            <?php endif; ?>