<?php

namespace App\Core;

use App\Frontend\Shortcode;
use App\Frontend\RestEndpoint;

if(!defined('ABSPATH')) {
	exit;
}

class Plugin{

  protected $active_config = null;

  public function __construct(){
    new Shortcode();
    $rest_api = new RestEndpoint();
    $rest_api->register();
  }

  public function set_active_config($config){
    $config_name = '\Config\\' . ucfirst($config);
    $this-> active_config = $config_name;
  }
}