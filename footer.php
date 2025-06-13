<?php
/*
 * this is footer parts.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();

$footer_design   = get_theme_mod('footer_design_type', 'footerAN00');
$footer_logo_image      = esc_url(get_theme_mod('footer_logo_image', false));
$footer_bg_color_option = get_theme_mod('footer_bg_color_option', false);
$footer_bg_color = get_theme_mod('footer_bg_color_set', false);
$footer_text_color = get_theme_mod('footer_text_color_set', false);
if ($footer_text_color) {
    $footer_text_color_set = 'color:' . $footer_text_color . ';';
} else {
    $footer_text_color_set = '';
}

$footer_company_profile = nl2br(esc_textarea(get_theme_mod('footer_company_profile', false)));

$footer_top_line = get_theme_mod('footer_top_line', false);
$footer_copyright       = get_theme_mod('footer_copyright', false);

// btn design type
$btn_link_design = get_theme_mod('footer_first_btn_setting', '01');
$btn_icon_design = get_theme_mod('footer_first_btn_icon_setting', '01');

$btn_target_setting = get_theme_mod('footer_first_btn_target_setting', false);

// Follow button
$follow_btn_pc = get_theme_mod('follow_btn_pc_display', false);
$follow_btn_pc_position = get_theme_mod('follow_btn_pc_setting', '00');
$follow_btn_pc_top_and_bottom = get_theme_mod('follow_btn_pc_top_and_bottom', '50px');
$follow_btn_pc_left_and_right = get_theme_mod('follow_btn_pc_left_and_right', '50px');
$follow_btn_pc_image = esc_url(get_theme_mod('follow_btn_pc_image', ''));
$follow_btn_pc_url = esc_url(get_theme_mod('follow_btn_pc_url', ''));
$follow_btn_pc_alt = get_theme_mod('follow_btn_pc_alt', '');
$follow_btn_pc_target = get_theme_mod('follow_btn_pc_target_setting', false);
if ($follow_btn_pc_target) {
    $follow_btn_pc_target_set = ' target="_blank"';
} else {
    $follow_btn_pc_target_set = '';
}
$follow_btn_pc_animation = get_theme_mod('follow_btn_pc_animation', '00');
if ($follow_btn_pc_animation == 01) {
    $follow_btn_pc_animation_set = ' is-leftIn';
} elseif ($follow_btn_pc_animation == 02) {
    $follow_btn_pc_animation_set = ' is-rightIn';
} elseif ($follow_btn_pc_animation == 03) {
    $follow_btn_pc_animation_set = ' is-topIn';
} elseif ($follow_btn_pc_animation == 04) {
    $follow_btn_pc_animation_set = ' is-bottomIn';
} elseif ($follow_btn_pc_animation == 05) {
    $follow_btn_pc_animation_set = ' is-fadeIn';
} else {
    $follow_btn_pc_animation_set = '';
}

// Follow button
$follow_btn_sp = get_theme_mod('follow_btn_sp_display', false);
$follow_btn_sp_position = get_theme_mod('follow_btn_sp_setting', '00');
$follow_btn_sp_top_and_bottom = get_theme_mod('follow_btn_sp_top_and_bottom', '50px');
$follow_btn_sp_left_and_right = get_theme_mod('follow_btn_sp_left_and_right', '50px');
$follow_btn_sp_image = esc_url(get_theme_mod('follow_btn_sp_image', ''));
$follow_btn_sp_url = esc_url(get_theme_mod('follow_btn_sp_url', ''));
$follow_btn_sp_alt = get_theme_mod('follow_btn_sp_alt', '');
$follow_btn_sp_target = get_theme_mod('follow_btn_sp_target_setting', false);
if ($follow_btn_sp_target) {
    $follow_btn_sp_target_set = ' target="_blank"';
} else {
    $follow_btn_sp_target_set = '';
}
$follow_btn_sp_animation = get_theme_mod('follow_btn_sp_animation', '00');
if ($follow_btn_sp_animation == 01) {
    $follow_btn_sp_animation_set = ' is-leftIn';
} elseif ($follow_btn_sp_animation == 02) {
    $follow_btn_sp_animation_set = ' is-rightIn';
} elseif ($follow_btn_sp_animation == 03) {
    $follow_btn_sp_animation_set = ' is-topIn';
} elseif ($follow_btn_sp_animation == 04) {
    $follow_btn_sp_animation_set = ' is-bottomIn';
} elseif ($follow_btn_sp_animation == 05) {
    $follow_btn_sp_animation_set = ' is-fadeIn';
} else {
    $follow_btn_sp_animation_set = '';
}

// btn for SP
$sp_btn_first_display = get_theme_mod('sp_btn_first_display', false);
$sp_btn_first_text = esc_attr(get_theme_mod('sp_btn_first_text_setting', false));
$sp_btn_first_url = esc_url(get_theme_mod('sp_btn_first_url_setting', false));
$sp_btn_first_icon = esc_url(get_theme_mod('sp_btn_first_icon_setting', false));
$sp_btn_first_image = esc_url(get_theme_mod('sp_btn_first_image_setting', false));
$sp_btn_first_btn_target = esc_url(get_theme_mod('sp_btn_first_btn_target_setting', false));
if ($sp_btn_first_btn_target) {
    $sp_btn_first_btn_target = 'target="_blank"';
} else {
    $sp_btn_first_btn_target = NULL;
}
$sp_btn_second_display = get_theme_mod('sp_btn_second_display', false);
$sp_btn_second_text = esc_attr(get_theme_mod('sp_btn_second_text_setting', false));
$sp_btn_second_url = esc_url(get_theme_mod('sp_btn_second_url_setting', false));
$sp_btn_second_icon = esc_url(get_theme_mod('sp_btn_second_icon_setting', false));
$sp_btn_second_btn_target = esc_url(get_theme_mod('sp_btn_second_btn_target_setting', false));
if ($sp_btn_second_btn_target) {
    $sp_btn_second_btn_target = 'target="_blank"';
} else {
    $sp_btn_second_btn_target = NULL;
}
// First btn
$footer_first_btn_display_setting = get_theme_mod('footer_first_btn_display_setting', false);
$footer_first_btn_url = esc_attr(get_theme_mod('footer_first_btn_url_setting', ''));
$footer_first_btn_text = get_theme_mod('footer_first_btn_text_setting', '');
$footer_first_btn_link_design = get_theme_mod('footer_first_btn_setting', '01');
$footer_first_btn_bg_color = get_theme_mod('footer_first_btn_bg_color_setting', false);
$footer_first_btn_icon_design = get_theme_mod('footer_first_btn_icon_setting', '01');
$footer_first_btn_gradation = get_theme_mod('footer_first_btn_gradation_setting', false);

if ($footer_first_btn_gradation) {
    $footer_first_btn_bg_color = 'style="' . $footer_first_btn_gradation . '"';
} else {
    $footer_first_btn_bg_color = NULL;
}
$footer_first_btn_target_setting = get_theme_mod('footer_first_btn_target_setting', false);

// Second btn
$footer_second_btn_display_setting = get_theme_mod('footer_second_btn_display_setting', false);
$footer_second_btn_url = esc_attr(get_theme_mod('footer_second_btn_url_setting', ''));
$footer_second_btn_text = get_theme_mod('footer_second_btn_text_setting', '');
$footer_second_btn_link_design = get_theme_mod('footer_second_btn_setting', '01');
$footer_second_btn_bg_color = get_theme_mod('footer_second_btn_bg_color_setting', false);
$footer_second_btn_icon_design = get_theme_mod('footer_second_btn_icon_setting', '01');
$footer_second_btn_gradation = get_theme_mod('footer_second_btn_gradation_setting', false);

if ($footer_second_btn_gradation) {
    $footer_second_btn_bg_color = 'style="' . $footer_second_btn_gradation . '"';
} else {
    $footer_second_btn_bg_color = NULL;
}
$footer_second_btn_target_setting = get_theme_mod('footer_second_btn_target_setting', false);


?>
<?php if ($footer_design == 'footerOR') :
    get_template_part('parts/parts', 'originalFooter');
else : ?>
    </main>

    <footer class="footer <?php echo $footer_design; ?>" style="<?php echo $footer_text_color_set; ?>">
        <div class="footer__wrapper <?php echo $footer_design; ?>__wrapper">

            <?php if ($footer_logo_image) : ?>
                <div class="footer__logo <?php echo $footer_design; ?>__logo">
                    <a href="<?php echo $site_url; ?>">
                        <img src="<?php echo $footer_logo_image; ?>" alt="logo" loading="lazy">
                    </a>
                </div>
            <?php endif; ?>

            <?php
            if ($footer_company_profile) : ?>
                <div class="footer__text <?php echo $footer_design; ?>__text" style="<?php echo $footer_text_color_set; ?>">
                    <?php echo $footer_company_profile; ?>
                </div>
            <?php endif; ?>

            <?php $sns_check = get_theme_mod('sns_1');
            if ($sns_check) : ?>
                <div class="footer__sns <?php echo $footer_design; ?>__sns">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {

                        $sns_img = esc_url(get_theme_mod("sns_image_$i", ''));
                        $sns_name = esc_attr(get_theme_mod("sns_name_$i", ''));
                        $sns_img_link = esc_url(get_theme_mod("sns_link_$i", ''));

                        if ($sns_img) {
                            echo '<a href="' . $sns_img_link . '" target="_blank">';
                            echo '<img src="' . $sns_img . '" alt="' . $sns_name . '" loading="lazy">';
                            echo '</a>';
                        }
                    }
                    ?>

                </div>
            <?php endif; ?>

            <?php if ($footer_first_btn_display_setting || $footer_second_btn_display_setting) : ?>
                <div class="footer__btn <?php echo $footer_design; ?>__btn">
                    <?php if ($footer_first_btn_display_setting) : ?>
                        <?php if ($footer_first_btn_target_setting) : ?>
                            <div class="c-btn c-btn<?php echo $footer_first_btn_link_design; ?> btn<?php echo $footer_first_btn_link_design; ?> btn--first">
                                <a class="c-btn__link c-btn<?php echo $footer_first_btn_link_design; ?>__link" href='<?php echo $footer_first_btn_url; ?>' target="_blank" <?php echo $footer_first_btn_bg_color; ?>>
                                    <div class="c-btn__text c-btn__text<?php echo $footer_first_btn_link_design; ?>"><?php echo $footer_first_btn_text; ?></div>
                                    <div class="c-btn__icon c-btn__icon<?php echo $footer_first_btn_icon_design; ?>"></div>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="c-btn c-btn<?php echo $footer_first_btn_link_design; ?> btn<?php echo $footer_first_btn_link_design; ?> btn--first">
                                <a class="c-btn__link c-btn<?php echo $footer_first_btn_link_design; ?>__link" href='<?php echo $footer_first_btn_url; ?>' <?php echo $footer_first_btn_bg_color; ?>>
                                    <div class="c-btn__text c-btn__text<?php echo $footer_first_btn_link_design; ?>"><?php echo $footer_first_btn_text; ?></div>
                                    <div class="c-btn__icon c-btn__icon<?php echo $footer_first_btn_icon_design; ?>"></div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($footer_second_btn_display_setting) : ?>
                        <?php if ($footer_second_btn_target_setting) : ?>
                            <div class="c-btn c-btn<?php echo $footer_second_btn_link_design; ?> btn<?php echo $footer_second_btn_link_design; ?> btn--second">
                                <a class="c-btn__link c-btn<?php echo $footer_second_btn_link_design; ?>__link" href='<?php echo $footer_second_btn_url; ?>' target="_blank" <?php echo $footer_second_btn_bg_color; ?>>
                                    <div class="c-btn__text c-btn__text<?php echo $footer_second_btn_link_design; ?>"><?php echo $footer_second_btn_text; ?></div>
                                    <div class="c-btn__icon c-btn__icon<?php echo $footer_second_btn_icon_design; ?>"></div>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="c-btn c-btn<?php echo $footer_second_btn_link_design; ?> btn<?php echo $footer_second_btn_link_design; ?> btn--second">
                                <a class="c-btn__link c-btn<?php echo $footer_second_btn_link_design; ?>__link" href='<?php echo $footer_second_btn_url; ?>' <?php echo $footer_second_btn_bg_color; ?>>
                                    <div class="c-btn__text c-btn__text<?php echo $footer_second_btn_link_design; ?>"><?php echo $footer_second_btn_text; ?></div>
                                    <div class="c-btn__icon c-btn__icon<?php echo $footer_second_btn_icon_design; ?>"></div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (has_nav_menu('footerNavLeft') || has_nav_menu('footerNavRight')) : ?>
                <div class="footer__nav <?php echo $footer_design; ?>__nav">
                    <nav class="footer__nav__wrapper <?php echo $footer_design; ?>__nav__wrapper">

                        <?php
                        if (has_nav_menu('footerNavLeft')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footerNavLeft',
                                'container' => '',
                                'menu_class' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul class="footer__nav__wrap-list__left ' . $footer_design . '__nav__wrap-list__left">%3$s</ul>',
                                'li_class' => $footer_design . '__nav__wrap-list__item',
                                'a_class' => 'footer-nav__link',
                            ));
                        }

                        if (has_nav_menu('footerNavRight')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footerNavRight',
                                'container' => '',
                                'menu_class' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul class="footer__textlink ' . $footer_design . '__nav__wrap-list__right">%3$s</ul>',
                                'li_class' => $footer_design . '__nav__wrap-list__item',
                                'a_class' => 'footer-nav__link',
                            ));
                        } ?>

                    </nav>
                </div>
            <?php endif; ?>

            <?php if (has_nav_menu('footerNavInfo')) : ?>
                <div class="footer__info <?php echo $footer_design; ?>__info">
                    <small><?php echo $footer_copyright; ?></small>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footerNavInfo',
                        'container' => '',
                        'menu_class' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="footer__textlink ' . $footer_design . '__textlink">%3$s</ul>',
                        'li_class' => $footer_design . '__textlink__item',
                        'a_class' => 'footer-nav__link',
                    )); ?>
                </div>
            <?php else : ?>
                <small><?php echo $footer_copyright; ?></small>
            <?php endif; ?>
        </div>
    </footer>
<?php endif; ?>

<?php if ($sp_btn_first_display || $sp_btn_second_display) : ?>
    <div class="sp__btn__wrapper l-sp">
        <?php if ($sp_btn_first_display) : ?>
            <div class="sp__btn sp__btn__first">
                <a class="sp__btn__link sp__btn__first__link" href="<?php echo $sp_btn_first_url; ?>" <?php echo $sp_btn_first_btn_target; ?>>
                    <?php if ($sp_btn_first_icon) : ?>
                        <span class="sp__btn__icon sp__btn__first__icon"><img src="<?php echo $sp_btn_first_icon; ?>" alt="<?php echo $sp_btn_first_text; ?>" loading="lazy"></span>
                    <?php endif;
                    if ($sp_btn_first_text) : ?>
                        <span class="sp__btn__text sp__btn__first__text"><?php echo $sp_btn_first_text; ?></span>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
        <?php if ($sp_btn_second_display) : ?>
            <div class="sp__btn sp__btn__second">
                <a class="sp__btn__link sp__btn__second__link" href="<?php echo $sp_btn_second_url; ?>" <?php echo $sp_btn_second_btn_target; ?>>
                    <?php if ($sp_btn_second_icon) : ?>
                        <span class="sp__btn__icon sp__btn__second__icon"><img src="<?php echo $sp_btn_second_icon; ?>" alt="<?php echo $sp_btn_second_text; ?>" loading="lazy"></span>
                    <?php endif;
                    if ($sp_btn_second_text) : ?>
                        <span class="sp__btn__text sp__btn__second__text"><?php echo $sp_btn_second_text; ?></span>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if ($follow_btn_pc) : ?>
    <?php if ($follow_btn_pc_image) : ?>
        <div class="l-spN follow_btn follow_btn<?php echo $follow_btn_pc_position; ?><?php echo $follow_btn_pc_animation_set; ?>">
            <span class="follow_btn--close"></span>
            <?php if ($follow_btn_pc_url) : ?>
                <a class="follow_btn__link follow_btn<?php echo $follow_btn_pc_position; ?>__link" href="<?php echo $follow_btn_pc_url; ?>" <?php echo $follow_btn_pc_target_set; ?>>
                    <img class="follow_btn__img follow_btn<?php echo $follow_btn_pc_position; ?>__img" src="<?php echo $follow_btn_pc_image; ?>" alt="<?php echo $follow_btn_pc_alt; ?>">
                </a>
            <?php else : ?>
                <img class="follow_btn__img follow_btn<?php echo $follow_btn_pc_position; ?>__img" src="<?php echo $follow_btn_pc_image; ?>" alt="<?php echo $follow_btn_pc_alt; ?>" loading="lazy">
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if ($follow_btn_sp) : ?>
    <?php if ($follow_btn_sp_image) : ?>
        <div class="l-sp follow_btn follow_btn<?php echo $follow_btn_sp_position; ?><?php echo $follow_btn_sp_animation_set; ?>">
            <span class="follow_btn--close"></span>
            <?php if ($follow_btn_sp_url) : ?>
                <a class="follow_btn__link follow_btn<?php echo $follow_btn_sp_position; ?>__link" href="<?php echo $follow_btn_sp_url; ?>" <?php echo $follow_btn_sp_target_set; ?>>
                    <img class="follow_btn__img follow_btn<?php echo $follow_btn_sp_position; ?>__img" src="<?php echo $follow_btn_sp_image; ?>" alt="<?php echo $follow_btn_sp_alt; ?>">
                </a>
            <?php else : ?>
                <img class="follow_btn__img follow_btn<?php echo $follow_btn_sp_position; ?>__img" src="<?php echo $follow_btn_sp_image; ?>" alt="<?php echo $follow_btn_sp_alt; ?>" loading="lazy">
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
</div>
<!-- // all-container -->

<?php wp_footer();

$fv_type = get_theme_mod('top_fv_type_setting', '01');
$fv_post_count_pc = get_theme_mod('top_fv_post_count_pc', '3');
$fv_post_count_tab = get_theme_mod('top_fv_post_count_tab', '2');
$fv_post_count_sp = get_theme_mod('top_fv_post_count_sp', '1');
$fv_post_space_pc = get_theme_mod('top_fv_post_space_pc', '30');
$fv_post_space_tab = get_theme_mod('top_fv_post_space_tab', '20');
$fv_post_space_sp = get_theme_mod('top_fv_post_space_sp', '10');
$fv_post_position = get_theme_mod('top_fv_post_position', false);


$effect = "'" . esc_attr(get_theme_mod('top_fv_slider_option', 'fade')) . "'";
$show_arrows = get_theme_mod('top_fv_slider_arrow', 'NULL');
$top_fv_slider_pagination = get_theme_mod('top_fv_slider_pagination', false);
$top_fv_slider_progressbar = get_theme_mod('top_fv_slider_progressbar', false);
$top_fv_slider_speed = get_theme_mod('top_fv_slider_speed', '3000');
$cms_design = esc_attr(get_theme_mod('cms_top_design_setting', '01'));

?>

<script>
    <?php if ($cms_design == 01 || $cms_design == 02) : ?>
        document.querySelectorAll('.top-cms').forEach(topCms => {
            const tabs = topCms.querySelectorAll('#itemTab a'); // この.top-cms内のタブ
            const panels = topCms.querySelectorAll('.tab__panel'); // この.top-cms内のパネル

            tabs.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    // この .top-cms 内のすべてのタブから "active" クラスを削除する
                    tabs.forEach(tab => {
                        tab.classList.remove('--active');
                    });

                    // この .top-cms 内のすべてのパネルから "active" クラスを削除する
                    panels.forEach(panel => {
                        panel.classList.remove('--active');
                    });

                    // クリックされたタブに "active" クラスを追加する
                    this.classList.add('--active');

                    // 関連するタブコンテンツを表示する
                    const activeTabId = this.getAttribute('href').replace('#', '');
                    const activeTabContent = topCms.querySelector(`#${activeTabId}`);
                    if (activeTabContent) {
                        activeTabContent.classList.add('--active');
                    }
                });
            });
        });

    <?php elseif ($cms_design == 'newsBN00') : ?>
        const top03Swiper = new Swiper('.newsBN00__content .swiper', {
            slidesPerView: 1.2,
            spaceBetween: 20,
            watchSlidesProgress: true,
            //centeredSlides: true,
            navigation: {
                nextEl: ".newsBN00__content .swiper-btn-next",
                prevEl: ".newsBN00__content .swiper-btn-prev",
            },
            breakpoints: {
                1599: {
                    slidesPerView: 5.2,
                },
                1199: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                849: {
                    slidesPerView: 3,
                },
                599: {
                    slidesPerView: 2,
                    centeredSlides: false,
                }
            },
            speed: 2000,
            mousewheel: {
                invert: false,
            },
            pagination: {
                el: ".newsBN00__content .cms-pagination",
                type: "progressbar",
                clickable: true,
            },

        });
    <?php endif; ?>

    <?php //echo $top_fv_slider_pagination;
    if ($fv_type == "02" || $fv_type == "05") : ?>

        // import Swiper, {
        //     Autoplay,
        //     Navigation,
        //     Pagination,
        //     EffectFade,
        //     Scrollbar
        // } from 'swiper';
        // Swiper.use([Autoplay, Navigation, Pagination, EffectFade, Scrollbar]);

        const topPage_slider = new Swiper(".p-top.swiper", {
            loop: true,
            speed: 2000,
            autoplay: {
                delay: <?php echo $top_fv_slider_speed; ?>,
                disableOnInteraction: false,
            },
            spaceBetween: <?php echo $fv_post_space_pc; ?>,
            slidesPerView: <?php echo $fv_post_count_pc; ?>,
            breakpoints: {
                1199: {
                    slidesPerView: <?php echo $fv_post_count_pc; ?>,
                    spaceBetween: <?php echo $fv_post_space_pc; ?>,
                },
                849: {
                    slidesPerView: <?php echo $fv_post_count_tab; ?>,
                    spaceBetween: <?php echo $fv_post_space_tab; ?>,
                },
                599: {
                    slidesPerView: <?php echo $fv_post_count_sp; ?>,
                    spaceBetween: <?php echo $fv_post_space_sp; ?>,
                }
            },
            <?php if ($fv_post_position) { ?>
                centeredSlides: true,
            <?php } ?>

            effect: <?php echo $effect; ?>,
            fadeEffect: { //ここにオプションを指定します。
                crossFade: true,
            },
            <?php if ($top_fv_slider_pagination == 1) { ?>
                pagination: {
                    el: '.p-top .swiper-pagination',
                    clickable: true,
                },
            <?php } ?>

            <?php if ($show_arrows == 1) { ?>
                // Navigation arrows
                navigation: {
                    nextEl: '.p-top .swiper-button-next',
                    prevEl: '.p-top .swiper-button-prev',
                },
            <?php } ?>
            <?php if ($top_fv_slider_progressbar == 1) { ?>
                // And if we need scrollbar
                scrollbar: {
                    el: '.p-top .swiper-scrollbar',
                },
            <?php } ?>

        });
    <?php endif; ?>
</script>
</body>

</html>