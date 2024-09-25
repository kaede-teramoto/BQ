<?php
/*
 * This is a configuration file for customizing sns.
 *
 * @package BOUTiQ
 */

/*--------------------------------------------------------------
SNS setting
--------------------------------------------------------------*/
add_action('customize_register', 'sns_setting');

function sns_setting($wp_customize)
{

    $priority = 300;
    $wp_customize->add_panel(
        'sns_panel',
        array(
            'priority'       => 39,
            'theme_supports' => '',
            'title'          => __('SNS Settings', 'boutiq'),
            'description'    => '',
        )
    );

    // SNS set ======================================================================================================================================================
    for ($i = 1; $i <= 5;) {

        $wp_customize->add_section(
            'sns_section_' . $i,
            array(
                'title'  => __('SNS 0', 'boutiq') . $i,
                'panel'  => 'sns_panel',
            )
        );

        $wp_customize->add_setting(
            'sns_name_' . $i,
            array(
                'default' => '',
                'type'    => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'sns_name_control' . $i,
            array(
                'label'    => __('Enter the name of your SNS', 'boutiq'),
                'section'  => 'sns_section_' . $i,
                'settings' => 'sns_name_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );

        $wp_customize->add_setting(
            'sns_' . $i,
            array(
                'default' => '',
                'type'    => 'theme_mod',
                'sanitize_callback' => 'esc_url_raw',
            )
        );
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'sns_image_' . $i,
            array(
                'label'    => __('SNS Image', 'boutiq'),
                'section'  => 'sns_section_' . $i,
                'settings' => 'sns_' . $i,
                'priority' => $priority,
            )
        ));

        $priority = $priority + 1;
        $wp_customize->add_setting(
            'sns_link_' . $i,
            array(
                'type'      => 'theme_mod',
                'default'   => '',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'sns_link_' . $i,
            array(
                'label'    => __('Please enter the link', 'boutiq'),
                'section'  => 'sns_section_' . $i,
                'settings' => 'sns_link_' . $i,
                'type'     => 'text',
                'priority' => $priority,
            )
        );
        $i++;
    }
}
