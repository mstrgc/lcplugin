<?php

namespace App\Core;

use App\Frontend\Shortcode;
use App\Frontend\RestEndpoint;

if(!defined('ABSPATH')) {
	exit;
}

class Plugin{
  public function __construct(){
    new Shortcode();
    $rest_api = new RestEndpoint();
    $rest_api->register();
  }
}