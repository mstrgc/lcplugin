<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct(){
  }

  public function create_input($attrs){
    $this->inputs[] = [
      'type' => $attrs['type'],
      'name' => $attrs['name']
    ];
  }

  private $inputs =[];

  public function render_ui(){
    foreach($this->inputs as $input){
      echo '<label>' . $input['name'] . '</label>';
      echo '<input type="' . $input['type'] . '" name="' . $input['name'] . '">';
    }
  }
}