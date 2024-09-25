<?php
/*
 * This is a configuration file for customizing hamburger menu.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'hm_design_setting');

function hm_design_setting($wp_customize)
{

    $wp_customize->add_section(
        'hm_section',
        array(
            'title' => __('Hamburger menu option', 'boutiq'),
            'priority' => 31,
            'transport'   => 'refresh',
        )
    );


    // デザイン選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_design_setting',
        array(
            'type'           => 'theme_mod',
            'default' => '100',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_design_control',
        array(
            'label' => __('Hamburger menu Design Type', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_design_setting',
            'type' => 'select',
            'choices' => array(
                '100' => __("Don't use hamburger menu", 'boutiq'),
                '00' => __('Set Original Hamburger menu', 'boutiq'),
                '01' => __('Hamburger menu Type1', 'boutiq'),
                '02' => __('Hamburger menu Type2', 'boutiq'),
                '03' => __('Hamburger menu Type3', 'boutiq'),
                '04' => __('Hamburger menu Type4', 'boutiq'),
                '05' => __('Hamburger menu Type5', 'boutiq'),
                '06' => __('Hamburger menu Type6', 'boutiq'),
                '07' => __('Hamburger menu Type7', 'boutiq'),
                '08' => __('Hamburger menu Type8', 'boutiq'),
            ),
        )
    );

    // Hamburger icon set ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_icon_design_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_icon_design_setting_control',
        array(
            'label' => __('Hamburger Icon Design Type', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_icon_design_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Hamburger Icon Design Type1', 'boutiq'),
                '02' => __('Hamburger Icon Design Type2', 'boutiq'),
                '03' => __('Hamburger Icon Design Type3', 'boutiq'),
                '04' => __('Hamburger Icon Design Type4', 'boutiq'),
                '05' => __('Hamburger Icon Design Type5', 'boutiq'),
                '06' => __('Hamburger Icon Design Type6', 'boutiq'),
                '07' => __('Hamburger Icon Design Type7', 'boutiq'),
                '08' => __('Hamburger Icon Design Type8', 'boutiq'),
                '09' => __('Hamburger Icon Design Type9', 'boutiq'),
                '10' => __('Hamburger Icon Design Type10', 'boutiq'),
            ),
        )
    );

    // Background color settings in hamburger menu ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_bg_color_setting',
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
            'hm_bg_color_setting_control',
            array(
                'label' => __('Background Color for Hamburger Menu', 'boutiq'),
                'section' => 'hm_section',
                'settings' => 'hm_bg_color_setting',
            )
        )
    );

    // Setting the image on the left side of the hamburger menu ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_left_image',
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
            'hm_left_image_control',
            array(
                'label' => __('Hamburger menu Left Image', 'boutiq'),
                'section' => 'hm_section',
                'settings' => 'hm_left_image',
            )
        )
    );


    // BANNER01 settings ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner01_image',
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
            'hm_banner01_image_control',
            array(
                'label' => __('Background image of banner "1"', 'boutiq'),
                'section' => 'hm_section',
                'settings' => 'hm_banner01_image',

            )
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner01_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_banner01_text_control',
        array(
            'label' => __('If you want the first banner, please enter the text', 'boutiq'),
            'description' => __('Set when design type 07 and type 08', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_banner01_text',
            'type'     => 'text',
        )
    );

    // Link setting for BANNER01 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner01_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_banner01_link_control',
        array(
            'label' => __('Enter the banner link destination', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_banner01_link',
            'type'     => 'text',
        )
    );

    // target for BANNER01 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner01_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_banner01_link_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_section',
            'settings' => 'hm_banner01_link_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );


    // BANNER02 setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner02_image',
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
            'hm_banner02_image_control',
            array(
                'label' => __('Background image of banner "2"', 'boutiq'),
                'section' => 'hm_section',
                'settings' => 'hm_banner02_image',

            )
        )
    );


    // Text setting for BANNER02 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner02_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_banner02_text_control',
        array(
            'label' => __('If you want a second banner, please enter the text', 'boutiq'),
            'description' => __('Set when design type 07 and type 08', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_banner02_text',
            'type'     => 'text',
        )
    );


    //  Link setting for BANNER02 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner02_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_banner02_link_control',
        array(
            'label' => __('Enter the banner link destination', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_banner02_link',
            'type'     => 'text',
        )
    );

    // Target for BANNER02 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner02_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_banner02_link_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_section',
            'settings' => 'hm_banner02_link_target_setting',
            'label' => 'ボタンを別タブで表示する', //__('Add an underline', 'boutiq'),
        )
    );

    // Logo setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_logo_image',
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
            'hm_logo_image_control',
            array(
                'label' => __('Hamburger menu Logo Image', 'boutiq'),
                'description' => __('If not entered, the image set in the header will be used', 'boutiq'),
                'section' => 'hm_section',
                'settings' => 'hm_logo_image',

            )
        )
    );

    // Button text setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_button_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_button_text_control',
        array(
            'label' => __('Enter text if a button is needed', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_button_text',
            'type'     => 'text',
        )
    );

    // Button link setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_button_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_button_link_control',
        array(
            'label' => __('Enter the button link destination', 'boutiq'),
            'section' => 'hm_section',
            'settings' => 'hm_button_link',
            'type'     => 'text',
        )
    );

    // Button target for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_button_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_button_link_target_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_section',
            'settings' => 'hm_button_link_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );
}
