<?php
// /inc/customizer/panels/page_panel.php

require_once __DIR__ . '/../base/base_panel_customizer.php';

class Page_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'page_panel',
            __('Page option', 'boutiq'),
            50,
            array(
                'description' => '',
            )
        );
    }
}

new Page_Panel_Customizer();
