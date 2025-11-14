<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-loan-ui.php';
require_once LCPLUGIN_INCLUDES . 'class-base-config.php';

class Loan_Calc_Loader{
  public function __construct($bank){
    $this->bank = $bank;
    $this->config = new Test_Config();
    $this->load_ui();
  }

  public function load_ui(){
    $inputs = $this->config->get_inputs();
    $class = new Loan_Calc_UI();
    return $class->render_ui($inputs);
  }
}