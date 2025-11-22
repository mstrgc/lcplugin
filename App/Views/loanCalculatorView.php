<div id="lcp-container-wrapper">
  <div id="lcp-container">
    <form id="lcp-form">
      <?php
        //wp_nonce_field('loan_calculator_nonce', 'loan_calculator_nonce_field');
        echo wp_create_nonce('lcp_nonce');
        foreach($form as $input){
          switch($input['type']){
            case 'range':
              $name = $input['name'];
              $label = $input['label'];
              $min = $input['min'];
              $max = $input['max'];
              $step = $input['step'];
              $suffix = $input['suffix'];
              echo 
              "<div class='lcp-range-input'>
                <div class='lcp-label-input'>
                  <label for='{$name}'>{$label}</label>
                  <p class='display-range'><span id='{$name}-index'></span> {$suffix}</p>
                </div>
                <input name='{$name}' id='{$name}' type='range' min='{$min}' max='{$max}' step='{$step}' value='{$min}'>
                <div class='range-span'>
                  <p><span class='input-number-label'>{$min}</span><span> {$suffix}</span></p>
                  <p><span class='input-number-label'>{$max}</span><span> {$suffix}</span></p>
                </div>
              </div>";
              break;
            case 'select':
              $name = $input['name'];
              $label = $input['label'];
              $options = $input['options'];
              $suffix = $input['suffix'];
              echo "<div class='lcp-options-container'><label>{$label}</label>";
              echo "<div class='lcp-options'>";
              foreach($options as $option){
                if($option === $options[0]){
                  echo "<label for='{$name}_{$option}'><input name='{$name}' id='{$name}_{$option}' type='radio' value='{$option}' checked><span  class='input-number-label'>{$option}</span> {$suffix}</label>";
                } else{
                  echo "<label for='{$name}_{$option}'><input name='{$name}' id='{$name}_{$option}' type='radio' value='{$option}'><span  class='input-number-label'>{$option}</span> {$suffix}</label>";
                }
              }
              echo '</div></div>';
              break;
          }
        }
      ?>
    </form>
    <div id="lcp-result" class="lcp-result">
      <?php
        foreach($result_table as $row){
          $name = $row['name'];
          $label = $row['label'];
          $suffix = $row['suffix'];
          //echo count($result_table);
          echo "
          <div class='lcp-result-row'>
            <p>{$label}</p>
            <p>
              <span id='{$name}-result'>۰</span>
            {$suffix}</p>
          </div>";
          if($row != $result_table[(count($result_table) - 1)]) echo "<hr></hr>";
        }
      ?>
    </div>
  </div>
</div>