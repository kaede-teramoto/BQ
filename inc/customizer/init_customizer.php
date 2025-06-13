<?php
// /inc/customizer/init_customizer.php

require_once __DIR__ . '/panels/site_default_panel.php';
require_once __DIR__ . '/sections/site_design_customizer.php';

require_once __DIR__ . '/panels/header_panel.php';
require_once __DIR__ . '/sections/header_customizer.php';

require_once __DIR__ . '/panels/footer_panel.php';
require_once __DIR__ . '/sections/footer_customizer.php';

require_once __DIR__ . '/panels/top_panel.php';
require_once __DIR__ . '/sections/top_page_customizer.php';

require_once __DIR__ . '/panels/follow_button_panel.php';
require_once __DIR__ . '/sections/follow_button_customizer.php';

require_once __DIR__ . '/panels/sns_panel.php';
require_once __DIR__ . '/sections/sns_customizer.php';

require_once __DIR__ . '/panels/sp_button_panel.php';
require_once __DIR__ . '/sections/sp_button_customizer.php';

require_once __DIR__ . '/panels/hamburger_panel.php';
require_once __DIR__ . '/sections/hamburger_customizer.php';

require_once __DIR__ . '/sections/cms_customizer.php';

require_once __DIR__ . '/sections/page_customizer.php';
require_once __DIR__ . '/sections/error_customizer.php';
require_once __DIR__ . '/sections/loading_customizer.php';


new Page_Customizer();
new Error_Customizer();
new Cms_Customizer();
new loading_Customizer();
