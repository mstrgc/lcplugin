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
  }

  public function calculate($request){
    $data = $request->get_json_params();
    $config = new \App\Calculator\CalculatorService($data['bank']);
    $result = $config->calculator($data);

    return ['deposit' => $result];
  }
}