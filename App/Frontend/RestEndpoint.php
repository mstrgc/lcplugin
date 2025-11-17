<?php

namespace App\Frontend;

use Melli;

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
          'callback' => [$this, 'calc'],
          'permission_callback' => '__return_true',
        ]
      );
    });
  }

  public function calc(\WP_REST_Request $request){
    // Get form data
    $price = $request->get_param('price');

    return [
      'price' => $price,
    ];
  }
}