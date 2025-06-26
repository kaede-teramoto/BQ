<?php
// /inc/customizer/section/sns_customizer.php

require_once __DIR__ . '/../base/base_customizer.php';

class Sns_1_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sns_section_1',
            __('SNS 01', 'boutiq'),
            111,
            array(
                'panel' => 'sns_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sns_1', __('Show SNS', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sns_name_1', __('Enter the name of your SNS', 'boutiq'));
        $this->add_image_field($wp_customize, 'sns_image_1', __('SNS Image', 'boutiq'));
        $this->add_url_field($wp_customize, 'sns_link_1', __('Please enter the link', 'boutiq'));
    }
}

class Sns_2_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sns_section_2',
            __('SNS 02', 'boutiq'),
            112,
            array(
                'panel' => 'sns_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sns_2', __('Show SNS', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sns_name_2', __('Enter the name of your SNS', 'boutiq'));
        $this->add_image_field($wp_customize, 'sns_image_2', __('SNS Image', 'boutiq'));
        $this->add_url_field($wp_customize, 'sns_link_2', __('Please enter the link', 'boutiq'));
    }
}

class Sns_3_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sns_section_3',
            __('SNS 03', 'boutiq'),
            113,
            array(
                'panel' => 'sns_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sns_3', __('Show SNS', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sns_name_3', __('Enter the name of your SNS', 'boutiq'));
        $this->add_image_field($wp_customize, 'sns_image_3', __('SNS Image', 'boutiq'));
        $this->add_url_field($wp_customize, 'sns_link_3', __('Please enter the link', 'boutiq'));
    }
}

class Sns_4_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sns_section_4',
            __('SNS 04', 'boutiq'),
            114,
            array(
                'panel' => 'sns_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sns_4', __('Show SNS', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sns_name_4', __('Enter the name of your SNS', 'boutiq'));
        $this->add_image_field($wp_customize, 'sns_image_4', __('SNS Image', 'boutiq'));
        $this->add_url_field($wp_customize, 'sns_link_4', __('Please enter the link', 'boutiq'));
    }
}

class Sns_5_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sns_section_5',
            __('SNS 05', 'boutiq'),
            115,
            array(
                'panel' => 'sns_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_checkbox_field($wp_customize, 'sns_5', __('Show SNS', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'sns_name_5', __('Enter the name of your SNS', 'boutiq'));
        $this->add_image_field($wp_customize, 'sns_image_5', __('SNS Image', 'boutiq'));
        $this->add_url_field($wp_customize, 'sns_link_5', __('Please enter the link', 'boutiq'));
    }
}

new Sns_1_Customizer();
new Sns_2_Customizer();
new Sns_3_Customizer();
new Sns_4_Customizer();
new Sns_5_Customizer();
