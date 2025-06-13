<?php
// /inc/customizer/panels/top_panel.php

require_once __DIR__ . '/../base_panel_customizer.php';

class Top_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'top_page_panel',
            __('Top Page Settings', 'boutiq'),
            34,
            array(
                'description' => '',
            )
        );
    }
}

new Top_Panel_Customizer();
