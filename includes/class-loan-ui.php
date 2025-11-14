<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct($input){
    $this->render_ui($input);
  }

  public function render_ui($input){
    echo $input;
  }
}