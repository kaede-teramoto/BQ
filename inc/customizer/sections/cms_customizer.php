<?php
// /inc/customizer/section/cms_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Cms_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'cms_section',
            __('CMS Setting', 'boutiq'),
            70
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'cms_top_display', __('Show CMS', 'boutiq'), false);

        $this->add_select_field($wp_customize, 'cms_top_design_setting', __('CMS TOP Design Setting', 'boutiq'), array(
            'news-a-normal00'   => __('News_A-Normal_00', 'boutiq'),
            'news-a-text00'   => __('News_A-Text_00', 'boutiq'),
            'news-b-normal00'   => __('News_B-Normal_00', 'boutiq'),
            'news-c-normal00'   => __('News_C-Normal_00', 'boutiq'),
            'news-d-normal00'   => __('News_D-Normal_00', 'boutiq'),
            'news-e-normal00'   => __('News_E-Normal_00', 'boutiq'),
            'news-f-normal00'   => __('News_F-Normal_00', 'boutiq'),
            'news-g-normal00'   => __('News_G-Normal_00', 'boutiq'),
            'news-original'   => __('original', 'boutiq'),
        ), 'news-a-normal00');

        $this->add_text_field($wp_customize, 'cms_top_num_setting', __('Number of articles displayed', '10'), '');
        $this->add_text_field($wp_customize, 'cms_top_main_title_setting', __('CMS Main Title', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'cms_top_sub_title_setting', __('CMS Sub Title', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'cms_top_btn_setting', __('Btn Text', 'boutiq'), '');
        $this->add_text_field($wp_customize, 'cms_top_btn_link_setting', __('Btn Link', 'boutiq'), '');

        $this->add_select_field($wp_customize, 'cms_link_type_setting', __('CMS Link Design Setting', 'boutiq'), array(
            '01'   => __('btn Type', 'boutiq'),
            '02'   => __('Text Type', 'boutiq'),
        ), '01');

        $this->add_select_field($wp_customize, 'cms_single_design_setting', __('CMS Single Design Setting', 'boutiq'), array(
            '01'   => __('CMS Single Type01', 'boutiq'),
            '02'   => __('CMS Single Type02', 'boutiq'),
            '03'   => __('CMS Single Type03', 'boutiq'),
            '04'   => __('CMS Single Type04', 'boutiq'),
            '05'   => __('CMS Single Type05', 'boutiq'),
            '06'   => __('CMS Single Type06', 'boutiq'),
            '07'   => __('CMS Single Type07', 'boutiq'),
        ), '01');

        $this->add_select_field($wp_customize, 'archive_cms_design_setting', __('CMS Archive Design Setting', 'boutiq'), array(
            'archive-a-normal00'   => __('Archive_A-Normal_00', 'boutiq'),
            'archive-a-text00'   => __('Archive_A-Text_00', 'boutiq'),
            'archive-b-normal00'   => __('Archive_B-Normal_00', 'boutiq'),
            'archive-c-normal00'   => __('Archive_C-Normal_00', 'boutiq'),
            'archive-d-normal00'   => __('Archive_D-Normal_00', 'boutiq'),
            'archive-e-normal00'   => __('Archive_E-Normal_00', 'boutiq'),
            'archive-f-normal00'   => __('Archive_F-Normal_00', 'boutiq'),
            'archive-g-normal00'   => __('Archive_G-Normal_00', 'boutiq')
        ), 'archive-a-normal00');
    }
}
