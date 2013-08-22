<?php

$themeConfig = array();

//todo get arrays from config file

$cssFiles = array(
    'global.css',
    'catalog.css',
    'checkout.css'
);


$jsFiles = array(
    // 'jquery.form_object.js',
    // 'jquery.form_validate.js',
    // 'jquery.pjax.js',
    // 'saatchi-checkout.js'
);

/**
 * style files, that are getting minified
 */
$themeConfig[ProjectA_Shared_Library_Theme::CONFIG_SECTION_STYLES] = $cssFiles;

/**
 * script files, that are getting minified
 */
$themeConfig[ProjectA_Shared_Library_Theme::CONFIG_SECTION_SCRIPTS] = $jsFiles;


return $themeConfig;
