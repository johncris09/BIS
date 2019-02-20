$(document).ready(function(){

  // Log in User
  $(document).on('click','#log_in',function(){
    var _isUsernameRequired = isUsernameRequired();
    var __isPasswordRequired = isPasswordRequired();
    if((_isUsernameRequired || __isPasswordRequired )){
      return;
    }
    
    var username = $('#username').val();
    var password = $('#password').val();
    $.ajax({
      url: 'classes/main.php',
      type: 'POST',
      data:{
        'log_in':1,
        'username':username,
        'password':password
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        if(response.msg == "Invalid Login"){
          $('#loginModal').modal('show');
        }else{
          (response.status == 0) ? window.location.replace("admin/index.php"):window.location.replace("staff/index.php");
        }
      },
      // Error Handler
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }
    });
    

  });

  $('#username').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      $('#log_in').click();
    }
  });

  $('#password').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      $('#log_in').click();
    }
  });

  
  
  function isUsernameRequired(){
    if($('#username').val() == ""){
      $('#err_username').text('This field is required').effect("shake",1000);
      $('#username').css("border-color", "red").effect('shake',1000).focus();
      $('#label-username').css("color", "red").effect('shake',1000);
      $('.input-group-addon i.fa.fa-user').css("color", "red").effect("shake",1000);
      return true;
    }else{
      $('#err_username').text('');
      $('#username').css("border-color", "");
      $('#label-username').css("color", "");
      $('.input-group-addon i.fa.fa-user').css("color", "");
      return false;
    }
  }
  function isPasswordRequired(){
    if($('#password').val() == ""){
      $('#err_password').text('This field is required').effect("shake",1000);
      $('#password').css("border-color", "red").effect('shake',1000);
      $('#label-password').css("color", "red").effect('shake',1000);
      $('.input-group-addon i.fa.fa-lock').css("color", "red").effect("shake",1000);
      return true;
    }else{
      $('#err_password').text('');//
      $('#password').css("border-color", "");
      $('#label-password').css("color", "");
      $('.input-group-addon i.fa.fa-lock').css("color", "");
      return false;
    }
  }



});