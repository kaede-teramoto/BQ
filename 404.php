<?php
/*
 * this is default page.
 *
 *
 * @package BOUTiQ
 */

$site_url  = home_url();
$theme_url = get_template_directory_uri();

$error_design = esc_html(get_theme_mod('error_design_setting', 'error-an00'));
$error_title = esc_html(get_theme_mod('error_main_title_setting', '404'));
$error_subtitle = esc_html(get_theme_mod('error_sub_title_setting', 'NOT FOUND'));
$error_text = nl2br(esc_textarea(get_theme_mod('error_text_setting', false)));
$error_btn = esc_html(get_theme_mod('error_btn_setting', 'HOME'));
$error_url = esc_url(get_theme_mod('error_btn_link_setting', $site_url));
// btn design type
$btn_link_design = get_theme_mod('common_btn_design_setting', 'button-ac00');
$btn_icon_design = get_theme_mod('common_btn_icon_setting', 'icon-ac00');


get_header();
if ($error_design == 'error-bs00') : ?>
    <section class="section section-error <?php echo $error_design; ?>">
        <div class="title-wrap">
            <h1 class="section-error-title"><?php echo $error_title; ?></h1>
            <p class="section-error-subtitle"><?php echo $error_subtitle; ?></p>
        </div>
        <p class="section-error-text"><?php echo $error_text; ?></p>

        <div class="section-error-btn">
            <div class="c-btn <?php echo $btn_link_design; ?>">
                <a class="c-btn-link" href='<?php echo $error_url; ?>'>
                    <div class="c-btn-text"><?php echo $error_btn; ?><span></span></div>
                    <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                </a>
            </div>
        </div>
    </section>

<?php else : ?>
    <section class="section section-error <?php echo $error_design; ?>">
        <h1 class="section-error-title"><?php echo $error_title; ?></h1>
        <p class="section-error-subtitle"><?php echo $error_subtitle; ?></p>
        <p class="section-error-text"><?php echo $error_text; ?></p>

        <div class="section-error-btn">
            <div class="c-btn <?php echo $btn_link_design; ?>">
                <a class="c-btn-link" href='<?php echo $error_url; ?>'>
                    <div class="c-btn-text"><?php echo $error_btn; ?><span></span></div>
                    <div class="c-btn-icon <?php echo $btn_icon_design; ?>"></div>
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>