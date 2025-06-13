<?php
// /inc/customizer/site_default_design_customizer.php

require_once __DIR__ . '/base_customizer.php';

class Site_Color_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'site_default_setting',
            __('Color Settings', 'boutiq'),
            10,
            array(
                'panel' => 'site_default_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_color_picker_field($wp_customize, 'site_default_text_color', __('Text Color', 'boutiq'), '#393939');
        $this->add_color_picker_field($wp_customize, 'site_default_main_color', __('Main Color', 'boutiq'), '#2641CF');
        $this->add_color_picker_field($wp_customize, 'site_default_accent_color', __('Accent Color', 'boutiq'), '#666666');
        $this->add_color_picker_field($wp_customize, 'site_default_base_color', __('Base Color', 'boutiq'), '#dddddd');
        $this->add_color_picker_field($wp_customize, 'site_default_sub_color', __('Sub Color', 'boutiq'), '#e8e8e8');
        $this->add_color_picker_field($wp_customize, 'site_default_background_color', __('Background Color', 'boutiq'), '#ffffff');
    }
}

class Site_Font_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'font_setting',
            __('Font Settings', 'boutiq'),
            20,
            array(
                'panel' => 'site_default_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_url_field($wp_customize, 'site_default_jp_text', __('Japanese Font', 'boutiq'), 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&family=Noto+Sans+JP:wght@100..900&display=swap');
        $this->add_text_field($wp_customize, 'site_default_jp_fontFamily', __('Japanese Font Family', 'boutiq'), '"Noto Sans JP", YuGothic, "游ゴシック", "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif');
        $this->add_url_field($wp_customize, 'site_default_en_text', __('European language Font', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'site_default_en_fontFamily', __('European Font Family', 'boutiq'), '');
        $this->add_url_field($wp_customize, 'site_default_heading_text', __('Heading Font', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'site_default_heading_text_fontFamily', __('Heading Font Family', 'boutiq'), '');
    }
}

class Site_Font_Siza_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'font_size_setting',
            __('Font Size Settings', 'boutiq'),
            20,
            array(
                'panel' => 'site_default_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_text_field($wp_customize, 'font_size_pc_setting', __('Normal text font size for PC', 'boutiq'), '16');
        $this->add_text_field($wp_customize, 'font_size_tab_setting', __('Normal text font size for TAB', 'boutiq'), '14');
        $this->add_text_field($wp_customize, 'font_size_sp_setting', __('Normal text font size for SP', 'boutiq'), '14');
        $this->add_text_field($wp_customize, 'heading_size_pc_setting', __('H1 text font size for PC', 'boutiq'), '40');
        $this->add_text_field($wp_customize, 'heading_size_tab_setting', __('H1 text font size for TAB', 'boutiq'), '35');
        $this->add_text_field($wp_customize, 'heading_size_sp_setting', __('H1 text font size for SP', 'boutiq'), '30');
    }
}

class Site_Button_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'common_btn_link',
            __('Btn Link Settings', 'boutiq'),
            30,
            array(
                'panel' => 'site_default_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'common_btn_design_setting', __('btn Link Design Type For common', 'boutiq'), array(
            '01' => __('btn Link Type1', 'boutiq'),
            '02' => __('btn Link Type2', 'boutiq'),
            '03' => __('btn Link Type3', 'boutiq'),
            '04' => __('btn Link Type4', 'boutiq'),
            '05' => __('btn Link Type5', 'boutiq'),
            '06' => __('btn Link Type6', 'boutiq'),
            '07' => __('btn Link Type7', 'boutiq'),
            '08' => __('btn Link Type8', 'boutiq'),
            '09' => __('btn Link Type9', 'boutiq'),
            '10' => __('btn Link Type10', 'boutiq'),
        ), '01');

        $this->add_select_field($wp_customize, 'common_btn_icon_setting', __('Icon design for buttons in page content', 'boutiq'), array(
            '01' => __('Icon Type1', 'boutiq'),
            '02' => __('Icon Type2', 'boutiq'),
            '03' => __('Icon Type3', 'boutiq'),
            '04' => __('Icon Type4', 'boutiq'),
            '05' => __('Icon Type5', 'boutiq'),
            '06' => __('Icon Type6', 'boutiq'),
        ), '01');
    }
}

class Site_Text_Link_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'font_link',
            __('Text Link Settings', 'boutiq'),
            40,
            array(
                'panel' => 'site_default_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'text_link_setting', __('Text Link Design Type', 'boutiq'), array(
            '01' => __('Text Link Type1', 'boutiq'),
            '02' => __('Text Link Type2', 'boutiq'),
            '03' => __('Text Link Type3', 'boutiq'),
            '04' => __('Text Link Type4', 'boutiq'),
            '05' => __('Text Link Type5', 'boutiq'),
            '06' => __('Text Link Type6', 'boutiq'),
            '07' => __('Text Link Type7', 'boutiq'),
            '08' => __('Text Link Type8', 'boutiq'),
            '09' => __('Text Link Type9', 'boutiq'),
            '10' => __('Text Link Type10', 'boutiq'),
            '11' => __('Text Link Type11', 'boutiq'),
            '12' => __('Text Link Type12', 'boutiq'),
        ), '01');

        $this->add_select_field($wp_customize, 'text_link_icon_setting', __('Text Link Icon Type', 'boutiq'), array(
            '01' => __('Icon Type1', 'boutiq'),
            '02' => __('Icon Type2', 'boutiq'),
            '03' => __('Icon Type3', 'boutiq'),
            '04' => __('Icon Type4', 'boutiq'),
            '05' => __('Icon Type5', 'boutiq'),
            '06' => __('Icon Type6', 'boutiq'),
            '07' => __('Icon Type7', 'boutiq'),
            '08' => __('Icon Type8', 'boutiq'),
            '09' => __('Icon Type9', 'boutiq'),
            '10' => __('Icon Type10', 'boutiq'),
            '11' => __('Icon Type11', 'boutiq'),
            '12' => __('Icon Type12', 'boutiq'),
            '13' => __('Icon Type13', 'boutiq'),
            '14' => __('Icon Type14', 'boutiq'),
        ), '01');
    }
}

new Site_Color_Customizer();
new Site_Font_Customizer();
new Site_Font_Siza_Customizer();
new Site_Button_Customizer();
new Site_Text_Link_Customizer();
