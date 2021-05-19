
    $(document).ready(function(){
      change();
  });
  
  
  $('.login-reg-panel input[type="radio"]').on('change', function() {
    change();
  });

  function change(){
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
  }

  $('#calcbutton').click(function(){
    $('#avgconsumption').html('  '+(($('#liter').val()/$('#km').val())*100).toFixed(2)+" L/100Km");
    $('#ftkm').html('  '+(($('#liter').val()/$('#km').val()).toFixed(2)*$('#ppl').val()).toFixed(2)+' Ft/Km');
  });