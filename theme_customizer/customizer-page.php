<?php
/*
 * This is a configuration file for customizing pages.
 *
 * @package BOUTiQ
 */

function boutiq_page_design($wp_customize)
{

    $wp_customize->add_section(
        'boutiq_page_section',
        array(
            'title' => __('Page option', 'boutiq'),
            'priority' => 33,
            'transport'   => 'refresh',
        )
    );

    // Design setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'boutiq_page_design_setting',
        array(
            'type'           => 'theme_mod',
            'default' => 'titleAS00',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'page_design_control',
        array(
            'label' => __('Page Title Design', 'boutiq'),
            'section' => 'boutiq_page_section',
            'settings' => 'boutiq_page_design_setting',
            'type' => 'select',
            'choices' => array(
                'titleAS00' => __('Title_A-Screen_00', 'boutiq'),
                'titleAC00' => __('Title_A-Contents_00', 'boutiq'),
                'titleAR00' => __('Title_A-Right_00', 'boutiq'),
                'titleAL00' => __('Title_A-Left_00', 'boutiq'),
                'titleAP00' => __('Title_A-Photo_00', 'boutiq'),
                'titleAT00' => __('Title_A-Top_00', 'boutiq'),
                'titleAText00' => __('Title_A-Text_00', 'boutiq'),
                'titleBN00' => __('Title_B-Normal_00', 'boutiq'),
                'titleCN00' => __('Title_C-Normal_00', 'boutiq'),
                'titleCP00' => __('Title_C-Photo_00', 'boutiq'),
            ),
        )
    );

    // Page title design ======================================================================================================================================================
    $wp_customize->add_setting(
        'content_title_setting',
        array(
            'type'           => 'theme_mod',
            'default' => '01',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'content_title_setting_control',
        array(
            'label' => '下層ページのタイトルデザイン', //__('Content Title Design', 'boutiq'),
            'section' => 'boutiq_page_section',
            'settings' => 'content_title_setting',
            'type' => 'select',
            'choices' => array(
                '01' => __('Content Title1', 'boutiq'),
                '02' => __('Content Title2', 'boutiq'),
                '03' => __('Content Title3', 'boutiq'),
                '04' => __('Content Title4', 'boutiq'),
                '05' => __('Content Title5', 'boutiq'),
                '06' => __('Content Title6', 'boutiq'),
                '07' => __('Content Title7', 'boutiq'),
                '08' => __('Content Title8', 'boutiq'),
                '00' => 'オリジナルを作成する', //__('Content Title0', 'boutiq'),
            ),
        )
    );

    // Underline for top page title ======================================================================================================================================================
    $wp_customize->add_setting(
        'content_title_underline',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'content_title_underline_control',
        array(
            'type' => 'checkbox',
            'section' => 'boutiq_page_section',
            'settings' => 'content_title_underline',
            'label' => __('Add underline to content title', 'boutiq'),
        )
    );

    // underline color ======================================================================================================================================================
    $wp_customize->add_setting(
        'content_title_underline_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#999999',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'content_title_underline_color_control',
            array(
                'label' => esc_attr(__('Underline Color', 'boutiq')),
                'section'  => 'boutiq_page_section',
                'settings' => 'content_title_underline_color',
            )
        )
    );

    // underline width ======================================================================================================================================================
    $wp_customize->add_setting(
        'content_title_underline_width',
        array(
            'type' => 'theme_mod',
            'default'     => '2px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'content_title_underline_width_control',
        array(
            'label' => esc_attr(__('Set Underline thickness (px)', 'boutiq')),
            'section' => 'boutiq_page_section',
            'settings' => 'content_title_underline_width',
            'type'     => 'text',
        )
    );


    // PC用コーナー角度 ======================================================================================================================================================
    $wp_customize->add_setting(
        'boutiq_page_radius_pc_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '12px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'boutiq_page_radius_pc_setting_control',
        array(
            'label' => esc_attr(__('Set corner radius for PC (px)', 'boutiq')),
            'section' => 'boutiq_page_section',
            'settings' => 'boutiq_page_radius_pc_setting',
            'type'     => 'text',
        )
    );

    // TAB用コーナー角度 ======================================================================================================================================================
    $wp_customize->add_setting(
        'boutiq_page_radius_tab_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '10px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'boutiq_page_radius_tab_setting_control',
        array(
            'label' => esc_attr(__('Set corner radius for Tablet (px)', 'boutiq')),
            'section' => 'boutiq_page_section',
            'settings' => 'boutiq_page_radius_tab_setting',
            'type'     => 'text',
        )
    );

    // SP用コーナー角度 ======================================================================================================================================================
    $wp_customize->add_setting(
        'boutiq_page_radius_sp_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '8px',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'boutiq_page_radius_setting_sp_control',
        array(
            'label' => esc_attr(__('Set corner radius for SP (px)', 'boutiq')),
            'section' => 'boutiq_page_section',
            'settings' => 'boutiq_page_radius_sp_setting',
            'type'     => 'text',
        )
    );
}
add_action('customize_register', 'boutiq_page_design');
