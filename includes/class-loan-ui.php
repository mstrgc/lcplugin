<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct(){}

  public function render_ui($inputs){
    error_log(count($inputs));
    foreach($inputs as $input){
      echo "<label for='{$input['name']}'>{$input['name']}</label>";
      if ($input['type'] == 'range') $this->render_range_input($input);
    }
  }

  private function render_range_input($attrs){
    echo "<input type='range' name='{$attrs['name']}' id='{$attrs['name']}' min='{$attrs['min']}' max='{$attrs['max']}' step='{$attrs['step']}'>";
  }
}