<?php
/*
 * This is a configuration file for customizing default design.
 *
 * @package BOUTiQ
 */

/*----------------------------------------------------------------------------------------------------------------------------
  Basic design settings
---------------------------------------------------------------------------------------------------------------------------- */
add_action('customize_register', 'site_design_settings');

function site_design_settings($wp_customize)
{

  $wp_customize->add_panel(
    'site_default_panel',
    array(
      'priority'       => 10,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Basic design settings', 'boutiq'),
      'description'    =>  '',
    )
  );

  // Set panel for color ======================================================================================================================================================
  $wp_customize->add_section(
    'site_default_setting',
    array(
      'title'          => __('Color Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
    )
  );
  // Setting ==============================================================================================================================================
  // Text Color ========================================================================================================================================
  $wp_customize->add_setting(
    'site_default_text_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#393939',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_text_color',
    array(
      'label' => esc_attr(__('Text Color', 'boutiq')),
      'section' => 'site_default_setting',
      'settings' => 'site_default_text_color',
    )
  ));

  // Setting ==============================================================================================================================================
  // Main Color ====================================================================================================================================
  $wp_customize->add_setting(
    'site_default_main_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#2641CF',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_main_color',
    array(
      'label' => __('Main Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_main_color',
    )
  ));
  // Setting ==============================================================================================================================================
  // Accent Color
  $wp_customize->add_setting(
    'site_default_accent_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#666666',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_accent_color',
    array(
      'label' => __('Accent Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_accent_color',
    )
  ));

  // Setting ==============================================================================================================================================
  // Base Color ===========================================================================================================================================
  $wp_customize->add_setting(
    'site_default_base_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#dddddd',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_base_color',
    array(
      'label' => __('Base Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_base_color',
    )
  ));

  // Sub Color ===========================================================================================================================================
  $wp_customize->add_setting(
    'site_default_sub_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#e8e8e8',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_sub_color',
    array(
      'label' => __('Sub Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_sub_color',
    )
  ));

  // Setting ======================================================================================================================================================
  // Background Color  ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_background_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#ffffff',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_background_color',
    array(
      'label' => __('Background Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_background_color',
    )
  ));


  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  // Japanese Font =======================================================================================
  $wp_customize->add_section(
    'atq_text_setting',
    array(
      'title'          => __('Text Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_jp_text',
    array(
      'type' => 'theme_mod',
      'default'     => 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&family=Noto+Sans+JP:wght@100..900&display=swap',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'site_default_jp_text_control',
    array(
      'label' => __('Japanese Font', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'site_default_jp_text',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_jp_fontFamily',
    array(
      'type' => 'theme_mod',
      'default'     => '"Noto Sans JP", sans-serif',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'site_default_jp_fontFamily_control',
    array(
      'label' => __('Japanese Font Family', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'site_default_jp_fontFamily',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_en_text',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'site_default_en_text_control',
    array(
      'label' => __('European language Font', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'site_default_en_text',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_en_fontFamily',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'site_default_en_fontFamily_control',
    array(
      'label' => __('European Font Family', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'site_default_en_fontFamily',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_heading_text',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'site_default_heading_text_control',
    array(
      'label' => __('Heading Font', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'site_default_heading_text',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_heading_text_fontFamily',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'site_default_heading_text_fontFamily_control',
    array(
      'label' => __('Heading Font Family', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'site_default_heading_text_fontFamily',
      'type'     => 'text',
    )
  );

  // Normal text font size =======================================================================================
  //=======================================================================================
  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_pc_font_size_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '16',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_pc_font_size_setting_control',
    array(
      'label' => __('Normal text font size for PC', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'atq_pc_font_size_setting',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_tab_font_size_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '14',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_tab_font_size_setting_control',
    array(
      'label' => __('Normal text font size for TAB', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'atq_tab_font_size_setting',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_sp_font_size_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '14',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_sp_font_size_setting_control',
    array(
      'label' => __('Normal text font size for SP', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'atq_sp_font_size_setting',
      'type'     => 'text',
    )
  );

  // H1 text font size =======================================================================================
  //=======================================================================================
  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_pc_heading_size_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '40',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_pc_heading_size_setting_control',
    array(
      'label' => __('H1 text font size for PC', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'atq_pc_heading_size_setting',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_tab_heading_size_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '35',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_tab_heading_size_setting_control',
    array(
      'label' => __('H1 text font size for TAB', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'atq_tab_heading_size_setting',
      'type'     => 'text',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_sp_heading_size_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '30',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_sp_heading_size_setting_control',
    array(
      'label' => __('H1 text font size for SP', 'boutiq'),
      'section' => 'atq_text_setting',
      'settings' => 'atq_sp_heading_size_setting',
      'type'     => 'text',
    )
  );

  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  // Button Link Settings =======================================================================================
  $wp_customize->add_section(
    'atq_btn_link',
    array(
      'title'          => (__('Button Link Settings', 'boutiq')),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );


  // ボタン選択 ======================================================================================================================================================
  $wp_customize->add_setting(
    'common_btn_design_setting',
    array(
      'type'           => 'theme_mod',
      'default' => '01',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'common_btn_design_control',
    array(
      'label' => 'ページコンテンツ以外のボタンのデザイン', //__('Button Link Design Type For common', 'boutiq'),
      'section' => 'atq_btn_link',
      'settings' => 'common_btn_design_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Button Link Type1', 'boutiq'),
        '02' => __('Button Link Type2', 'boutiq'),
        '03' => __('Button Link Type3', 'boutiq'),
        '04' => __('Button Link Type4', 'boutiq'),
        '05' => __('Button Link Type5', 'boutiq'),
        '06' => __('Button Link Type6', 'boutiq'),
        '07' => __('Button Link Type7', 'boutiq'),
        '08' => __('Button Link Type8', 'boutiq'),
        '09' => __('Button Link Type9', 'boutiq'),
        '10' => __('Button Link Type10', 'boutiq'),
      ),
    )
  );


  // ボタン選択 ======================================================================================================================================================
  $wp_customize->add_setting(
    'common_btn_icon_setting',
    array(
      'type'           => 'theme_mod',
      'default' => '01',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'common_btn_icon_control',
    array(
      'label' => 'ページコンテンツ以外のボタンアイコンのデザイン', //__('Button Link Design Type For common', 'boutiq'),
      'section' => 'atq_btn_link',
      'settings' => 'common_btn_icon_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Icon Type1', 'boutiq'),
        '02' => __('Icon  Type2', 'boutiq'),
        '03' => __('Icon  Type3', 'boutiq'),
        '04' => __('Icon  Type4', 'boutiq'),
        '05' => __('Icon  Type5', 'boutiq'),
        '06' => __('Icon  Type6', 'boutiq'),
      ),
    )
  );


  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_btn_link_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_btn_link_setting_control',
    array(
      'label' => __('Button Link Design Type', 'boutiq'),
      'section' => 'atq_btn_link',
      'settings' => 'atq_btn_link_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Button Link Type1', 'boutiq'),
        '02' => __('Button Link Type2', 'boutiq'),
        '03' => __('Button Link Type3', 'boutiq'),
        '04' => __('Button Link Type4', 'boutiq'),
        '05' => __('Button Link Type5', 'boutiq'),
        '06' => __('Button Link Type6', 'boutiq'),
        '07' => __('Button Link Type7', 'boutiq'),
        '08' => __('Button Link Type8', 'boutiq'),
        '09' => __('Button Link Type9', 'boutiq'),
        '10' => __('Button Link Type10', 'boutiq'),
      ),
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_btn_link_icon_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_btn_link_icon_setting_control',
    array(
      'label' => __('Button Link Icon Type', 'boutiq'),
      'section' => 'atq_btn_link',
      'settings' => 'atq_btn_link_icon_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Icon Type1', 'boutiq'),
        '02' => __('Icon  Type2', 'boutiq'),
        '03' => __('Icon  Type3', 'boutiq'),
        '04' => __('Icon  Type4', 'boutiq'),
        '05' => __('Icon  Type5', 'boutiq'),
        '06' => __('Icon  Type6', 'boutiq'),
      ),
    )
  );


  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  $wp_customize->add_section(
    'atq_text_link',
    array(
      'title'          => __('Text Link Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_text_link_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_text_link_setting_control',
    array(
      'label' => __('Text Link Design Type', 'boutiq'),
      'section' => 'atq_text_link',
      'settings' => 'atq_text_link_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Text Link Type1', 'boutiq'),
        '02' => __('Text Link Type2', 'boutiq'),
        '03' => __('Text Link Type3', 'boutiq'),
        '04' => __('Text Link Type4', 'boutiq'),
        '05' => __('Text Link Type5', 'boutiq'),
        '06' => __('Text Link Type6', 'boutiq'),
        '07' => __('Text Link Type7', 'boutiq'),
        '08' => __('Text Link Type8', 'boutiq'),
        '09' => __('Text Link Type9', 'boutiq'),
        '10' => __('Text Link Type10', 'boutiq'),
        '11' => __('Text Link Type11', 'boutiq'),
        '12' => __('Text Link Type12', 'boutiq'),
      ),
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_text_link_icon_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_text_link_icon_setting_control',
    array(
      'label' => __('Text Link Icon Type', 'boutiq'),
      'section' => 'atq_text_link',
      'settings' => 'atq_text_link_icon_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Icon Type1', 'boutiq'),
        '02' => __('Icon  Type2', 'boutiq'),
        '03' => __('Icon  Type3', 'boutiq'),
        '04' => __('Icon  Type4', 'boutiq'),
        '05' => __('Icon  Type5', 'boutiq'),
        '06' => __('Icon  Type6', 'boutiq'),
        '07' => __('Icon  Type7', 'boutiq'),
        '08' => __('Icon  Type8', 'boutiq'),
        '09' => __('Icon  Type9', 'boutiq'),
        '10' => __('Icon  Type10', 'boutiq'),
        '11' => __('Icon  Type11', 'boutiq'),
        '12' => __('Icon  Type12', 'boutiq'),
        '13' => __('Icon  Type13', 'boutiq'),
        '14' => __('Icon  Type14', 'boutiq'),
      ),
    )
  );

  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  //=======================================================================================
  $wp_customize->add_section(
    'atq_animation',
    array(
      'title'          => __('Animation Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'atq_animation_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  // Control ======================================================================================================================================================
  $wp_customize->add_control(
    'atq_animation_setting_control',
    array(
      'label' => __('Animation Type', 'boutiq'),
      'section' => 'atq_animation',
      'settings' => 'atq_animation_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('Animation Type1', 'boutiq'),
        '02' => __('Animation Type2', 'boutiq'),
        '03' => __('Animation Type3', 'boutiq'),
        '04' => __('Animation Type4', 'boutiq'),
        '05' => __('Animation Type5', 'boutiq'),
        '06' => __('Animation Type6', 'boutiq'),
      ),
    )
  );
}
