<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_Base_Config{
  public function __construct(){}

  public $inputs = [];

  public function add_input($attrs){
    foreach($attrs as $attr){
      $this->inputs[] = [
        'type' => $attr['type'],
        'name' => $attr['name']
        //'value'=> $attrs['value'],
        //'min' => $attrs['min'],
        //'max' => $attrs['max']
      ];
    }
  }

  public function get_inputs(){
    return $this->inputs;
  }

  public function calculate(){}
}

class Test_Config extends Loan_Calc_Base_Config{

  public function __construct(){
    $this->add_input($this->input_list);
  }

  private $input_list = [
    ['type' => 'range', 'name'=> 'fee'],
    ['type' => 'text', 'name'=> 'deposit']
  ];
}