<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct($input){
    $this->render_ui();
  }

  public function create_input($attrs){
    $this->inputs[] = [
      'type' => $attrs['type'],
      'name' => $attrs['name']
    ];
  }

  private $inputs =[];

  public function render_ui(){
    echo '';
  }
}