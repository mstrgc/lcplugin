<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_Base_Config{
  public function __construct(){}

  public $inputs = [];

  public function add_input($attrs){
    $this->inputs[] = [
      'type' => $attrs['type'],
      'name' => $attrs['name'],
      'value'=> $attrs['value'],
      'min' => $attrs['min'],
      'max' => $attrs['max']
    ];
  }

  public function get_inputs(){
    return $this->inputs;
  }

  public function calculate(){}
}