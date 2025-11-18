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
    $bank_name = '\Config\\' . ucfirst($this->bank);
    $bank_config = new $bank_name;
    $result = $bank_config->calculate($data);
    return $result;
  }
}