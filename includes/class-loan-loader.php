<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-loan-ui.php';

class Loan_Calc_Loader{
  public function __construct($bank){
    $this->bank = $bank;
    $this->create_form();
  }

  public function create_form(){
    $input1 = '<p>test1</p>';
    $this->load_ui($input1);
  }

  public function load_ui($input){
    new Loan_Calc_UI($input);
  }
}