<?php
/*
 * This is a configuration file for customizing hamburger menu.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'hm_design_setting');

function hm_design_setting($wp_customize)
{

    $wp_customize->add_panel(
        'hm_panel',
        array(
            'priority'       => 30,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Hamburger option', 'boutiq'),
            'description'    =>  '',
        )
    );


    $wp_customize->add_section(
        'hm_design_section',
        array(
            'title' => __('Design setting for Hamburger', 'boutiq'),
            'panel'  => 'hm_panel',
        )
    );

    $wp_customize->add_section(
        'hm_banner_first_section',
        array(
            'title' => __('First banner setting for Hamburger', 'boutiq'),
            'panel'  => 'hm_panel',
        )
    );

    $wp_customize->add_section(
        'hm_banner_second_section',
        array(
            'title' => __('Second banner setting for Hamburger', 'boutiq'),
            'panel'  => 'hm_panel',
        )
    );

    $wp_customize->add_section(
        'hm_btn_section',
        array(
            'title' => __('First btn setting for Hamburger', 'boutiq'),
            'panel'  => 'hm_panel',
        )
    );

    $wp_customize->add_section(
        'hm_btn_sub_section',
        array(
            'title' => __('Second btn setting for Hamburger', 'boutiq'),
            'panel'  => 'hm_panel',
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
            'section' => 'hm_design_section',
            'settings' => 'hm_design_setting',
            'type' => 'select',
            'choices' => array(
                'hMenuDU' => __("Don't use hamburger menu", 'boutiq'),
                'hMenuOR' => __('Set Original Hamburger menu', 'boutiq'),
                'hMenuAP00' => __('HMenu_A-Photo_00', 'boutiq'),
                'hMenuAS00' => __('HMenu_A-Shade_00', 'boutiq'),
                'hMenuBP00' => __('HMenu_B-Photo_00', 'boutiq'),
                'hMenuBS00' => __('HMenu_B-Shade_00', 'boutiq'),
                'hMenuCP00' => __('HMenu_C-Photo_00', 'boutiq'),
                'hMenuCS00' => __('HMenu_C-Shade_00', 'boutiq'),
                'hMenuDP00' => __('HMenu_D-Photo_00', 'boutiq'),
                'hMenuDS00' => __('HMenu_D-Shade_00', 'boutiq'),
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
            'section' => 'hm_design_section',
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
                'section' => 'hm_design_section',
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
                'section' => 'hm_design_section',
                'settings' => 'hm_left_image',
            )
        )
    );

    // BANNER02 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner01_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_banner01_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_banner_first_section',
            'settings' => 'hm_banner01_display_setting',
            'label' => __('Show banner', 'boutiq'),
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
                'section' => 'hm_banner_first_section',
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
            'section' => 'hm_banner_first_section',
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
            'section' => 'hm_banner_first_section',
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
            'section' => 'hm_banner_first_section',
            'settings' => 'hm_banner01_link_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // BANNER02 ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_banner02_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_banner02_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_banner_second_section',
            'settings' => 'hm_banner02_display_setting',
            'label' => __('Show banner', 'boutiq'),
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
                'section' => 'hm_banner_second_section',
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
            'section' => 'hm_banner_second_section',
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
            'section' => 'hm_banner_second_section',
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
            'section' => 'hm_banner_second_section',
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
                'section' => 'hm_design_section',
                'settings' => 'hm_logo_image',

            )
        )
    );

    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_btn_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_btn_section',
            'settings' => 'hm_btn_display_setting',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // btn text setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_btn_text_control',
        array(
            'label' => __('btn text', 'boutiq'),
            'section' => 'hm_btn_section',
            'settings' => 'hm_btn_text',
            'type'     => 'text',
        )
    );

    // btn link setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_btn_link_control',
        array(
            'label' => __('Enter the btn link destination', 'boutiq'),
            'section' => 'hm_btn_section',
            'settings' => 'hm_btn_link',
            'type'     => 'text',
        )
    );

    // btn target for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_btn_link_target_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_btn_section',
            'settings' => 'hm_btn_link_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // Setting link color ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_bg_color_setting',
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
            'hm_btn_bg_color_setting_control',
            array(
                'label' => __('btn background color', 'boutiq'),
                'section' => 'hm_btn_section',
                'settings' => 'hm_btn_bg_color_setting',
            )
        )
    );

    // Setting link color ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_text_color_setting',
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
            'hm_btn_text_color_setting_control',
            array(
                'label' => __('btn Text Color', 'boutiq'),
                'section' => 'hm_btn_section',
                'settings' => 'hm_btn_text_color_setting',
            )
        )
    );

    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_border_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_btn_border_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_btn_section',
            'settings' => 'hm_btn_border_setting',
            'label' => __('Add a line to the btn', 'boutiq'),
        )
    );

    // btn link setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_radius_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_btn_radius_setting_control',
        array(
            'label' => __('Set border corner radius', 'boutiq'),
            'section' => 'hm_btn_section',
            'settings' => 'hm_btn_radius_setting',
            'type'     => 'text',
        )
    );

    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_btn_sub_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_btn_sub_section',
            'settings' => 'hm_btn_sub_display_setting',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // btn text setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_btn_sub_text_control',
        array(
            'label' => __('btn text', 'boutiq'),
            'section' => 'hm_btn_sub_section',
            'settings' => 'hm_btn_sub_text',
            'type'     => 'text',
        )
    );

    // btn link setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_btn_sub_link_control',
        array(
            'label' => __('Enter the btn link destination', 'boutiq'),
            'section' => 'hm_btn_sub_section',
            'settings' => 'hm_btn_sub_link',
            'type'     => 'text',
        )
    );

    // btn target for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_btn_sub_link_target_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_btn_sub_section',
            'settings' => 'hm_btn_sub_link_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // Setting link color ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_bg_color_setting',
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
            'hm_btn_sub_bg_color_setting_control',
            array(
                'label' => __('btn background color', 'boutiq'),
                'section' => 'hm_btn_sub_section',
                'settings' => 'hm_btn_sub_bg_color_setting',
            )
        )
    );

    // Setting link color ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_text_color_setting',
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
            'hm_btn_sub_text_color_setting_control',
            array(
                'label' => __('btn Text Color', 'boutiq'),
                'section' => 'hm_btn_sub_section',
                'settings' => 'hm_btn_sub_text_color_setting',
            )
        )
    );

    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_border_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'hm_btn_sub_border_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'hm_btn_sub_section',
            'settings' => 'hm_btn_sub_border_setting',
            'label' => __('Add a line to the btn', 'boutiq'),
        )
    );

    // btn link setting for hm ======================================================================================================================================================
    $wp_customize->add_setting(
        'hm_btn_sub_radius_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hm_btn_sub_radius_setting_control',
        array(
            'label' => __('Set border corner radius', 'boutiq'),
            'section' => 'hm_btn_sub_section',
            'settings' => 'hm_btn_sub_radius_setting',
            'type'     => 'text',
        )
    );
}
