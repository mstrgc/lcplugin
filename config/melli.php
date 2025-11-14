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
    ['type' => 'range', 'name'=> 'price', 'min' => '1000000', 'max' => '100000000000', 'step' => '1000000'],
    ['type' => 'range', 'name'=> 'payment', 'min' => '6', 'max' => '60', 'step' => '6'],
    ['type' => 'range', 'name'=> 'deposit_duration', 'min' => '1', 'max' => '12', 'step' => '1'],
    ['type'=> 'radio', 'name'=> 'fee', 'option' => []]
  ];
}