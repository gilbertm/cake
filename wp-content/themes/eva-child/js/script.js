jQuery(document).ready(function () {
      

      setTimeout(function() {
        jQuery('#mce-EMAIL').attr('placeholder','format: email@domain.com');
        console.log("here");
      }, 1000)

      jQuery('<div class="quantity-nav"><span class="quantity-button quantity-up">&#xf106;</span><span class="quantity-button quantity-down">&#xf107</span></div>').insertAfter('.quantity input');
      jQuery('.quantity').each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = parseInt(input.attr('min')),
            max = (parseInt(input.attr('max')) <= 0) ? 9 : max;
  
            btnUp.click(function () {
          var oldValue = parseFloat(input.val());
          if (oldValue >= max) {
            var newVal = oldValue;
          } else {
            var newVal = oldValue + 1;
          }
  
          
  
          spinner.find("input").val(newVal);
          spinner.find("input").trigger("change");
        });
    
        btnDown.click(function () {
          var oldValue = parseFloat(input.val());
          if (oldValue <= min) {
            var newVal = oldValue;
          } else {
            var newVal = oldValue - 1;
          }
          spinner.find("input").val(newVal);
          spinner.find("input").trigger("change");
        });
    
      });
    });