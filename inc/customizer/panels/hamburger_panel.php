<?php
// /inc/customizer/panels/hamburger_panel.php

require_once __DIR__ . '/../base_panel_customizer.php';

class Hamburger_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'hm_panel',
            __('Hamburger option', 'boutiq'),
            30,
            array(
                'description' => '',
            )
        );
    }
}

new Hamburger_Panel_Customizer();
