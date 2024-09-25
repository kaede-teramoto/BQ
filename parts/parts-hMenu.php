<?php
/*
 * This is the hamburger menu part for the header.
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$site_name = get_bloginfo();

$hm_bg_img = esc_url(get_theme_mod('hm_left_image', ''));

$hm_banner_img01 = esc_url(get_theme_mod('hm_banner01_image', ''));
$hm_banner_text01 = get_theme_mod('hm_banner01_text', false);
$hm_banner_link01 = esc_url(get_theme_mod('hm_banner01_link', ''));
$hm_banner_target01 = get_theme_mod('hm_banner01_link_target_setting', false);
if ($hm_banner_target01) {
    $banner01_target = ' target="_blank"';
} else {
    $banner01_target = '';
}


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

$hm_button_text = esc_attr(get_theme_mod('hm_button_text', false));
$hm_button_link = esc_url(get_theme_mod('hm_button_link', false));
$hm_button_target = get_theme_mod('hm_button_link_target_setting', false);
if ($hm_button_target) {
    $button_target = ' target="_blank"';
} else {
    $button_target = '';
}

$hm_design_type = esc_attr(get_theme_mod('hm_design_setting', '100'));

// Button design type
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
                            <div class="hm__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $hm_logo_img; ?>" alt="<?php echo $site_name; ?>"></a>
                            </div>
                        <?php else : ?>
                            <div class="hm__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>"></a>
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
                        <div class="hm__content__bottom hm<?php echo $hm_design_type; ?>__content__bottom">
                            <?php if ($hm_banner_img01 && $hm_banner_link01) : ?>
                                <div class="hm__banner hm<?php echo $hm_design_type; ?>__banner">
                                    <div class="hm__banner__left">
                                        <div class="hm__banner__item">
                                            <a class="hm__banner__link" href="<?php echo $hm_banner_link01; ?>" <?php echo $banner01_target; ?>>
                                                <div class="hm__banner__bg" style="background-image: url(<?php echo $hm_banner_img01; ?>);"></div>
                                                <span class="hm__banner__text"><?php echo $hm_banner_text01; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <?php if ($hm_banner_img02 && $hm_banner_link02) : ?>
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

                            <div class="hm_externalLink">
                                <?php
                                $sns = esc_url(get_theme_mod("sns_1", ''));
                                if ($sns) :
                                ?>
                                    <div class="hm__sns">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {

                                            $sns_img = esc_url(get_theme_mod("sns_$i", ''));
                                            $sns_img_link = esc_url(get_theme_mod("sns_link_$i", ''));

                                            if ($sns_img) {
                                                echo '<a class="hm__sns__link hm__sns__link0' . $i . '" href="' . $sns_img_link . '" target="_blank">';
                                                echo '<img src="' . $sns_img . '" alt="">';
                                                echo '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                <?php endif ?>

                                <?php if ($hm_button_text) : ?>
                                    <div class="hm__button">
                                        <div class="c-button c-button<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                            <a class="c-button__link c-button<?php echo $btn_link_design; ?>__link" href="<?php echo $hm_button_link; ?>" <?php echo $button_target; ?>>
                                                <div class="c-button__text c-button__text<?php echo $btn_link_design; ?>"><?php echo $hm_button_text; ?></div>
                                                <div class="c-button__icon c-button__icon<?php echo $btn_icon_design; ?>"></div>
                                            </a>
                                        </div>
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
                    <img class="hm__img hm<?php echo $hm_design_type; ?>__img" src="<?php echo $hm_bg_img; ?>" alt="">
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
                        <?php if ($hm_banner_img01) : ?>
                            <div class="hm__banner hm<?php echo $hm_design_type; ?>__banner">
                                <div class="hm__banner__left">
                                    <div class="hm__banner__item">
                                        <a class="hm__banner__link" href="<?php echo $hm_banner_link01; ?>" <?php echo $banner01_target; ?>>
                                            <div class="hm__banner__bg" style="background-image: url(<?php echo $hm_banner_img01; ?>);"></div>
                                            <span class="hm__banner__text"><?php echo $hm_banner_text01; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <?php if ($hm_banner_img02) : ?>
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
                            <div class="hm__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $hm_logo_img; ?>" alt="<?php echo $site_name; ?>"></a>
                            </div>
                        <?php else : ?>
                            <div class="hm__logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>"></a>
                            </div>
                        <?php endif; ?>

                        <div class="hm_externalLink">
                            <?php
                            $sns = esc_url(get_theme_mod("sns_1", ''));
                            if ($sns) :
                            ?>
                                <div class="hm__sns">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {

                                        $sns_img = esc_url(get_theme_mod("sns_$i", ''));
                                        $sns_img_link = esc_url(get_theme_mod("sns_link_$i", ''));

                                        if ($sns_img) {
                                            echo '<a class="hm__sns__link hm__sns__link0' . $i . '" href="' . $sns_img_link . '" target="_blank">';
                                            echo '<img src="' . $sns_img . '" alt="">';
                                            echo '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif ?>

                            <?php if ($hm_button_text) : ?>
                                <div class="hm__button">
                                    <div class="c-button c-button<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                                        <a class="c-button__link c-button<?php echo $btn_link_design; ?>__link" href='<?php echo $hm_button_link; ?>' <?php echo $button_target; ?>>
                                            <div class="c-button__text c-button__text<?php echo $btn_link_design; ?>"><?php echo $hm_button_text; ?></div>
                                            <div class="c-button__icon c-button__icon<?php echo $btn_icon_design; ?>"></div>
                                        </a>
                                    </div>
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