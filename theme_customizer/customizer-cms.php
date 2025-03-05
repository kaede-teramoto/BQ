<?php
/*
 * This is a configuration file for customizing cms.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'cms_register');
function cms_register($wp_customize)
{

    $wp_customize->add_section(
        'cms_section',
        array(
            'title' => __('CMS Setting', 'boutiq'),
            'priority' => 35,
            'transport'   => 'refresh',
        )
    );

    // CMS setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_display',
        array(
            'type'           => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'cms_top_display_control',
        array(
            'type' => 'checkbox',
            'section' => 'cms_section',
            'settings' => 'cms_top_display',
            'label' => __('Show CMS', 'boutiq'),
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_design_setting',
        array(
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );

    $wp_customize->add_control(
        'cms_top_design_setting_control',
        array(
            'label'    => __('CMS TOP Design Setting', 'boutiq'),
            'section'  => 'cms_section',
            'settings' => 'cms_top_design_setting',
            'type'     => 'select',
            'choices'  => array(
                '01'   => __('CMS Type01', 'boutiq'),
                '02'   => __('CMS Type02', 'boutiq'),
                '03'   => __('CMS Type03', 'boutiq'),
                '04'   => __('CMS Type04', 'boutiq'),
                '05'   => __('CMS Type05', 'boutiq'),
                '06'   => __('CMS Type06', 'boutiq'),
                '07'   => __('CMS Type07', 'boutiq'),
                '08'   => __('CMS Type08', 'boutiq'),
            ),
        )
    );

    // Number to display ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_num_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '10',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cms_top_num_setting_control',
        array(
            'label' => __('Number of articles displayed', 'boutiq'),
            'section' => 'cms_section',
            'settings' => 'cms_top_num_setting',
            'type'     => 'text',
        )
    );

    // Main title for Top page ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_main_title_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cms_top_main_title_setting_control',
        array(
            'label' => __('CMS Main Title', 'boutiq'),
            'section' => 'cms_section',
            'settings' => 'cms_top_main_title_setting',
            'type'     => 'text',
        )
    );

    // Sub title for Top page ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_sub_title_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cms_top_sub_title_setting_control',
        array(
            'label' => __('CMS Sub Title', 'boutiq'),
            'section' => 'cms_section',
            'settings' => 'cms_top_sub_title_setting',
            'type'     => 'text',
        )
    );

    // btn for Top page ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_btn_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cms_top_btn_setting_control',
        array(
            'label' => __('btn Text', 'boutiq'),
            'section' => 'cms_section',
            'settings' => 'cms_top_btn_setting',
            'type'     => 'text',
        )
    );

    // btn Link for Top page ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_top_btn_link_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cms_top_btn_link_setting_control',
        array(
            'label' => __('btn Link', 'boutiq'),
            'section' => 'cms_section',
            'settings' => 'cms_top_btn_link_setting',
            'type'     => 'text',
        )
    );

    // Choose btn or Text ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_link_type',
        array(
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );

    $wp_customize->add_control(
        'cms_link_type_control',
        array(
            'label'    => __('CMS Link Design Setting', 'boutiq'),
            'section'  => 'cms_section',
            'settings' => 'cms_link_type',
            'type'     => 'select',
            'choices'  => array(
                '01'   => __('btn Type', 'boutiq'),
                '02'   => __('Text Type', 'boutiq'),
            ),
        )
    );

    // Single page layout ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_single_design_setting',
        array(
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );

    $wp_customize->add_control(
        'cms_single_design_setting_control',
        array(
            'label'    => __('CMS Single Design Setting', 'boutiq'),
            'section'  => 'cms_section',
            'settings' => 'cms_single_design_setting',
            'type'     => 'select',
            'choices'  => array(
                '01'   => __('CMS Single Type01', 'boutiq'),
                '02'   => __('CMS Single Type02', 'boutiq'),
                '03'   => __('CMS Single Type03', 'boutiq'),
                '04'   => __('CMS Single Type04', 'boutiq'),
                '05'   => __('CMS Single Type05', 'boutiq'),
                '06'   => __('CMS Single Type06', 'boutiq'),
                '07'   => __('CMS Single Type07', 'boutiq'),
            ),
        )
    );

    // Archive page layout ======================================================================================================================================================
    $wp_customize->add_setting(
        'archive_cms_design',
        array(
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'archive_cms_design_control',
        array(
            'label'    => __('CMS Archive Design Setting', 'boutiq'),
            'section'  => 'cms_section',
            'settings' => 'archive_cms_design',
            'type'     => 'select',
            'choices'  => array(
                '01'   => __('CMS Archive Type01', 'boutiq'),
                '02'   => __('CMS Archive Type02', 'boutiq'),
                '03'   => __('CMS Archive Type03', 'boutiq'),
                '04'   => __('CMS Archive Type04', 'boutiq'),
                '05'   => __('CMS Archive Type05', 'boutiq'),
                '06'   => __('CMS Archive Type06', 'boutiq'),
                '07'   => __('CMS Archive Type07', 'boutiq'),
                '08'   => __('CMS Archive Type08', 'boutiq'),
                '09'   => __('CMS Archive Type09', 'boutiq'),
            ),
        )
    );
}
