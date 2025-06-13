<?php
// /inc/customizer/follow_button_customizer.php

require_once __DIR__ . '/base_customizer.php';

class Follow_Button_Pc_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'follow_button_pc_section',
            __('Follow button for PC', 'boutiq'),
            39,
            array(
                'panel' => 'follow_button_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'follow_btn_pc_display', __('Show button', 'boutiq'), false);
        $this->add_select_field($wp_customize, 'follow_btn_pc_setting', __('Follow button position', 'boutiq'), array(
            '01' => __('Top right position', 'boutiq'),
            '02' => __('Bottom right position', 'boutiq'),
            '03' => __('Top left position', 'boutiq'),
            '04' => __('Bottom left position', 'boutiq'),
        ), '');

        $this->add_text_field($wp_customize, 'follow_btn_pc_top_and_bottom', __('Position from top and bottom', 'boutiq'), '', __('Enter the unit. Example: px,%', 'boutiq'));
        $this->add_text_field($wp_customize, 'follow_btn_pc_left_and_right', __('Position from left and right', 'boutiq'), '', __('Enter the unit. Example: px,%', 'boutiq'));
        $this->add_select_field($wp_customize, 'follow_btn_pc_animation', __('Animation for follow button', 'boutiq'), array(
            '00' => __('No animation', 'boutiq'),
            '01' => __('From left', 'boutiq'),
            '02' => __('From right', 'boutiq'),
            '03' => __('From top', 'boutiq'),
            '04' => __('From bottom', 'boutiq'),
            '05' => __('Fade in', 'boutiq'),
        ), '');
        $this->add_image_field($wp_customize, 'follow_btn_pc_image', __('Follow button image', 'boutiq'));
        $this->add_url_field($wp_customize, 'follow_btn_pc_url', __('Follow button link destination', 'boutiq'));
        $this->add_text_field($wp_customize, 'follow_btn_pc_alt', __('Image alt text', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'follow_btn_pc_target_setting', __('Open link in a new tab', 'boutiq'), false);
    }
}

class Follow_Button_Sp_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'follow_button_sp_section',
            __('Follow button for SP', 'boutiq'),
            39,
            array(
                'panel' => 'follow_button_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'follow_btn_sp_display', __('Show button', 'boutiq'), false);
        $this->add_select_field($wp_customize, 'follow_btn_sp_setting', __('Follow button position', 'boutiq'), array(
            '01' => __('Top right position', 'boutiq'),
            '02' => __('Bottom right position', 'boutiq'),
            '03' => __('Top left position', 'boutiq'),
            '04' => __('Bottom left position', 'boutiq'),
        ), '');

        $this->add_text_field($wp_customize, 'follow_btn_sp_top_and_bottom', __('Position from top and bottom', 'boutiq'), '', __('Enter the unit. Example: px,%', 'boutiq'));
        $this->add_text_field($wp_customize, 'follow_btn_sp_left_and_right', __('Position from left and right', 'boutiq'), '', __('Enter the unit. Example: px,%', 'boutiq'));
        $this->add_select_field($wp_customize, 'follow_btn_sp_animation', __('Animation for follow button', 'boutiq'), array(
            '00' => __('No animation', 'boutiq'),
            '01' => __('From left', 'boutiq'),
            '02' => __('From right', 'boutiq'),
            '03' => __('From top', 'boutiq'),
            '04' => __('From bottom', 'boutiq'),
            '05' => __('Fade in', 'boutiq'),
        ), '');
        $this->add_image_field($wp_customize, 'follow_btn_sp_image', __('Follow button image', 'boutiq'));
        $this->add_url_field($wp_customize, 'follow_btn_sp_url', __('Follow button link destination', 'boutiq'));
        $this->add_text_field($wp_customize, 'follow_btn_sp_alt', __('Image alt text', 'boutiq'), '');
        $this->add_checkbox_field($wp_customize, 'follow_btn_sp_target_setting', __('Open link in a new tab', 'boutiq'), false);
    }
}


new Follow_Button_Pc_Customizer();
new Follow_Button_Sp_Customizer();
