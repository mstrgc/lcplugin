<?php

namespace App\Frontend;

if(!defined('ABSPATH')) {
	exit;
}

class Shortcode{
  public function __construct(){
    add_shortcode('loan_calculator', [$this,'render_shortcode']);
  }

  public function render_shortcode($attrs){
    $shortcode_attrs = shortcode_atts(
      ['bank' => ''], $attrs
    );

    $class = '\Config\\' . ucfirst($shortcode_attrs['bank']);
    $bank_config = new $class;
    $form = $bank_config->set_form();
    $this->enqueue_assets();
    ob_start();
    echo '<form id="loan-form">';
    foreach($form as $row){
      echo $row;
      echo '<br/>';
    }
    echo '</form>';
    return ob_get_clean();
  }

  public function bank_calc($request){
    $data = $request->get_json_params();
    $config = new \App\Calculator\CalculatorService('melli');
    $result = $config->calculator($data);

    return ['deposit' => $result];
  }

  public function enqueue_assets(){
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery'], '', true);
  }
}