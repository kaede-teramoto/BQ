<?php
/*
 * This is a configuration file for customizing top pages.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
Top Page
--------------------------------------------------------------*/
add_action('customize_register', 'atq_customize_register');
function atq_customize_register($wp_customize)
{
    // Customizeの項目設定
    $priority = 300;
    $wp_customize->add_panel(
        'panel_id',
        array(
            'priority'       => 34,
            'theme_supports' => '',
            'title'          => esc_attr(__('Top Page Settings', 'atq')),
            'description'    => '',
            //'capability'     => 'edit_theme_options', 権限を編集者以上に指定
        )
    );

    // スライドの設定用パネルの追加
    $wp_customize->add_section(
        'atq_fv_image_section',
        array(
            'title'          => esc_attr(__('Slide Image Setting', 'atq')),
            'priority'       => 30,
            'panel'  => 'panel_id',
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_mainvisu_type',
        array(
            'default' => 'Show Page title', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_mainvisu_type_control',
        array(
            'label'    => __('First view settings', 'atq'), // コントロールのラベル
            'section'  => 'atq_fv_image_section', // コントロールを追加するセクション
            'settings' => 'atq_mainvisu_type', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                '01'     => __('Show Page title', 'atq'),
                '02'     => __('Show default slider', 'atq'),
                '03'      => __('Show the original slider', 'atq'),
                '00'      => __('Show nothing', 'atq'),
            ),
        )
    );

    // // Show Pagination ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'atq_slider_position',
    //     array(
    //         'default' => '', // デフォルトの選択
    //         'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
    //         'type' => 'theme_mod',
    //     )
    // );
    // $wp_customize->add_control(
    //     'atq_slider_position_control',
    //     array(
    //         'type' => 'checkbox',
    //         'section' => 'atq_fv_image_section',
    //         'settings' => 'atq_slider_position', // コントロールの設定
    //         'label' => __('', 'atq'),
    //     )
    // );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_mainvisu_slider_option',
        array(
            'default' => 'fade', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_mainvisu_slider_option_control',
        array(
            'label'    => __('Change Effect', 'atq'), // コントロールのラベル
            'section'  => 'atq_fv_image_section', // コントロールを追加するセクション
            'settings' => 'atq_mainvisu_slider_option', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                'fade'      => __('Fade', 'atq'),
                'slide'     => __('Slide', 'atq'),
                'cube'      => __('Cube', 'atq'),
                'coverflow' => __('Coverflow', 'atq'),
                'flip'      => __('Flip', 'atq'),
                'cards'     => __('Cards', 'atq'),
            ),
        )
    );

    // Change Effect ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_mainvisu_text_animation',
        array(
            'default' => 'fade', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_mainvisu_text_animation_control',
        array(
            'label'    => 'ファーストビュー画像に配置するアニメーションのテキストの種類を選択します', // コントロールのラベル
            //'label'    => __('Select the type of text for animation to place on the first view image', 'atq'), // コントロールのラベル
            'section'  => 'atq_fv_image_section', // コントロールを追加するセクション
            'settings' => 'atq_mainvisu_text_animation', // コントロールの設定
            'type'     => 'select', // コントロールの種類
            'choices'  => array(
                'fade'    => __('Fade In', 'atq'),
                'top'    => __('From top', 'atq'),
                'bottom'    => __('From bottom', 'atq'),
                'left'    => __('From left', 'atq'),
                'right'    => __('From right', 'atq'),
                'fill'    => __('Text display from solid fill', 'atq'),
            ),
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_fv_height_size_pc',
        array(
            'type' => 'theme_mod',
            'default'     => '80vh',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'atq_fv_height_size_pc_control',
        array(
            'label'    => esc_attr(__('First view height for PC', 'atq')),
            'description'    => esc_attr(__('Enter the unit. Example: px, vh', 'atq')),
            'section'  => 'atq_fv_image_section',
            'settings' => 'atq_fv_height_size_pc',
            'type'     => 'text',
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_fv_height_size_tab',
        array(
            'type' => 'theme_mod',
            'default'     => '70vh',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'atq_fv_height_size_tab_control',
        array(
            'label'    => esc_attr(__('First view height for Tablet', 'atq')),
            'description'    => esc_attr(__('Enter the unit. Example: px, vh', 'atq')),
            'section'  => 'atq_fv_image_section',
            'settings' => 'atq_fv_height_size_tab',
            'type'     => 'text',
        )
    );

    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_fv_height_size_sp',
        array(
            'type' => 'theme_mod',
            'default'     => '50vh',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'atq_fv_height_size_sp_control',
        array(
            'label'    => esc_attr(__('First view height for SP', 'atq')),
            'description'    => esc_attr(__('Enter the unit. Example: px, vh', 'atq')),
            'section'  => 'atq_fv_image_section',
            'settings' => 'atq_fv_height_size_sp',
            'type'     => 'text',
        )
    );
    // First view height ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_fv_slider_speed',
        array(
            'type' => 'theme_mod',
            'default'     => '3000',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'atq_fv_slider_speed_control',
        array(
            'label'    => 'スライダーのスピードを設定する',
            //'label'    => esc_attr(__('Slider speed', 'atq')),
            'description'    => '1秒1000です。2秒でスライドを変更したい時は2000と記載します',
            //'description'    => esc_attr(__('The unit is seconds and a decimal point can be used', 'atq')),
            'section'  => 'atq_fv_image_section',
            'settings' => 'atq_fv_slider_speed',
            'type'     => 'text',
        )
    );


    // Show Arrow ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_slider_arrow',
        array(
            'default' => '', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_slider_arrow_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_fv_image_section',
            'settings' => 'atq_slider_arrow', // コントロールの設定
            'label' => __('Show Arrow', 'atq'),
        )
    );

    // Show Pagination ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_slider_pagination',
        array(
            'default' => '', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_slider_pagination_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_fv_image_section',
            'settings' => 'atq_slider_pagination', // コントロールの設定
            'label' => __('Show Pagination', 'atq'),
        )
    );

    // Change Progress Bar ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_slider_progressbar',
        array(
            'default' => '', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );
    $wp_customize->add_control(
        'atq_slider_progressbar_control',
        array(
            'type' => 'checkbox',
            'section' => 'atq_fv_image_section',
            'settings' => 'atq_slider_progressbar', // コントロールの設定
            'label' => __('Change Progress Bar', 'atq'),
            'description' => __('"Show pagination" must be turned on', 'atq'),
        )
    );

    // Slider Custom CSS ======================================================================================================================================================
    $wp_customize->add_setting(
        'atq_slider_css',
        array(
            'default'           => '', // デフォルトの選択
            'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
            'type' => 'theme_mod',
        )
    );

    $wp_customize->add_control(
        'atq_slider_css_control',
        array(
            'type'        => 'textarea',
            'section'     => 'atq_fv_image_section',
            'settings'    => 'atq_slider_css', // コントロールの設定
            'label'       => __('Slider Custom CSS', 'atq'), // コントロールのラベル
        )
    );



    // slide image set ======================================================================================================================================================

    for ($i = 1; $i <= 5;) {

        $wp_customize->add_section(
            'atq_fv_image_' . $i,
            array(
                'title'          => esc_attr(__('Slide Image', 'atq')) . $i,
                'panel'  => 'panel_id',
            )
        );
        $wp_customize->add_setting(
            'atq_fv_image_' . $i,
            array(
                'default'  => '',
                'type'     => 'theme_mod',
                'sanitize_callback' => 'esc_url_raw',
                //'capability'     => 'edit_theme_options', 権限を編集者以上に指定
            )
        );
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'main_Image_' . $i,
            array(
                'label'     => esc_attr(__('Image', 'atq')) . $i,
                'section'   => 'atq_fv_image_' . $i,
                'settings'  => 'atq_fv_image_' . $i,
                'priority' => $priority,
            )
        ));


        $priority = $priority + 1;
        $wp_customize->add_setting(
            'atq_fv_heading_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_content',
            )
        );
        $wp_customize->add_control(
            'atq_fv_heading_' . $i,
            array(
                'label'    => esc_attr(__('If you put text for heading on image', 'atq')),
                'section'  => 'atq_fv_image_' . $i,
                'settings' => 'atq_fv_heading_' . $i,
                'type'     => 'textarea',
                'priority' => $priority,
            )
        );

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'atq_fv_text_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_content',
            )
        );
        $wp_customize->add_control(
            'atq_fv_text_' . $i,
            array(
                'label'    => esc_attr(__('If you put text for description on image', 'atq')),
                'section'  => 'atq_fv_image_' . $i,
                'settings' => 'atq_fv_text_' . $i,
                'type'     => 'textarea',
                'priority' => $priority,
            )
        );

        // 背景色選択 ======================================================================================================================================================
        $priority = $priority + 1;
        $wp_customize->add_setting(
            'atq_fv_text_color' . $i,
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
                'atq_fv_text_color' . $i,
                array(
                    'label' => esc_attr(__('Text Color', 'atq')),
                    'section'  => 'atq_fv_image_' . $i,
                    'settings' => 'atq_fv_text_color' . $i,
                    'priority' => $priority,
                )
            )
        );

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'atq_fv_text_bottom_position_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'atq_fv_text_bottom_position_' . $i,
            array(
                'label'    => esc_attr(__('Position from bottom of text(%)', 'atq')),
                'section'  => 'atq_fv_image_' . $i,
                'settings' => 'atq_fv_text_bottom_position_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );


        $priority = $priority + 1;
        $wp_customize->add_setting(
            'atq_fv_text_left_position_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'atq_fv_text_left_position_' . $i,
            array(
                'label'    => esc_attr(__('Position from left of text(%)', 'atq')),
                'section'  => 'atq_fv_image_' . $i,
                'settings' => 'atq_fv_text_left_position_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'atq_fv_link_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'atq_fv_link_' . $i,
            array(
                'label'    => esc_attr(__('If you put a link to the image', 'atq')),
                'section'  => 'atq_fv_image_' . $i,
                'settings' => 'atq_fv_link_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );

        $priority = $priority + 1;
        // Setting ======================================================================================================================================================
        $wp_customize->add_setting(
            'atq_fv_link_target_' . $i,
            array(
                'type' => 'theme_mod',
                'default'     => '',
                'transport'   => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'atq_fv_link_target_' . $i,
            array(
                'type' => 'checkbox',
                'section'  => 'atq_fv_image_' . $i,
                'settings' => 'atq_fv_link_target_' . $i,
                'label' => __('Open in new tab', 'atq'),
                'priority' => $priority,
            )
        );
        $i++;
    }

    // // スライドの設定用パネルの追加
    // $wp_customize->add_section(
    //     'cms_top_cms',
    //     array(
    //         'title'          => esc_attr(__('CMS Setting for Top Page', 'atq')),
    //         'priority'       => 400,
    //         'panel'  => 'panel_id',
    //     )
    // );

    // $wp_customize->add_setting(
    //     'cms_top_display',
    //     array(
    //         'type'           => 'theme_mod',
    //         'default' => false, // デフォルト値はfalse
    //         'sanitize_callback' => 'wp_validate_boolean', // サニタイズコールバック関数
    //     )
    // );

    // $wp_customize->add_control(
    //     'cms_top_display_control',
    //     array(
    //         'type' => 'checkbox',
    //         'section' => 'cms_top_cms',
    //         'settings' => 'cms_top_display', // コントロールの設定
    //         'label' => __('Show CMS', 'atq'), // コントロールのラベル
    //     )
    // );

    // // Setting ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_top_num_setting',
    //     array(
    //         'type' => 'theme_mod',
    //         'default'     => '10',
    //         'transport'   => 'refresh',
    //         'sanitize_callback' => 'sanitize_text_field',
    //     )
    // );
    // // Control ======================================================================================================================================================
    // $wp_customize->add_control(
    //     'cms_top_num_setting_control',
    //     array(
    //         'label' => esc_attr(__('Number of articles displayed', 'atq')),
    //         'section' => 'cms_top_cms',
    //         'settings' => 'cms_top_num_setting',
    //         'type'     => 'text',
    //     )
    // );

    // // Change Effect ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_top_design_setting',
    //     array(
    //         'default' => '01', // デフォルトの選択
    //         'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
    //         'type' => 'theme_mod',
    //     )
    // );
    // $wp_customize->add_control(
    //     'cms_top_design_setting_control',
    //     array(
    //         'label'    => __('CMS Archive Design Setting', 'atq'), // コントロールのラベル
    //         'section'  => 'cms_top_cms', // コントロールを追加するセクション
    //         'settings' => 'cms_top_design_setting', // コントロールの設定
    //         'type'     => 'select', // コントロールの種類
    //         'choices'  => array(
    //             '01'   => __('CMS Type01', 'atq'),
    //             '02'   => __('CMS Type02', 'atq'),
    //             '03'   => __('CMS Type03', 'atq'),
    //             '04'   => __('CMS Type04', 'atq'),
    //             '05'   => __('CMS Type05', 'atq'),
    //             '06'   => __('CMS Type06', 'atq'),
    //         ),
    //     )
    // );

    // // Change Effect ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_single_design_setting',
    //     array(
    //         'default' => '01', // デフォルトの選択
    //         'sanitize_callback' => 'sanitize_text_field', // サニタイズコールバック関数
    //         'type' => 'theme_mod',
    //     )
    // );
    // $wp_customize->add_control(
    //     'cms_single_design_setting_control',
    //     array(
    //         'label'    => __('CMS Single Design Setting', 'atq'), // コントロールのラベル
    //         'section'  => 'cms_top_cms', // コントロールを追加するセクション
    //         'settings' => 'cms_single_design_setting', // コントロールの設定
    //         'type'     => 'select', // コントロールの種類
    //         'choices'  => array(
    //             '01'   => __('CMS Single Type01', 'atq'),
    //             '02'   => __('CMS Single Type02', 'atq'),
    //             '03'   => __('CMS Single Type03', 'atq'),
    //             '04'   => __('CMS Single Type04', 'atq'),
    //             '05'   => __('CMS Single Type05', 'atq'),
    //             '06'   => __('CMS Single Type06', 'atq'),
    //         ),
    //     )
    // );

    // // Setting ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_top_main_title_setting',
    //     array(
    //         'type' => 'theme_mod',
    //         'default'     => '',
    //         'transport'   => 'refresh',
    //         'sanitize_callback' => 'sanitize_text_field',
    //     )
    // );
    // // Control ======================================================================================================================================================
    // $wp_customize->add_control(
    //     'cms_top_main_title_setting_control',
    //     array(
    //         'label' => esc_attr(__('CMS Main Title', 'atq')),
    //         'section' => 'cms_top_cms',
    //         'settings' => 'cms_top_main_title_setting',
    //         'type'     => 'text',
    //     )
    // );

    // // Setting ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_top_sub_title_setting',
    //     array(
    //         'type' => 'theme_mod',
    //         'default'     => '',
    //         'transport'   => 'refresh',
    //         'sanitize_callback' => 'sanitize_text_field',
    //     )
    // );
    // // Control ======================================================================================================================================================
    // $wp_customize->add_control(
    //     'cms_top_sub_title_setting_control',
    //     array(
    //         'label' => esc_attr(__('CMS Sub Title', 'atq')),
    //         'section' => 'cms_top_cms',
    //         'settings' => 'cms_top_sub_title_setting',
    //         'type'     => 'text',
    //     )
    // );

    // // Setting ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_top_btn_setting',
    //     array(
    //         'type' => 'theme_mod',
    //         'default'     => '',
    //         'transport'   => 'refresh',
    //         'sanitize_callback' => 'sanitize_text_field',
    //     )
    // );
    // // Control ======================================================================================================================================================
    // $wp_customize->add_control(
    //     'cms_top_btn_setting_control',
    //     array(
    //         'label' => esc_attr(__('Button Text', 'atq')),
    //         'section' => 'cms_top_cms',
    //         'settings' => 'cms_top_btn_setting',
    //         'type'     => 'text',
    //     )
    // );

    // // Setting ======================================================================================================================================================
    // $wp_customize->add_setting(
    //     'cms_top_btn_link_setting',
    //     array(
    //         'type' => 'theme_mod',
    //         'default'     => '',
    //         'transport'   => 'refresh',
    //         'sanitize_callback' => 'sanitize_text_field',
    //     )
    // );
    // // Control ======================================================================================================================================================
    // $wp_customize->add_control(
    //     'cms_top_btn_link_setting_control',
    //     array(
    //         'label' => esc_attr(__('Button Link', 'atq')),
    //         'section' => 'cms_top_cms',
    //         'settings' => 'cms_top_btn_link_setting',
    //         'type'     => 'text',
    //     )
    // );
}

// Set css for customizer  ======================================================================================================================================================
function atq_customize_fv_css()
{
    $fv_height_pc = esc_attr(get_theme_mod('atq_fv_height_size_pc', ''));
    $fv_height_tab = esc_attr(get_theme_mod('atq_fv_height_size_tab', ''));
    $fv_height_sp = esc_attr(get_theme_mod('atq_fv_height_size_sp', ''));

?>
    <style type="text/css">
        .p-top {
            height: <?php echo $fv_height_pc ?>;
        }

        @media screen and (max-width: 849px) {
            .p-top {
                height: <?php echo $fv_height_tab ?>;
            }
        }

        @media screen and (max-width: 599px) {
            .p-top {
                height: <?php echo $fv_height_sp ?>;
            }
        }
    </style>

<?php
}
add_action('wp_head', 'atq_customize_fv_css');
