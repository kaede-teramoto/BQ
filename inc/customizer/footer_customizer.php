<?php
// /inc/customizer/footer_customizer.php

require_once __DIR__ . '/base_customizer.php';

class Footer_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'footer_section',
            __('footer option', 'boutiq'),
            33,
            array(
                'panel' => 'footer_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'footer_design_type', __('Footer Design Type', 'boutiq'), array(
            'footer-a-normal00' => __('Footer_A-Normal_00', 'boutiq'),
            'footer-a-detail00' => __('Footer_A-Detail_00', 'boutiq'),
            'footer-b-normal00' => __('Footer_B-Normal_00', 'boutiq'),
            'footer-c-normal00' => __('Footer_C-Normal_00', 'boutiq'),
            'footer-original' => __('Set Original Footer', 'boutiq'),
        ), 'footer-a-normal00');

        $this->add_image_field($wp_customize, 'footer_logo_image', __('Footer Logo Image', 'boutiq'));

        $this->add_textarea_field($wp_customize, 'footer_company_profile', __('Simple company profile', 'boutiq'));

        $this->add_checkbox_field($wp_customize, 'footer_bg_color_option', __('Set background color', 'boutiq'), false);

        $this->add_color_picker_field($wp_customize, 'footer_bg_color_set', __('Footer Background Color', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'footer_text_color_set', __('Footer Text Color', 'boutiq'));

        $this->add_text_field($wp_customize, 'footer_copyright', __('Set copyright', 'boutiq'), '© copyright');
    }
}

class Footer_First_Btn_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'footer_first_btn_section',
            __('footer first option', 'boutiq'),
            34,
            array(
                'panel' => 'footer_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'footer_first_btn_display_setting', __('Show button', 'boutiq'), false);

        $this->add_text_field($wp_customize, 'footer_first_btn_text_setting', __('Text for button', 'boutiq'));
        $this->add_text_field($wp_customize, 'footer_first_btn_url_setting', __('Link for button', 'boutiq'));

        $this->add_checkbox_field($wp_customize, 'footer_first_btn_target_setting', __('Display button in separate tab', 'boutiq'), false);

        $this->add_select_field($wp_customize, 'footer_first_btn_setting', __('btn Link Design Type', 'boutiq'), array(
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

        $this->add_select_field($wp_customize, 'footer_first_btn_icon_setting', __('btn Link Icon Type', 'boutiq'), array(
            '00' => __('No Icon', 'boutiq'),
            '01' => __('Icon Type1', 'boutiq'),
            '02' => __('Icon  Type2', 'boutiq'),
            '03' => __('Icon  Type3', 'boutiq'),
            '04' => __('Icon  Type4', 'boutiq'),
            '05' => __('Icon  Type5', 'boutiq'),
            '06' => __('Icon  Type6', 'boutiq'),
        ), '01');

        $this->add_color_picker_field($wp_customize, 'footer_first_btn_bg_color_setting', __('btn color for header', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'footer_first_btn_text_color_setting', __('btn text color for header', 'boutiq'));

        $this->add_text_field($wp_customize, 'footer_first_btn_gradation_setting', __('Gradation for button color', 'boutiq'));
    }
}

class Footer_Second_Btn_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'footer_second_btn_section',
            __('footer second option', 'boutiq'),
            35,
            array(
                'panel' => 'footer_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'footer_second_btn_display_setting', __('Show button', 'boutiq'), false);

        $this->add_text_field($wp_customize, 'footer_second_btn_text_setting', __('Text for button', 'boutiq'));
        $this->add_text_field($wp_customize, 'footer_second_btn_url_setting', __('Link for button', 'boutiq'));

        $this->add_checkbox_field($wp_customize, 'footer_second_btn_target_setting', __('Display button in separate tab', 'boutiq'), false);

        $this->add_select_field($wp_customize, 'footer_second_btn_setting', __('btn Link Design Type', 'boutiq'), array(
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

        $this->add_select_field($wp_customize, 'footer_second_btn_icon_setting', __('btn Link Icon Type', 'boutiq'), array(
            '00' => __('No Icon', 'boutiq'),
            '01' => __('Icon Type1', 'boutiq'),
            '02' => __('Icon  Type2', 'boutiq'),
            '03' => __('Icon  Type3', 'boutiq'),
            '04' => __('Icon  Type4', 'boutiq'),
            '05' => __('Icon  Type5', 'boutiq'),
            '06' => __('Icon  Type6', 'boutiq'),
        ), '01');

        $this->add_color_picker_field($wp_customize, 'footer_second_btn_bg_color_setting', __('btn color for header', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'footer_second_btn_text_color_setting', __('btn text color for header', 'boutiq'));

        $this->add_text_field($wp_customize, 'footer_second_btn_gradation_setting', __('Gradation for button color', 'boutiq'));
    }
}

new Footer_Customizer();
new Footer_First_Btn_Customizer();
new Footer_Second_Btn_Customizer();
