<?php
// /inc/customizer/section/header_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Header_Design_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'header_design_section',
            __('Design setting for header', 'boutiq'),
            21,
            array(
                'panel' => 'header_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_image_field($wp_customize, 'header_logo_image', __('Logo Image', 'boutiq'));
        $this->add_select_field($wp_customize, 'header_design_setting', __('Design Type', 'boutiq'), array(
            'header-a-normal00' => __('Header_A-Normal-00', 'boutiq'),
            'header-a-base00' => __('Header_A-Base-00', 'boutiq'),
            'header-a-square00' => __('Header_A-Square-00', 'boutiq'),
            'header-b-normal00' => __('Header_B-Normal-00', 'boutiq'),
            'header-b-base00' => __('Header_B-Base-00', 'boutiq'),
            'header-b-square00' => __('Header_B-Square-00', 'boutiq'),
            'header-b-logo00' => __('Header_B-Logo-00', 'boutiq'),
            'header-c-normal00' => __('Header_C-Normal-00', 'boutiq'),
            'header-c-square00' => __('Header_C-Square-00', 'boutiq'),
            'header-d-normal00' => __('Header_D-Normal-00', 'boutiq'),
            'header-e-normal00' => __('Header_E-Normal-00', 'boutiq'),
            'header-e-base00' => __('Header_E-Base-00', 'boutiq'),
            'header-f-square00' => __('Header_F-Square-00', 'boutiq'),
            // 'headerAN00' => __('Header_A-Nomal-00', 'boutiq'),
            // 'headerAB00' => __('Header_A-Base-00', 'boutiq'),
            // 'headerAS00' => __('Header_A-Square-00', 'boutiq'),
            // 'headerBN00' => __('Header_B-Nomal-00', 'boutiq'),
            // 'headerBB00' => __('Header_B-Base-00', 'boutiq'),
            // 'headerBS00' => __('Header_B-Square-00', 'boutiq'),
            // 'headerBL00' => __('Header_B-Logo-00', 'boutiq'),
            // 'headerCN00' => __('Header_C-Nomal-00', 'boutiq'),
            // 'headerCS00' => __('Header_C-Square-00', 'boutiq'),
            // 'headerDN00' => __('Header_D-Nomal-00', 'boutiq'),
            // 'headerEN00' => __('Header_E-Nomal-00', 'boutiq'),
            // 'headerEB00' => __('Header_E-Base-00', 'boutiq'),
        ), 'header-a-normal00');

        $this->add_checkbox_field($wp_customize, 'header_card', __('Set to card type', 'boutiq'), false);

        $this->add_text_field($wp_customize, 'header_card_radius_pc', __('Set card corner radius for PC (px)', 'boutiq'), '12');
        $this->add_text_field($wp_customize, 'header_card_radius_tab', __('Set card corner radius for Tablet (px)', 'boutiq'), '10');
        $this->add_text_field($wp_customize, 'header_card_radius_sp', __('Set card corner radius for SP (px)', 'boutiq'), '8');

        $this->add_color_picker_field($wp_customize, 'header_text_color_setting', __('Header Link Text Color', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'header_bg_color_setting', __('Header Background Color', 'boutiq'));

        $this->add_text_field(
            $wp_customize,
            'header_bg_gradation_setting',
            __('If you would like to set a gradation for the header background color, enter it here.', 'boutiq'),
            '',
            wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a><br>Example:<br><span style="color: #000">background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%);</span>')
        );

        $this->add_checkbox_field($wp_customize, 'header_under_line', __('Add an underline', 'boutiq'), false);
        $this->add_checkbox_field($wp_customize, 'header_filter', __('Add blur processing', 'boutiq'), false);

        // Progress-bar の特殊なカスタムコントロールは手動で追加 (OK)
    }
}
new Header_Design_Customizer();

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_setting(
        'progress_bar_option',
        array(
            'type'           => 'theme_mod',
            'default' => '0',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'progress_bar_control',
            array(
                'label' => __('Adjust the blur ratio', 'boutiq'),
                'section' => 'header_design_section', // ここだけsection名を正しく
                'settings' => 'progress_bar_option',
                'type' => 'progress-bar',
            )
        )
    );
});

class Header_Btn_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'header_btn_section',
            __('btn setting for header', 'boutiq'),
            22,
            array(
                'panel' => 'header_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'header_btn_display_setting', __('Show button', 'boutiq'), false);

        $this->add_text_field($wp_customize, 'header_btn_text_setting', __('Text for button', 'boutiq'));
        $this->add_url_field($wp_customize, 'header_btn_url_setting', __('Link for button', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'header_btn_target_setting', __('Display button in separate tab', 'boutiq'), false);

        $this->add_select_field($wp_customize, 'header_btn_setting', __('btn Link Design Type', 'boutiq'), array(
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

        $this->add_select_field($wp_customize, 'header_btn_icon_setting', __('btn Link Icon Type', 'boutiq'), array(
            'icon-ac00' => __('Icon_A-Circle_00', 'boutiq'),
            'icon-ac01' => __('Icon_A-Circle_01', 'boutiq'),
            'icon-ac02' => __('Icon_A-Circle_02', 'boutiq'),
            'icon-an00' => __('Icon_A-Normal_00', 'boutiq'),
            'icon-an01' => __('Icon_A-Normal_01', 'boutiq'),
            'icon-an02' => __('Icon_A-Normal_02', 'boutiq'),
        ), 'icon-ac00');

        $this->add_color_picker_field($wp_customize, 'header_btn_bg_color_setting', __('btn color for header', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'header_btn_text_color_setting', __('btn text color for header', 'boutiq'));
        $this->add_text_field(
            $wp_customize,
            'header_btn_gradation_setting',
            __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            '',
            wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a><br>Example:<br><span style="color: #000">background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%);</span>')
        );
    }
}

class Header_Btn_Sub_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'header_btn_sub_section',
            __('Another btn setting for header', 'boutiq'),
            23,
            array(
                'panel' => 'header_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'header_btn_sub_display_setting', __('Show button', 'boutiq'), false);

        $this->add_select_field($wp_customize, 'header_btn_sub_setting', __('btn Link Design Type', 'boutiq'), array(
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

        $this->add_select_field($wp_customize, 'header_btn_sub_icon_setting', __('btn Link Icon Type', 'boutiq'), array(
            'icon-ac00' => __('Icon_A-Circle_00', 'boutiq'),
            'icon-ac01' => __('Icon_A-Circle_01', 'boutiq'),
            'icon-ac02' => __('Icon_A-Circle_02', 'boutiq'),
            'icon-an00' => __('Icon_A-Normal_00', 'boutiq'),
            'icon-an01' => __('Icon_A-Normal_01', 'boutiq'),
            'icon-an02' => __('Icon_A-Normal_02', 'boutiq'),
        ), 'icon-ac00');

        $this->add_color_picker_field($wp_customize, 'header_btn_sub_bg_color_setting', __('btn color for header', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'header_btn_sub_text_color_setting', __('btn text color for header', 'boutiq'));
        $this->add_text_field(
            $wp_customize,
            'header_btn_sub_gradation_setting',
            __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            '',
            wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a><br>Example:<br><span style="color: #000">background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%);</span>')
        );

        $this->add_text_field($wp_customize, 'header_btn_sub_text_setting', __('Text for button', 'boutiq'));
        $this->add_text_field($wp_customize, 'header_btn_sub_url_setting', __('Link for button', 'boutiq'));

        $this->add_checkbox_field($wp_customize, 'header_btn_sub_target_setting', __('Display button in separate tab', 'boutiq'), false);
    }
}

new Header_Btn_Customizer();
new Header_Btn_Sub_Customizer();
