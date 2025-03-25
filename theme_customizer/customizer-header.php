<?php
/*
 * This is a configuration file for customizing header.
 *
 * @package BOUTiQ
 */

function custom_customize_register($wp_customize)
{
    $wp_customize->add_panel(
        'header_panel',
        array(
            'priority'       => 30,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Header option', 'boutiq'),
            'description'    =>  '',
        )
    );

    $wp_customize->add_section(
        'header_design_section',
        array(
            'title' => __('Design setting for header', 'boutiq'),
            'panel'  => 'header_panel',
        )
    );

    $wp_customize->add_section(
        'header_btn_section',
        array(
            'title' => __('btn setting for header', 'boutiq'),
            'panel'  => 'header_panel',
        )
    );

    $wp_customize->add_section(
        'header_btn_sub_section',
        array(
            'title' => __('Another btn setting for header', 'boutiq'),
            'panel'  => 'header_panel',
        )
    );

    // Logo setting for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_logo_image',
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
            'header_logo_image_control',
            array(
                'label' => __('Logo Image', 'boutiq'),
                'section' => 'header_design_section',
                'settings' => 'header_logo_image',
            )
        )
    );

    // Design setting for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_design_setting',
        array(
            'type'           => 'theme_mod',
            'default' => 'type1',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_design_control',
        array(
            'label' => __('Design Type', 'boutiq'),
            'section' => 'header_design_section',
            'settings' => 'header_design_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Header Type1', 'boutiq'),
                '02' => __('Header Type2', 'boutiq'),
                '03' => __('Header Type3', 'boutiq'),
                '04' => __('Header Type4', 'boutiq'),
                '05' => __('Header Type5', 'boutiq'),
                '06' => __('Header Type6', 'boutiq'),
                '07' => __('Header Type7', 'boutiq'),
                '08' => __('Header Type8', 'boutiq'),
                '09' => __('Header Type9', 'boutiq'),
                '10' => __('Header Type10', 'boutiq'),
                '11' => __('Header Type11', 'boutiq'),
                '12' => __('Header Type12', 'boutiq'),
                '13' => __('Header Type13', 'boutiq'),
            ),
        )
    );

    // Turn your header design into a card ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_card',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_card_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_design_section',
            'settings' => 'header_card',
            'label' => __('Set to card type', 'boutiq'),
        )
    );

    // card corner angle for PC ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_card_radius_pc',
        array(
            'type' => 'theme_mod',
            'default'     => '12',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_card_radius_pc_control',
        array(
            'label' => __('Set card corner radius for PC (px)', 'boutiq'),
            'section' => 'header_design_section',
            'settings' => 'header_card_radius_pc',
            'type'     => 'text',
        )
    );

    // card corner angle for TAB ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_card_radius_tab',
        array(
            'type' => 'theme_mod',
            'default'     => '10',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_card_radius_tab_control',
        array(
            'label' => __('Set card corner radius for Tablet (px)', 'boutiq'),
            'section' => 'header_design_section',
            'settings' => 'header_card_radius_tab',
            'type'     => 'text',
        )
    );

    // card corner angle for SP ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_card_radius_sp',
        array(
            'type' => 'theme_mod',
            'default'     => '8',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_card_radius_sp_control',
        array(
            'label' => __('Set card corner radius for SP (px)', 'boutiq'),
            'section' => 'header_design_section',
            'settings' => 'header_card_radius_sp',
            'type'     => 'text',
        )
    );

    // Setting link color ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_text_color_setting',
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
            'header_text_color_setting_control',
            array(
                'label' => __('Header Link Text Color', 'boutiq'),
                'section' => 'header_design_section',
                'settings' => 'header_text_color_setting',
            )
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_bg_color_setting',
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
            'header_bg_color_setting_control',
            array(
                'label' => __('Header Background Color', 'boutiq'),
                'section' => 'header_design_section',
                'settings' => 'header_bg_color_setting',
            )
        )
    );

    // When making the background a gradient ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_bg_gradation_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_bg_gradation_setting_control',
        array(
            'label' => __('If you would like to set a gradation for the background color, enter it here.', 'boutiq'),
            'section' => 'header_design_section',
            'settings' => 'header_bg_gradation_setting',
            'type'     => 'text',
            'description' => wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a>'),
        )
    );

    // underline ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_under_line',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_under_line_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_design_section',
            'settings' => 'header_under_line',
            'label' => __('Add an underline', 'boutiq'),
        )
    );

    // Filter ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_filter',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_filter_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_design_section',
            'settings' => 'header_filter',
            'label' => __('Add blur processing', 'boutiq'),
        )
    );


    // Progress bar settings ======================================================================================================================================================
    $wp_customize->add_setting(
        'progress_bar_option',
        array(
            'type'           => 'theme_mod',
            'default' => '0',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'progress_bar_control',
            array(
                'label' => __('Adjust the blur ratio', 'boutiq'),
                'section' => 'header_design_section',
                'settings' => 'progress_bar_option',
                'type' => 'progress-bar',
            )
        )
    );


    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************


    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_btn_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_btn_section',
            'settings' => 'header_btn_display_setting',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // btn text for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_text_setting_control',
        array(
            'label' => 'ボタンのテキスト',
            'section' => 'header_btn_section',
            'settings' => 'header_btn_text_setting',
            'type'     => 'text',
        )
    );

    // btn url for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_url_setting_control',
        array(
            'label' => 'ボタンのリンク',
            'section' => 'header_btn_section',
            'settings' => 'header_btn_url_setting',
            'type'     => 'text',
        )
    );


    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_btn_target_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_btn_section',
            'settings' => 'header_btn_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'header_btn_setting_control',
        array(
            'label' => __('btn Link Design Type', 'boutiq'),
            'section' => 'header_btn_section',
            'settings' => 'header_btn_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('btn Link Type1', 'boutiq'),
                '02' => __('btn Link Type2', 'boutiq'),
                '03' => __('btn Link Type3', 'boutiq'),
                '04' => __('btn Link Type4', 'boutiq'),
                '05' => __('btn Link Type5', 'boutiq'),
                '06' => __('btn Link Type6', 'boutiq'),
                '07' => __('btn Link Type7', 'boutiq'),
                '08' => __('btn Link Type8', 'boutiq'),
                '09' => __('btn Link Type9', 'boutiq'),
                '10' => __('btn Link Type10', 'boutiq'),
            ),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_icon_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_icon_control',
        array(
            'label' => __('btn Link Icon Type', 'boutiq'),
            'section' => 'header_btn_section',
            'settings' => 'header_btn_icon_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Icon Type1', 'boutiq'),
                '02' => __('Icon  Type2', 'boutiq'),
                '03' => __('Icon  Type3', 'boutiq'),
                '04' => __('Icon  Type4', 'boutiq'),
                '05' => __('Icon  Type5', 'boutiq'),
                '06' => __('Icon  Type6', 'boutiq'),
            ),
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_bg_color_setting',
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
            'header_btn_bg_color_control',
            array(
                'label' => __('btn color for header', 'boutiq'),
                'section' => 'header_btn_section',
                'settings' => 'header_btn_bg_color_setting',
                'description' => __('If not selected, the main color will be set.', 'boutiq'),
            )
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_text_color_setting',
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
            'header_btn_text_color__control',
            array(
                'label' => __('btn text color for header', 'boutiq'),
                'section' => 'header_btn_section',
                'settings' => 'header_btn_text_color_setting',
                'description' => __('If not selected, the text color will be set.', 'boutiq'),
            )
        )
    );

    // When making the background a gradient ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_gradation_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_gradation_control',
        array(
            'label' => __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            'section' => 'header_btn_section',
            'settings' => 'header_btn_gradation_setting',
            'type'     => 'text',
            'description' => wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a>'),
        )
    );

    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_btn_sub_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_display_setting',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'header_btn_sub_setting_control',
        array(
            'label' => __('btn Link Design Type', 'boutiq'),
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('btn Link Type1', 'boutiq'),
                '02' => __('btn Link Type2', 'boutiq'),
                '03' => __('btn Link Type3', 'boutiq'),
                '04' => __('btn Link Type4', 'boutiq'),
                '05' => __('btn Link Type5', 'boutiq'),
                '06' => __('btn Link Type6', 'boutiq'),
                '07' => __('btn Link Type7', 'boutiq'),
                '08' => __('btn Link Type8', 'boutiq'),
                '09' => __('btn Link Type9', 'boutiq'),
                '10' => __('btn Link Type10', 'boutiq'),
            ),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_icon_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_sub_icon_control',
        array(
            'label' => __('btn Link Icon Type', 'boutiq'),
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_icon_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Icon Type1', 'boutiq'),
                '02' => __('Icon  Type2', 'boutiq'),
                '03' => __('Icon  Type3', 'boutiq'),
                '04' => __('Icon  Type4', 'boutiq'),
                '05' => __('Icon  Type5', 'boutiq'),
                '06' => __('Icon  Type6', 'boutiq'),
            ),
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_bg_color_setting',
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
            'header_btn_sub_bg_color_control',
            array(
                'label' => __('btn color for header', 'boutiq'),
                'section' => 'header_btn_sub_section',
                'settings' => 'header_btn_sub_bg_color_setting',
                'description' => __('If not selected, the main color will be set.', 'boutiq'),
            )
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_text_color_setting',
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
            'header_btn_sub_text_color__control',
            array(
                'label' => __('btn text color for header', 'boutiq'),
                'section' => 'header_btn_sub_section',
                'settings' => 'header_btn_sub_text_color_setting',
                'description' => __('If not selected, the text color will be set.', 'boutiq'),
            )
        )
    );

    // When making the background a gradient ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_gradation_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_sub_gradation_control',
        array(
            'label' => __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_gradation_setting',
            'type'     => 'text',
            'description' => wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a>'),
        )
    );

    // btn text for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_sub_text_setting_control',
        array(
            'label' => 'ボタンのテキスト',
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_text_setting',
            'type'     => 'text',
        )
    );

    // btn url for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_btn_sub_url_setting_control',
        array(
            'label' => 'ボタンのリンク',
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_url_setting',
            'type'     => 'text',
        )
    );


    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_btn_sub_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'header_btn_sub_target_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'header_btn_sub_section',
            'settings' => 'header_btn_sub_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );
}
add_action('customize_register', 'custom_customize_register');
