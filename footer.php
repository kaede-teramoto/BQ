<?php
/*
 * this is footer parts.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();

$footer_design   = get_theme_mod('footer_design_type', '01');
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

$footer_button_text = esc_attr(get_theme_mod('footer_button_text', false));
$footer_button_link = esc_url(get_theme_mod('footer_button_link', false));

// Button design type
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');

$btn_target_setting = get_theme_mod('footer_btn_target_setting', false);

// Follow BUTTON
$follow_button = get_theme_mod('follow_button_setting', '00');
$follow_button_top_and_bottom = get_theme_mod('follow_button_top_and_bottom', '');
$follow_button_left_and_right = get_theme_mod('follow_button_left_and_right', '');
$follow_button_image = esc_url(get_theme_mod('follow_button_image', ''));
$follow_button_url = esc_url(get_theme_mod('follow_button_url', ''));
$follow_button_alt = get_theme_mod('follow_button_alt', '');
$follow_button_target = get_theme_mod('follow_button_target_setting', false);
if ($follow_button_target) {
    $follow_button_target_set = ' target="_blank"';
} else {
    $follow_button_target_set = '';
}
$follow_button_animation = get_theme_mod('follow_button_animation', '00');
if ($follow_button_animation == 01) {
    $follow_button_animation_set = ' is-leftIn';
} elseif ($follow_button_animation == 02) {
    $follow_button_animation_set = ' is-rightIn';
} elseif ($follow_button_animation == 03) {
    $follow_button_animation_set = ' is-topIn';
} elseif ($follow_button_animation == 04) {
    $follow_button_animation_set = ' is-bottomIn';
} elseif ($follow_button_animation == 05) {
    $follow_button_animation_set = ' is-fadeIn';
} else {
    $follow_button_animation_set = '';
}



?>
</main>

<?php if ($footer_design == 04) :
    get_template_part('parts/parts', 'originalFooter');
else : ?>

    <footer class="footer footer<?php echo $footer_design; ?>" style="<?php echo $footer_text_color_set; ?>">
        <div class="footer__wrapper footer<?php echo $footer_design; ?>__wrapper">

            <?php if ($footer_logo_image) : ?>
                <div class="footer__logo footer<?php echo $footer_design; ?>__logo">
                    <a href="<?php echo $site_url; ?>">
                        <img src="<?php echo $footer_logo_image; ?>" alt="logo">
                    </a>
                </div>
            <?php endif; ?>

            <?php
            if ($footer_company_profile) : ?>
                <div class="footer__text footer<?php echo $footer_design; ?>__text" style="<?php echo $footer_text_color_set; ?>">
                    <?php echo $footer_company_profile; ?>
                </div>
            <?php endif; ?>

            <?php $sns_check = get_theme_mod('atq_sns_1');
            if ($sns_check) : ?>
                <div class="footer__sns footer<?php echo $footer_design; ?>__sns">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {

                        $sns_img = esc_url(get_theme_mod("atq_sns_$i", ''));
                        $sns_name = esc_attr(get_theme_mod("atq_sns_name_$i", ''));
                        $sns_img_link = esc_url(get_theme_mod("atq_sns_link_$i", ''));

                        if ($sns_img) {
                            echo '<a href="' . $sns_img_link . '" target="_blank">';
                            echo '<img src="' . $sns_img . '" alt="' . $sns_name . '">';
                            echo '</a>';
                        }
                    }
                    ?>

                </div>
            <?php endif; ?>

            <?php if ($footer_button_text) : ?>
                <div class="footer__button footer<?php echo $footer_design; ?>__button">
                    <?php if ($btn_target_setting) : ?>
                        <div class="c-button c-button<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-button__link c-button<?php echo $btn_link_design; ?>__link" href='<?php echo $footer_button_link; ?>' target="_blank">
                                <div class="c-button__text c-button__text<?php echo $btn_link_design; ?>"><?php echo $footer_button_text; ?></div>
                                <div class="c-button__icon c-button__icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="c-button c-button<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                            <a class="c-button__link c-button<?php echo $btn_link_design; ?>__link" href='<?php echo $footer_button_link; ?>'>
                                <div class="c-button__text c-button__text<?php echo $btn_link_design; ?>"><?php echo $footer_button_text; ?></div>
                                <div class="c-button__icon c-button__icon<?php echo $btn_icon_design; ?>"></div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (has_nav_menu('footerNavLeft') || has_nav_menu('footerNavRight')) : ?>
                <div class="footer__nav footer<?php echo $footer_design; ?>__nav">
                    <nav class="footer__nav__wrapper footer<?php echo $footer_design; ?>__nav__wrapper">

                        <?php
                        if (has_nav_menu('footerNavLeft')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footerNavLeft',
                                'container' => '',
                                'menu_class' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul class="footer__nav__wrap-list__left footer' . $footer_design . '__nav__wrap-list__left">%3$s</ul>',
                                'li_class' => 'footer' . $footer_design . '__nav__wrap-list__item',
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
                                'items_wrap' => '<ul class="footer__textlink footer' . $footer_design . '__nav__wrap-list__right">%3$s</ul>',
                                'li_class' => 'footer' . $footer_design . '__nav__wrap-list__item',
                                'a_class' => 'footer-nav__link',
                            ));
                        } ?>

                    </nav>
                </div>
            <?php endif; ?>

            <?php if (has_nav_menu('footerNavRight')) : ?>
                <div class="footer__info footer<?php echo $footer_design; ?>__info">
                    <small><?php echo $footer_copyright; ?></small>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footerNavInfo',
                        'container' => '',
                        'menu_class' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="footer__textlink footer' . $footer_design . '__textlink">%3$s</ul>',
                        'li_class' => 'footer' . $footer_design . '__textlink__item',
                        'a_class' => 'footer-nav__link',
                    )); ?>
                </div>
            <?php else : ?>
                <small><?php echo $footer_copyright; ?></small>
            <?php endif; ?>
        </div>
    </footer>
<?php endif; ?>

<?php if (!($follow_button == 00)) : ?>
    <?php if ($follow_button_image) : ?>
        <div class="follow_button follow_button<?php echo $follow_button; ?><?php echo $follow_button_animation_set; ?>">
            <?php if ($follow_button_url) : ?>
                <a class="follow_button__link follow_button<?php echo $follow_button; ?>__link" href="<?php echo $follow_button_url; ?>" <?php echo $follow_button_target_set; ?>>
                    <img class="follow_button__img follow_button<?php echo $follow_button; ?>__img" src="<?php echo $follow_button_image; ?>" alt="<?php echo $follow_button_alt; ?>">
                </a>
            <?php else : ?>
                <img class="follow_button__img follow_button<?php echo $follow_button; ?>__img" src="<?php echo $follow_button_image; ?>" alt="<?php echo $follow_button_alt; ?>">
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
</div>
<!-- // all-container -->

<?php wp_footer();
$effect = "'" . esc_attr(get_theme_mod('atq_mainvisu_slider_option', 'fade')) . "'";
$show_arrows = get_theme_mod('atq_slider_arrow', '');
$atq_slider_pagination = get_theme_mod('atq_slider_pagination', '');
$atq_slider_progressbar = get_theme_mod('atq_slider_progressbar', '');
$atq_slider_speed = get_theme_mod('atq_fv_slider_speed', '3000');
$cms_design = esc_attr(get_theme_mod('atq_top_cms_design_setting', '01'));
?>

<script>
    const topPage_slider = new Swiper(".p-top.swiper", {
        loop: true,
        autoplay: {
            delay: <?php echo $atq_slider_speed; ?>,
        },
        speed: 3000,
        //spaceBetween: 10,
        effect: <?php echo $effect; ?>,
        fadeEffect: { //ここにオプションを指定します。
            crossFade: true
        },
        <?php if ($show_arrows) { ?>
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        <?php } ?>

        <?php if ($atq_slider_pagination) { ?>
            pagination: {
                el: ".swiper-pagination",
                <?php if ($atq_slider_progressbar) { ?>
                    type: "progressbar",
                <?php } ?>
                clickable: true,
            },
        <?php } ?>
    });

    <?php if ($cms_design == 01 || $cms_design == 02) : ?>
        document.querySelectorAll('#itemTab a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // すべてのタブから "active" クラスを削除する
                document.querySelectorAll('#itemTab a').forEach(tab => {
                    tab.classList.remove('--active');
                });

                // すべてのPanelから "active" クラスを削除する
                document.querySelectorAll('.tab__panel').forEach(tabPane => {
                    tabPane.classList.remove('--active');
                });

                // クリックされたタブに "active" クラスを追加する
                this.classList.add('--active');

                // 関連するタブコンテンツを表示する
                const activeTabId = this.getAttribute('href');
                const targetChar = "#";
                const tabId = activeTabId.replace(targetChar, "");
                const activeTabContent = document.getElementById(tabId);
                if (activeTabContent) {
                    activeTabContent.classList.add('--active');
                }
            });
        });
    <?php elseif ($cms_design == 03) : ?>
        const top03Swiper = new Swiper('.top-cms03__content .swiper', {
            slidesPerView: 1.2,
            spaceBetween: 20,
            //centeredSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
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
                el: ".swiper-pagination",
                type: "progressbar",
                clickable: true,
            },

            // //loop: true,
            // slidesPerView: 1.8,
            // spaceBetween: 10,
            // grabCursor: true,
            // slidesPerView: 1.5,
            // mousewheel: {
            //     invert: false,
            // },
            // //centeredSlides: true,
            // centeredSlidesBounds: true,
            // breakpoints: {
            //     1599: {
            //         slidesPerView: 5.5,
            //     },
            //     1199: {
            //         slidesPerView: 4.5,
            //     },
            //     849: {
            //         slidesPerView: 3,
            //     }
            // },
        });
    <?php endif; ?>
</script>
</body>

</html>