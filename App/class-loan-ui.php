<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct(){}

  public function render_ui($inputs){
    error_log(count($inputs));
    foreach($inputs as $input){
      if ($input['type'] == 'range') $this->render_range_input($input);
      if ($input['type'] == 'radio') $this->render_radio_input($input);
    }
  }

  private function render_range_input($attrs){
    echo "<label for='{$attrs['name']}'>{$attrs['name']}</label>";
    echo "<input type='range' name='{$attrs['name']}' id='{$attrs['name']}' min='{$attrs['min']}' max='{$attrs['max']}' step='{$attrs['step']}' value='{$attrs['min']}'>";
  }

  private function render_radio_input($attrs){
    foreach($attrs['options'] as $option){
      echo "<label for='{$attrs['name']}'><input type='radio' name='{$attrs['name']}' id='{$attrs['name']}' value='{$option}'>$option</label>";
    }
  }
}