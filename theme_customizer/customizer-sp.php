<?php
/*
 * This is a configuration file for customizing for sp button.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
SNS setting
--------------------------------------------------------------*/
add_action('customize_register', 'sp_button_setting');

function sp_button_setting($wp_customize)
{

    $wp_customize->add_panel(
        'sp_button_panel',
        array(
            'priority'       => 39,
            'theme_supports' => '',
            'title'          => __('SP button Settings', 'boutiq'),
            'description'    => '',
        )
    );

    $wp_customize->add_section(
        'sp_button_first_section',
        array(
            'title'          => __('SP first button Settings', 'boutiq'),
            'panel'  => 'sp_button_panel',
        )
    );

    $wp_customize->add_section(
        'sp_button_second_section',
        array(
            'title'          => __('SP second button Settings', 'boutiq'),
            'panel'  => 'sp_button_panel',
        )
    );

    // Button display ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_display',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'sp_button_first_display_control',
        array(
            'type' => 'checkbox',
            'section' => 'sp_button_first_section',
            'settings' => 'sp_button_first_display',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // text ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_first_text_setting_control',
        array(
            'label' => __('Set text for button', 'boutiq'),
            'section' => 'sp_button_first_section',
            'settings' => 'sp_button_first_text_setting',
            'type'     => 'text',
        )
    );

    // URL ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_first_url_setting_control',
        array(
            'label' => __('Set URL for button', 'boutiq'),
            'section' => 'sp_button_first_section',
            'settings' => 'sp_button_first_url_setting',
            'type'     => 'text',
        )
    );

    // Button target ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_btn_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'sp_button_first_btn_target_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'sp_button_first_section',
            'settings' => 'sp_button_first_btn_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // text color ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_text_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#393939',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sp_button_first_text_color_setting_control',
            array(
                'label' => __('Text Color For SP button', 'boutiq'),
                'section'  => 'sp_button_first_section',
                'settings' => 'sp_button_first_text_color_setting',
            )
        )
    );

    // background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_bg_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#FFFFFF',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sp_button_first_bg_color_control',
            array(
                'label' => __('Background Color For SP button', 'boutiq'),
                'section'  => 'sp_button_first_section',
                'settings' => 'sp_button_first_bg_color_setting',
            )
        )
    );

    // Border color ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_border_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#FFFFFF',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sp_button_first_border_color_setting_control',
            array(
                'label' => __('Border Color For SP button', 'boutiq'),
                'section'  => 'sp_button_first_section',
                'settings' => 'sp_button_first_border_color_setting',
            )
        )
    );

    // underline width ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_border_width_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '2px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_first_border_width_setting_control',
        array(
            'label' => __('Set border width (px)', 'boutiq'),
            'section' => 'sp_button_first_section',
            'settings' => 'sp_button_first_border_width_setting',
            'type'     => 'text',
        )
    );

    // Logo setting for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_icon_setting',
        array(
            'default' => '',
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sp_button_first_icon_setting_control',
            array(
                'label' => __('Icon Image', 'boutiq'),
                'section' => 'sp_button_first_section',
                'settings' => 'sp_button_first_icon_setting',
            )
        )
    );

    // Logo setting for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_image_setting',
        array(
            'default' => '',
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sp_button_first_image_setting_control',
            array(
                'label' => __('Background Image', 'boutiq'),
                'section' => 'sp_button_first_section',
                'settings' => 'sp_button_first_image_setting',
            )
        )
    );

    // underline width ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_first_height_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '50px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_first_height_setting_control',
        array(
            'label' => __('Set button height (px)', 'boutiq'),
            'section' => 'sp_button_first_section',
            'settings' => 'sp_button_first_height_setting',
            'type'     => 'text',
            'description' => __('Please also enter the unit. Example: px', 'boutiq')
        )
    );


    // Button display ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_display',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'sp_button_second_display_control',
        array(
            'type' => 'checkbox',
            'section' => 'sp_button_second_section',
            'settings' => 'sp_button_second_display',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // text ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_second_text_setting_control',
        array(
            'label' => __('Set text for button', 'boutiq'),
            'section' => 'sp_button_second_section',
            'settings' => 'sp_button_second_text_setting',
            'type'     => 'text',
        )
    );

    // URL ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_second_url_setting_control',
        array(
            'label' => __('Set URL for button', 'boutiq'),
            'section' => 'sp_button_second_section',
            'settings' => 'sp_button_second_url_setting',
            'type'     => 'text',
        )
    );

    // text color ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_text_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#393939',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sp_button_second_text_color_setting_control',
            array(
                'label' => __('Text Color For SP button', 'boutiq'),
                'section'  => 'sp_button_second_section',
                'settings' => 'sp_button_second_text_color_setting',
            )
        )
    );

    // background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_bg_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#FFFFFF',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sp_button_second_bg_color_control',
            array(
                'label' => __('Background Color For SP button', 'boutiq'),
                'section'  => 'sp_button_second_section',
                'settings' => 'sp_button_second_bg_color_setting',
            )
        )
    );

    // Border color ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_border_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#FFFFFF',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sp_button_second_border_color_setting_control',
            array(
                'label' => __('Border Color For SP button', 'boutiq'),
                'section'  => 'sp_button_second_section',
                'settings' => 'sp_button_second_border_color_setting',
            )
        )
    );

    // underline width ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_border_width_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '2px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_second_border_width_setting_control',
        array(
            'label' => __('Set border width (px)', 'boutiq'),
            'section' => 'sp_button_second_section',
            'settings' => 'sp_button_second_border_width_setting',
            'type'     => 'text',
        )
    );

    // Logo setting for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_icon_setting',
        array(
            'default' => '',
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sp_button_second_icon_setting_control',
            array(
                'label' => __('Icon Image', 'boutiq'),
                'section' => 'sp_button_second_section',
                'settings' => 'sp_button_second_icon_setting',
            )
        )
    );

    // Logo setting for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_image_setting',
        array(
            'default' => '',
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sp_button_second_image_setting_control',
            array(
                'label' => __('Background Image', 'boutiq'),
                'section' => 'sp_button_second_section',
                'settings' => 'sp_button_second_image_setting',
            )
        )
    );

    // underline width ======================================================================================================================================================
    $wp_customize->add_setting(
        'sp_button_second_height_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '50px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sp_button_second_height_setting_control',
        array(
            'label' => __('Set button height (px)', 'boutiq'),
            'section' => 'sp_button_second_section',
            'settings' => 'sp_button_second_height_setting',
            'type'     => 'text',
            'description' => __('Please also enter the unit. Example: px', 'boutiq')
        )
    );
}
