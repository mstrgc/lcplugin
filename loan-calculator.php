<?php

/**
 * Plugin name: Loan Calculator Plugin
 */

if(!defined('ABSPATH')) {
	exit;
}

require __DIR__ . '/vendor/autoload.php';

use App\Core\Plugin;

new Plugin();

define('LCPLUGIN_PATH', plugin_dir_path(__FILE__));
define('LCPLUGIN_APP', LCPLUGIN_PATH . 'App/');
define('LCPLUGIN_CONFIG', LCPLUGIN_PATH . 'config/');
define('LCPLUGIN_URL', plugin_dir_url(__FILE__ ));