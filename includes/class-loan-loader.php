<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-loan-ui.php';

class Loan_Calc_Loader{
  public function __construct($bank){
    $this->bank = $bank;
    $this->load_ui();
  }

  public function load_ui(){
    new Loan_Calc_UI();
  }
}