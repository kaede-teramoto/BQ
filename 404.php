<?php
/*
 * this is default page.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();

$error_design = esc_html(get_theme_mod('error_design_setting', '01'));
$error_title = esc_html(get_theme_mod('error_main_title_setting', '404'));
$error_subtitle = esc_html(get_theme_mod('error_sub_title_setting', 'NOT FOUND'));
$error_text = nl2br(esc_textarea(get_theme_mod('error_text_setting', false)));
$error_btn = esc_html(get_theme_mod('error_btn_setting', 'HOME'));
$error_url = esc_url(get_theme_mod('error_btn_link_setting', $site_url));
// btn design type
$btn_link_design = get_theme_mod('common_btn_design_setting', '01');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', '01');


get_header();
if ($error_design == 5) : ?>
    <section class="section section__error section__error<?php echo $error_design; ?>">
        <div class="title__wrap">
            <h1 class="section__error__title section__error<?php echo $error_design; ?>__title"><?php echo $error_title; ?></h1>
            <p class="section__error__subtitle section__error<?php echo $error_design; ?>__subtitle"><?php echo $error_subtitle; ?></p>
        </div>
        <p class="section__error__text section__error<?php echo $error_design; ?>__text"><?php echo $error_text; ?></p>

        <div class="section__error__btn section__error<?php echo $error_design; ?>__btn">
            <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php echo $error_url; ?>'>
                    <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php echo $error_btn; ?><span></span></div>
                    <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                </a>
            </div>
        </div>
    </section>

<?php else : ?>
    <section class="section section__error section__error<?php echo $error_design; ?>">
        <h1 class="section__error__title section__error<?php echo $error_design; ?>__title"><?php echo $error_title; ?></h1>
        <p class="section__error__subtitle section__error<?php echo $error_design; ?>__subtitle"><?php echo $error_subtitle; ?></p>
        <p class="section__error__text section__error<?php echo $error_design; ?>__text"><?php echo $error_text; ?></p>

        <div class="section__error__btn section__error<?php echo $error_design; ?>__btn">
            <div class="c-btn c-btn<?php echo $btn_link_design; ?> btn<?php echo $btn_link_design; ?>">
                <a class="c-btn__link c-btn<?php echo $btn_link_design; ?>__link" href='<?php echo $error_url; ?>'>
                    <div class="c-btn__text c-btn__text<?php echo $btn_link_design; ?>"><?php echo $error_btn; ?><span></span></div>
                    <div class="c-btn__icon c-btn__icon<?php echo $btn_icon_design; ?>"></div>
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>