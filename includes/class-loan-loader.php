<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_Loader{
  public function __construct($bank){
    $this->bank = $bank;
    $this->load_ui();
  }

  public function load_ui(){
    echo '<p>loader works</p>';
  }
}