<?php
/*
 * This is a configuration file for customizing data export.
 *
 * @package BOUTiQ
 */

/*----------------------------------------------------------------------------------------------------------------------------
  Set css for customizer
---------------------------------------------------------------------------------------------------------------------------- */
function boutiq_customize_css()
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
    $header_text_color = get_theme_mod('header_text_color_setting', '');
    $header_bg_color = get_theme_mod('header_bg_color_setting', '');
    $card_radius_pc = get_theme_mod('header_card_radius_pc', '');
    $card_radius_tab = get_theme_mod('header_card_radius_tab', '');
    $card_radius_sp = get_theme_mod('header_card_radius_sp', '');

    $header_btn_bg_color = get_theme_mod('header_btn_bg_color_setting', '');
    $header_btn_text_color = get_theme_mod('header_btn_text_color_setting', '');
    $header_btn_sub_bg_color = get_theme_mod('header_btn_sub_bg_color_setting', '');
    $header_btn_sub_text_color = get_theme_mod('header_btn_sub_text_color_setting', '');

    //Page設定
    $radius_pc = get_theme_mod('boutiq_page_radius_pc_setting', '12px');
    $radius_tab = get_theme_mod('boutiq_page_radius_tab_setting', '10px');
    $radius_sp = get_theme_mod('boutiq_page_radius_sp_setting', '8px');

    // Hamburger Menu
    $hm_bg_color = get_theme_mod('hm_bg_color_setting',  '#ffffff');
    if ($hm_bg_color) {
        $hm_bg_color = $hm_bg_color;
    } else {
        $hm_bg_color = 'transparent';
    }
    $hm_btn_bg_color = get_theme_mod('hm_btn_bg_color_setting', '#ffffff');
    $hm_btn_text_color = get_theme_mod('hm_btn_text_color_setting', '#393939');
    $hm_btn_border = get_theme_mod('hm_btn_border_setting', false);
    $hm_btn_radius = get_theme_mod('hm_btn_radius_setting', '0');

    $hm_btn_sub_bg_color = get_theme_mod('hm_btn_sub_bg_color_setting', '#ffffff');
    $hm_btn_sub_text_color = get_theme_mod('hm_btn_sub_text_color_setting', '#393939');
    $hm_btn_sub_border = get_theme_mod('hm_btn_sub_border_setting', false);
    $hm_btn_sub_radius = get_theme_mod('hm_btn_sub_radius_setting', '0');

    // Footer
    $footer_text_color = get_theme_mod('footer_text_color_set', false);
    $footer_bg_color_option = get_theme_mod('footer_bg_color_option', false);
    if ($footer_bg_color_option) {
        $footer_bg_color = get_theme_mod('footer_bg_color_set', false);
    } else {
        $footer_bg_color = 'transparent';
    }

    $footer_first_btn_bg_color = get_theme_mod('footer_first_btn_bg_color_setting', '');
    $footer_first_btn_text_color = get_theme_mod('footer_first_btn_text_color_setting', '');
    $footer_second_btn_bg_color = get_theme_mod('footer_second_btn_bg_color_setting', '');
    $footer_second_btn_sub_text_color = get_theme_mod('footer_second_btn_text_color_setting', '');


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

    $follow_btn_top_and_bottom = get_theme_mod('follow_btn_top_and_bottom', '50px');
    $follow_btn_left_and_right = get_theme_mod('follow_btn_left_and_right', '50px');
    // top FV
    $fv_height_pc = esc_attr(get_theme_mod('top_fv_height_size_pc', ''));
    $fv_height_tab = esc_attr(get_theme_mod('top_fv_height_size_tab', ''));
    $fv_height_sp = esc_attr(get_theme_mod('top_fv_height_size_sp', ''));

    // btn for SP
    $sp_btn_first_text_color = get_theme_mod('sp_btn_first_text_color_setting', '#393939');
    $sp_btn_first_bg_color = get_theme_mod('sp_btn_first_bg_color_setting', '');
    $sp_btn_first_border_color = get_theme_mod('sp_btn_first_border_color_setting', '');
    $sp_btn_first_border_width = get_theme_mod('sp_btn_first_border_width_setting', '0');
    $sp_btn_first_height = get_theme_mod('sp_btn_first_height_setting', '50px');
    $sp_btn_first_image = esc_url(get_theme_mod('sp_btn_first_image_setting', ''));
    $sp_btn_first_image_fit = get_theme_mod('sp_btn_first_image_fit', false);
    $sp_btn_second_text_color = get_theme_mod('sp_btn_second_text_color_setting', '#393939');
    $sp_btn_second_bg_color = get_theme_mod('sp_btn_second_bg_color_setting', '');
    $sp_btn_second_border_color = get_theme_mod('sp_btn_second_border_color_setting', '');
    $sp_btn_second_border_width = get_theme_mod('sp_btn_second_border_width_setting', '0');
    $sp_btn_second_height = get_theme_mod('sp_btn_second_height_setting', '50px');
    $sp_btn_second_image = esc_url(get_theme_mod('sp_btn_second_image_setting', ''));
    $sp_btn_second_image_fit = get_theme_mod('sp_btn_second_image_fit', false);

    echo '<style type="text/css">' . "\n";
    echo ':root {' . "\n";
    echo '--text_color: ' . $text_color . ';' . "\n";
    echo '--main_color: ' . $main_color . ';' . "\n";
    echo '--accent_color: ' . $accent_color . ';' . "\n";
    echo '--base_color: ' . $base_color . ';' . "\n";
    echo '--sub_color: ' . $sub_color . ';' . "\n";
    echo '--bg_color: ' . $bg_color . ';' . "\n";

    echo '--swiper-pagination-color: ' . $main_color . ';' . "\n";
    echo '--swiper-theme-color: ' . $main_color . ';' . "\n";
    echo '--swiper-navigation-size: ' . $font_size_PC . 'px;' . "\n";

    echo '--content_title_color: ' . $content_title_underline_color . ';' . "\n";

    echo '--font_size_PC: ' . $font_size_PC . 'rem;' . "\n";
    echo '--font_size_TAB: ' . $font_size_TAB . 'rem;' . "\n";
    echo '--font_size_SP: ' . $font_size_SP . 'rem;' . "\n";
    echo '--heading_fontSize_PC: ' . $heading_size_PC . 'rem;' . "\n";
    echo '--heading_fontSize_TAB: ' . $heading_size_TAB . 'rem;' . "\n";
    echo '--heading_fontSize_SP: ' . $heading_size_SP . 'rem;' . "\n";
    if ($header_text_color) {
        echo '--header_text_color:' . $header_text_color . ';';
        echo "\n";
    } else {
        echo '--header_text_color:' . $text_color . ';';
        echo "\n";
    }
    if ($header_bg_color) {
        echo '--header_bg_color: ' . $header_bg_color . ';';
        echo "\n";
    }
    if ($card_radius_pc) {
        echo '--card_radius_pc: ' . $card_radius_pc . ';' . "\n";
    }
    if ($card_radius_tab) {
        echo '--card_radius_tab: ' . $card_radius_tab . ';' . "\n";
    }
    if ($card_radius_sp) {
        echo '--card_radius_sp: ' . $card_radius_sp . ';' . "\n";
    }
    if ($radius_pc) {
        echo '--radius_pc: ' . $radius_pc . ';' . "\n";
    }
    if ($radius_tab) {
        echo '--radius_tab: ' . $radius_tab . ';' . "\n";
    }
    if ($radius_sp) {
        echo '--radius_sp: ' . $radius_sp . ';' . "\n";
    }
    if ($hm_bg_color) {
        echo '--hm_bg_color: ' . $hm_bg_color . ';' . "\n";
    }
    if ($hm_btn_bg_color) {
        echo '--hm_btn_bg_color: ' . $hm_btn_bg_color . ';' . "\n";
    } else {
        echo '--hm_btn_bg_color: ' . $sub_color . ';' . "\n";
    }
    if ($hm_btn_text_color) {
        echo '--hm_btn_text_color: ' . $hm_btn_text_color . ';' . "\n";
    } else {
        echo '--hm_btn_text_color: ' . $text_color . ';' . "\n";
    }
    if ($hm_btn_border) {
        echo '--hm_btn_border: ' . $hm_btn_text_color . ';' . "\n";
    }
    echo '--hm_btn_radius: ' . $hm_btn_radius . ';' . "\n";
    if ($hm_btn_sub_bg_color) {
        echo '--hm_btn_sub_bg_color: ' . $hm_btn_sub_bg_color . ';' . "\n";
    } else {
        echo '--hm_btn_sub_bg_color: ' . $sub_color . ';' . "\n";
    }
    if ($hm_btn_sub_text_color) {
        echo '--hm_btn_sub_text_color: ' . $hm_btn_sub_text_color . ';' . "\n";
    } else {
        echo '--hm_btn_sub_text_color: ' . $text_color . ';' . "\n";
    }
    if ($hm_btn_sub_border) {
        echo '--hm_btn_sub_border: ' . $hm_btn_sub_text_color . ';' . "\n";
    }
    echo '--hm_btn_sub_radius: ' . $hm_btn_sub_radius . ';' . "\n";
    if ($footer_text_color) {
        echo '--footer_text_color: ' . $footer_text_color . ';' . "\n";
    }
    if ($footer_bg_color) {
        echo '--footer_bg_color: ' . $footer_bg_color . ';' . "\n";
    }
    if ($footer_first_btn_bg_color) {
        echo '--footer_first_btn_bg_color: ' . $footer_first_btn_bg_color . ';' . "\n";
    } else {
        echo '--footer_first_btn_bg_color: ' . $main_color . ';' . "\n";
    }
    if ($footer_first_btn_text_color) {
        echo '--footer_first_btn_text_color:' . $footer_first_btn_text_color . ';';
    } else {
        echo '--footer_first_btn_text_color:' . $footer_text_color . ';';
    }
    if ($footer_second_btn_bg_color) {
        echo '--footer_second_btn_bg_color: ' . $footer_second_btn_bg_color . ';' . "\n";
    } else {
        echo '--footer_second_btn_bg_color: ' . $main_color . ';' . "\n";
    }
    if ($footer_second_btn_text_color) {
        echo '--footer_second_btn_text_color:' . $footer_second_btn_text_color . ';';
    } else {
        echo '--footer_second_btn_text_color:' . $footer_text_color . ';';
    }
    if ($jp_font) {
        echo '--jp_font: ' . $jp_font . ';' . "\n";
    }
    if ($en_font) {
        echo '--en_font: ' . $en_font . ';' . "\n";
    }
    if ($heading_font) {
        echo '--heading_font: ' . $heading_font . ';' . "\n";
    }

    echo '--follow_btn_tb: ' . $follow_btn_top_and_bottom . ';' . "\n";
    echo '--follow_btn_lr: ' . $follow_btn_left_and_right . ';' . "\n";

    if ($header_btn_bg_color) {
        echo '--header_btn_bg_color: ' . $header_btn_bg_color . ';' . "\n";
    } else {
        echo '--header_btn_bg_color: ' . $main_color . ';' . "\n";
    }
    if ($header_btn_text_color) {
        echo '--header_btn_text_color:' . $header_btn_text_color . ';';
    } else {
        echo '--header_btn_text_color:' . $header_text_color . ';';
    }
    if ($header_btn_sub_bg_color) {
        echo '--header_btn_sub_bg_color: ' . $header_btn_sub_bg_color . ';' . "\n";
    } else {
        echo '--header_btn_sub_bg_color: ' . $main_color . ';' . "\n";
    }
    if ($header_btn_sub_text_color) {
        echo '--header_btn_sub_text_color:' . $header_btn_sub_text_color . ';';
    } else {
        echo '--header_btn_sub_text_color:' . $header_text_color . ';';
    }
    if ($follow_btn_left_and_right) {
        echo '--follow_btn_lr: ' . $follow_btn_left_and_right . ';' . "\n";
    }
    if ($follow_btn_left_and_right) {
        echo '--follow_btn_lr: ' . $follow_btn_left_and_right . ';' . "\n";
    }
    if ($follow_btn_left_and_right) {
        echo '--follow_btn_lr: ' . $follow_btn_left_and_right . ';' . "\n";
    }
    if ($fv_height_pc) {
        echo '.p-top { height: ' . $fv_height_pc . ';}' . "\n";
    }
    if ($fv_height_tab) {
        echo '@media screen and (max-width: 849px) {.p-top { height: ' . $fv_height_tab . ';}}' . "\n";
    }
    if ($fv_height_sp) {
        echo '@media screen and (max-width: 599px) {.p-top { height: ' . $fv_height_sp . ';}}' . "\n";
    }
    echo '--sp_btn_first_text_color: ' . $sp_btn_first_text_color . ';' . "\n";

    if ($sp_btn_first_image) {
        if ($sp_btn_first_bg_color) {
            echo '--sp_btn_first_bg: url(' . $sp_btn_first_image . ') ' . $sp_btn_first_bg_color . ';' . "\n";
        } else {
            echo '--sp_btn_first_bg: url(' . $sp_btn_first_image . ');' . "\n";
        }
    } else {
        if ($sp_btn_first_bg_color) {
            echo '--sp_btn_first_bg: ' . $sp_btn_first_bg_color . ';' . "\n";
        } else {
            echo '--sp_btn_first_bg: transparent;' . "\n";
        }
    }
    if ($sp_btn_first_border_color) {
        echo '--sp_btn_first_border_color: ' . $sp_btn_first_border_color . ';' . "\n";
    } else {
        echo '--sp_btn_first_border_color: transparent;' . "\n";
    }
    echo '--sp_btn_first_border_width: ' . $sp_btn_first_border_width . ';' . "\n";
    echo '--sp_btn_first_height: ' . $sp_btn_first_height . ';' . "\n";
    if ($sp_btn_first_image_fit) {
        echo '--sp_btn_first_image_fit: contain;' . "\n";
        echo '--sp_btn_first_image_position: center bottom;' . "\n";
    } else {
        echo '--sp_btn_first_image_fit: cover;' . "\n";
        echo '--sp_btn_first_image_position: center;' . "\n";
    }

    echo '--sp_btn_second_text_color: ' . $sp_btn_second_text_color . ';' . "\n";
    if ($sp_btn_second_image) {
        if ($sp_btn_second_bg_color) {
            echo '--sp_btn_second_bg: url(' . $sp_btn_second_image . ') ' . $sp_btn_second_bg_color . ';' . "\n";
        } else {
            echo '--sp_btn_second_bg: url(' . $sp_btn_second_image . ');' . "\n";
        }
    } else {
        if ($sp_btn_second_bg_color) {
            echo '--sp_btn_second_bg: ' . $sp_btn_second_bg_color . ';' . "\n";
        } else {
            echo '--sp_btn_second_bg: transparent;' . "\n";
        }
    }
    if ($sp_btn_second_border_color) {
        echo '--sp_btn_second_border_color: ' . $sp_btn_second_border_color . ';' . "\n";
    } else {
        echo '--sp_btn_second_border_color: transparent;' . "\n";
    }
    echo '--sp_btn_second_border_width: ' . $sp_btn_second_border_width . ';' . "\n";
    echo '--sp_btn_second_height: ' . $sp_btn_second_height . ';' . "\n";
    if ($sp_btn_second_image_fit) {
        echo '--sp_btn_second_image_fit: contain;' . "\n";
        echo '--sp_btn_second_image_position: center bottom;' . "\n";
    } else {
        echo '--sp_btn_second_image_fit: cover;' . "\n";
        echo '--sp_btn_second_image_position: center;' . "\n";
    }
    echo '}' . "\n" . '</style>' . "\n";
?>
<?php
}
add_action('wp_head', 'boutiq_customize_css');

/*
 * this is style & script.
 *
 * @package boutiq
 */
/*--------------------------------------------------------------
  css
--------------------------------------------------------------*/
function boutiq_scripts()
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
add_action('wp_enqueue_scripts', 'boutiq_scripts');
