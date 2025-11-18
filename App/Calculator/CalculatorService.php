<?php

namespace App\Calculator;

if(!defined('ABSPATH')) {
	exit;
}

class CalculatorService{
  public function __construct($bank){
    $this->bank = $bank;
  }

  public function calculator($data){
    //init bank config set result table method
    $bank_name = '\Config\\' . ucfirst($this->bank);
    $bank_config = new $bank_name;
    $result_table = $bank_config->set_result_table($data);
    return $result_table;
  }
}