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
    $this->render_ui();
  }

  public function render_ui(){
    $resp = wp_remote_post(get_home_url() . 'wp-json/loan-calculator/v1/get-form/', ['bank' => $this->attrs['bank']]);
    if(is_wp_error($resp)){
      echo $resp->get_error_message();
    }
    //render ui
    ob_start();
    echo '<form id="loan-form"></form>';
    foreach($resp as $row){
      echo $row;
    }
    echo '<div id="loan-result"></div>';
    return ob_get_clean();
  }

  public function enqueue_assets(){
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery'], '', true);
    wp_localize_script('loan-config', 'lcp', $this->attrs);
  }
}