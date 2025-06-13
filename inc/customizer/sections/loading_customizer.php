<?php
// /inc/customizer/section/loading_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class loading_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'loading_section',
            __('Loading Setting', 'boutiq'),
            90
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'loading_display_setting', __('Show loading screen', 'boutiq'), false);
        $this->add_image_field($wp_customize, 'loading_logo_image', __('Logo Image for loading', 'boutiq'));
        $this->add_text_field($wp_customize, 'loading_alt_setting', __('Alt text for logo image', 'boutiq'));
        $this->add_text_field($wp_customize, 'loading_text_setting', __('Text for loading', 'boutiq'), '', __('If you want to display text instead of a logo image.'));
        $this->add_color_picker_field($wp_customize, 'loading_text_color_setting', __('Loading screen text color', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'loading_bg_color_setting', __('Loading screen background color', 'boutiq'));
        $this->add_text_field($wp_customize, 'loading_time_setting', __('Time to display loading screen (seconds)', 'boutiq'));
    }
}
