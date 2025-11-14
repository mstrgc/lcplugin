<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_Shortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this, 'init_shortcode']);
  }

  public function init_shortcode($attrs){
    $lcplugin_attrs = shortcode_atts(
      [
        'bank_name' => '',
      ], $attrs
    );

    return $this->render($lcplugin_attrs['bank_name']);
  }

  public function render($bank){
    ob_start();
    echo "<p>{$bank}</p>";
    return ob_get_clean();
  }
}