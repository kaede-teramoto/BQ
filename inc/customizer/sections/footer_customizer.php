<?php
// /inc/customizer/section/footer_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Footer_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'footer_section',
            __('footer option', 'boutiq'),
            41,
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
            42,
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
            'button-ac00' => __('Button_A-Circle_00', 'boutiq'),
            'button-ac01' => __('Button_A-Circle_01', 'boutiq'),
            'button-ac02' => __('Button_A-Circle_02', 'boutiq'),
            'button-bc00' => __('Button_B-Circle_00', 'boutiq'),
            'button-bc01' => __('Button_B-Circle_01', 'boutiq'),
            'button-bc02' => __('Button_B-Circle_02', 'boutiq'),
            'button-cc00' => __('Button_C-Circle_00', 'boutiq'),
            'button-cc01' => __('Button_C-Circle_01', 'boutiq'),
            'button-as00' => __('Button_A-Square_00', 'boutiq'),
            'button-as01' => __('Button_A-Square_01', 'boutiq'),
        ), 'button-ac00');

        $this->add_select_field($wp_customize, 'footer_first_btn_icon_setting', __('btn Link Icon Type', 'boutiq'), array(
            '00' => __('No Icon', 'boutiq'),
            'icon-ac00' => __('Icon_A-Circle_00', 'boutiq'),
            'icon-ac01' => __('Icon_A-Circle_01', 'boutiq'),
            'icon-ac02' => __('Icon_A-Circle_02', 'boutiq'),
            'icon-an00' => __('Icon_A-Normal_00', 'boutiq'),
            'icon-an01' => __('Icon_A-Normal_01', 'boutiq'),
            'icon-an02' => __('Icon_A-Normal_02', 'boutiq'),
        ), 'icon-ac00');

        $this->add_color_picker_field($wp_customize, 'footer_first_btn_bg_color_setting', __('btn color for header', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'footer_first_btn_text_color_setting', __('btn text color for header', 'boutiq'));
        $this->add_text_field(
            $wp_customize,
            'footer_first_btn_gradation_setting',
            __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            '',
            wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a><br>Example:<br><span style="color: #000">background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%);</span>')
        );
    }
}

class Footer_Second_Btn_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'footer_second_btn_section',
            __('footer second option', 'boutiq'),
            43,
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
            'button-ac00' => __('Button_A-Circle_00', 'boutiq'),
            'button-ac01' => __('Button_A-Circle_01', 'boutiq'),
            'button-ac02' => __('Button_A-Circle_02', 'boutiq'),
            'button-bc00' => __('Button_B-Circle_00', 'boutiq'),
            'button-bc01' => __('Button_B-Circle_01', 'boutiq'),
            'button-bc02' => __('Button_B-Circle_02', 'boutiq'),
            'button-cc00' => __('Button_C-Circle_00', 'boutiq'),
            'button-cc01' => __('Button_C-Circle_01', 'boutiq'),
            'button-as00' => __('Button_A-Square_00', 'boutiq'),
            'button-as01' => __('Button_A-Square_01', 'boutiq'),
        ), 'button-ac00');

        $this->add_select_field($wp_customize, 'footer_second_btn_icon_setting', __('btn Link Icon Type', 'boutiq'), array(
            '00' => __('No Icon', 'boutiq'),
            'icon-ac00' => __('Icon_A-Circle_00', 'boutiq'),
            'icon-ac01' => __('Icon_A-Circle_01', 'boutiq'),
            'icon-ac02' => __('Icon_A-Circle_02', 'boutiq'),
            'icon-an00' => __('Icon_A-Normal_00', 'boutiq'),
            'icon-an01' => __('Icon_A-Normal_01', 'boutiq'),
            'icon-an02' => __('Icon_A-Normal_02', 'boutiq'),
        ), 'icon-ac00');

        $this->add_color_picker_field($wp_customize, 'footer_second_btn_bg_color_setting', __('btn color for header', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'footer_second_btn_text_color_setting', __('btn text color for header', 'boutiq'));
        $this->add_text_field(
            $wp_customize,
            'footer_second_btn_gradation_setting',
            __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            '',
            wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a><br>Example:<br><span style="color: #000">background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%);</span>')
        );
    }
}

new Footer_Customizer();
new Footer_First_Btn_Customizer();
new Footer_Second_Btn_Customizer();
