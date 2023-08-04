<?php
require_once 'core/Autoload.php';

use Core\AutoLoad;

// Theme version
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '2.0.0');
}

// Theme directory
if (!defined('THEME_DIR') || !defined('THEME_URL')) {
    define('THEME_DIR', get_template_directory());
    define('THEME_URL', get_template_directory_uri());
}

// Load core theme files
$autoload = new AutoLoad(THEME_DIR . '/core');
$autoload->add(THEME_DIR . '/src');

// Load plugins install
$autoload->add(THEME_DIR . '/plugins/index.php');
$autoload->add(THEME_DIR . '/plugins/theme-importer');

// Load custom types and fields
$autoload->add(THEME_DIR . '/acf');

// Call files
$autoload->load();

$theme = new ThemeSetup();
$theme->setMenus([
    'menu-primary' => 'Menu primário',
    'menu-footer' => 'Menu do rodapé',
]);
$theme->setThemeSupport([
    'title-tag',
    'post-thumbnails',
    'custom-logo',
    // 'woocommerce',
]);

$theme->initialize();

DarkThemeController::init();

add_action('wp_enqueue_scripts', function () {
    $themeEnqueue = new ThemeEnqueue();
    $themeEnqueue->setScripts([
        'jquery' => THEME_URL . '/static/inc/jquery-1.11.0.min.js',
        'slick' => THEME_URL . '/static/inc/slick.min.js',
        'script' => THEME_URL . '/static/dist/scripts.js',
    ]);
    $themeEnqueue->setStyles([
        'slick' => THEME_URL . '/static/inc/slick.min.css',
        'style' => THEME_URL . '/static/dist/style.css',
    ]);

    $themeEnqueue->enqueue();
});

// add_action('after_setup_theme', function () {
//     $defaultPages = new DefaultPages();
//     $defaultPages->setPages(['Home', 'Contato', 'Serviços']);
//     $defaultPages->create();
// });

add_action('phpmailer_init', function ($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.uni5.net';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'noreply@example.com';
    $phpmailer->Password = 'password';
});

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// Theme configs
if (!defined('THEME_DATA')) {
    define('THEME_DATA', ContentController::getContent('options'));
}
