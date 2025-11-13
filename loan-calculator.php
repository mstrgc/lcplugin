<?php

/**
 * Plugin name: Loan Calculator Plugin
 */

if(!defined('ABSPATH')) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-loan-shortcode.php';

new LoanCalcShortcode();