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
    $input1 = ['type' => 'text', 'name' => 'price'];
    $this->load_ui($input1);
  }

  public function load_ui($input){
    $class = new Loan_Calc_UI();
    $class->create_input($input);
    $class->render_ui();
  }
}