<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-base-config.php';

class Melli_Config extends Loan_Calc_Base_Config{
  public function __construct(){
    $this->add_input($this->input_list);
  }

  private $input_list = [
    ['type' => 'range', 'name'=> 'fee'],
    ['type' => 'text', 'name'=> 'deposit']
  ];
}