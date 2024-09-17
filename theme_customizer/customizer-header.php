<?php
/*
 * This is a configuration file for customizing header.
 *
 * @package BOUTiQ
 */

function custom_customize_register($wp_customize)
{
    // セクションの追加
    $wp_customize->add_section(
        'atq_header_section',
        array(
            'title' => __('Header option', 'atq'), // セクションのタイトル
            'priority' => 30, // セクションの優先順位
            'transport'   => 'refresh',
        )
    );

    // ロゴの設定 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_logo_image',
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
            'atq_logo_image_control',
            array(
                'label' => __('Logo Image', 'atq'), // コントロールのラベル
                'section' => 'atq_header_section', // コントロールを追加するセクション
                'settings' => 'atq_logo_image', // コントロールの設定
                //'width' => 180, // アップロードされる画像の幅
            )
        )
    );

    // デザイン選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'header_design_setting',
        array(
            'type'           => 'theme_mod',
            'default' => 'type1', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'header_design_control',
        array(
            'label' => __('Design Type', 'atq'), // コントロールのラベル
            'section' => 'atq_header_section', // コントロールを追加するセクション
            'settings' => 'header_design_setting', // コントロールの設定
            'type' => 'select', // コントロールの種類
            'choices' => array(
                '01' => __('Header Type1', 'atq'),
                '02' => __('Header Type2', 'atq'),
                '03' => __('Header Type3', 'atq'),
                '04' => __('Header Type4', 'atq'),
                '05' => __('Header Type5', 'atq'),
                '06' => __('Header Type6', 'atq'),
                '07' => __('Header Type7', 'atq'),
                '08' => __('Header Type8', 'atq'),
                '09' => __('Header Type9', 'atq'),
                '10' => __('Header Type10', 'atq'),
                '11' => __('Header Type11', 'atq'),
                '12' => __('Header Type12', 'atq'),
            ),
        )
    );

    // カード選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_header_card',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_header_card_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_header_section',
            'settings' => 'atq_header_card', // コントロールの設定
            'label' => __('Set to card type', 'atq'),
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_card_radius_pc_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '12',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_card_radius_pc_setting_control',
        array(
            'label' => esc_attr(__('Set card corner radius for PC (px)', 'atq')),
            'section' => 'atq_header_section',
            'settings' => 'atq_card_radius_pc_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_card_radius_tab_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '10',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_card_radius_tab_setting_control',
        array(
            'label' => esc_attr(__('Set card corner radius for Tablet (px)', 'atq')),
            'section' => 'atq_header_section',
            'settings' => 'atq_card_radius_tab_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_card_radius_sp_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '8',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_card_radius_sp_setting_control',
        array(
            'label' => esc_attr(__('Set card corner radius for SP (px)', 'atq')),
            'section' => 'atq_header_section',
            'settings' => 'atq_card_radius_sp_setting',
            'type'     => 'text',
        )
    );

    // リンク色選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_header_text_color_setting',
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
            'atq_header_text_color_setting_control',
            array(
                'label' => esc_attr(__('Header Link Text Color', 'atq')),
                'section' => 'atq_header_section',
                'settings' => 'atq_header_text_color_setting',
            )
        )
    );

    // 背景色選択 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_header_bg_color_setting',
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
            'atq_header_bg_color_setting_control',
            array(
                'label' => esc_attr(__('Header Background Color', 'atq')),
                'section' => 'atq_header_section',
                'settings' => 'atq_header_bg_color_setting',
            )
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_header_bg_gradation_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_header_bg_gradation_setting_control',
        array(
            'label' => '背景色にグラデーションを設定したい場合はこちらに入力してください。',
            'section' => 'atq_header_section',
            'settings' => 'atq_header_bg_gradation_setting',
            'type'     => 'text',
            'description' => wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a>'),
        )
    );

    // アンダーラインの有無 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_header_under_line',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_header_under_line_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_header_section',
            'settings' => 'atq_header_under_line', // コントロールの設定
            'label' => __('Add an underline', 'atq'), // コントロールのラベル
        )
    );

    // フィルターの有無 ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_header_filter',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_header_filter_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_header_section',
            'settings' => 'atq_header_filter', // コントロールの設定
            'label' => __('Add blur processing', 'atq'), // コントロールのラベル
        )
    );


    // プログレスバーオプションの追加
    $wp_customize->add_setting(
        'atq_progress_bar_option',
        array(
            'type'           => 'theme_mod',
            'default' => '0', // デフォルトの値
            'sanitize_callback' => 'absint', // サニタイズコールバック関数
        )
    );

    // プログレスバーコントロールの追加
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'atq_progress_bar_control',
            array(
                'label' => __('Adjust the blur ratio', 'atq'), // コントロールのラベル
                'section' => 'atq_header_section', // コントロールを追加するセクション
                'settings' => 'atq_progress_bar_option', // コントロールの設定
                'type' => 'progress-bar', // カスタムコントロールのタイプ
            )
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_btn_text_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_btn_text_setting_control',
        array(
            'label' => 'ボタンのテキスト',
            'section' => 'atq_header_section',
            'settings' => 'atq_btn_text_setting',
            'type'     => 'text',
        )
    );

    // Setting ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_btn_url_setting',
        array(
            'type' => 'theme_mod',
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // Control ======================================================================================================================================================
    $wp_customize->add_control(
        'atq_btn_url_setting_control',
        array(
            'label' => 'ボタンのリンク',
            'section' => 'atq_header_section',
            'settings' => 'atq_btn_url_setting',
            'type'     => 'text',
        )
    );


    // buttonのtarget ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_btn_target_setting',
        array(
            'type'           => 'theme_mod',
            'default' => false, // デフォルト値はfalse
            'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
        )
    );

    $wp_customize->add_control(
        'atq_btn_target_setting_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_header_section',
            'settings' => 'atq_btn_target_setting', // コントロールの設定
            'label' => 'ボタンを別タブで表示する', //__('Add an underline', 'atq'), // コントロールのラベル
        )
    );
}
add_action('customize_register', 'custom_customize_register');
