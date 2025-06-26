<?php
// /inc/customizer/panels/follow_button_panel.php

require_once __DIR__ . '/../base/base_panel_customizer.php';

class Follow_Button_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'follow_button_panel',
            __('Follow button', 'boutiq'),
            100,
            array(
                'description' => '',
            )
        );
    }
}

new Follow_Button_Panel_Customizer();
