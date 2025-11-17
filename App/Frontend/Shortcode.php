<?php

namespace App\Frontend;

if(!defined('ABSPATH')) {
	exit;
}

class Shortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this,'render_shortcode']);
  }

  public function render_shortcode(){
    echo 'hello';
  }
}