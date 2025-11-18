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

    //call bank config class
    $class = '\Config\\' . ucfirst($shortcode_attrs['bank']);
    $bank_config = new $class;

    //call set form to get inputs
    $form = $bank_config->set_form();
    $this->enqueue_assets();

    //render ui
    ob_start();
    echo '<form id="loan-form">';
    foreach($form as $row){
      echo $row;
      echo '<br/>';
    }
    echo '</form>';
    echo '<div id="loan-result"></div>';
    return ob_get_clean();
  }

  public function enqueue_assets(){
    wp_enqueue_script('loan-config', LCPLUGIN_URL . 'App/public/loan-config.js', ['jquery'], '', true);
  }
}