<?php
// /inc/customizer/panels/footer_panel.php

require_once __DIR__ . '/../base_panel_customizer.php';

class Footer_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'footer_panel',
            __('Footer option', 'boutiq'),
            32,
            array(
                'description' => '',
            )
        );
    }
}

new Footer_Panel_Customizer();
