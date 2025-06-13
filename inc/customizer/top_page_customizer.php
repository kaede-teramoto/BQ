<?php
// /inc/customizer/top_page_customizer.php

require_once __DIR__ . '/base_customizer.php';

class Top_Page_Fv_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_image_section',
            __('Slide Image Setting', 'boutiq'),
            33,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'top_fv_type_setting', __('First view settings', 'boutiq'), array(
            '01'     => __('Show Page title', 'boutiq'),
            '02'     => __('Show default slider', 'boutiq'),
            '03'     => __('Show the original slider', 'boutiq'),
            '04'     => __('Image output', 'boutiq'),
            '05'     => __('Show latest posts', 'boutiq'),
            '00'     => __('Show nothing', 'boutiq'),
        ), '01');

        $this->add_text_field($wp_customize, 'top_fv_height_size_pc', __('First view height for PC', 'boutiq'), '80vh');
        $this->add_text_field($wp_customize, 'top_fv_height_size_tab', __('First view height for TAB', 'boutiq'), '70vh');
        $this->add_text_field($wp_customize, 'top_fv_height_size_sp', __('First view height for SP', 'boutiq'), '50vh');
    }
}

class Top_Page_FV_Setting_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_post_section',
            __('Setting to slide the latest posts', 'boutiq'),
            34,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'top_fv_slider_option', __('Change Effect', 'boutiq'), array(
            'fade'      => __('Fade', 'boutiq'),
            'slide'     => __('Slide', 'boutiq'),
            'cube'      => __('Cube', 'boutiq'),
            'coverflow' => __('Coverflow', 'boutiq'),
            'flip'      => __('Flip', 'boutiq'),
            'cards'     => __('Cards', 'boutiq'),
        ), 'fade');

        $this->add_text_field($wp_customize, 'top_fv_post_count_pc', __('Number of pictures to show for PC', 'boutiq'), '3');
        $this->add_text_field($wp_customize, 'top_fv_post_count_tab', __('Number of pictures to show for TAB', 'boutiq'), '2');
        $this->add_text_field($wp_customize, 'top_fv_post_count_sp', __('Number of pictures to show for SP', 'boutiq'), '1');

        $this->add_text_field($wp_customize, 'top_fv_post_space_pc', __('Set space width for PC(Unit not required)', 'boutiq'), '30');
        $this->add_text_field($wp_customize, 'top_fv_post_space_tab', __('Set space width for TAB(Unit not required)', 'boutiq'), '20');
        $this->add_text_field($wp_customize, 'top_fv_post_space_sp', __('Set space width for SP(Unit not required)', 'boutiq'), '10');

        $this->add_select_field($wp_customize, 'top_fv_text_animation', __('Select the type of animated text you want to place on the first view image', 'boutiq'), array(
            'fade'    => __('Fade In', 'boutiq'),
            'top'    => __('From top', 'boutiq'),
            'bottom'    => __('From bottom', 'boutiq'),
            'left'    => __('From left', 'boutiq'),
            'right'    => __('From right', 'boutiq'),
            'fill'    => __('Text display from solid fill', 'boutiq'),
        ), 'fade');

        $this->add_checkbox_field($wp_customize, 'top_fv_post_position', __('Center slide', 'boutiq'), false);
        $this->add_number_field($wp_customize, 'top_fv_slider_speed', __('1 second is 1000. If you want to change the slide in 2 seconds, enter 2000.', 'boutiq'), 3000, 100, null, 100);
        $this->add_checkbox_field($wp_customize, 'top_fv_slider_arrow', __('Show Arrow', 'boutiq'), false);
        $this->add_checkbox_field($wp_customize, 'top_fv_slider_pagination', __('Show Pagination', 'boutiq'), false);
        $this->add_checkbox_field($wp_customize, 'top_fv_slider_progressbar', __('Change Progress Bar', 'boutiq'), false);
        $this->add_text_field($wp_customize, 'top_fv_post_show_num', __('For posts, number of articles', 'boutiq'), '3');
        $this->add_checkbox_field($wp_customize, 'top_fv_post_title', __('Show title', 'boutiq'), false);
        $this->add_checkbox_field($wp_customize, 'top_fv_post_cat', __('Show post category', 'boutiq'), false);
        $this->add_checkbox_field($wp_customize, 'top_fv_post_tag', __('Show post tag', 'boutiq'), false);
        $this->add_checkbox_field($wp_customize, 'top_fv_post_date', __('Show post date', 'boutiq'), false);
    }
}

class Top_Page_Title_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_content_title_section',
            __('Top page title design', 'boutiq'),
            35,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_select_field($wp_customize, 'boutiq_top_content_title_setting', __('Top page title design', 'boutiq'), array(
            '01' => __('Content Title1', 'boutiq'),
            '02' => __('Content Title2', 'boutiq'),
            '03' => __('Content Title3', 'boutiq'),
            '04' => __('Content Title4', 'boutiq'),
            '05' => __('Content Title5', 'boutiq'),
            '06' => __('Content Title6', 'boutiq'),
            '07' => __('Content Title7', 'boutiq'),
            '08' => __('Content Title8', 'boutiq'),
            '00' => 'オリジナルを作成する', //__('Content Title0', 'boutiq'),
        ), '01');

        $this->add_checkbox_field($wp_customize, 'top_content_title_underline', __('Add underline to content title', 'boutiq'), false);
        $this->add_color_picker_field($wp_customize, 'top_content_title_underline_color', __('Underline Color For Top page', 'boutiq'), '#999999');
        $this->add_text_field($wp_customize, 'top_content_title_underline_width', __('Set Underline thickness (px)', 'boutiq'), '2px');
    }
}

class Top_Page_Fv_Image1_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_image_setting_1',
            __('Slide Image1', 'boutiq'),
            36,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_image_field($wp_customize, 'top_fv_image_1', __('Image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_heading_1', __('If you put text for heading on image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_text_1', __('If you put text for description on image', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'top_fv_text_color_1', __('Text Color', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_bottom_position_1', __('Position from bottom of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_left_position_1', __('Position from left of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_link_1', __('If you put a link to the image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'top_fv_link_target_1', __('Open in new tab', 'boutiq'), false);
    }
}

class Top_Page_Fv_Image2_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_image_setting_2',
            __('Slide Image2', 'boutiq'),
            36,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_image_field($wp_customize, 'top_fv_image_2', __('Image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_heading_2', __('If you put text for heading on image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_text_2', __('If you put text for description on image', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'top_fv_text_color_2', __('Text Color', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_bottom_position_2', __('Position from bottom of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_left_position_2', __('Position from left of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_link_2', __('If you put a link to the image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'top_fv_link_target_2', __('Open in new tab', 'boutiq'), false);
    }
}

class Top_Page_Fv_Image3_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_image_setting_3',
            __('Slide Image3', 'boutiq'),
            36,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_image_field($wp_customize, 'top_fv_image_3', __('Image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_heading_3', __('If you put text for heading on image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_text_3', __('If you put text for description on image', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'top_fv_text_color_3', __('Text Color', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_bottom_position_3', __('Position from bottom of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_left_position_3', __('Position from left of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_link_3', __('If you put a link to the image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'top_fv_link_target_3', __('Open in new tab', 'boutiq'), false);
    }
}

class Top_Page_Fv_Image4_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_image_setting_4',
            __('Slide Image4', 'boutiq'),
            36,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_image_field($wp_customize, 'top_fv_image_4', __('Image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_heading_4', __('If you put text for heading on image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_text_4', __('If you put text for description on image', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'top_fv_text_color_4', __('Text Color', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_bottom_position_4', __('Position from bottom of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_left_position_4', __('Position from left of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_link_4', __('If you put a link to the image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'top_fv_link_target_4', __('Open in new tab', 'boutiq'), false);
    }
}

class Top_Page_Fv_Image5_Customizer extends Base_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_fv_image_setting_5',
            __('Slide Image5', 'boutiq'),
            36,
            array(
                'panel' => 'top_page_panel',
            )
        );
    }

    protected function add_controls($wp_customize)
    {
        $this->add_image_field($wp_customize, 'top_fv_image_5', __('Image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_heading_5', __('If you put text for heading on image', 'boutiq'));
        $this->add_textarea_field($wp_customize, 'top_fv_text_5', __('If you put text for description on image', 'boutiq'));
        $this->add_color_picker_field($wp_customize, 'top_fv_text_color_5', __('Text Color', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_bottom_position_5', __('Position from bottom of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_text_left_position_5', __('Position from left of text(%)', 'boutiq'));
        $this->add_text_field($wp_customize, 'top_fv_link_5', __('If you put a link to the image', 'boutiq'));
        $this->add_checkbox_field($wp_customize, 'top_fv_link_target_5', __('Open in new tab', 'boutiq'), false);
    }
}


new Top_Page_Fv_Customizer();
new Top_Page_FV_Setting_Customizer();
new Top_Page_Title_Customizer();
new Top_Page_Fv_Image1_Customizer();
new Top_Page_Fv_Image2_Customizer();
new Top_Page_Fv_Image3_Customizer();
new Top_Page_Fv_Image4_Customizer();
new Top_Page_Fv_Image5_Customizer();
