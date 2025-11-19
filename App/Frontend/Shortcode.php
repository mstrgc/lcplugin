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
    return $this->render_ui();
  }

  public function render_ui(){
    $args = [
      'body' => ['bank' => $this->attrs['bank']]
    ];

    //create rest api request
    $resp = wp_remote_post(get_home_url() . '/wp-json/loan-calculator/v1/get-form/', $args);

    if(is_wp_error($resp)){
      error_log($resp->get_error_message());
    }

    $body = wp_remote_retrieve_body($resp);

    $form = json_decode( $body, true );

    //render ui
    ob_start();
    echo '<form id="loan-form">';
    foreach($form as $input){
      echo $input;
    }
    echo '</form><div id="loan-result"></div>';
    return ob_get_clean();
  }

  public function enqueue_assets(){
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery'], '', true);
    wp_localize_script('loan-config', 'lcp', $this->attrs);
  }
}