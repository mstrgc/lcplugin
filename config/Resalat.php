<?php

namespace Config;

if(!defined('ABSPATH')) {
  exit;
}

use App\Calculator\BankConfigBase;

class Resalat extends BankConfigBase{
  public function __construct(){
    $this->bank_name = 'resalat';
    $this->input_schema = [
      [
        'name' => 'loan_price',
        'type' => 'range',
        'label' => 'مبلغ',
        'min' => '1000000',
        'max' => '1000000000',
        'step' => '1000000',
        'suffix' => 'تومان'
      ],
      [
        'name' => 'payment',
        'type' => 'range',
        'label' => 'اقساط',
        'min' => '6',
        'max' => '60',
        'step' => '6'
      ],
      [
        'name' => 'deposit_duration',
        'type' => 'range',
        'label' => 'مدت سپرده',
        'min' => '1',
        'max' => '12',
        'step' => '1'
      ]
    ];
    $this->result_schema = [
      [
        'name' => 'deposit',
        'label' => 'میانگین حساب',
        'suffix' => 'تومان'
      ],
      [
        'name' => 'loan',
        'label' => 'تسهیلات درخواستی',
        'suffix' => 'تومان'
      ],
      [
        'name' => 'payment',
        'label' => 'تعداد اقساط',
        'suffix' => 'ماه'
      ],
      [
        'name' => 'deposit_duration',
        'label' => 'مدت زمان واریز به حساب',
        'suffix' => 'ماه'
      ]
    ];
  }

  public function calculate(array $inputs): int{
    $result = ($inputs['price'] * $inputs['payment']) / ($inputs['deposit_duration'] * 2);
    return intval($result);
  }

  public function set_result_table($result_values): array{
    $result_table = [];
    foreach($this->result_schema as $row){
      $value = $row['name'];
      $result_table[] = "<p>{$row['label']}: {$result_values[$value]} {$row['suffix']}</p>";
    }
    return $result_table;
  }
}