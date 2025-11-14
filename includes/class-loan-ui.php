<?php

if(!defined('ABSPATH')) {
  exit;
}

class Loan_Calc_UI{
  public function __construct(){
    $this->render_ui();
  }

  public function render_ui(){
    echo "<p>ui works</p>";
  }
}