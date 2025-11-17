<?php

namespace App\Calculator;

if(!defined('ABSPATH')) {
	exit;
}

class BankConfigBase{
  public function __construct(){
  }

  //bank name
  public string $bank_name;

  //list of calculator form inputs
  public array $input_schema = [];

  //list of result table labels
  public array $result_schema = [];

  //add factor data table in case of use
  public $calc_data = null;

  //calculate the deposit amount
  public function calculate(array $inputs): mixed{
    //recieve submitted form inputs($inputs) and calculate deposit by each bank formula
    return 0;
  }

  //set of rules and exceptions that might effect the calculation
  public function rules(){
    return;
  }

  //create and return the calculator form inputs
  public function set_form(): array{
    $form = [];
    $inputs = $this-> input_schema;
    foreach($inputs as $input){
      switch($input['type']){
        case 'range':
          $name = $input['name'];
          $label = $input['label'];
          $min = $input['min'];
          $max = $input['max'];
          $step = $input['step'];
          $form[] = "<label for='{$name}'>{$label}</label><input name='{$name}' id='{$name}' type='range' min='{$min}' max='{$max}' step='{$step}'>";
        case 'select':
          $name = $input['name'];
          $label = $input['label'];
          $options = $input['options'];
          foreach($options as $option){
            $form[] = "<label for='{$name}_{$option}'><input name='{$name}' id='{$name}_{$option}' type='radio' value='{$option}'>{$option}%</label>";
          }
      }
    }
    return $form;
  }

  //create and return a table of result labels
  public function set_result_table($result_values): array{
    return [];
  }

  public function set_payment_price(int $price, int $payment, mixed $fee = null){
    if(!is_null($fee)){
      $fee_price = ($price * $fee) /100;
      $payment_price = ($price / $payment) + $fee_price;
    } else{
      $payment_price = ($price / $payment);
    }
    return intval($payment_price);
  }
}