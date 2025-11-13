<?php

/**
 * Plugin name: Loan Calculator Plugin
 */

if(!defined('ABSPATH')) {
	exit;
}

define('LCPLUGIN_PATH', plugin_dir_path(__FILE__));
define('LCPLUGIN_INCLUDES', LCPLUGIN_PATH . 'includes/');

require_once LCPLUGIN_INCLUDES . 'class-loan-shortcode.php';

new LoanCalcShortcode();