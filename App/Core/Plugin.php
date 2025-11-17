<?php

namespace App\Core;

use App\Frontend\Shortcode;

if(!defined('ABSPATH')) {
	exit;
}

class Plugin{
  public function __construct(){
    new Shortcode();
  }
}