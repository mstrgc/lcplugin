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

    $url = rest_url('loan-calculator/v1/get-form/');;

    //create rest api request
    $resp = wp_remote_post($url , $args);

    if(is_wp_error($resp)){
      error_log($resp->get_error_message());
    }

    $body = wp_remote_retrieve_body($resp);

    $calculator = json_decode( $body, true );

    //define ui elements
    $form = $calculator['form'];
    $resulat_table = $calculator['resulat_table'];

    //render ui
    ob_start();
    require_once LCPLUGIN_APP . 'Views/loanCalculatorView.php';
    return ob_get_clean();
  }

  public function enqueue_assets(){
    wp_enqueue_style('loan-calc-style',LCPLUGIN_URL . 'App/public/loan-calc-style.css');
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery'], '', true);
    wp_localize_script('loan-config', 'lcp', ['bank' => $this->attrs['bank'], 'rest_url' => rest_url('loan-calculator/v1/calculate/')]);
  }
}