<?php

if(!defined('ABSPATH')) {
  exit;
}

class LoanCalcShortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this, 'render']);
  }

  public function render(){
    ob_start();
    echo '<p>hello mamad</p>';
    return ob_get_clean();
  }
}