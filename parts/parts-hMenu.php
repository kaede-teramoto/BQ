<?php
/*
 * This is the hamburger menu part for the header.
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$site_name = get_bloginfo();

$hm_design_type = get_theme_mod('hm_design_setting', '100');
$hm_bg_img = esc_url(get_theme_mod('hm_left_image', ''));

$hm_banner01_display = get_theme_mod('hm_banner01_display_setting', false);
$hm_banner_img01 = esc_url(get_theme_mod('hm_banner01_image', ''));
$hm_banner_text01 = get_theme_mod('hm_banner01_text', false);
$hm_banner_link01 = esc_url(get_theme_mod('hm_banner01_link', ''));
$hm_banner_target01 = get_theme_mod('hm_banner01_link_target_setting', false);
if ($hm_banner_target01) {
    $banner01_target = ' target="_blank"';
} else {
    $banner01_target = '';
}
$hm_banner02_display = get_theme_mod('hm_banner02_display_setting', false);
$hm_banner_img02 = esc_url(get_theme_mod('hm_banner02_image', ''));
$hm_banner_text02 = esc_attr(get_theme_mod('hm_banner02_text', false));
$hm_banner_link02 = esc_url(get_theme_mod('hm_banner02_link', ''));
$hm_banner_target02 = get_theme_mod('hm_banner02_link_target_setting', false);
if ($hm_banner_target02) {
    $banner02_target = ' target="_blank"';
} else {
    $banner02_target = '';
}

$hm_logo_img = esc_url(get_theme_mod('hm_logo_image', ''));
$header_logo_img = esc_url(get_theme_mod('header_logo_image', ''));

// btn 01
$hm_btn_display = get_theme_mod('hm_btn_display_setting', false);
$hm_btn_text = esc_attr(get_theme_mod('hm_btn_text', false));
$hm_btn_link = esc_url(get_theme_mod('hm_btn_link', false));
$hm_btn_target = get_theme_mod('hm_btn_link_target_setting', false);
if ($hm_btn_target) {
    $btn_target = ' target="_blank"';
} else {
    $btn_target = '';
}

// btn 02
$hm_btn_sub_display = get_theme_mod('hm_btn_sub_display_setting', false);
$hm_btn_sub_text = esc_attr(get_theme_mod('hm_btn_sub_text', false));
$hm_btn_sub_link = esc_url(get_theme_mod('hm_btn_sub_link', false));
$hm_btn_sub_target = get_theme_mod('hm_btn_sub_link_target_setting', false);
if ($hm_btn_sub_target) {
    $btn_sub_target = ' target="_blank"';
} else {
    $btn_sub_target = '';
}


// 削除予定
// btn design type
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');

if (!($hm_design_type == 100)) :
?>
    <?php if ($hm_design_type == 00) : // オリジナルのハンバーガーを設置
        get_template_part('parts/parts', 'originalHMenu');
    ?>

    <?php elseif (($hm_design_type == 03) || ($hm_design_type == 04)) : // type03,type04の時の表示 
    ?>
        <div id="hm" class="hm hm<?php echo $hm_design_type; ?> js-hm-target">
            <div class="hm__inner hm<?php echo $hm_design_type; ?>__inner">
                <?php if ($hm_bg_img) : ?>
                    <div class="hm__img__wrapper hm<?php echo $hm_design_type; ?>__img__wrapper">
                        <img class="hm__img hm<?php echo $hm_design_type; ?>__img" src="<?php echo $hm_bg_img; ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="hm__content hm<?php echo $hm_design_type; ?>__content">
                    <div class="hm__content__inner  hm<?php echo $hm_design_type; ?>__content__inner">

                        <?php if ($hm_logo_img) : ?>
                            <div class="hm__logo hm<?php echo $hm_design_type; ?>__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $hm_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php elseif ($header_logo_img) : ?>
                            <div class="hm__logo hm<?php echo $hm_design_type; ?>__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php else : ?>
                            <div class="hm__logo hm<?php echo $hm_design_type; ?>__logo">
                                <a href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>
                            </div>
                        <?php endif; ?>

                        <div class="hm__content__top hm<?php echo $hm_design_type; ?>__top">
                            <?php if ((has_nav_menu('hamburgerNavLeft')) || (has_nav_menu('hamburgerNavRight'))) : ?>
                                <div class="hm__nav hm<?php echo $hm_design_type; ?>__nav">
                                    <nav class="hm__nav__wrapper hm<?php echo $hm_design_type; ?>__nav__wrapper">

                                        <?php
                                        if (has_nav_menu('hamburgerNavLeft')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'hamburgerNavLeft',
                                                'container' => '',
                                                'menu_class' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'items_wrap' => '<ul class="hm__nav__list hm__nav__list__left hm' . $hm_design_type . '__nav__list hm' . $hm_design_type . '__nav__list__left">%3$s</ul>',
                                                'li_class' => 'hm' . $hm_design_type . '__nav__wrap-list__item',
                                                'a_class' => 'hm-nav__link',
                                            ));
                                        }

                                        if (has_nav_menu('hamburgerNavRight')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'hamburgerNavRight',
                                                'container' => '',
                                                'menu_class' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'items_wrap' => '<ul class="hm__nav__list hm__nav__list__right hm' . $hm_design_type . '__nav__list hm' . $hm_design_type . '__nav__list__right">%3$s</ul>',
                                                'li_class' => 'hm' . $hm_design_type . '__nav__wrap-list__item',
                                                'a_class' => 'hm-nav__link',
                                            ));
                                        } ?>


                                    </nav>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="hm__content__bottom hm<?php echo $hm_design_type; ?>__content__bottom">
                            <?php if ($hm_banner01_display || $hm_banner02_display) : ?>
                                <div class="hm__banner hm<?php echo $hm_design_type; ?>__banner">
                                    <?php if ($hm_banner01_display) : ?>
                                        <div class="hm__banner__left">
                                            <div class="hm__banner__item">
                                                <a class="hm__banner__link" href="<?php echo $hm_banner_link01; ?>" <?php echo $banner01_target; ?>>
                                                    <div class="hm__banner__bg" style="background-image: url(<?php echo $hm_banner_img01; ?>);"></div>
                                                    <span class="hm__banner__text"><?php echo $hm_banner_text01; ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($hm_banner02_display) : ?>
                                        <div class="hm__banner__right">
                                            <div class="hm__banner__item">
                                                <a class="hm__banner__link" href="<?php echo $hm_banner_link02; ?>" <?php echo $banner02_target; ?>>
                                                    <div class="hm__banner__bg" style="background-image: url(<?php echo $hm_banner_img02; ?>);"></div>
                                                    <span class="hm__banner__text"><?php echo $hm_banner_text02; ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="hm__externalLink hm<?php echo $hm_design_type; ?>__externalLink">
                                <?php
                                $sns = esc_url(get_theme_mod("sns_1", ''));
                                if ($sns) :
                                ?>
                                    <div class="hm__sns hm<?php echo $hm_design_type; ?>__sns">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {

                                            $sns_img = esc_url(get_theme_mod("sns_$i", ''));
                                            $sns_img_link = esc_url(get_theme_mod("sns_link_$i", ''));

                                            if ($sns_img) {
                                                echo '<a class="hm__sns__link hm__sns__link0' . $i . '" href="' . $sns_img_link . '" target="_blank">';
                                                echo '<img src="' . $sns_img . '" alt="" loading="lazy">';
                                                echo '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                <?php endif ?>

                                <?php if ($hm_btn_display) : ?>
                                    <div class="hm__btn  hm__btn--first hm<?php echo $hm_design_type; ?>__btn--first">
                                        <a class="hm__btn__link" href="<?php echo $hm_btn_link; ?>" <?php echo $btn_target; ?>>
                                            <?php echo $hm_btn_text; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($hm_btn_sub_display) : ?>
                                    <div class="hm__btn  hm__btn--second hm<?php echo $hm_design_type; ?>__btn--second">
                                        <a class="hm__btn__link" href="<?php echo $hm_btn_sub_link; ?>" <?php echo $btn_sub_target; ?>>
                                            <?php echo $hm_btn_sub_text; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php
                            if (has_nav_menu('hamburgerNavInfo')) : ?>
                                <div class="hm__info hm<?php echo $hm_design_type; ?>__info">
                                    <nav class="hm__info__wrapper hm<?php echo $hm_design_type; ?>__info__wrapper">

                                        <?php

                                        wp_nav_menu(array(
                                            'theme_location' => 'hamburgerNavInfo',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="hm__info__list hm' . $hm_design_type . '__info__list">%3$s</ul>',
                                            'li_class' => 'hm' . $hm_design_type . '__info__wrap-list__item',
                                            'a_class' => 'hm-info__link',
                                        ));
                                        ?>
                                    </nav>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; // $hm_design_typeが100以外の場合の設定ここまで
    ?>

    <div id="hm" class="hm hm<?php echo $hm_design_type; ?> js-hm-target">
        <div class="hm__inner hm<?php echo $hm_design_type; ?>__inner">
            <?php if ($hm_bg_img) : ?>
                <div class="hm__img__wrapper hm<?php echo $hm_design_type; ?>__img__wrapper">
                    <img class="hm__img hm<?php echo $hm_design_type; ?>__img" src="<?php echo $hm_bg_img; ?>" alt="" loading="lazy">
                </div>
            <?php endif; ?>
            <div class="hm__content hm<?php echo $hm_design_type; ?>__content">
                <div class="hm__content__inner  hm<?php echo $hm_design_type; ?>__content__inner">

                    <div class="hm__content__top hm<?php echo $hm_design_type; ?>__top">
                        <?php if ((has_nav_menu('hamburgerNavLeft')) || (has_nav_menu('hamburgerNavRight'))) : ?>
                            <div class="hm__nav hm<?php echo $hm_design_type; ?>__nav">
                                <nav class="hm__nav__wrapper hm<?php echo $hm_design_type; ?>__nav__wrapper">

                                    <?php
                                    if (has_nav_menu('hamburgerNavLeft')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'hamburgerNavLeft',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="hm' . $hm_design_type . '__nav__list hm' . $hm_design_type . '__nav__list__left">%3$s</ul>',
                                            'li_class' => 'hm' . $hm_design_type . '__nav__wrap-list__item',
                                            'a_class' => 'hm-nav__link',
                                        ));
                                    }

                                    if (has_nav_menu('hamburgerNavRight')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'hamburgerNavRight',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="hm' . $hm_design_type . '__nav__list hm' . $hm_design_type . '__nav__list__right">%3$s</ul>',
                                            'li_class' => 'hm' . $hm_design_type . '__nav__wrap-list__item',
                                            'a_class' => 'hm-nav__link',
                                        ));
                                    } ?>


                                </nav>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="hm__content__bottom hm<?php echo $hm_design_type; ?>__bottom">
                        <?php if ($hm_banner01_display || $hm_banner02_display) : ?>
                            <div class="hm__banner hm<?php echo $hm_design_type; ?>__banner">
                                <?php if ($hm_banner01_display) : ?>
                                    <div class="hm__banner__left">
                                        <div class="hm__banner__item">
                                            <a class="hm__banner__link" href="<?php echo $hm_banner_link01; ?>" <?php echo $banner01_target; ?>>
                                                <div class="hm__banner__bg" style="background-image: url(<?php echo $hm_banner_img01; ?>);"></div>
                                                <span class="hm__banner__text"><?php echo $hm_banner_text01; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($hm_banner02_display) : ?>
                                    <div class="hm__banner__right">
                                        <div class="hm__banner__item">
                                            <a class="hm__banner__link" href="<?php echo $hm_banner_link02; ?>" <?php echo $banner02_target; ?>>
                                                <div class="hm__banner__bg" style="background-image: url(<?php echo $hm_banner_img02; ?>);"></div>
                                                <span class="hm__banner__text"><?php echo $hm_banner_text02; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($hm_logo_img) : ?>
                            <div class="hm__logo hm<?php echo $hm_design_type; ?>__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $hm_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php elseif ($header_logo_img) : ?>
                            <div class="hm__logo hm<?php echo $hm_design_type; ?>__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php else : ?>
                            <div class="hm__logo hm<?php echo $hm_design_type; ?>__logo">
                                <a href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>
                            </div>
                        <?php endif; ?>

                        <div class="hm__externalLink hm<?php echo $hm_design_type; ?>__externalLink">
                            <?php
                            $sns = esc_url(get_theme_mod("sns_1", ''));
                            if ($sns) :
                            ?>
                                <div class="hm__sns hm<?php echo $hm_design_type; ?>__sns">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {

                                        $sns_img = esc_url(get_theme_mod("sns_$i", ''));
                                        $sns_img_link = esc_url(get_theme_mod("sns_link_$i", ''));

                                        if ($sns_img) {
                                            echo '<a class="hm__sns__link hm__sns__link0' . $i . '" href="' . $sns_img_link . '" target="_blank">';
                                            echo '<img src="' . $sns_img . '" alt="" loading="lazy">';
                                            echo '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif ?>

                            <?php if ($hm_btn_display) : ?>
                                <div class="hm__btn  hm__btn--first hm<?php echo $hm_design_type; ?>__btn--first">
                                    <a class="hm__btn__link" href="<?php echo $hm_btn_link; ?>" <?php echo $btn_target; ?>>
                                        <?php echo $hm_btn_text; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($hm_btn_sub_display) : ?>
                                <div class="hm__btn  hm__btn--second hm<?php echo $hm_design_type; ?>__btn--second">
                                    <a class="hm__btn__link" href="<?php echo $hm_btn_sub_link; ?>" <?php echo $btn_sub_target; ?>>
                                        <?php echo $hm_btn_sub_text; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php
                        if (has_nav_menu('hamburgerNavInfo')) : ?>
                            <div class="hm__info hm<?php echo $hm_design_type; ?>__info">
                                <nav class="hm__info__wrapper hm<?php echo $hm_design_type; ?>__info__wrapper">

                                    <?php

                                    wp_nav_menu(array(
                                        'theme_location' => 'hamburgerNavInfo',
                                        'container' => '',
                                        'menu_class' => '',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'items_wrap' => '<ul class="hm__info__list hm' . $hm_design_type . '__info__list">%3$s</ul>',
                                        'li_class' => 'hm' . $hm_design_type . '__info__wrap-list__item',
                                        'a_class' => 'hm-info__link',
                                    ));
                                    ?>
                                </nav>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; // $hm_design_typeが100以外の場合の設定ここまで
?>