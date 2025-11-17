<?php

namespace App\Frontend;

use Melli;

if(!defined('ABSPATH')) {
	exit;
}

class Shortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this,'render_shortcode']);
  }

  public function render_shortcode($attrs){
    $shortcode_attrs = shortcode_atts(
      ['bank' => ''], $attrs
    );

    require_once LCPLUGIN_CONFIG . ucfirst($shortcode_attrs['bank']) . '.php';
    $bank_config = new Melli();
    $form = $bank_config->set_form();
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
        price: 1000000
      })
    })
    .then(res => res.json())
    .then(data => {
      console.log('Monthly payment:', data.price);
    });
    </script>";
    return ob_get_clean();
  }
}