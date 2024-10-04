<?php
/*
 * This is a configuration file for customizing follow btn.
 *
 * @package BOUTiQ
 */
add_action('customize_register', 'follow_btn_design');

function follow_btn_design($wp_customize)
{

    $wp_customize->add_panel(
        'follow_btn_panel',
        array(
            'priority'       => 38,
            'theme_supports' => '',
            'title'          => __('Follow button', 'boutiq'),
            'description'    => '',
        )
    );

    $wp_customize->add_section(
        'follow_btn_pc_section',
        array(
            'title' => __('Follow button for PC', 'boutiq'),
            'panel'  => 'follow_btn_panel',
        )
    );

    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_display',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'follow_btn_pc_display_control',
        array(
            'type' => 'checkbox',
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_display',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // Design setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_setting',
        array(
            'type'           => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_control',
        array(
            'label' => __('Follow button position', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Top right position', 'boutiq'),
                '02' => __('Bottom right position', 'boutiq'),
                '03' => __('Top left position', 'boutiq'),
                '04' => __('Bottom left position', 'boutiq'),
            ),
        )
    );

    // Position from above and below ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_top_and_bottom',
        array(
            'type' => 'theme_mod',
            'default'     => '50px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_top_and_bottom_control',
        array(
            'label' => __('Position from top and bottom', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_top_and_bottom',
            'type'     => 'text',
            'description' => __('Enter the unit. Example: px,%', 'boutiq'),
        )
    );

    // Position from left to right ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_left_and_right',
        array(
            'type' => 'theme_mod',
            'default'     => '50px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_left_and_right_control',
        array(
            'label' => __('Position from left and right', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_left_and_right',
            'type'     => 'text',
            'description' => __('Enter the unit. Example: px,%', 'boutiq'),
        )
    );

    // animation ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_animation',
        array(
            'type'    => 'theme_mod',
            'default' => '00',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_animation_control',
        array(
            'label' => __('Animation for follow button', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_animation',
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


    // btn image ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_image',
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
            'follow_btn_pc_image_control',
            array(
                'label' => __('Follow button image', 'boutiq'),
                'section' => 'follow_btn_pc_section',
                'settings' => 'follow_btn_pc_image',
            )
        )
    );

    // URL ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_url',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_url_control',
        array(
            'label' => __('Follow button link destination', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_url',
            'type'     => 'text',
        )
    );

    // Alt text ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_alt',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_alt_control',
        array(
            'label' => __('Image alt text', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_alt',
            'type'     => 'text',
        )
    );

    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_pc_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'follow_btn_pc_target_setting_control',
        array(
            'type' => 'checkbox',
            'label' => __('Open link in a new tab', 'boutiq'),
            'section' => 'follow_btn_pc_section',
            'settings' => 'follow_btn_pc_target_setting',
        )
    );


    $wp_customize->add_section(
        'follow_btn_sp_section',
        array(
            'title' => __('Follow button for SP', 'boutiq'),
            'panel'  => 'follow_btn_panel',
        )
    );

    // btn display ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_display',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'follow_btn_sp_display_control',
        array(
            'type' => 'checkbox',
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_display',
            'label' => __('Show button', 'boutiq'),
        )
    );

    // Design setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_setting',
        array(
            'type'           => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_control',
        array(
            'label' => __('Follow button position', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Top right position', 'boutiq'),
                '02' => __('Bottom right position', 'boutiq'),
                '03' => __('Top left position', 'boutiq'),
                '04' => __('Bottom left position', 'boutiq'),
            ),
        )
    );

    // Position from above and below ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_top_and_bottom',
        array(
            'type' => 'theme_mod',
            'default'     => '50px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_top_and_bottom_control',
        array(
            'label' => __('Position from top and bottom', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_top_and_bottom',
            'type'     => 'text',
            'description' => __('Enter the unit. Example: px,%', 'boutiq'),
        )
    );

    // Position from left to right ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_left_and_right',
        array(
            'type' => 'theme_mod',
            'default'     => '50px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_left_and_right_control',
        array(
            'label' => __('Position from left and right', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_left_and_right',
            'type'     => 'text',
            'description' => __('Enter the unit. Example: px,%', 'boutiq'),
        )
    );

    // animation ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_animation',
        array(
            'type'    => 'theme_mod',
            'default' => '00',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_animation_control',
        array(
            'label' => __('Animation for follow button', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_animation',
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


    // btn image ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_image',
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
            'follow_btn_sp_image_control',
            array(
                'label' => __('Follow button image', 'boutiq'),
                'section' => 'follow_btn_sp_section',
                'settings' => 'follow_btn_sp_image',
            )
        )
    );

    // URL ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_url',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_url_control',
        array(
            'label' => __('Follow button link destination', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_url',
            'type'     => 'text',
        )
    );

    // Alt text ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_alt',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_alt_control',
        array(
            'label' => __('Image alt text', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_alt',
            'type'     => 'text',
        )
    );

    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'follow_btn_sp_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'follow_btn_sp_target_setting_control',
        array(
            'type' => 'checkbox',
            'label' => __('Open link in a new tab', 'boutiq'),
            'section' => 'follow_btn_sp_section',
            'settings' => 'follow_btn_sp_target_setting',
        )
    );
}
