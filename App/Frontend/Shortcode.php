<?php

namespace App\Frontend;

if(!defined('ABSPATH')) {
	exit;
}

class Shortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this,'render_shortcode']);
  }

  public $bank;

  public function render_shortcode($attrs){
    $shortcode_attrs = shortcode_atts(
      ['bank' => ''], $attrs
    );

    $class = '\Config\\' . ucfirst($shortcode_attrs['bank']);
    $bank_config = new $class;
    $form = $bank_config->set_form();
    $this->enqueue_assets();
    ob_start();
    foreach($form as $row){
      echo $row;
      echo '<br/>';
    }
    echo "<script>
    fetch('/word/wp-json/loan-calculator/v1/calculate', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        price: 1000000,
        payment: 12,
        fee: 2,
        deposit_duration: 3
      })
    })
    .then(res => res.json())
    .then(data => {
      console.log('Monthly payment:', data.price);
    });
    </script>";
    return ob_get_clean();
  }

  public function bank_calc($request){
    $bank = new \Config\Melli;
    $data = $request->get_json_params();
    $result = $bank->calculate($data);
    return [
      'price' => $result
    ];
  }

  public function enqueue_assets(){
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery']);
  }
}