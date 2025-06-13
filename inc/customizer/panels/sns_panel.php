<?php
// /inc/customizer/panels/sns_panel.php

require_once __DIR__ . '/../base_panel_customizer.php';

class Sns_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'sns_panel',
            __('SNS Settings', 'boutiq'),
            38,
            array(
                'description' => '',
            )
        );
    }
}

new Sns_Panel_Customizer();
