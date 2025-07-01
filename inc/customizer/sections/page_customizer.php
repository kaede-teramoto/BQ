<?php
// /inc/customizer/section/page_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Page_Title_Customizer extends Base_Customizer
{
    public function __construct()
    {

        parent::__construct(
            'boutiq_page_section',
            __('Page title setting', 'boutiq'),
            51,
            array(
                'panel' => 'page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'boutiq_page_design_setting', __('Page Title Design', 'boutiq'), array(
            'title-a-screen00' => __('Title_A-Screen_00', 'boutiq'),
            'title-a-contents00' => __('Title_A-Contents_00', 'boutiq'),
            'title-a-right00' => __('Title_A-Right_00', 'boutiq'),
            'title-a-left00' => __('Title_A-Left_00', 'boutiq'),
            'title-a-photo00' => __('Title_A-Photo_00', 'boutiq'),
            'title-a-top00' => __('Title_A-Top_00', 'boutiq'),
            'title-a-text00' => __('Title_A-Text_00', 'boutiq'),
            'title-b-normal00' => __('Title_B-Normal_00', 'boutiq'),
            'title-c-normal00' => __('Title_C-Normal_00', 'boutiq'),
            'title-c-photo00' => __('Title_C-Photo_00', 'boutiq'),
        ), 'title-a-screen00');

        $this->add_select_field($wp_customize, 'content_title_setting', __('Content Title Design', 'boutiq'), array(
            '01' => __('Content Title1', 'boutiq'),
            '02' => __('Content Title2', 'boutiq'),
            '03' => __('Content Title3', 'boutiq'),
            '04' => __('Content Title4', 'boutiq'),
            '05' => __('Content Title5', 'boutiq'),
            '06' => __('Content Title6', 'boutiq'),
            '07' => __('Content Title7', 'boutiq'),
            '08' => __('Content Title8', 'boutiq'),
            '00' => __('Custom Original', 'boutiq'),
        ), '01');

        $this->add_checkbox_field($wp_customize, 'content_title_underline', __('Add underline to content title', 'boutiq'), false);

        $this->add_color_picker_field($wp_customize, 'content_title_underline_color', __('Underline Color', 'boutiq'), '#999999');

        $this->add_text_field($wp_customize, 'content_title_underline_width', __('Set Underline thickness (px)', 'boutiq'), '2px');
    }
}

class Page_Radius_Customizer extends Base_Customizer
{
    public function __construct()
    {

        parent::__construct(
            'boutiq_page_radius_section',
            __('Page corner setting', 'boutiq'),
            52,
            array(
                'panel' => 'page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_text_field($wp_customize, 'boutiq_page_radius_pc_setting', __('Set corner radius for PC (px)', 'boutiq'), '12px');

        $this->add_text_field($wp_customize, 'boutiq_page_radius_tab_setting', __('Set corner radius for Tablet (px)', 'boutiq'), '10px');

        $this->add_text_field($wp_customize, 'boutiq_page_radius_sp_setting', __('Set corner radius for SP (px)', 'boutiq'), '8px');
    }
}

// Initialize Page Customizer
new Page_Title_Customizer();
new Page_Radius_Customizer();
