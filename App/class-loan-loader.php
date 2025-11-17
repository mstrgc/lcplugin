<?php

if(!defined('ABSPATH')) {
  exit;
}

require_once LCPLUGIN_INCLUDES . 'class-loan-ui.php';

class Loan_Calc_Loader{
  public function __construct($bank){
    if(file_exists(LCPLUGIN_CONFIG . "{$bank}.php")){
      require_once LCPLUGIN_CONFIG . "{$bank}.php";
      $config_class = ucfirst($bank) . '_Config';
    }
    $this->config = new $config_class();
    $this->load_ui();
  }

  public function load_ui(){
    $inputs = $this->config->get_inputs();
    $class = new Loan_Calc_UI();
    return $class->render_ui($inputs);
  }
}