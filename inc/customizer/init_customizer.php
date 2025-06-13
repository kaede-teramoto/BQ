<?php
// /inc/customizer/init_customizer.php

require_once __DIR__ . '/panels/site_default_panel.php';
require_once __DIR__ . '/site_default_design_customizer.php';

require_once __DIR__ . '/panels/header_panel.php';
require_once __DIR__ . '/header_design_customizer.php';

require_once __DIR__ . '/panels/footer_panel.php';
require_once __DIR__ . '/footer_customizer.php';

require_once __DIR__ . '/panels/top_panel.php';
require_once __DIR__ . '/top_page_customizer.php';

require_once __DIR__ . '/cms_customizer.php';

require_once __DIR__ . '/page_customizer.php';
require_once __DIR__ . '/error_customizer.php';


new Page_Customizer();
new Error_Customizer();
new Cms_Customizer();
