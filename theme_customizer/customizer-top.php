<?php
/*
 * This is a configuration file for customizing top pages.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'top_customize_register');
function top_customize_register($wp_customize)
{

    $priority = 300;
    $wp_customize->add_panel(
        'panel_id',
        array(
            'priority'       => 34,
            'theme_supports' => '',
            'title'          => __('Top Page Settings', 'boutiq'),
            'description'    => '',
        )
    );

    $wp_customize->add_section(
        'top_fv_image_section',
        array(
            'title'          => __('Slide Image Setting', 'boutiq'),
            'priority'       => 30,
            'panel'  => 'panel_id',
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_type',
        array(
            'default' => 'Show Page title',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'top_fv_type_control',
        array(
            'label'    => __('First view settings', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_type',
            'type'     => 'select',
            'choices'  => array(
                '01'     => __('Show Page title', 'boutiq'),
                '02'     => __('Show default slider', 'boutiq'),
                '03'      => __('Show the original slider', 'boutiq'),
                '00'      => __('Show nothing', 'boutiq'),
            ),
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_slider_option',
        array(
            'default' => 'fade',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'top_fv_slider_option_control',
        array(
            'label'    => __('Change Effect', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_slider_option',
            'type'     => 'select',
            'choices'  => array(
                'fade'      => __('Fade', 'boutiq'),
                'slide'     => __('Slide', 'boutiq'),
                'cube'      => __('Cube', 'boutiq'),
                'coverflow' => __('Coverflow', 'boutiq'),
                'flip'      => __('Flip', 'boutiq'),
                'cards'     => __('Cards', 'boutiq'),
            ),
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_text_animation',
        array(
            'default' => 'fade',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'top_fv_text_animation_control',
        array(
            'label'    => __('Select the type of animated text you want to place on the first view image', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_text_animation',
            'type'     => 'select',
            'choices'  => array(
                'fade'    => __('Fade In', 'boutiq'),
                'top'    => __('From top', 'boutiq'),
                'bottom'    => __('From bottom', 'boutiq'),
                'left'    => __('From left', 'boutiq'),
                'right'    => __('From right', 'boutiq'),
                'fill'    => __('Text display from solid fill', 'boutiq'),
            ),
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_height_size_pc',
        array(
            'type' => 'theme_mod',
            'default'     => '80vh',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'top_fv_height_size_pc_control',
        array(
            'label'    => __('First view height for PC', 'boutiq'),
            'description'    => __('Enter the unit. Example: px, vh', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_height_size_pc',
            'type'     => 'text',
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_height_size_tab',
        array(
            'type' => 'theme_mod',
            'default'     => '70vh',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'top_fv_height_size_tab_control',
        array(
            'label'    => __('First view height for Tablet', 'boutiq'),
            'description'    => __('Enter the unit. Example: px, vh', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_height_size_tab',
            'type'     => 'text',
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_height_size_sp',
        array(
            'type' => 'theme_mod',
            'default'     => '50vh',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'top_fv_height_size_sp_control',
        array(
            'label'    => __('First view height for SP', 'boutiq'),
            'description'    => __('Enter the unit. Example: px, vh', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_height_size_sp',
            'type'     => 'text',
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_slider_speed',
        array(
            'type' => 'theme_mod',
            'default'     => '3000',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'top_fv_slider_speed_control',
        array(
            'label'    => __('Slider speed', 'boutiq'),
            'description'    => __('1 second is 1000. If you want to change the slide in 2 seconds, enter 2000.', 'boutiq'),
            'section'  => 'top_fv_image_section',
            'settings' => 'top_fv_slider_speed',
            'type'     => 'text',
        )
    );

    // Show Arrow ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_slider_arrow',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'top_fv_slider_arrow_control',
        array(
            'type' => 'checkbox',
            'section' => 'top_fv_image_section',
            'settings' => 'top_fv_slider_arrow',
            'label' => __('Show Arrow', 'boutiq'),
        )
    );

    // Show Pagination ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_slider_pagination',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'top_fv_slider_pagination_control',
        array(
            'type' => 'checkbox',
            'section' => 'top_fv_image_section',
            'settings' => 'top_fv_slider_pagination',
            'label' => __('Show Pagination', 'boutiq'),
        )
    );

    // Change Progress Bar ======================================================================================================================================================
    $wp_customize->add_setting(
        'top_fv_slider_progressbar',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );

    $wp_customize->add_control(
        'top_fv_slider_progressbar_control',
        array(
            'type' => 'checkbox',
            'section' => 'top_fv_image_section',
            'settings' => 'top_fv_slider_progressbar',
            'label' => __('Change Progress Bar', 'boutiq'),
            'description' => __('"Show pagination" must be turned on', 'boutiq'),
        )
    );

    // slide image set ======================================================================================================================================================

    for ($i = 1; $i <= 5;) {

        $wp_customize->add_section(
            'top_fv_image_setting_' . $i,
            array(
                'title'          => __('Slide Image', 'boutiq') . $i,
                'panel'  => 'panel_id',
            )
        );
        $wp_customize->add_setting(
            'top_fv_image_setting_' . $i,
            array(
                'default'  => '',
                'type'     => 'theme_mod',
                'sanitize_callback' => 'esc_url_raw',
            )
        );
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'top_fv_image_' . $i,
            array(
                'label'     => __('Image', 'boutiq') . $i,
                'section'   => 'top_fv_image_setting_' . $i,
                'settings'  => 'top_fv_image_setting_' . $i,
                'priority' => $priority,
            )
        ));


        $priority = $priority + 1;
        $wp_customize->add_setting(
            'top_fv_heading_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_content',
            )
        );
        $wp_customize->add_control(
            'top_fv_heading_' . $i,
            array(
                'label'    => __('If you put text for heading on image', 'boutiq'),
                'section'  => 'top_fv_image_setting_' . $i,
                'settings' => 'top_fv_heading_' . $i,
                'type'     => 'textarea',
                'priority' => $priority,
            )
        );

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'top_fv_text_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_content',
            )
        );
        $wp_customize->add_control(
            'top_fv_text_' . $i,
            array(
                'label'    => __('If you put text for description on image', 'boutiq'),
                'section'  => 'top_fv_image_setting_' . $i,
                'settings' => 'top_fv_text_' . $i,
                'type'     => 'textarea',
                'priority' => $priority,
            )
        );

        // 背景色選択 ======================================================================================================================================================
        $priority = $priority + 1;
        $wp_customize->add_setting(
            'top_fv_text_color' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'top_fv_text_color' . $i,
                array(
                    'label' => __('Text Color', 'boutiq'),
                    'section'  => 'top_fv_image_setting_' . $i,
                    'settings' => 'top_fv_text_color' . $i,
                    'priority' => $priority,
                )
            )
        );

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'top_fv_text_bottom_position_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'top_fv_text_bottom_position_' . $i,
            array(
                'label'    => __('Position from bottom of text(%)', 'boutiq'),
                'section'  => 'top_fv_image_setting_' . $i,
                'settings' => 'top_fv_text_bottom_position_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );


        $priority = $priority + 1;
        $wp_customize->add_setting(
            'top_fv_text_left_position_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'top_fv_text_left_position_' . $i,
            array(
                'label'    => __('Position from left of text(%)', 'boutiq'),
                'section'  => 'top_fv_image_setting_' . $i,
                'settings' => 'top_fv_text_left_position_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'top_fv_link_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'top_fv_link_' . $i,
            array(
                'label'    => __('If you put a link to the image', 'boutiq'),
                'section'  => 'top_fv_image_setting_' . $i,
                'settings' => 'top_fv_link_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );

        $priority = $priority + 1;
        // Setting ======================================================================================================================================================
        $wp_customize->add_setting(
            'top_fv_link_target_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'top_fv_link_target_' . $i,
            array(
                'type' => 'checkbox',
                'section'  => 'top_fv_image_setting_' . $i,
                'settings' => 'top_fv_link_target_' . $i,
                'label' => __('Open in new tab', 'boutiq'),
                'priority' => $priority,
            )
        );
        $i++;
    }
}
