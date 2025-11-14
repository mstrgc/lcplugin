<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-loan-ui.php';
require_once LCPLUGIN_INCLUDES . 'class-base-config.php';

class Loan_Calc_Loader{
  public function __construct($bank){
    $this->bank = $bank;
    $this->config = new Loan_Calc_Base_Config();
    $this->create_form();
  }

  public function create_form(){
    $inputs =[
      ['type' => 'text', 'name' => 'price1'],
      ['type' => 'range', 'name' => 'price2'],
      ['type' => 'text', 'name' => 'price3'],
      ['type' => 'range', 'name' => 'price4']
    ];
    foreach($inputs as $input){
      $this->config->add_input($input);
    }
    $this->load_ui();
  }

  public function load_ui(){
    $inputs = $this->config->get_inputs();
    $class = new Loan_Calc_UI();
    return $class->render_ui($inputs);
  }
}