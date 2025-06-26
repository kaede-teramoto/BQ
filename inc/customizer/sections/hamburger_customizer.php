<?php
// /inc/customizer/section/hamburger_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Hamburger_Design_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'hm_design_section',
            __('Design setting for Hamburger', 'boutiq'),
            31,
            array(
                'panel' => 'hm_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'hm_design_setting', __('Hamburger menu Design Type', 'boutiq'), array(
            'hMenuDU'  => __("Don't use hamburger menu", 'boutiq'),
            'hMenuOR'  => __('Set Original Hamburger menu', 'boutiq'),
            'hMenuAP00' => __('HMenu_A-Photo_00', 'boutiq'),
            'hMenuAS00' => __('HMenu_A-Shade_00', 'boutiq'),
            'hMenuBP00' => __('HMenu_B-Photo_00', 'boutiq'),
            'hMenuBS00' => __('HMenu_B-Shade_00', 'boutiq'),
            'hMenuCP00' => __('HMenu_C-Photo_00', 'boutiq'),
            'hMenuCS00' => __('HMenu_C-Shade_00', 'boutiq'),
            'hMenuDP00' => __('HMenu_D-Photo_00', 'boutiq'),
            'hMenuDS00' => __('HMenu_D-Shade_00', 'boutiq'),
        ), 'hMenuDU');

        $this->add_select_field($wp_customize, 'hm_icon_design_setting', __('Hamburger Icon Design Type', 'boutiq'), array(
            '01' => __('Hamburger Icon Design Type1', 'boutiq'),
            '02' => __('Hamburger Icon Design Type2', 'boutiq'),
            '03' => __('Hamburger Icon Design Type3', 'boutiq'),
            '04' => __('Hamburger Icon Design Type4', 'boutiq'),
            '05' => __('Hamburger Icon Design Type5', 'boutiq'),
            '06' => __('Hamburger Icon Design Type6', 'boutiq'),
            '07' => __('Hamburger Icon Design Type7', 'boutiq'),
            '08' => __('Hamburger Icon Design Type8', 'boutiq'),
            '09' => __('Hamburger Icon Design Type9', 'boutiq'),
            '10' => __('Hamburger Icon Design Type10', 'boutiq'),
        ), '01');

        $this->add_color_picker_field($wp_customize, 'hm_bg_color_setting', __('Background Color for Hamburger Menu', 'boutiq'), '#FFFFFF');
        $this->add_image_field($wp_customize, 'hm_left_image', __('Hamburger menu Left Image', 'boutiq'), '');
        $this->add_image_field($wp_customize, 'hm_logo_image', __('Hamburger menu Logo Image', 'boutiq'), '');
    }
}

class Hamburger_Banner_First_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'hm_banner_first_section',
            __('First banner setting for Hamburger', 'boutiq'),
            32,
            array(
                'panel' => 'hm_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'hm_banner01_display_setting', __('Show banner', 'boutiq'), false);
        $this->add_image_field($wp_customize, 'hm_banner01_image', __('Background image of banner "1"', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'hm_banner01_text', __('If you want the first banner, please enter the text', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'hm_banner01_link', __('Enter the banner link destination', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'hm_banner01_link_target_setting', __('Display button in separate tab', 'boutiq'), false);
    }
}

class Hamburger_Banner_Second_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'hm_banner_second_section',
            __('Second banner setting for Hamburger', 'boutiq'),
            33,
            array(
                'panel' => 'hm_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'hm_banner02_display_setting', __('Show banner', 'boutiq'), false);
        $this->add_image_field($wp_customize, 'hm_banner02_image', __('Background image of banner "2"', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'hm_banner02_text', __('If you want a second banner, please enter the text', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'hm_banner02_link', __('Enter the banner link destination', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'hm_banner02_link_target_setting', __('Display button in separate tab', 'boutiq'), false);
    }
}

class Hamburger_Btn_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'hm_btn_section',
            __('First btn setting for Hamburger', 'boutiq'),
            34,
            array(
                'panel' => 'hm_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'hm_btn_display_setting', __('Show button', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'hm_btn_text', __('btn text', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'hm_btn_link', __('Enter the btn link destination', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'hm_btn_link_target_setting', __('Display button in separate tab', 'boutiq'), false);
        $this->add_color_picker_field($wp_customize, 'hm_btn_bg_color_setting', __('btn background color', 'boutiq'), '');
        $this->add_color_picker_field($wp_customize, 'hm_btn_text_color_setting', __('btn Text Color', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'hm_btn_border_setting', __('Add a line to the btn', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'hm_btn_radius_setting', __('Set border corner radius', 'boutiq'), '');
    }
}

class Hamburger_Btn_Sub_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'hm_btn_sub_section',
            __('Second btn setting for Hamburger', 'boutiq'),
            35,
            array(
                'panel' => 'hm_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'hm_btn_sub_display_setting', __('Show button', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'hm_btn_sub_text', __('btn text', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'hm_btn_sub_link', __('Enter the btn link destination', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'hm_btn_sub_link_target_setting', __('Display button in separate tab', 'boutiq'), false);
        $this->add_color_picker_field($wp_customize, 'hm_btn_sub_bg_color_setting', __('btn background color', 'boutiq'), '');
        $this->add_color_picker_field($wp_customize, 'hm_btn_sub_text_color_setting', __('btn Text Color', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'hm_btn_sub_border_setting', __('Add a line to the btn', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'hm_btn_sub_radius_setting', __('Set border corner radius', 'boutiq'), '');
    }
}

new Hamburger_Design_Customizer();
new Hamburger_Banner_First_Customizer();
new Hamburger_Banner_Second_Customizer();
new Hamburger_Btn_Customizer();
new Hamburger_Btn_Sub_Customizer();
