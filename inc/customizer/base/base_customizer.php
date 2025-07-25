<?php

if (! class_exists('Base_Customizer')) {

    class Base_Customizer
    {
        protected $section_id;
        protected $section_title;
        protected $section_priority;
        protected $section_args;

        public function __construct($section_id, $section_title, $section_priority = 30, $section_args = array())
        {
            $this->section_id       = $section_id;
            $this->section_title    = $section_title;
            $this->section_priority = $section_priority;

            // default section args
            $this->section_args = array_merge(array(
                'title'    => $this->section_title,
                'priority' => $this->section_priority,
                'transport' => 'refresh',
            ), $section_args);

            add_action('customize_register', array($this, 'register_section'));
        }

        public function register_section($wp_customize)
        {
            $wp_customize->add_section(
                $this->section_id,
                $this->section_args
            );

            $this->add_controls($wp_customize);
        }

        protected function add_setting($wp_customize, $id, $args)
        {
            $wp_customize->add_setting($id, $args);
        }

        protected function add_control($wp_customize, $id, $args)
        {
            $args['section']  = $this->section_id;
            $args['settings'] = $id;
            $wp_customize->add_control($id . '_control', $args);
        }

        protected function get_default_sanitize_callback($type)
        {
            switch ($type) {
                case 'text':
                    return 'sanitize_text_field';
                case 'textarea':
                    return 'sanitize_textarea_content';
                case 'color':
                    return 'sanitize_hex_color';
                case 'image':
                    return 'esc_url_raw';
                case 'url':
                    return 'esc_url_raw';
                case 'checkbox':
                    return function ($checked) {
                        return (isset($checked) && true == $checked) ? true : false;
                    };
                case 'select':
                    return 'sanitize_text_field';
                default:
                    return 'sanitize_text_field';
            }
        }

        protected function add_text_field($wp_customize, $id, $label, $default = '', $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('text'),
                'transport'         => 'refresh',
            ));

            $this->add_control($wp_customize, $id, array(
                'label'       => $label,
                'type'        => 'text',
                'description' => $description,
            ));
        }

        protected function add_textarea_field($wp_customize, $id, $label, $default = '', $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('textarea'),
                'transport'         => 'refresh',
            ));

            $this->add_control($wp_customize, $id, array(
                'label'       => $label,
                'type'        => 'textarea',
                'description' => $description,
            ));
        }

        protected function add_select_field($wp_customize, $id, $label, $choices, $default = '', $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('select'),
                'transport'         => 'refresh',
            ));

            $this->add_control($wp_customize, $id, array(
                'label'       => $label,
                'type'        => 'select',
                'choices'     => $choices,
                'description' => $description,
            ));
        }

        protected function add_checkbox_field($wp_customize, $id, $label, $default = false, $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('checkbox'),
                'transport'         => 'refresh',
            ));

            $this->add_control($wp_customize, $id, array(
                'label'       => $label,
                'type'        => 'checkbox',
                'description' => $description,
            ));
        }

        protected function add_image_field($wp_customize, $id, $label, $default = '', $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('image'),
                'transport'         => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control(
                $wp_customize,
                $id . '_control',
                array(
                    'label'       => $label,
                    'section'     => $this->section_id,
                    'settings'    => $id,
                    'description' => $description,
                )
            ));
        }

        protected function add_color_picker_field($wp_customize, $id, $label, $default = '', $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('color'),
                'transport'         => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control(
                $wp_customize,
                $id . '_control',
                array(
                    'label'       => $label,
                    'section'     => $this->section_id,
                    'settings'    => $id,
                    'description' => $description,
                )
            ));
        }

        protected function add_number_field($wp_customize, $id, $label, $default = 0, $description = '', $min = null, $max = null, $step = null, $priority = null)
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => 'absint',
                'transport'         => 'refresh',
            ));

            $attrs = array();
            if ($min !== null) {
                $attrs['min'] = $min;
            }
            if ($max !== null) {
                $attrs['max'] = $max;
            }
            if ($step !== null) {
                $attrs['step'] = $step;
            }

            $control_args = array(
                'label'       => $label,
                'type'        => 'number',
                'input_attrs' => $attrs,
            );

            if ($description !== '') {
                $control_args['description'] = $description;
            }
            if ($priority !== null) {
                $control_args['priority'] = $priority;
            }

            $this->add_control($wp_customize, $id, $control_args);
        }

        protected function add_url_field($wp_customize, $id, $label, $default = '', $description = '')
        {
            $this->add_setting($wp_customize, $id, array(
                'type'              => 'theme_mod',
                'default'           => $default,
                'sanitize_callback' => $this->get_default_sanitize_callback('url'),
                'transport'         => 'refresh',
            ));

            $this->add_control($wp_customize, $id, array(
                'label'       => $label,
                'type'        => 'url',
                'description' => $description,
            ));
        }
    }
}

/* 
出力方法
==== URL
$this->add_url_field(
    $wp_customize,
    'cms_top_btn_link_setting',
    __('Btn Link', 'boutiq'),
    '',
    wp_kses_post('Get the gradation from here: <br><a href="https://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a>')
);

==== 数値
$this->add_number_field(
    $wp_customize,
    'top_fv_slider_speed',
    __('Slider speed', 'boutiq'),
    3000,
    1000,
    10000,
    500,
    __('1 second is 1000. If you want to change the slide in 2 seconds, enter 2000.', 'boutiq')
);
*/