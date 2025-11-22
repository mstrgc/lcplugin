<?php

namespace App\Frontend;

use App\Frontend\Shortcode;

if(!defined('ABSPATH')) {
  exit;
}

class RestEndpoint{
  public function register(){
    add_action('rest_api_init', function () {
      register_rest_route(
        'loan-calculator/v1',
        '/calculate',
        [
          'methods'  => 'POST',
          'callback' => [$this, 'calculate'],
          'permission_callback' => '__return_true',
        ]
      );
    });

    add_action('rest_api_init', function () {
      register_rest_route(
        'loan-calculator/v1',
        '/get-form',
        [
          'methods'  => 'POST',
          'callback' => [$this, 'get_form'],
          'permission_callback' => '__return_true',
        ]
      );
    });
  }

  public function calculate($request){
    $nonce = $request->get_header('X-WP-Nonce');

    if(!wp_verify_nonce($nonce, 'wp_rest')){
      return ;
    }

    $data = $request->get_json_params();
    $config = new \App\Calculator\CalculatorService($data['bank']);
    $result = $config->calculator($data);

    return $result;
  }

  public function get_form($request){
    $data = $request->get_param('bank');
    $config_name = '\Config\\' . ucfirst($data);
    $config = new $config_name;
    $result = $config->set_form();

    return $result;
  }
}