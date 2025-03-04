<?php
/*
 * This is a configuration file for customizing footer.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'footer_design_setting');

function footer_design_setting($wp_customize)
{
    $wp_customize->add_panel(
        'footer_panel',
        array(
            'priority'       => 32,
            'theme_supports' => '',
            'title'          => __('footer option', 'boutiq'),
            'description'    => '',
        )
    );

    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __('footer option', 'boutiq'),
            'priority' => 33,
            'transport'   => 'refresh',
            'panel'  => 'footer_panel',
        )
    );

    $wp_customize->add_section(
        'footer_first_btn_section',
        array(
            'title' => __('footer first option', 'boutiq'),
            'priority' => 34,
            'transport'   => 'refresh',
            'panel'  => 'footer_panel',
        )
    );

    $wp_customize->add_section(
        'footer_second_btn_section',
        array(
            'title' => __('footer second option', 'boutiq'),
            'priority' => 35,
            'transport'   => 'refresh',
            'panel'  => 'footer_panel',
        )
    );

    // Design setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_design_type',
        array(
            'type'           => 'theme_mod',
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_design_control',
        array(
            'label' => __('Footer Design Type', 'boutiq'),
            'section' => 'footer_section',
            'settings' => 'footer_design_type',
            'type' => 'select',
            'choices' => array(
                '01' => __('Footer Type1', 'boutiq'),
                '02' => __('Footer Type2', 'boutiq'),
                '03' => __('Footer Type3', 'boutiq'),
                '04' => __('Set Original Footer', 'boutiq'),
            ),
        )
    );

    // Logo Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_logo_image',
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
            'footer_logo_image_control',
            array(
                'label' => __('Footer Logo Image', 'boutiq'),
                'section' => 'footer_section',
                'settings' => 'footer_logo_image',
                //'width' => 180,
            )
        )
    );

    // Footer text Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_company_profile',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_textarea_content',
        )
    );

    $wp_customize->add_control(
        'footer_company_profile_control',
        array(
            'label' => __('Simple company profile', 'boutiq'),
            'section' => 'footer_section',
            'settings' => 'footer_company_profile',
            'type'     => 'textarea',
        )
    );

    // Footer background color option ======================================================================================================================================================

    $wp_customize->add_setting(
        'footer_bg_color_option',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'footer_bg_color_option_control',
        array(
            'type' => 'checkbox',
            'section' => 'footer_section',
            'settings' => 'footer_bg_color_option',
            'label' => __('Set background color', 'boutiq'),
        )
    );

    // Footer background color setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_bg_color_set',
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
            'footer_bg_color_set_control',
            array(
                'label' => __('Footer Background Color', 'boutiq'),
                'section' => 'footer_section',
                'settings' => 'footer_bg_color_set',
            )
        )
    );

    // テキスト色選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_text_color_set',
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
            'footer_text_color_set_control',
            array(
                'label' => __('Footer Text Color', 'boutiq'),
                'section' => 'footer_section',
                'settings' => 'footer_text_color_set',
            )
        )
    );

    // Copyright setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'type' => 'theme_mod',
            'default'     => '© copyright',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_copyright_control',
        array(
            'label' => __('Set copyright', 'boutiq'),
            'section' => 'footer_section',
            'settings' => 'footer_copyright',
            'type'     => 'text',
        )
    );


    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************
    // ********************************************************************************************************************************************************************************************

    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'footer_first_btn_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_display_setting',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // btn text for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_first_btn_text_setting_control',
        array(
            'label' => 'ボタンのテキスト',
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_text_setting',
            'type'     => 'text',
        )
    );

    // btn url for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_first_btn_url_setting_control',
        array(
            'label' => 'ボタンのリンク',
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_url_setting',
            'type'     => 'text',
        )
    );


    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'footer_first_btn_target_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'footer_first_btn_setting_control',
        array(
            'label' => __('btn Link Design Type', 'boutiq'),
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_setting',
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
        'footer_first_btn_icon_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_first_btn_icon_control',
        array(
            'label' => __('btn Link Icon Type', 'boutiq'),
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_icon_setting',
            'type' => 'select',
            'choices' => array(
                '00' => __('No Icon', 'boutiq'),
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
        'footer_first_btn_bg_color_setting',
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
            'footer_first_btn_bg_color_control',
            array(
                'label' => __('btn color for header', 'boutiq'),
                'section' => 'footer_first_btn_section',
                'settings' => 'footer_first_btn_bg_color_setting',
                'description' => __('If not selected, the main color will be set.', 'boutiq'),
            )
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_text_color_setting',
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
            'footer_first_btn_text_color__control',
            array(
                'label' => __('btn text color for header', 'boutiq'),
                'section' => 'footer_first_btn_section',
                'settings' => 'footer_first_btn_text_color_setting',
                'description' => __('If not selected, the text color will be set.', 'boutiq'),
            )
        )
    );

    // When making the background a gradient ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_first_btn_gradation_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_first_btn_gradation_control',
        array(
            'label' => __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            'section' => 'footer_first_btn_section',
            'settings' => 'footer_first_btn_gradation_setting',
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
        'footer_second_btn_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'footer_second_btn_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_display_setting',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // btn text for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_second_btn_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_second_btn_text_setting_control',
        array(
            'label' => 'ボタンのテキスト',
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_text_setting',
            'type'     => 'text',
        )
    );

    // btn url for header ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_second_btn_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_second_btn_url_setting_control',
        array(
            'label' => 'ボタンのリンク',
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_url_setting',
            'type'     => 'text',
        )
    );


    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_second_btn_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'footer_second_btn_target_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_target_setting',
            'label' => __('Display button in separate tab', 'boutiq'),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_second_btn_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'footer_second_btn_setting_control',
        array(
            'label' => __('btn Link Design Type', 'boutiq'),
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_setting',
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
        'footer_second_btn_icon_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_second_btn_icon_control',
        array(
            'label' => __('btn Link Icon Type', 'boutiq'),
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_icon_setting',
            'type' => 'select',
            'choices' => array(
                '00' => __('No Icon', 'boutiq'),
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
        'footer_second_btn_bg_color_setting',
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
            'footer_second_btn_bg_color_control',
            array(
                'label' => __('btn color for header', 'boutiq'),
                'section' => 'footer_second_btn_section',
                'settings' => 'footer_second_btn_bg_color_setting',
                'description' => __('If not selected, the main color will be set.', 'boutiq'),
            )
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_second_btn_text_color_setting',
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
            'footer_second_btn_text_color__control',
            array(
                'label' => __('btn text color for header', 'boutiq'),
                'section' => 'footer_second_btn_section',
                'settings' => 'footer_second_btn_text_color_setting',
                'description' => __('If not selected, the text color will be set.', 'boutiq'),
            )
        )
    );

    // When making the background a gradient ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_second_btn_gradation_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_second_btn_gradation_control',
        array(
            'label' => __('If you would like to set a gradation for the btn color, enter it here.', 'boutiq'),
            'section' => 'footer_second_btn_section',
            'settings' => 'footer_second_btn_gradation_setting',
            'type'     => 'text',
            'description' => wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a>'),
        )
    );
}
