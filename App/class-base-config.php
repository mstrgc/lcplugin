<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_Base_Config{
  public function __construct(){}

  public $inputs = [];

  public function add_input($attrs){
    foreach($attrs as $attr){
      if($attr['type'] == 'range') $this->add_range_input($attr);
      if($attr['type'] == 'radio') $this->add_radio_input($attr);
    }
  }

  private function add_range_input($attr){
    $this->inputs[] = [
      'type' => 'range',
      'name' => $attr['name'],
      'id' => $attr['name'],
      'min' => $attr['min'],
      'max' => $attr['max'],
      'step' => $attr['step']
    ];
  }

  private function add_radio_input($attr){
    $this->inputs[] = [
      'type' => 'radio',
      'name' => $attr['name'],
      'id' => $attr['name'],
      'options' => $attr['options']
    ];
  }

  public function get_inputs(){
    return $this->inputs;
  }

  public function calculate(){}
}