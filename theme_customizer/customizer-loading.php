<?php
/*
 * This is a configuration file for customizing 404 pages.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'loading_register');
function loading_register($wp_customize)
{

    $wp_customize->add_section(
        'loading_section',
        array(
            'title' => __('Loading Setting', 'boutiq'),
            'priority' => 37,
            'transport'   => 'refresh',
        )
    );

    // btn target ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_display_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'loading_display_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'loading_section',
            'settings' => 'loading_display_setting',
            'label' => __('Show loading screen', 'boutiq'),
        )
    );

    // Logo Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_logo_image',
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
            'loading_logo_image_control',
            array(
                'label' => __('Logo Image for loading', 'boutiq'),
                'section' => 'loading_section',
                'settings' => 'loading_logo_image',
                //'width' => 180,
            )
        )
    );

    // Title for 404 page ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_alt_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'loading_alt_setting_control',
        array(
            'label' => __('Alt text for logo image', 'boutiq'),
            'section' => 'loading_section',
            'settings' => 'loading_alt_setting',
            'type'     => 'text',
        )
    );

    // Design setting ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'loading_design_setting',
    //     array(
    //         'default' => '01',
    //         'sanitize_callback' => 'sanitize_text_field',
    //         'type' => 'theme_mod',
    //     )
    // );
    // $wp_customize->add_control(
    //     'loading_design_setting_control',
    //     array(
    //         'label'    => __('Loading Design Setting', 'boutiq'),
    //         'section'  => 'loading_section',
    //         'settings' => 'loading_design_setting',
    //         'type'     => 'select',
    //         'choices'  => array(
    //             '01'   => __('Loading Type01', 'boutiq'),
    //             '02'   => __('Loading Type02', 'boutiq'),
    //             '03'   => __('Loading Type03', 'boutiq'),
    //             '04'   => __('Loading Type04', 'boutiq'),
    //             '05'   => __('Loading Type05', 'boutiq'),
    //             '06'   => __('Loading Type06', 'boutiq'),
    //         ),
    //     )
    // );

    // Title for 404 page ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'loading_main_title_setting_control',
        array(
            'label' => __('Text for loading', 'boutiq'),
            'section' => 'loading_section',
            'settings' => 'loading_text_setting',
            'type'     => 'text',
            'description' => __('If you want to display text instead of a logo image.', 'boutiq')
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_text_color_setting',
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
            'loading_text_color__control',
            array(
                'label' => __('Loading screen text color', 'boutiq'),
                'section' => 'loading_section',
                'settings' => 'loading_text_color_setting',
            )
        )
    );

    // Setting background color ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_bg_color_setting',
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
            'loading_bg_color__control',
            array(
                'label' => __('Loading screen background color', 'boutiq'),
                'section' => 'loading_section',
                'settings' => 'loading_bg_color_setting',
            )
        )
    );

    // loading_time_setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'loading_time_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '1',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'loading_time_setting_control',
        array(
            'label' => __('Time to display loading screen (seconds)', 'boutiq'),
            'section' => 'loading_section',
            'settings' => 'loading_time_setting',
            'type'     => 'text',
        )
    );
}
