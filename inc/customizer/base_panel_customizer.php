<?php
// /inc/customizer/base_panel_customizer.php

if (! class_exists('Base_Panel_Customizer')) {

    class Base_Panel_Customizer
    {
        protected $panel_id;
        protected $panel_title;
        protected $panel_priority;
        protected $panel_args;

        public function __construct($panel_id, $panel_title, $panel_priority = 30, $panel_args = array())
        {
            $this->panel_id       = $panel_id;
            $this->panel_title    = $panel_title;
            $this->panel_priority = $panel_priority;

            $this->panel_args = array_merge(array(
                'title'    => $this->panel_title,
                'priority' => $this->panel_priority,
                'capability' => 'edit_theme_options',
            ), $panel_args);

            add_action('customize_register', array($this, 'register_panel'), 5);
        }


        public function register_panel($wp_customize)
        {
            $wp_customize->add_panel(
                $this->panel_id,
                $this->panel_args
            );
        }
    }
}
