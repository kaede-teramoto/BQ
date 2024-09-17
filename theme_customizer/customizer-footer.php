<?php
/*
 * This is a configuration file for customizing footer.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'footer_design_setting');

function footer_design_setting($wp_customize)
{
    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __('footer option', 'boutiq'),
            'priority' => 32,
            'transport'   => 'refresh',
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

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_button_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_button_text_control',
        array(
            'label' => __('Enter text if a button is needed', 'boutiq'),
            'description' => __('Only if the footer design is type 03', 'boutiq'),
            'section' => 'footer_section',
            'settings' => 'footer_button_text',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_button_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_button_link_control',
        array(
            'label' => __('Enter the link to the button', 'boutiq'),
            'section' => 'footer_section',
            'settings' => 'footer_button_link',
            'type'     => 'text',
        )
    );

    // Button Link target ======================================================================================================================================================
    $wp_customize->add_setting(
        'footer_btn_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'footer_btn_target_setting_control',
        array(
            'label' => __('Open link in a new tab', 'boutiq'),
            'type' => 'checkbox',
            'section' => 'footer_section',
            'settings' => 'footer_btn_target_setting',
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
}
