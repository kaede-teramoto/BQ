<?php
// /inc/customizer/panels/sp_button_panel.php

require_once __DIR__ . '/../base_panel_customizer.php';

class Sp_Button_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sp_button_panel',
            __('SP button Settings', 'boutiq'),
            39,
            array(
                'description' => '',
            )
        );
    }
}

new Sp_Button_Panel_Customizer();
