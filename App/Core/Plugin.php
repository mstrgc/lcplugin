<?php

namespace App\Core;

use App\Frontend\Shortcode;
use App\Frontend\RestEndpoint;

if(!defined('ABSPATH')) {
	exit;
}

class Plugin{
  public function __construct(){
    add_shortcode('loan-calculator', [Shortcode::get_instance(), 'render_shortcode']);
    $rest_api = new RestEndpoint();
    $rest_api->register();
  }
}