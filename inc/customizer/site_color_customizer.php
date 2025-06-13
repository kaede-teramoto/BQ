<?php
// /inc/customizer/site_color_customizer.php

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

new Site_Color_Customizer();
