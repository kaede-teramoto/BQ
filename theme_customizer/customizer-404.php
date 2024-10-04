<?php
/*
 * This is a configuration file for customizing 404 pages.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'error_register');
function error_register($wp_customize)
{

    $wp_customize->add_section(
        'error_section',
        array(
            'title' => __('404 Setting', 'boutiq'),
            'priority' => 37,
            'transport'   => 'refresh',
        )
    );

    // Design setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'error_design_setting',
        array(
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'error_design_setting_control',
        array(
            'label'    => __('404 Design Setting', 'boutiq'),
            'section'  => 'error_section',
            'settings' => 'error_design_setting',
            'type'     => 'select',
            'choices'  => array(
                '01'   => __('404 Type01', 'boutiq'),
                '02'   => __('404 Type02', 'boutiq'),
                '03'   => __('404 Type03', 'boutiq'),
                '04'   => __('404 Type04', 'boutiq'),
                '05'   => __('404 Type05', 'boutiq'),
                '06'   => __('404 Type06', 'boutiq'),
            ),
        )
    );

    // Title for 404 page ======================================================================================================================================================
    $wp_customize->add_setting(
        'error_main_title_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '404',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'error_main_title_setting_control',
        array(
            'label' => __('404 Main Title', 'boutiq'),
            'section' => 'error_section',
            'settings' => 'error_main_title_setting',
            'type'     => 'text',
        )
    );

    // Sub title for 404 page ======================================================================================================================================================
    $wp_customize->add_setting(
        'error_sub_title_setting',
        array(
            'type' => 'theme_mod',
            'default'     => 'NOT FOUND',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'error_sub_title_setting_control',
        array(
            'label' => __('404 Sub Title', 'boutiq'),
            'section' => 'error_section',
            'settings' => 'error_sub_title_setting',
            'type'     => 'text',
        )
    );

    // Text for 404 page ======================================================================================================================================================
    $wp_customize->add_setting(
        'error_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => 'お探しのページは一時的にアクセスができない状況にあるか、移動または削除された可能性があります。お手数ですがホームページのトップよりお探しください。', //__('The page you are looking for cannot be found.', 'boutiq'),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_textarea_content',
        )
    );
    $wp_customize->add_control(
        'error_text_setting_control',
        array(
            'label' => __('404 Text', 'boutiq'),
            'section' => 'error_section',
            'settings' => 'error_text_setting',
            'type'     => 'textarea',
        )
    );

    // btn setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'error_btn_setting',
        array(
            'type' => 'theme_mod',
            'default'     => __('HOME', 'boutiq'),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'error_btn_setting_control',
        array(
            'label' => __('btn Text', 'boutiq'),
            'section' => 'error_section',
            'settings' => 'error_btn_setting',
            'type'     => 'text',
        )
    );

    // btn link ======================================================================================================================================================
    $site_url  = home_url();
    $wp_customize->add_setting(
        'error_btn_link_setting',
        array(
            'type' => 'theme_mod',
            'default'     => $site_url,
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'error_btn_link_setting_control',
        array(
            'label' => __('btn Link', 'boutiq'),
            'section' => 'error_section',
            'settings' => 'error_btn_link_setting',
            'type'     => 'text',
        )
    );
}
