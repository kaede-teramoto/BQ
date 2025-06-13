<?php
// /inc/customizer/panels/header_panel.php

require_once __DIR__ . '/../base/base_panel_customizer.php';

class Header_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'header_panel',
            __('Header option', 'boutiq'),
            20,
            array(
                'description' => '',
            )
        );
    }
}

new Header_Panel_Customizer();
