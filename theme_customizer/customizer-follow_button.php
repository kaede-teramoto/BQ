<?php
/*
 * This is a configuration file for customizing follow button.
 *
 * @package BOUTiQ
 */
add_action('customize_register', 'follow_button_design');

function follow_button_design($wp_customize)
{
    $wp_customize->add_section(
        'follow_button_section',
        array(
            'title' => __('Follow button', 'boutiq'),
            'priority' => 38,
            'transport'   => 'refresh',
        )
    );

    // Design setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_setting',
        array(
            'type'           => 'theme_mod',
            'default' => 'Do not use',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_button_control',
        array(
            'label' => __('Follow button position', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_setting',
            'type' => 'select',
            'choices' => array(
                '00' => __('Do not use', 'boutiq'),
                '01' => __('Top right position', 'boutiq'),
                '02' => __('Bottom right position', 'boutiq'),
                '03' => __('Top left position', 'boutiq'),
                '04' => __('Bottom left position', 'boutiq'),
            ),
        )
    );

    // Position from above and below ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_top_and_bottom',
        array(
            'type' => 'theme_mod',
            'default'     => '0',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_button_top_and_bottom_control',
        array(
            'label' => __('Position from top and bottom', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_top_and_bottom',
            'type'     => 'text',
            'description' => __('Enter the unit. Example: px,%', 'boutiq'),
        )
    );

    // Position from left to right ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_left_and_right',
        array(
            'type' => 'theme_mod',
            'default'     => '0',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_button_left_and_right_control',
        array(
            'label' => __('Position from left and right', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_left_and_right',
            'type'     => 'text',
            'description' => __('Enter the unit. Example: px,%', 'boutiq'),
        )
    );

    // animation ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_animation',
        array(
            'type'           => 'theme_mod',
            'default' => 'Do not use',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_button_animation_control',
        array(
            'label' => __('Animation for follow button', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_animation',
            'type' => 'select',
            'choices' => array(
                '00' => __('No animation', 'boutiq'),
                '01' => __('From left', 'boutiq'),
                '02' => __('From right', 'boutiq'),
                '03' => __('From top', 'boutiq'),
                '04' => __('From bottom', 'boutiq'),
                '05' => __('Fade in', 'boutiq'),
            ),
        )
    );


    // Button image ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_image',
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
            'follow_button_image_control',
            array(
                'label' => __('Follow button image', 'boutiq'),
                'section' => 'follow_button_section',
                'settings' => 'follow_button_image',
            )
        )
    );

    // URL ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_url',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_button_url_control',
        array(
            'label' => __('Follow button link destination', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_url',
            'type'     => 'text',
        )
    );

    // Alt text ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_alt',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_button_alt_control',
        array(
            'label' => __('Image alt text', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_alt',
            'type'     => 'text',
        )
    );

    // Button target ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_button_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'follow_button_target_setting_control',
        array(
            'type' => 'checkbox',
            'label' => __('Open link in a new tab', 'boutiq'),
            'section' => 'follow_button_section',
            'settings' => 'follow_button_target_setting',
        )
    );
}
