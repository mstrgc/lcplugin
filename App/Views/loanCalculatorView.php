<div id="lcp-container-wrapper">
  <div id="lcp-container">
    <form id="lcp-form">
      <?php
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
                  <p class='display_range'><span id='{$name}_index'>۱,۰۰۰,۰۰۰</span> {$suffix}</p>
                </div>
                <input name='{$name}' id='{$name}' type='range' min='{$min}' max='{$max}' step='{$step}' value='{$min}'>
                <div class='range_span'>
                  <span>{$min} {$suffix}</span>
                  <span>{$max} {$suffix}</span>
                </div>
              </div>";
              break;
            case 'select':
              $name = $input['name'];
              $label = $input['label'];
              $options = $input['options'];
              echo "<div class='lcp-options-container'><label>{$label}</label>";
              echo "<div class='lcp-options'>";
              foreach($options as $option){
                echo "<label for='{$name}_{$option}'><input name='{$name}' id='{$name}_{$option}' type='radio' value='{$option}'>{$option}%</label>";
              }
              echo '</div></div>';
              break;
          }
        }
      ?>
    </form>
    <div id="lcp-result" class="lcp-result">
    </div>
  </div>
</div>