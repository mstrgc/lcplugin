<?php

//namespace App\Core;

use App\Frontend\Shortcode;
use App\Frontend\RestEndpoint;

if(!defined('ABSPATH')) {
	exit;
}

class Plugin{

  public static $instance;

  public function __construct(){
    $shortcode = Shortcode::get_instance();
    add_shortcode('loan-calculator', [$shortcode, 'render_shortcode']);
    $rest_api = new RestEndpoint();
    $rest_api->register();
  }

  public static function get_instance() {
    if(is_null(self::$instance)){
      self::$instance = new self();
    }
    return self::$instance;
  }
}

add_action('plugins_loaded', ['Plugin', 'get_instance']);