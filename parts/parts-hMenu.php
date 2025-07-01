<?php
/*
 * This is the hamburger menu part for the header.
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$site_name = get_bloginfo();

$hm_design_type = get_theme_mod('hm_design_setting', 'hmenu-dont-use');
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

if (!($hm_design_type == 'hmenu-dont-use')) :
?>
    <?php if ($hm_design_type == 'hmenu-original') : // オリジナルのハンバーガーを設置
        get_template_part('parts/parts', 'originalHMenu');
    ?>

    <?php elseif (($hm_design_type == 'hmenu-b-photo00') || ($hm_design_type == 'hmenu-b-shade00')) : // hmenu-b-photo00,hmenu-b-shade00の時の表示 
    ?>
        <div id="hm" class="hm <?php echo $hm_design_type; ?> js-hm-target">
            <div class="hm-inner">
                <?php if ($hm_bg_img) : ?>
                    <div class="hm-img-wrapper">
                        <img class="hm-img" src="<?php echo $hm_bg_img; ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="hm-content">
                    <div class="hm-content-inner">

                        <?php if ($hm_logo_img) : ?>
                            <div class="hm-logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $hm_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php elseif ($header_logo_img) : ?>
                            <div class="hm-logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php else : ?>
                            <div class="hm-logo">
                                <a href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>
                            </div>
                        <?php endif; ?>

                        <div class="hm-content-top">
                            <?php if ((has_nav_menu('hamburgerNavLeft')) || (has_nav_menu('hamburgerNavRight'))) : ?>
                                <div class="hm-nav">
                                    <nav class="hm-nav-wrapper">

                                        <?php
                                        if (has_nav_menu('hamburgerNavLeft')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'hamburgerNavLeft',
                                                'container' => '',
                                                'menu_class' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'items_wrap' => '<ul class="hm-nav-list hm-nav-list-left">%3$s</ul>',
                                                'li_class' => '',
                                                'a_class' => '',
                                            ));
                                        }

                                        if (has_nav_menu('hamburgerNavRight')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'hamburgerNavRight',
                                                'container' => '',
                                                'menu_class' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'items_wrap' => '<ul class="hm-nav-list hm-nav-list-right">%3$s</ul>',
                                                'li_class' => '',
                                                'a_class' => '',
                                            ));
                                        } ?>


                                    </nav>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="hm-content-bottom">
                            <?php if ($hm_banner01_display || $hm_banner02_display) : ?>
                                <div class="hm-banner">
                                    <?php if ($hm_banner01_display) : ?>
                                        <div class="hm-banner-left">
                                            <div class="hm-banner-item">
                                                <a class="hm-banner-link" href="<?php echo $hm_banner_link01; ?>" <?php echo $banner01_target; ?>>
                                                    <div class="hm-banner-bg" style="background-image: url(<?php echo $hm_banner_img01; ?>);"></div>
                                                    <span class="hm-banner-text"><?php echo $hm_banner_text01; ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($hm_banner02_display) : ?>
                                        <div class="hm-banner-right">
                                            <div class="hm-banner-item">
                                                <a class="hm-banner-link" href="<?php echo $hm_banner_link02; ?>" <?php echo $banner02_target; ?>>
                                                    <div class="hm-banner-bg" style="background-image: url(<?php echo $hm_banner_img02; ?>);"></div>
                                                    <span class="hm-banner-text"><?php echo $hm_banner_text02; ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="hm-external-link">
                                <?php
                                $sns_check_1 = get_theme_mod('sns_1') ?: null;
                                $sns_check_2 = get_theme_mod('sns_2') ?: null;
                                $sns_check_3 = get_theme_mod('sns_3') ?: null;
                                $sns_check_4 = get_theme_mod('sns_4') ?: null;
                                $sns_check_5 = get_theme_mod('sns_5') ?: null;

                                if (array_filter([$sns_check_1, $sns_check_2, $sns_check_3, $sns_check_4, $sns_check_5])) :
                                ?>
                                    <div class="hm-sns">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            $sns_check = get_theme_mod("sns_{$i}") ?: null;

                                            if ($sns_check) {
                                                $sns_img = esc_url(get_theme_mod("sns_image_{$i}", '')) ?: null;
                                                $sns_name = esc_attr(get_theme_mod("sns_name_{$i}", '')) ?: null;
                                                $sns_img_link = esc_url(get_theme_mod("sns_link_{$i}", '')) ?: null;

                                                if ($sns_img) {
                                                    echo '<a class="hm-sns-link hm-sns-link0' . $i . '" href="' . $sns_img_link . '" target="_blank">';
                                                    echo '<img src="' . $sns_img . '" alt="" loading="lazy">';
                                                    echo '</a>';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                <?php endif ?>

                                <?php if ($hm_btn_display) : ?>
                                    <div class="hm-btn  hm-btn--first">
                                        <a class="hm-btn-link" href="<?php echo $hm_btn_link; ?>" <?php echo $btn_target; ?>>
                                            <?php echo $hm_btn_text; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($hm_btn_sub_display) : ?>
                                    <div class="hm-btn  hm-btn--second">
                                        <a class="hm-btn-link" href="<?php echo $hm_btn_sub_link; ?>" <?php echo $btn_sub_target; ?>>
                                            <?php echo $hm_btn_sub_text; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php
                            if (has_nav_menu('hamburgerNavInfo')) : ?>
                                <div class="hm-info">
                                    <nav class="hm-info-wrapper">

                                        <?php

                                        wp_nav_menu(array(
                                            'theme_location' => 'hamburgerNavInfo',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="hm-info-list">%3$s</ul>',
                                            'li_class' => '',
                                            'a_class' => '',
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
    <?php endif; // $hm_design_typeがhmenu-dont-use以外の場合の設定ここまで
    ?>

    <div id="hm" class="hm <?php echo $hm_design_type; ?> js-hm-target">
        <div class="hm-inner">
            <?php if ($hm_bg_img) : ?>
                <div class="hm-img-wrapper">
                    <img class="hm-img" src="<?php echo $hm_bg_img; ?>" alt="" loading="lazy">
                </div>
            <?php endif; ?>
            <div class="hm-content">
                <div class="hm-content-inner">

                    <div class="hm-content-top">
                        <?php if ((has_nav_menu('hamburgerNavLeft')) || (has_nav_menu('hamburgerNavRight'))) : ?>
                            <div class="hm-nav">
                                <nav class="hm-nav-wrapper">

                                    <?php
                                    if (has_nav_menu('hamburgerNavLeft')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'hamburgerNavLeft',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="hm-nav-list hm-nav-list-left">%3$s</ul>',
                                            'li_class' => '',
                                            'a_class' => '',
                                        ));
                                    }

                                    if (has_nav_menu('hamburgerNavRight')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'hamburgerNavRight',
                                            'container' => '',
                                            'menu_class' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul class="hm-nav-list hm-nav-list-right">%3$s</ul>',
                                            'li_class' => '',
                                            'a_class' => '',
                                        ));
                                    } ?>


                                </nav>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="hm-content-bottom">
                        <?php if ($hm_banner01_display || $hm_banner02_display) : ?>
                            <div class="hm-banner">
                                <?php if ($hm_banner01_display) : ?>
                                    <div class="hm-banner-left">
                                        <div class="hm-banner-item">
                                            <a class="hm-banner-link" href="<?php echo $hm_banner_link01; ?>" <?php echo $banner01_target; ?>>
                                                <div class="hm-banner-bg" style="background-image: url(<?php echo $hm_banner_img01; ?>);"></div>
                                                <span class="hm-banner-text"><?php echo $hm_banner_text01; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($hm_banner02_display) : ?>
                                    <div class="hm-banner-right">
                                        <div class="hm-banner-item">
                                            <a class="hm-banner-link" href="<?php echo $hm_banner_link02; ?>" <?php echo $banner02_target; ?>>
                                                <div class="hm-banner-bg" style="background-image: url(<?php echo $hm_banner_img02; ?>);"></div>
                                                <span class="hm-banner-text"><?php echo $hm_banner_text02; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($hm_logo_img) : ?>
                            <div class="hm-logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $hm_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php elseif ($header_logo_img) : ?>
                            <div class="hm-logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $header_logo_img; ?>" alt="<?php echo $site_name; ?>" loading="lazy"></a>
                            </div>
                        <?php else : ?>
                            <div class="hm-logo">
                                <a href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>
                            </div>
                        <?php endif; ?>

                        <div class="hm-external-link">
                            <?php
                            $sns_check_1 = get_theme_mod('sns_1') ?: null;
                            $sns_check_2 = get_theme_mod('sns_2') ?: null;
                            $sns_check_3 = get_theme_mod('sns_3') ?: null;
                            $sns_check_4 = get_theme_mod('sns_4') ?: null;
                            $sns_check_5 = get_theme_mod('sns_5') ?: null;

                            if (array_filter([$sns_check_1, $sns_check_2, $sns_check_3, $sns_check_4, $sns_check_5])) :
                            ?>
                                <div class="hm-sns">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        $sns_check = get_theme_mod("sns_{$i}") ?: null;

                                        if ($sns_check) {
                                            $sns_img = esc_url(get_theme_mod("sns_image_{$i}", '')) ?: null;
                                            $sns_name = esc_attr(get_theme_mod("sns_name_{$i}", '')) ?: null;
                                            $sns_img_link = esc_url(get_theme_mod("sns_link_{$i}", '')) ?: null;

                                            if ($sns_img) {
                                                echo '<a class="hm-sns-link hm-sns-link0' . $i . '" href="' . $sns_img_link . '" target="_blank">';
                                                echo '<img src="' . $sns_img . '" alt="" loading="lazy">';
                                                echo '</a>';
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif ?>

                            <?php if ($hm_btn_display) : ?>
                                <div class="hm-btn  hm-btn--first">
                                    <a class="hm-btn-link" href="<?php echo $hm_btn_link; ?>" <?php echo $btn_target; ?>>
                                        <?php echo $hm_btn_text; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($hm_btn_sub_display) : ?>
                                <div class="hm-btn  hm-btn--second">
                                    <a class="hm-btn-link" href="<?php echo $hm_btn_sub_link; ?>" <?php echo $btn_sub_target; ?>>
                                        <?php echo $hm_btn_sub_text; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php
                        if (has_nav_menu('hamburgerNavInfo')) : ?>
                            <div class="hm-info">
                                <nav class="hm-info-wrapper">

                                    <?php

                                    wp_nav_menu(array(
                                        'theme_location' => 'hamburgerNavInfo',
                                        'container' => '',
                                        'menu_class' => '',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'items_wrap' => '<ul class="hm-info-list">%3$s</ul>',
                                        'li_class' => '',
                                        'a_class' => '',
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