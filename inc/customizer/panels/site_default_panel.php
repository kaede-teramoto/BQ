<?php
// /inc/customizer/panels/site_default_panel.php

require_once __DIR__ . '/../base_panel_customizer.php';

class Site_Default_Panel_Customizer extends Base_Panel_Customizer
{
    public function __construct()
    {
        parent::__construct(
            'site_default_panel',
            __('Basic design settings', 'boutiq'),
            10,
            array(
                'description' => '', // 説明があればここに入れる
            )
        );
    }
}

// 初期化
new Site_Default_Panel_Customizer();
