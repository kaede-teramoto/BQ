<?php
// /inc/customizer/section/error_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Error_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'error_section',
            __('404 Setting', 'boutiq'),
            80
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'error_design_setting', __('404 Design Setting', 'boutiq'), array(
            'error-an00' => __('Error_A-Normal_00', 'boutiq'),
            'error-bn00' => __('Error_B-Normal_00', 'boutiq'),
            'error-cn00' => __('Error_C-Normal_00', 'boutiq'),
            'error-as00' => __('Error_A-Square_00', 'boutiq'),
            'error-bs00' => __('Error_B-Square_00', 'boutiq'),
            '06' => __('404 Type06', 'boutiq'),
        ), 'error-an00');

        $this->add_text_field($wp_customize, 'error_main_title_setting', __('404 Main Title', 'boutiq'), '404');
        $this->add_text_field($wp_customize, 'error_sub_title_setting', __('404 Sub Title', 'boutiq'), 'NOT FOUND');

        $this->add_textarea_field($wp_customize, 'error_text_setting', __('404 Text', 'boutiq'), __('The page you are looking for may be temporarily unavailable or may have been moved or deleted. Return to the top of the website.', 'boutiq'));

        $this->add_text_field($wp_customize, 'error_btn_setting', __('btn Text', 'boutiq'), __('Back to the top', 'boutiq'));

        $site_url = home_url();
        $this->add_text_field($wp_customize, 'error_btn_link_setting', __('btn Link', 'boutiq'), $site_url);
    }
}
