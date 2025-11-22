<?php

namespace App\Core;

use App\Frontend\Shortcode;
use App\Frontend\RestEndpoint;

if(!defined('ABSPATH')) {
	exit;
}

class Plugin{
  public function __construct(){
    $shortcode = Shortcode::get_instance();
    add_shortcode('loan-calculator', [$shortcode, 'render_shortcode']);
    $rest_api = new RestEndpoint();
    $rest_api->register();
  }
}

add_action('plugins_loaded', fn() => new Plugin());