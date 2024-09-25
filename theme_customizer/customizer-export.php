<?php
/*
 * This is a configuration file for customizing data export.
 *
 * @package BOUTiQ
 */

/*----------------------------------------------------------------------------------------------------------------------------
  Set css for customizer
---------------------------------------------------------------------------------------------------------------------------- */
function atq_customize_css()
{
    // 基本カラー
    $text_color = get_theme_mod('site_default_text_color', '#333333');
    $main_color = get_theme_mod('site_default_main_color', '#2641CF');
    $accent_color = get_theme_mod('site_default_accent_color', '#666666');
    $base_color = get_theme_mod('site_default_base_color', '#dddddd');
    $sub_color = get_theme_mod('site_default_sub_color', '#e8e8e8');
    $bg_color = get_theme_mod('site_default_background_color', '#ffffff');

    //page
    $content_title_underline = get_theme_mod('content_title_underline', false);
    if ($content_title_underline) {
        $content_title_underline_color = get_theme_mod('content_title_underline_color', '#999999');
    } else {
        $content_title_underline_color = 'transparent';
    }


    // FONT関連
    $font_size_PC = get_theme_mod('font_size_pc_setting', '16') * 0.1;
    $font_size_TAB = get_theme_mod('font_size_tab_setting', '14') * 0.1;
    $font_size_SP = get_theme_mod('font_size_sp_setting', '12') * 0.1;
    $heading_size_PC = get_theme_mod('heading_size_pc_setting', '42') * 0.1;
    $heading_size_TAB = get_theme_mod('heading_size_tab_setting', '34') * 0.1;
    $heading_size_SP = get_theme_mod('heading_size_sp_setting', '28') * 0.1;

    // Header
    $header_text_color = get_theme_mod('atq_header_text_color_setting', '');
    $header_bg_color = get_theme_mod('atq_header_bg_color_setting', '#ffffff');
    $btn_filter = get_theme_mod('common_btn_link_filter_setting', '');
    $card_radius_pc = get_theme_mod('atq_card_radius_pc_setting', '');
    $card_radius_tab = get_theme_mod('atq_card_radius_tab_setting', '');
    $card_radius_sp = get_theme_mod('atq_card_radius_sp_setting', '');

    //Page設定
    $radius_pc = get_theme_mod('boutiq_page_radius_pc_setting', '12px');
    $radius_tab = get_theme_mod('boutiq_page_radius_tab_setting', '10px');
    $radius_sp = get_theme_mod('boutiq_page_radius_sp_setting', '8px');

    // Hamburger Menu

    $hm_bg_color_setting = get_theme_mod('atq_hm_bg_color_setting', false);
    if ($hm_bg_color_setting) {
        $hm_bg_color_setting = $hm_bg_color_setting;
    } else {
        $hm_bg_color_setting = 'transparent';
    }


    // Footer
    $footer_text_color = get_theme_mod('footer_text_color_set', false);
    $footer_bg_color_option = get_theme_mod('footer_bg_color_option', false);
    if ($footer_bg_color_option) {
        $footer_bg_color = get_theme_mod('footer_bg_color_set', false);
    } else {
        $footer_bg_color = 'transparent';
    }

    // Font
    $jp_font = get_theme_mod('site_default_jp_fontFamily', false);
    $en_font = get_theme_mod('site_default_en_fontFamily', false);
    if ($en_font) {
        $en_font = get_theme_mod('site_default_en_fontFamily', false);
    } else {
        $en_font = get_theme_mod('site_default_jp_fontFamily', false);
    }
    $heading_font = get_theme_mod('site_default_heading_text_fontFamily', false);
    if ($heading_font) {
        $heading_font = get_theme_mod('site_default_heading_text_fontFamily', false);
    } else {
        $heading_font = get_theme_mod('site_default_jp_fontFamily', false);
    }

    $follow_button = get_theme_mod('follow_button_setting', '00');
    if (!($follow_button == 00)) {
        $follow_button_top_and_bottom = get_theme_mod('follow_button_top_and_bottom', '0');
        $follow_button_left_and_right = get_theme_mod('follow_button_left_and_right', '0');
    } else {
        $follow_button_top_and_bottom = '0';
        $follow_button_left_and_right = '0';
    }

?>
    <style type="text/css">
        :root {
            --text_color: <?php echo $text_color; ?>;
            --main_color: <?php echo $main_color; ?>;
            --accent_color: <?php echo $accent_color; ?>;
            --base_color: <?php echo $base_color; ?>;
            --sub_color: <?php echo $sub_color; ?>;
            --bg_color: <?php echo $bg_color; ?>;

            --content_title_color: <?php echo $content_title_underline_color; ?>;

            --font_size_PC: <?php echo $font_size_PC; ?>rem;
            --font_size_TAB: <?php echo $font_size_TAB; ?>rem;
            --font_size_SP: <?php echo $font_size_SP; ?>rem;
            --heading_fontSize_PC: <?php echo $heading_size_PC; ?>rem;
            --heading_fontSize_TAB: <?php echo $heading_size_TAB; ?>rem;
            --heading_fontSize_SP: <?php echo $heading_size_SP; ?>rem;

            --btn_filter: <?php echo $btn_filter; ?>;
            --header_text_color: <?php echo $header_text_color; ?>;
            --header_bg_color: <?php echo $header_bg_color; ?>;
            --card_radius_pc: <?php echo $card_radius_pc; ?>px;
            --card_radius_tab: <?php echo $card_radius_tab; ?>px;
            --card_radius_sp: <?php echo $card_radius_sp; ?>px;

            --radius_pc: <?php echo $radius_pc; ?>;
            --radius_tab: <?php echo $radius_tab; ?>;
            --radius_sp: <?php echo $radius_sp; ?>;

            --hm_bg_color_setting: <?php echo $hm_bg_color_setting; ?>;

            --footer_text_color: <?php echo $footer_text_color; ?>;
            --footer_bg_color: <?php echo $footer_bg_color; ?>;

            --swiper-pagination-color: <?php echo $main_color; ?>;
            --swiper-theme-color: <?php echo $main_color; ?>;
            --swiper-navigation-size: <?php echo $font_size_PC; ?>px;

            --jp_font: <?php echo $jp_font; ?>;
            --en_font: <?php echo $en_font; ?>;
            --heading_font: <?php echo $heading_font; ?>;

            --follow_button_tb: <?php echo $follow_button_top_and_bottom; ?>;
            --follow_button_lr: <?php echo $follow_button_left_and_right; ?>;
        }
    </style>

<?php
}
add_action('wp_head', 'atq_customize_css');

/*
 * this is style & script.
 *
 * @package atq
 */
/*--------------------------------------------------------------
  css
--------------------------------------------------------------*/
function atq_scripts()
{
    $site_default_jp_text = get_theme_mod('site_default_jp_text', false);
    $site_default_en_text = get_theme_mod('site_default_en_text', false);
    $site_default_heading_text = get_theme_mod('site_default_heading_text', false);
    if (!is_admin()) {
        //css
        wp_enqueue_style('original-style', get_stylesheet_uri(), NULL, 'all');

        //　日・英・見
        if ($site_default_jp_text && $site_default_en_text && $site_default_heading_text) {
            wp_enqueue_style('JapaneseFonts', $site_default_jp_text, array('original-style'), NULL);
            wp_enqueue_style('EnglishFonts', $site_default_en_text, array('JapaneseFonts'), NULL);
            wp_enqueue_style('OriginalFonts', $site_default_heading_text, array('EnglishFonts'), NULL);
        } //　日・英
        elseif ($site_default_jp_text && $site_default_en_text && !($site_default_heading_text)) {
            wp_enqueue_style('JapaneseFonts', $site_default_jp_text, array('original-style'), NULL);
            wp_enqueue_style('OriginalFonts', $site_default_en_text, array('JapaneseFonts'), NULL);
        } //　日・見
        elseif ($site_default_jp_text && !($site_default_en_text) && $site_default_heading_text) {
            wp_enqueue_style('JapaneseFonts', $site_default_jp_text, array('original-style'), NULL);
            wp_enqueue_style('OriginalFonts', $site_default_heading_text, array('JapaneseFonts'), NULL);
        } //　英・見
        elseif (!($site_default_jp_text) && $site_default_en_text && $site_default_heading_text) {
            wp_enqueue_style('GoogleFonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap', array('original-style'), NULL);
            wp_enqueue_style('EnglishFonts', $site_default_en_text, array('GoogleFonts'), NULL);
            wp_enqueue_style('OriginalFonts', $site_default_heading_text, array('EnglishFonts'), NULL);
        } //　日　
        elseif ($site_default_jp_text && !($site_default_en_text) && !($site_default_heading_text)) {
            wp_enqueue_style('OriginalFonts', $site_default_jp_text, array('original-style'), NULL);
        } // 英
        elseif (!($site_default_jp_text) && $site_default_en_text && !($site_default_heading_text)) {
            wp_enqueue_style('GoogleFonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap', array('original-style'), NULL);
            wp_enqueue_style('OriginalFonts', $site_default_en_text, array('GoogleFonts'), NULL);
        } //　見
        elseif (!($site_default_jp_text) && !($site_default_en_text) && $site_default_heading_text) {
            wp_enqueue_style('GoogleFonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap', array('original-style'), NULL);
            wp_enqueue_style('OriginalFonts', $site_default_heading_text, array('GoogleFonts'), NULL);
        } else {
            wp_enqueue_style('OriginalFonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap', array('original-style'), NULL);
        }

        wp_enqueue_style('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array('OriginalFonts'), NULL);
        wp_enqueue_style('Font-Awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array('swiper-bundle'), NULL);
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme.css', array('Font-Awesome'), NULL, 'all');

        //js
        wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array('jquery'), '', true);
        wp_enqueue_script('ScrollTrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '', true);
        wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('ScrollTrigger'), '', true);
        wp_enqueue_script('swiper-gl', get_template_directory_uri() . '/assets/js/swiper-gl.min.js', array('swiper'), '', true);
        wp_enqueue_script('theme', get_template_directory_uri() . '/assets/js/theme.js', array('swiper-gl'), '', true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'atq_scripts');
