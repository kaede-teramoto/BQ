<?php
/*
 * This is a configuration file for customizing hamburger menu.
 *
 * @package BOUTiQ
 */

/*----------------------------------------------------------------------------------------------------------------------------
  Hamburger menu design settings
---------------------------------------------------------------------------------------------------------------------------- */
add_action('customize_register', 'atq_hm_design_setting');

function atq_hm_design_setting($wp_customize)
{

    $wp_customize->add_section(
        'atq_hm_section',
        array(
            'title' => __('Hamburger menu option', 'atq'), // セクションのタイトル
            'priority' => 31, // セクションの優先順位
            'transport'   => 'refresh',
        )
    );


    // デザイン選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_design_type',
        array(
            'type'           => 'theme_mod',
            'default' => '100', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_design_control',
        array(
            'label' => __('Hamburger menu Design Type', 'atq'), // コントロールのラベル
            'section' => 'atq_hm_section', // コントロールを追加するセクション
            'settings' => 'atq_hm_design_type', // コントロールの設定
            'type' => 'select', // コントロールの種類
            'choices' => array(
                '100' => __("Don't use hamburger menu", 'atq'),
                '00' => __('Set Original Hamburger menu', 'atq'),
                '01' => __('Hamburger menu Type1', 'atq'),
                '02' => __('Hamburger menu Type2', 'atq'),
                '03' => __('Hamburger menu Type3', 'atq'),
                '04' => __('Hamburger menu Type4', 'atq'),
                '05' => __('Hamburger menu Type5', 'atq'),
                '06' => __('Hamburger menu Type6', 'atq'),
                '07' => __('Hamburger menu Type7', 'atq'),
                '08' => __('Hamburger menu Type8', 'atq'),
            ),
        )
    );


    //=======================================================================================

    $wp_customize->add_section(
        'atq_hm_design',
        array(
            'title'          => esc_attr(__('Hamburger Icon Design Settings', 'atq')),
            'panel'  => 'site_default_panel',
            'transport'   => 'refresh',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_design_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '01',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_design_setting_control',
        array(
            'label' => __('Hamburger Icon Design Type', 'atq'), // コントロールのラベル
            'section' => 'atq_hm_section', // コントロールを追加するセクション
            'settings' => 'atq_hm_design_setting', // コントロールの設定
            'type' => 'select', // コントロールの種類
            'choices' => array(
                '01' => __('Hamburger Icon Design Type1', 'atq'),
                '02' => __('Hamburger Icon Design Type2', 'atq'),
                '03' => __('Hamburger Icon Design Type3', 'atq'),
                '04' => __('Hamburger Icon Design Type4', 'atq'),
                '05' => __('Hamburger Icon Design Type5', 'atq'),
                '06' => __('Hamburger Icon Design Type6', 'atq'),
                '07' => __('Hamburger Icon Design Type7', 'atq'),
                '08' => __('Hamburger Icon Design Type8', 'atq'),
                '09' => __('Hamburger Icon Design Type9', 'atq'),
                '10' => __('Hamburger Icon Design Type10', 'atq'),
            ),
        )
    );

    // 背景色選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_bg_color_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '#FFFFFF',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'atq_hm_bg_color_setting_control',
            array(
                'label' => esc_attr(__('Background Color for Hamburger Menu', 'atq')),
                'section' => 'atq_hm_section',
                'settings' => 'atq_hm_bg_color_setting',
            )
        )
    );

    // ハンバーガーメニュー内左側の画像の設定 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_left_image',
        array(
            'default' => '', // デフォルトの値
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw', // サニタイズコールバック関数
        )
    );

    // イメージコントロールの追加
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'atq_hm_left_image_control',
            array(
                'label' => __('Hamburger menu Left Image', 'atq'), // コントロールのラベル
                'section' => 'atq_hm_section', // コントロールを追加するセクション
                'settings' => 'atq_hm_left_image', // コントロールの設定
                //'width' => 180, // アップロードされる画像の幅
            )
        )
    );


    // BANNER01の設定 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner01_image',
        array(
            'default' => '', // デフォルトの値
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw', // サニタイズコールバック関数
        )
    );

    // イメージコントロールの追加
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'atq_hm_banner01_image_control',
            array(
                'label' => 'バナー①の背景画像', //__('Set the banner background image', 'atq'), // コントロールのラベル
                'section' => 'atq_hm_section', // コントロールを追加するセクション
                'settings' => 'atq_hm_banner01_image', // コントロールの設定
                //'width' => 180, // アップロードされる画像の幅
            )
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner01_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_banner01_text_control',
        array(
            'label' => esc_attr(__('If you want the first banner, please enter the text', 'atq')),
            'description' => esc_attr(__('Set when design type 07 and type 08', 'atq')),
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_banner01_text',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner01_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_banner01_link_control',
        array(
            'label' => esc_attr(__('Enter the banner link destination', 'atq')),
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_banner01_link',
            'type'     => 'text',
        )
    );

    // buttonのtarget ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner01_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_hm_banner01_link_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_banner01_link_target_setting', // コントロールの設定
            'label' => 'ボタンを別タブで表示する', //__('Add an underline', 'atq'), // コントロールのラベル
        )
    );


    // BANNER02の設定 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner02_image',
        array(
            'default' => '', // デフォルトの値
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw', // サニタイズコールバック関数
        )
    );

    // イメージコントロールの追加
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'atq_hm_banner02_image_control',
            array(
                'label' => 'バナー②の背景画像', //__('Set the banner background image', 'atq'), // コントロールのラベル
                'section' => 'atq_hm_section', // コントロールを追加するセクション
                'settings' => 'atq_hm_banner02_image', // コントロールの設定
                //'width' => 180, // アップロードされる画像の幅
            )
        )
    );


    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner02_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_banner02_text_control',
        array(
            'label' => esc_attr(__('If you want a second banner, please enter the text', 'atq')),
            'description' => esc_attr(__('Set when design type 07 and type 08', 'atq')),
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_banner02_text',
            'type'     => 'text',
        )
    );


    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner02_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_banner02_link_control',
        array(
            'label' => esc_attr(__('Enter the banner link destination', 'atq')),
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_banner02_link',
            'type'     => 'text',
        )
    );

    // buttonのtarget ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_banner02_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_hm_banner02_link_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_banner02_link_target_setting', // コントロールの設定
            'label' => 'ボタンを別タブで表示する', //__('Add an underline', 'atq'), // コントロールのラベル
        )
    );

    // ロゴの設定 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_logo_image',
        array(
            'default' => '', // デフォルトの値
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw', // サニタイズコールバック関数
        )
    );

    // イメージコントロールの追加
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'atq_hm_logo_image_control',
            array(
                'label' => __('Hamburger menu Logo Image', 'atq'), // コントロールのラベル
                'description' => esc_attr(__('If not entered, the image set in the header will be used', 'atq')),
                'section' => 'atq_hm_section', // コントロールを追加するセクション
                'settings' => 'atq_hm_logo_image', // コントロールの設定
                //'width' => 180, // アップロードされる画像の幅
            )
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_button_text',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_button_text_control',
        array(
            'label' => esc_attr(__('Enter text if a button is needed', 'atq')),
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_button_text',
            'type'     => 'text',
        )
    );


    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_button_link',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_hm_button_link_control',
        array(
            'label' => esc_attr(__('Enter the button link destination', 'atq')),
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_button_link',
            'type'     => 'text',
        )
    );

    // buttonのtarget ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_hm_button_link_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_hm_button_link_target_target_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_hm_section',
            'settings' => 'atq_hm_button_link_target_setting', // コントロールの設定
            'label' => 'ボタンを別タブで表示する', //__('Add an underline', 'atq'), // コントロールのラベル
        )
    );
}
