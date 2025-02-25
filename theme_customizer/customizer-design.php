<?php
/*
 * This is a configuration file for customizing default design.
 *
 * @package BOUTiQ
 */
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

  //=======================================================================================
  // Set panel for color ==================================================================
  $wp_customize->add_section(
    'site_default_setting',
    array(
      'title'          => __('Color Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
    )
  );

  // Text Color Setting ====================================================================
  $wp_customize->add_setting(
    'site_default_text_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#393939',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_text_color',
    array(
      'label' => __('Text Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_text_color',
    )
  ));

  // Main Color Setting ===================================================================
  $wp_customize->add_setting(
    'site_default_main_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#2641CF',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_main_color',
    array(
      'label' => __('Main Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_main_color',
    )
  ));
  // Accent Color Setting =================================================================
  $wp_customize->add_setting(
    'site_default_accent_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#666666',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_accent_color',
    array(
      'label' => __('Accent Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_accent_color',
    )
  ));

  // Base Color Setting ===================================================================
  $wp_customize->add_setting(
    'site_default_base_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#dddddd',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_base_color',
    array(
      'label' => __('Base Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_base_color',
    )
  ));

  // Sub Color Setting ====================================================================
  $wp_customize->add_setting(
    'site_default_sub_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#e8e8e8',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'site_default_sub_color',
    array(
      'label' => __('Sub Color', 'boutiq'),
      'section' => 'site_default_setting',
      'settings' => 'site_default_sub_color',
    )
  ));

  // Background Color Setting =============================================================
  $wp_customize->add_setting(
    'site_default_background_color',
    array(
      'type' => 'theme_mod',
      'default'     => '#ffffff',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

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
  // Set panel for Font ===================================================================
  $wp_customize->add_section(
    'font_setting',
    array(
      'title'          => __('Font Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );

  // Japanese Font Setting ================================================================
  $wp_customize->add_setting(
    'site_default_jp_text',
    array(
      'type' => 'theme_mod',
      'default'     => 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&family=Noto+Sans+JP:wght@100..900&display=swap',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'site_default_jp_text_control',
    array(
      'label' => __('Japanese Font', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'site_default_jp_text',
      'type'     => 'text',
    )
  );

  // Japanese Font Family Setting ==============================================================================
  $wp_customize->add_setting(
    'site_default_jp_fontFamily',
    array(
      'type' => 'theme_mod',
      'default'     => '"Noto Sans JP", YuGothic, "游ゴシック", "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'site_default_jp_fontFamily_control',
    array(
      'label' => __('Japanese Font Family', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'site_default_jp_fontFamily',
      'type'     => 'text',
    )
  );

  // European Font Setting ==============================================================================
  $wp_customize->add_setting(
    'site_default_en_text',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'site_default_en_text_control',
    array(
      'label' => __('European language Font', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'site_default_en_text',
      'type'     => 'text',
    )
  );

  // European Font Family Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_en_fontFamily',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'site_default_en_fontFamily_control',
    array(
      'label' => __('European Font Family', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'site_default_en_fontFamily',
      'type'     => 'text',
    )
  );

  // Heading Font Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_heading_text',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'site_default_heading_text_control',
    array(
      'label' => __('Heading Font', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'site_default_heading_text',
      'type'     => 'text',
    )
  );

  // Heading Font Family Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'site_default_heading_text_fontFamily',
    array(
      'type' => 'theme_mod',
      'default'     => '',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'site_default_heading_text_fontFamily_control',
    array(
      'label' => __('Heading Font Family', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'site_default_heading_text_fontFamily',
      'type'     => 'text',
    )
  );

  // Normal text font size for PC =======================================================================================
  $wp_customize->add_setting(
    'font_size_pc_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '16',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'font_size_pc_setting_control',
    array(
      'label' => __('Normal text font size for PC', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'font_size_pc_setting',
      'type'     => 'text',
    )
  );

  // Normal text font size for TAB ======================================================================================================================================================
  $wp_customize->add_setting(
    'font_size_tab_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '14',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'font_size_tab_setting_control',
    array(
      'label' => __('Normal text font size for TAB', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'font_size_tab_setting',
      'type'     => 'text',
    )
  );

  // // Normal text font size for SP ======================================================================================================================================================
  $wp_customize->add_setting(
    'font_size_sp_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '14',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'font_size_sp_setting_control',
    array(
      'label' => __('Normal text font size for SP', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'font_size_sp_setting',
      'type'     => 'text',
    )
  );

  // H1 text font size for PC =======================================================================================
  $wp_customize->add_setting(
    'heading_size_pc_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '40',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'heading_size_pc_setting_control',
    array(
      'label' => __('H1 text font size for PC', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'heading_size_pc_setting',
      'type'     => 'text',
    )
  );

  // H1 text font size for TAB ======================================================================================================================================================
  $wp_customize->add_setting(
    'heading_size_tab_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '35',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'heading_size_tab_setting_control',
    array(
      'label' => __('H1 text font size for TAB', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'heading_size_tab_setting',
      'type'     => 'text',
    )
  );

  // H1 text font size for SP ======================================================================================================================================================
  $wp_customize->add_setting(
    'heading_size_sp_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '30',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'heading_size_sp_setting_control',
    array(
      'label' => __('H1 text font size for SP', 'boutiq'),
      'section' => 'font_setting',
      'settings' => 'heading_size_sp_setting',
      'type'     => 'text',
    )
  );

  //=======================================================================================
  // btn Link Settings =======================================================================================
  $wp_customize->add_section(
    'common_btn_link',
    array(
      'title'          => (__('btn Link Settings', 'boutiq')),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );


  // btn Design ======================================================================================================================================================
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
      'label' => __('btn Link Design Type For common', 'boutiq'),
      'section' => 'common_btn_link',
      'settings' => 'common_btn_design_setting',
      'type' => 'select',
      'choices' => array(
        '01' => __('btn Link Type1', 'boutiq'),
        '02' => __('btn Link Type2', 'boutiq'),
        '03' => __('btn Link Type3', 'boutiq'),
        '04' => __('btn Link Type4', 'boutiq'),
        '05' => __('btn Link Type5', 'boutiq'),
        '06' => __('btn Link Type6', 'boutiq'),
        '07' => __('btn Link Type7', 'boutiq'),
        '08' => __('btn Link Type8', 'boutiq'),
        '09' => __('btn Link Type9', 'boutiq'),
        '10' => __('btn Link Type10', 'boutiq'),
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
      'label' => __('Icon design for buttons in page content', 'boutiq'),
      'section' => 'common_btn_link',
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


  //=======================================================================================
  // Set panel for text link ===================================================================
  $wp_customize->add_section(
    'font_link',
    array(
      'title'          => __('Text Link Settings', 'boutiq'),
      'panel'  => 'site_default_panel',
      'transport'   => 'refresh',
    )
  );

  // Setting ======================================================================================================================================================
  $wp_customize->add_setting(
    'text_link_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'text_link_setting_control',
    array(
      'label' => __('Text Link Design Type', 'boutiq'),
      'section' => 'font_link',
      'settings' => 'text_link_setting',
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
    'text_link_icon_setting',
    array(
      'type' => 'theme_mod',
      'default'     => '01',
      'transport'   => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'text_link_icon_setting_control',
    array(
      'label' => __('Text Link Icon Type', 'boutiq'),
      'section' => 'font_link',
      'settings' => 'text_link_icon_setting',
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
  // Set panel for Font ===================================================================
  //   $wp_customize->add_section(
  //     'boutiq_animation',
  //     array(
  //       'title'          => __('Animation Settings', 'boutiq'),
  //       'panel'  => 'site_default_panel',
  //       'transport'   => 'refresh',
  //     )
  //   );

  //   // Setting ======================================================================================================================================================
  //   $wp_customize->add_setting(
  //     'boutiq_animation_setting',
  //     array(
  //       'type' => 'theme_mod',
  //       'default'     => '01',
  //       'transport'   => 'refresh',
  //       'sanitize_callback' => 'sanitize_text_field',
  //     )
  //   );

  //   $wp_customize->add_control(
  //     'boutiq_animation_setting_control',
  //     array(
  //       'label' => __('Animation Type', 'boutiq'),
  //       'section' => 'boutiq_animation',
  //       'settings' => 'boutiq_animation_setting',
  //       'type' => 'select',
  //       'choices' => array(
  //         '01' => __('Animation Type1', 'boutiq'),
  //         '02' => __('Animation Type2', 'boutiq'),
  //         '03' => __('Animation Type3', 'boutiq'),
  //         '04' => __('Animation Type4', 'boutiq'),
  //         '05' => __('Animation Type5', 'boutiq'),
  //         '06' => __('Animation Type6', 'boutiq'),
  //       ),
  //     )
  //   );
}
