<?php
// /inc/customizer/section/sp_button_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class SP_Button_First_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sp_btn_first_section',
            __('SP first button Settings', 'boutiq'),
            121,
            array(
                'panel' => 'sp_button_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sp_btn_first_display', __('Show button', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sp_btn_first_text_setting', __('Set text for button', 'boutiq'));
        $this->add_url_field($wp_customize, 'sp_btn_first_url_setting', __('Set URL for button', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'sp_btn_first_btn_target_setting', __('Display button in separate tab', 'boutiq'), false);
        $this->add_color_picker_field($wp_customize, 'sp_btn_first_text_color_setting', __('Text Color For SP button', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'sp_btn_first_bg_color_setting', __('Background Color For SP button', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'sp_btn_first_border_color_setting', __('Border Color For SP button', 'boutiq'));

        $this->add_text_field($wp_customize, 'sp_btn_first_border_width_setting', __('Set border width (px)', 'boutiq'));
        $this->add_image_field($wp_customize, 'sp_btn_first_icon_setting', __('Icon Image', 'boutiq'));
        $this->add_image_field($wp_customize, 'sp_btn_first_image_setting', __('Background Image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'sp_btn_first_image_fit', __('Show full image', 'boutiq'), false, __("Don't forget to adjust the height if you want to see the entire image.", 'boutiq'));
        $this->add_text_field($wp_customize, 'sp_btn_first_height_setting', __('Set button height (px)', 'boutiq'), '', __('Please also enter the unit. Example: px', 'boutiq'));
    }
}

class SP_Button_Second_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sp_btn_second_section',
            __('SP second button Settings', 'boutiq'),
            122,
            array(
                'panel' => 'sp_button_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sp_btn_second_display', __('Show button', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sp_btn_second_text_setting', __('Set text for button', 'boutiq'));
        $this->add_url_field($wp_customize, 'sp_btn_second_url_setting', __('Set URL for button', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'sp_btn_second_btn_target_setting', __('Display button in separate tab', 'boutiq'), false);
        $this->add_color_picker_field($wp_customize, 'sp_btn_second_text_color_setting', __('Text Color For SP button', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'sp_btn_second_bg_color_setting', __('Background Color For SP button', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'sp_btn_second_border_color_setting', __('Border Color For SP button', 'boutiq'));

        $this->add_text_field($wp_customize, 'sp_btn_second_border_width_setting', __('Set border width (px)', 'boutiq'));
        $this->add_image_field($wp_customize, 'sp_btn_second_icon_setting', __('Icon Image', 'boutiq'));
        $this->add_image_field($wp_customize, 'sp_btn_second_image_setting', __('Background Image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'sp_btn_second_image_fit', __('Show full image', 'boutiq'), false, __("Don't forget to adjust the height if you want to see the entire image.", 'boutiq'));
        $this->add_text_field($wp_customize, 'sp_btn_second_height_setting', __('Set button height (px)', 'boutiq'), '', __('Please also enter the unit. Example: px', 'boutiq'));
    }
}

new SP_Button_First_Customizer();
new SP_Button_Second_Customizer();
