<?php
/*
 * This is a configuration file for customizing cms.
 *
 * @package BOUTiQ
 */

add_action('customize_register', 'atq_cms_register');
function atq_cms_register($wp_customize)
{

    // セクションの追加
    $wp_customize->add_section(
        'atq_cms_section',
        array(
            'title' => __('CMS Setting', 'atq'), // セクションのタイトル
            'priority' => 35, // セクションの優先順位
            'transport'   => 'refresh',
        )
    );
    // CMS 表示設定
    $wp_customize->add_setting(
        'atq_top_cms_display',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_top_cms_display_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_cms_section',
            'settings' => 'atq_top_cms_display', // コントロールの設定
            'label' => __('Show CMS', 'atq'), // コントロールのラベル
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_design_setting',
        array(
            'default' => '01', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_top_cms_design_setting_control',
        array(
            'label'    => __('CMS TOP Design Setting', 'atq'), // コントロールのラベル
            'section'  => 'atq_cms_section', // コントロールを追加するセクション
            'settings' => 'atq_top_cms_design_setting', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                '01'   => __('CMS Type01', 'atq'),
                '02'   => __('CMS Type02', 'atq'),
                '03'   => __('CMS Type03', 'atq'),
                '04'   => __('CMS Type04', 'atq'),
                '05'   => __('CMS Type05', 'atq'),
                '06'   => __('CMS Type06', 'atq'),
            ),
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_single_design_setting',
        array(
            'default' => '01', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_top_cms_single_design_setting_control',
        array(
            'label'    => __('CMS Single Design Setting', 'atq'), // コントロールのラベル
            'section'  => 'atq_cms_section', // コントロールを追加するセクション
            'settings' => 'atq_top_cms_single_design_setting', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                '01'   => __('CMS Single Type01', 'atq'),
                '02'   => __('CMS Single Type02', 'atq'),
                '03'   => __('CMS Single Type03', 'atq'),
                '04'   => __('CMS Single Type04', 'atq'),
                '05'   => __('CMS Single Type05', 'atq'),
                '06'   => __('CMS Single Type06', 'atq'),
            ),
        )
    );



    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_num_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '10',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'atq_top_cms_num_setting_control',
        array(
            'label' => esc_attr(__('Number of articles displayed', 'atq')),
            'section' => 'atq_cms_section',
            'settings' => 'atq_top_cms_num_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_main_title_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_top_cms_main_title_setting_control',
        array(
            'label' => esc_attr(__('CMS Main Title', 'atq')),
            'section' => 'atq_cms_section',
            'settings' => 'atq_top_cms_main_title_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_sub_title_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_top_cms_sub_title_setting_control',
        array(
            'label' => esc_attr(__('CMS Sub Title', 'atq')),
            'section' => 'atq_cms_section',
            'settings' => 'atq_top_cms_sub_title_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_btn_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_top_cms_btn_setting_control',
        array(
            'label' => 'リンクのテキスト', //esc_attr(__('Button Text', 'atq')),
            'section' => 'atq_cms_section',
            'settings' => 'atq_top_cms_btn_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_top_cms_btn_link_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_top_cms_btn_link_setting_control',
        array(
            'label' => 'リンク先URL', //esc_attr(__('Button Link', 'atq')),
            'section' => 'atq_cms_section',
            'settings' => 'atq_top_cms_btn_link_setting',
            'type'     => 'text',
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'cms_link_type',
        array(
            'default' => '01', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'cms_link_type_control',
        array(
            'label'    => __('CMS Link Design Setting', 'atq'), // コントロールのラベル
            'section'  => 'atq_cms_section', // コントロールを追加するセクション
            'settings' => 'cms_link_type', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                '01'   => __('Button Type', 'atq'),
                '02'   => __('Text Type', 'atq'),
            ),
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'archive_cms_design',
        array(
            'default' => '01', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'archive_cms_design_control',
        array(
            'label'    => __('CMS Archive Design Setting', 'atq'), // コントロールのラベル
            'section'  => 'atq_cms_section', // コントロールを追加するセクション
            'settings' => 'archive_cms_design', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                '01'   => __('CMS Type01', 'atq'),
                '02'   => __('CMS Type02', 'atq'),
                '03'   => __('CMS Type03', 'atq'),
                '04'   => __('CMS Type04', 'atq'),
                '05'   => __('CMS Type05', 'atq'),
                '06'   => __('CMS Type06', 'atq'),
            ),
        )
    );
}
