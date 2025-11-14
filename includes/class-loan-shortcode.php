<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-loan-loader.php';

class Loan_Calc_Shortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this, 'init_shortcode']);
  }

  public function init_shortcode($attrs){
    $lcplugin_attrs = shortcode_atts(
      [
        'bank' => '',
      ], $attrs
    );

    new Loan_Calc_Loader($lcplugin_attrs['bank']);
  }

  public function render($bank){
    ob_start();
    echo "<p>{$bank}</p>";
    return ob_get_clean();
  }
}