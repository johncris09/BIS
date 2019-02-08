$(document).ready(function(){

  // Page Load Animation
  // $( "section.content-body").hide();
  $( "section.content-body").effect( "slide", 1000);
  $( "section div.row").hide();
  $( "section div.row").slideDown(900);

  /*********************************************************** 
  *
  * Barangay Crud with Ajax
  *
  ***********************************************************/

  viewBarangay();
  $('#update_barangay').hide();

  function viewBarangay(){
    $.get("view_barangay.php", function(data) {
      // list of all Barangay  
      $("#list_of_barangay").html(data);
      // Edit Barangay
      $('.edit-barangay').click(function() {
        $('#barangay').focus();
        $('#barangay').css("border-color","");
        $('#label').css("color","");
        $('#err_msgs').empty();
        
        var baragay_id = $(this).attr('id');

        $('#update_barangay').hide();
        $('#update_barangay').slideDown(500);
        $('#add_new_barangay').hide();
        
        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'edit_barangay':1,
            'baragay_id': baragay_id
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){

            // Pass the response value in an element
            $('#barangay_id').val(response.barangay_id);
            $('#barangay').val(response.barangay_name);
            $('#barangay').focus();
            $('.panel-title#panel-title-barangay').text('Update Barangay');
          },

          // Error Handler
          error: function(xhr, textStatus, error){
            new PNotify({
              title: 'Error!',
              text: xhr.responseText,
              type: 'error'
            });
          }
        });
        
      });

      // Call Modal to Delete Barangay
      $('.delete-barangay').click(function() {
        var delete_id = $(this).attr('id');
        $('#delete_barangay_id').text(delete_id);
        $('#delete_barangay_id').hide();
        $('#deleteBarangayModal').modal('show');
      });

    });
  }

  // Add New Barangay
  $(document).on('click','#add_new_barangay',function(){

    var barangay = $("#barangay").val();
    if(isBarangayRequired()){
      return;
    }

    // ajax
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'save_barangay':1,
        'barangay': barangay
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        JSON.parse(JSON.stringify(data));
        afterBarangayAction(); 
        
        if(response.msg == true){
          msg_SuccessfulSave();
        }else{
          msg_FailedToSave();
        }
        viewBarangay();
        
      },
      error: function(xhr, textStatus, error){
        console.info(textStatus);
      }
    });

  });

  // Delete Selected Barangay
  $('#confirm-delete-Barangay').click(function() {
    var barangay_id =  $('#delete_barangay_id').text();
    
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'delete_barangay':1,
        'barangay_id': barangay_id
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        // JSON.parse(JSON.stringify(data));
        afterBarangayAction();
        // Successful Delete
        if(response.msg == true){
          msg_SuccessfulDelete();
        }else{
          msg_FailedToDelete(response.msg);
        }
        viewBarangay();
        $('#deleteBarangayModal').modal('hide');
      },
      error: function(xhr, textStatus, error){
        console.info(xhr.textStatus);
      }
    });
  });

  // Update Barangay
  $(document).on('click','#update_barangay',function(){

    if(isBarangayRequired()){
      return;
    }
    
    var barangay_id = $('#barangay_id').val();
    var barangay_name = $('#barangay').val();
    
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'update_barangay':1,
        'barangay_id': barangay_id,
        'barangay_name': barangay_name
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        afterBarangayAction();
        $('.panel-title#panel-title-barangay').text('Add Barangay');
        $('#update_barangay').hide();
        $('#add_new_barangay').slideDown(500);
        if(response.msg == true){
          msg_SuccessfulUpdate();
        }else{
          new PNotify({
            title: 'Error!',
            text: response.msg,
            type: 'error'
          });
        }
        viewBarangay();
      },
      error: function(xhr,textStatus, error){
        console.info( xhr.responseText);
      }
    });
  });
  // fields is required Function
  function isBarangayRequired(){
    if($('#barangay').val().length<1){
      $('#err_msgs').text('This field is required');
      $('#barangay').focus();
      $('#barangay').css("border-color", "red");
      $('#label').css("color", "red");
      $( "#barangay" ).effect( "shake", 500 );
      return true;
    }
  }
  // do this after an actions
  function afterBarangayAction(){
    $('#barangay').val('');
    $('#err_msgs').empty();
    $('#barangay').focus();
    $('#barangay').css("border-color","");
    $('#label').css("color","");
  }
 
  // Reset fields
  $(document).on('click','#reset_barangay',function(){
    $('#barangay').val('');
    $('#barangay').focus();
    $('#barangay').css("border-color","");
    $('#err_msgs').empty();
    $('#label').css("color","");

  });
  
  /*********************************************************** 
  *
  * Position Crud with Ajax
  *
  ***********************************************************/
  viewPosition();
  $('#update_position').hide();
  
  // Functions for some purposes

  // purposed of this function is to view, edit, delete the data
  function viewPosition(){
    $.get("view_position.php", function(data) {
      // list of all position  
      $("#list_of_position").html(data);
      // Edit Position
      $('.edit-position').click(function() {
        $('#position').focus();
        $('#position').css("border-color","");
        $('#label').css("color","");
        $('#err_msgs').empty();
        
        var edit_id = $(this).attr('id');
  
        // $('#update_position').show();
        $('#update_position').hide();
        $('#update_position').slideDown(500);
        $('#add_new_position').hide();
        
        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'edit_position':1,
            'edit_id': edit_id
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){
            $('#position_id').val(response.position_id);
            $('#position').val(response.position);
            $('#position').focus();
            $('.panel-title#panel-title').text('Update Position');
          },
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        });
        
      });

      // Call Modal to Delete  Position
      $('.delete-position').click(function() {
        var delete_id = $(this).attr('id');
        $('#delete_position_id').text(delete_id);
        $('#delete_position_id').hide();
        $('#deletePositionModal').modal('show');
      });
  
    });
  }

  
  // fields is required Function
  function isPositionRequired(){
    if($('#position').val().length<1){
      $('#err_msgs').text('This field is required');
      $('#position').focus();
      $('#position').css("border-color", "red");
      $('#label').css("color", "red");
      $( "#position" ).effect( "shake", 500 );
      return true;
    }
  }
  
  // do this after an actions
  function afterPositionAction(){
    $('#position').val('');
    $('#err_msgs').empty();
    $('#position').focus();
    $('#position').css("border-color","");
    $('#label').css("color","");
  }

  // Add new Position
  $(document).on('click','#add_new_position',function(){

    var position = $("#position").val();
    
    if(isPositionRequired()){
      return;
    }
    // ajax
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'save_position':1,
        'position': position
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        JSON.parse(JSON.stringify(data));
        afterPositionAction();
        // Successful Save
        if(response.msg == true){
          msg_SuccessfulSave();
        }else{
          new PNotify({
            title: 'Error!',
            text: response.msg,
            type: 'error'
          });
        }
        
        viewPosition();
        
      },
      error: function(xhr, textStatus, error){
        console.info(textStatus);
      }
    });
  });

  // update position
  $(document).on('click','#update_position',function(){


    if(isPositionRequired()){
      return;
    }
    var position_id = $('#position_id').val();
    var position = $('#position').val();
    
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'update_position':1,
        'position_id': position_id,
        'position': position
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        // JSON.parse(JSON.stringify(data));
        afterPositionAction();
        $('.panel-title#panel-title').text('Add Position');
        $('#update_position').hide();
        $('#add_new_position').slideDown(500);
        if(response.msg == true){
          msg_SuccessfulUpdate();
        }else{
          new PNotify({
            title: 'Error!',
            text: response.msg,
            type: 'error'
          });
        }
        viewPosition();
      },
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }
    });
  });

  // Delete Selected Position
  $('#confirm-delete-Position').click(function() {
    var position_id =  $('#delete_position_id').text();
    
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'delete_position':1,
        'delete_id': position_id
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        // JSON.parse(JSON.stringify(data));
        afterPositionAction();
        // Successful Delete
        if(response.msg == true){
          msg_SuccessfulDelete();
        }else{
          msg_FailedToDelete(response.msg);
        }
        viewPosition();
        $('#deletePositionModal').modal('hide');
      },
      error: function(xhr, textStatus, error){
        console.info(textStatus);
      }
    });
  });

  // Reset fields
  $(document).on('click','#reset_position',function(){
    $('#position').val('');
    $('#position').focus();
    $('#position').css("border-color","");
    $('#err_msgs').empty();
    $('#label').css("color","");

  });


  /******************************
   *  Messages after an action
   */
  // Save Messages
  function msg_SuccessfulSave(){
    new PNotify({
      title: 'Saved',
      text: 'New Record Added.',
      type: 'success'
    });
  }

  function msg_FailedToSave(){
    new PNotify({
      title: 'Error!',
      text: "Already Exist",
      type: 'error'
    });
  }
  function msg_SuccessfulUpdate(){
    new PNotify({
      title: 'Updated!',
      text: 'New Record Updated',
      type: 'success'
    });
  }


  // Delete Messages
  function msg_SuccessfulDelete(){
    new PNotify({
      title: 'Saved',
      text: 'New Record Deleted.',
      type: 'success'
    });
  }
  
  function msg_FailedToDelete(){
    new PNotify({
      title: 'Error',
      text: 'This value is can not be deleted because it is being referenced by the other',
      type: 'error'
    });
  }

});


