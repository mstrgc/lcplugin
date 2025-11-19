<?php

namespace App\Frontend;

if(!defined('ABSPATH')) {
	exit;
}

class Shortcode{

  protected $attrs = [];
  public function __construct(){
    add_shortcode('loan_calculator', [$this,'render_shortcode']);
    add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
  }

  public function render_shortcode($attrs){
    $this->attrs = shortcode_atts(
      ['bank' => ''], $attrs
    );

    //render ui
    ob_start();
    echo '<form id="loan-form"></form>';
    echo '<div id="loan-result"></div>';
    return ob_get_clean();
  }

  public function enqueue_assets(){
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery'], '', true);
    wp_localize_script('loan-config', 'lcp', $this->attrs);
  }
}