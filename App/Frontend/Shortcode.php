<?php

namespace App\Frontend;

if(!defined('ABSPATH')) {
	exit;
}

class Shortcode{

  protected $attrs = [];
  public static $instance = null;

  public function __construct(){
  }

  public static function get_instance() {
    if(is_null(self::$instance)){
      self::$instance = new self();
    }
    return self::$instance;
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
    $result_table = $calculator['result_table'];

    $this->enqueue_assets();

    //render ui
    ob_start();
    require_once LCPLUGIN_APP . 'Views/loanCalculatorView.php';
    return ob_get_clean();
  }

  public function enqueue_assets(){
    wp_enqueue_style('loan-calc-style',LCPLUGIN_URL . 'App/public/css/loan-calc-style.css');
    wp_enqueue_script('lcp-prototype', LCPLUGIN_URL . 'App/public/js/prototype.js', [], '', true);
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/js/loan-config.js', ['jquery'], '', true);
    wp_localize_script('loan-config', 'lcp', ['bank' => $this->attrs['bank'], 'rest_url' => rest_url('loan-calculator/v1/calculate/'), 'nonce' => wp_create_nonce( 'wp_rest' )]);
  }
}