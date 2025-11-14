<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct(){
  }


  public function render_ui($inputs){
    error_log('test' . $inputs[0]['name']);
    foreach($inputs as $input){
      echo '<label>' . $input['name'] . '</label>';
      echo '<input type="' . $input['type'] . '" name="' . $input['name'] . '">';
    }
  }
}