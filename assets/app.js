$(document).ready(function(){

  // Page Load Animation
  // Main Content Animation
  
  $( "section.content-body").effect( "slide", 1000);
  $( "section div.row").hide();
  $( "section div.row").slideDown(900);

  try{
    //  Pull the file name from the URL
    var filename = window.location.pathname.match(/.*\/([^/]+)\.([^?]+)/i)[1];
    filename = filename.toLocaleLowerCase();
  }catch(ex){
    filename ="index";
  }

  ChnageInfo();
  //  log_out
  $('#log_out').click(function() 
  {
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'log_out':1
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        if(response.msg == true){
          window.location.replace("../index.php");
        }
      }
    });    
  });


  function ChnageInfo(){

    // this function will automatically change the information display about the user who login in this system
    var login_account_id = $('#login_account_id').val();
    var login_user_id = $('#login_user_id').val();
    
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'edit_user_account':1,
        'account_id':login_account_id,
        'user_id':login_user_id
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        $('.name').text(response.first_name + " " + response.middle_name + " " + response.last_name );
        $('.role').text(response.status==0?"Administration": "Staff");
        
      },

      // Error Handler
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }

    });

  }
  
  


  /*********************************************************** 
  *
  * Back up Database
  *
  ***********************************************************/
 if(filename == "back-up-records"){
   $('#back-up').click(function() {
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'admin_backup':1,
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        new PNotify({
          title: 'Back Up',
          text: 'New Record Successfully Backuped.',
          type: 'success'
        });
        
      },

      // Error Handler
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }

    });
   });

 }
 
  
  /*********************************************************** 
  *
  * User Account with Ajax
  *
  ***********************************************************/

  

  if(filename == "all-users"){
    viewAllUser();
    //  list_of_user
    function viewAllUser(){
      $.get("view_user.php", function(data) {
        // list of all street within the barangay
        $("#list_of_user").html(data);
        // Edit user account
        $('.edit-account').click(function() {
          var account_id = $(this).attr('id');
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'edit_account':1,
              'account_id': account_id
            },
            // async: true,
            // dataType: 'JSON',
            success: function(response,data){
              window.location.replace("../admin/edit-user.php");
              
            },

            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr);
            }
          });
          
        });

        // Call Modal to Delete User Account
        $('.delete-account').click(function() {
          var account_id = $(this).attr('id');
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'find_user_id':1,
              'account_id': account_id
            },
            async: true,
            dataType: 'JSON',
            success: function(response,data){
              // console.info(response)
              $('#deleteUserAccountModal').modal('show');
              $('#delete_account_id').text(response.account_id).hide();;
              $('#delete_user_id').text(response.user_id).hide();;
            },
            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          });
        });

      });
    }


    //Confirm delete user account
    $('#confirm-delete-user-account').click(function() {
      var account_id =  $('#delete_account_id').text();
      var user_id =  $('#delete_user_id').text();
      
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'delete_user_account':1,
          'account_id': account_id,
          'user_id': user_id,
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          if(response.msg == true){
            msg_SuccessfulDelete();
          }else{
            msg_FailedToDelete();
          }
          viewAllUser();
          $('#deleteUserAccountModal').modal('hide');
        },
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      });
    });

  }

  if(filename=="profile"){
    
    profile();
    function profile(){
      var account_id = $('#login_account_id').val();
      var user_id = $('#login_user_id').val();
  
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'edit_user_account':1,
          'user_id': user_id,
          'account_id': account_id
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          $('#first_name').val(response.first_name);
          $('#middle_name').val(response.middle_name);
          $('#last_name').val(response.last_name);
          response.gender == "Male" ? $('#male').attr('checked','checked') :$('#female').attr('checked','checked');
          $('#civil_status').val(response.civil_status);
          $('#citizenship').val(response.citizenship);
          $('#barangay-list').val(response.barangay_id);
          $('#position-list').val(response.position_id);
          $('#username').val(response.username);
          // $('#password').val(response.password);
          $('#role').val(response.status);
          $('#email').val(response.email);
          
        },
  
        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
  
      });
    }
    
    // Use to check the inputted value if it is match to the curret password
    $('#check_password').click(function(){
      var old_password = $('#old_password').val();
      var login_account_id = $('#login_account_id').val();
      var login_user_id = $('#login_user_id').val();
      

      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'check_password':1,
          'old_password': old_password,
          'login_account_id': login_account_id,
          'login_user_id':login_user_id
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          if(old_password.length>0){
            
              
            if(response.msg == true){
              $('label#err_password').empty();
              $('#old-password-form').effect("blind",250);
              // Create Element
              new_password_form   =   '<div class="form-group">';
              new_password_form   +=  ' <label class="col-sm-3 control-label" for="password">New Password</label>';                       
              new_password_form   +=  ' <div class="col-sm-7">';
              new_password_form   +=  '  <div class="input-group input-group-icon">';
              new_password_form   +=  '   <span class="input-group-addon">';
              new_password_form   +=  '    <span class="icon"><i class="fa fa-key"></i></span>';
              new_password_form   +=  '   </span>';
              new_password_form   +=  '   <input type="password" id="new_password" class="form-control" placeholder="Password" name="password" >';
              new_password_form   +=  '  </div>';
              new_password_form   +=  ' </div>';
              new_password_form   +=  '</div>';
              new_password_form   +=  '<div class="form-group">';
              new_password_form   +=  ' <div class="col-sm-3"></div> ';   
              new_password_form   +=  '  <div class="col-sm-9"> ';
              new_password_form   +=  '   <div class="checkbox-custom">';
              new_password_form   +=  '    <input type="checkbox"  name="show_password" id="show-password">';
              new_password_form   +=  '    <label for="show-password">Show Password</label> ';
              new_password_form   +=  '   </div>';
              new_password_form   +=  '  </div>';
              new_password_form   +=  '</div>';
              $('#new-password-form').append(new_password_form);
              $('#new_password').focus();

              // show-password
              $('#show-password').click(function(){
                // Check if the checkbox is checked
                $('input[name=show_password]').is(':checked') ? $('#new_password').attr("type","text"):$('#new_password').attr("type","password");
                
              });
            }else{
              
              $('label#err_password').text('Password not match')
            }
          }else{
            $('#old_password').focus();
            $('label#err_password').text('Please Enter your old password')
            
          }

        },
        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      
      });
    });

    $('#update_profile').click(function(){
      var user_id = $('#login_user_id').val(); 
      var account_id = $('#login_account_id').val(); 

      // Personal iformation
      var first_name = $('#first_name').val();
      var middle_name = $('#middle_name').val();
      var last_name = $('#last_name').val();
      var gender = $('input[name="gender"]:checked').val();
      var civil_status = $('#civil_status').val();
      var citizenship = $('#citizenship').val();

      // Account info
      var username = $('#username').val();
      var password = $('#new_password').val();
      if(password == undefined){
        password = "";
      }
        

      // role type
      var role = $('#role').val();

      // email
      var email = $('#email').val();

      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'update_profile':1,
          'user_id': user_id,
          'account_id': account_id,
          'first_name':first_name,
          'middle_name':middle_name,
          'last_name':last_name,
          'gender':gender,
          'civil_status':civil_status,
          'citizenship':citizenship,
          'username':username,
          'password':password,
          'role':role,
          'email':email
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          if(response.msg){
            msg_SuccessfulUpdate();
          }else{
            msg_FailedToUPdate();
          }
          ChnageInfo();
          
        },

        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }

      });

    });
    
  }


  if(filename=="edit-user"){
    editUserAccount();

    function editUserAccount(){
      $.get("edit-user.php", function(data) {
        var user_id = $('#user_id').val();
        var account_id = $('#account_id').val();
        
        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'edit_user_account':1,
            'user_id': user_id,
            'account_id': account_id
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){
            
            $('#first_name').val(response.first_name);
            $('#middle_name').val(response.middle_name);
            $('#last_name').val(response.last_name);
            response.gender == "Male" ? $('#male').attr('checked','checked') :$('#female').attr('checked','checked');
            $('#civil_status').val(response.civil_status);
            $('#citizenship').val(response.citizenship);
            $('#barangay-list').val(response.barangay_id);
            $('#position-list').val(response.position_id);
            $('#username').val(response.username);
            // $('#password').val(response.password);
            $('#role').val(response.status);
            $('#email').val(response.email);
            
          },
  
          // Error Handler
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
  
        });
      });
    }

    /*
	Wizard #4
	*/
	var $w4finish = $('#w4').find('ul.pager li.finish'),
  $w4validator = $("#w4 form").validate({
      highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error').effect("shake",900);
        
      },
      success: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
        $(element).remove();
      },
      errorPlacement: function( error, element ) {
        element.parent().append( error );
      }
    });

    $w4finish.on('click', function( ev ) {
      ev.preventDefault();
      var validated = $('#w4 form').valid();
      if ( validated ) {

        // User Id
        var user_id = $('#user_id').val(); 

        // Account Id
        var account_id = $('#account_id').val(); 
        
        // Personal iformation
        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var gender = $('input[name="gender"]:checked').val();
        var civil_status = $('#civil_status').val();
        var citizenship = $('#citizenship').val();

        // Barangay Position
        var barangay_list = $('#barangay-list').val();
        var position_list = $('#position-list').val();

        // Account info
        var username = $('#username').val();
        var password = $('#password').val();

        // role type
        var role = $('#role').val();

        // email
        var email = $('#email').val();
        
        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'update_user_acccount':1,
            'user_id':user_id,
            'account_id':account_id,
            'first_name':first_name,
            'middle_name':middle_name,
            'last_name':last_name,
            'gender':gender,
            'civil_status':civil_status,
            'citizenship':citizenship,
            'barangay_list':barangay_list,
            'position_list':position_list,
            'username':username,
            'password': password,
            'role':role,
            'email':email
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){
            if(response.msg_user == true && response.msg_user_account == true){
              msg_SuccessfulUpdate();
              ChnageInfo();
            }else{
              msg_FailedToUPdate();
            }
          },
          // Error Handler
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        });
      }
    });

    $('#w4').bootstrapWizard({
      tabClass: 'wizard-steps',
      nextSelector: 'ul.pager li.next',
      previousSelector: 'ul.pager li.previous',
      firstSelector: null,
      lastSelector: null,
      onNext: function( tab, navigation, index, newindex ) {
        var validated = $('#w4 form').valid();
        if( !validated ) {
          $w4validator.focusInvalid();
          return false;

        }
      },
      onTabClick: function( tab, navigation, index, newindex ) {
        if ( newindex == index + 1 ) {
          return this.onNext( tab, navigation, index, newindex);
        } else if ( newindex > index + 1 ) {
          return false;
        } else {
          return true;
        }
      },
      onTabChange: function( tab, navigation, index, newindex ) {
        var $total = navigation.find('li').size() - 1;
        $w4finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
        $('#w4').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
      },
      onTabShow: function( tab, navigation, index ) {
        var $total = navigation.find('li').length - 1;
        var $current = index;
        var $percent = Math.floor(( $current / $total ) * 100);
        $('#w4').find('.progress-indicator').css({ 'width': $percent + '%' });
        tab.prevAll().addClass('completed');
        tab.nextAll().removeClass('completed');
      }
    });



    // Show Password
    $('#show-password').click(function(){
      // Check if the checkbox is checked
      $('input[name=show_password]').is(':checked') ? $('#password').attr("type","text"):$('#password').attr("type","password");
      
    });

    
  }

  if(filename == "new-user"){

    // Show Password
    $('#show-password').click(function(){
      // Check if the checkbox is checked
      $('input[name=show_password]').is(':checked') ? $('#password').attr("type","text"):$('#password').attr("type","password");
      
    });
      /*
    Wizard #4
    */
    var $w4finish = $('#w4').find('ul.pager li.finish'),
    $w4validator = $("#w4 form").validate({
      highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error').effect("shake",900);
        
      },
      success: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
        $(element).remove();
      },
      errorPlacement: function( error, element ) {
        element.parent().append( error );
      }
    });

    $w4finish.on('click', function( ev ) {
      ev.preventDefault();
      var validated = $('#w4 form').valid();
      if ( validated ) {
        
        // Personal iformation
        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var gender = $('input[name="gender"]:checked').val();
        var civil_status = $('#civil_status').val();
        var citizenship = $('#citizenship').val();

        // Barangay Position
        var barangay_list = $('#barangay-list').val();
        var position_list = $('#position-list').val();

        // Account info
        var username = $('#username').val();
        var password = $('#password').val();

        // role type
        var role = $('#role').val();

        // email
        var email = $('#email').val();
        
        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'add_new_user_account':1,
            'first_name':first_name,
            'middle_name':middle_name,
            'last_name':last_name,
            'gender':gender,
            'civil_status':civil_status,
            'citizenship':citizenship,
            'barangay_list':barangay_list,
            'position_list':position_list,
            'username':username,
            'password': password,
            'role':role,
            'email':email
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){
            if(response.msg == true ){
              msg_SuccessfulSave();
                
            }else{
              msg_FailedToSave();
            }
          },
          // Error Handler
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        });
      }
    });

    $('#w4').bootstrapWizard({
      tabClass: 'wizard-steps',
      nextSelector: 'ul.pager li.next',
      previousSelector: 'ul.pager li.previous',
      firstSelector: null,
      lastSelector: null,
      onNext: function( tab, navigation, index, newindex ) {
        var validated = $('#w4 form').valid();
        if( !validated ) {
          $w4validator.focusInvalid();
          return false;

        }
      },
      onTabClick: function( tab, navigation, index, newindex ) {
        if ( newindex == index + 1 ) {
          return this.onNext( tab, navigation, index, newindex);
        } else if ( newindex > index + 1 ) {
          return false;
        } else {
          return true;
        }
      },
      onTabChange: function( tab, navigation, index, newindex ) {
        var $total = navigation.find('li').size() - 1;
        $w4finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
        $('#w4').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
      },
      onTabShow: function( tab, navigation, index ) {
        var $total = navigation.find('li').length - 1;
        var $current = index;
        var $percent = Math.floor(( $current / $total ) * 100);
        $('#w4').find('.progress-indicator').css({ 'width': $percent + '%' });
        tab.prevAll().addClass('completed');
        tab.nextAll().removeClass('completed');
      }
    });


  }
  
  
  

  /*********************************************************** 
  *
  * Barangay Street Crud with Ajax
  *
  ***********************************************************/
  
  if(filename == "street"){
    viewBarangayStreet();
    // <button type="button" id="update_barangay_street" class="btn btn-primary  mb-xs mt-xs mr-xs "><i class="fa fa-edit"></i> Update</button>
													
    // Barangay Street List
    function viewBarangayStreet(){
      $.get("view_barangay_street.php", function(data) {
        // list of all street within the barangay
        $("#list_of_barangay_street").html(data);
        var click_Count = 0;
        // Edit Barangay Street
        $('.edit-barangay-street').click(function() {
          $('#barangay_street').css("border-color","").focus();
          $('#label').css("color","");
          $('#err_msgs').empty();
          
          var barangay_street_id = $(this).attr('id');  
          $('#add_new_barangay_street').hide();
          if(click_Count<=0){
            $('#update-barangay-street').append('<button type="button" id="update_barangay_street" class="btn btn-primary  mb-xs mt-xs mr-xs "><i class="fa fa-edit"></i> Update</button>');
            click_Count++;
          }
          $('#barangay-list').val();
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'edit_barangay_street':1,
              'barangay_street_id': barangay_street_id
            },
            async: true,
            dataType: 'JSON',
            success: function(response,data){
              
              // Pass the response value in an element
              $('#barangay-list').val(response.barangay_id);
              $('#barangay_street_id').val(response.barangay_street_id);
              $('#barangay_street').val(response.barangay_street).focus();
              $('.panel-title#panel-title').text('Update Street');
            },

            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          });
          
        });

        // Call Modal to Delete Barangay Street
        $('.delete-barangay-street').click(function() {
          var barangay_street_id = $(this).attr('id');
          $('#delete_barangay_street_id').text(barangay_street_id).hide();
          $('#deleteBarangayStreetModal').modal('show');
        });

        

      });
    }

    $('#barangay_street').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#add_new_barangay_street').click();
      }
    });
    
    // Add New Barangay Street
    $(document).on('click','#add_new_barangay_street',function(){
      var _isBarangayRequiredForStreet = isBarangayRequiredForStreet();
      var _isBarangayStreetRequired = isBarangayStreetRequired();

      if((_isBarangayRequiredForStreet || _isBarangayStreetRequired )){
        return
      }

      var barangay_street = $('#barangay_street').val();
      var barangay_id = $('#barangay-list').val();

      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'save_barangay_street':1,
          'barangay_street': barangay_street,
          'barangay_id': barangay_id
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          JSON.parse(JSON.stringify(data));
          afterBarangayStreetAction();
          
          if(response.msg == true){
            msg_SuccessfulSave();
          }else{
            msg_FailedToSave(); 
          }
          viewBarangayStreet();
          
        },
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      });
    });


    $('#barangay_street').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#update_barangay_street').click();
      }
    });

    //  Update Selected Barangay Street
    $(document).on('click','#update_barangay_street',function(){

      var _isBarangayRequiredForStreet = isBarangayRequiredForStreet();
      var _isBarangayStreetRequired = isBarangayStreetRequired();

      if((_isBarangayRequiredForStreet || _isBarangayStreetRequired )){
        return
      }
      
      var barangay_street_id = $('#barangay_street_id').val();
      var barangay_street = $('#barangay_street').val();
      var barangay_id = $('#barangay-list').val();

      
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'update_barangay_street':1,
          'barangay_street_id': barangay_street_id,
          'barangay_street':barangay_street,
          'barangay_id':barangay_id
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          afterBarangayStreetAction();
          $('.panel-title#panel-title').text('Add Street');
          $('#update_barangay_street').hide();
          $('#add_new_barangay_street').slideDown(500);
          if(response.msg == true){
            msg_SuccessfulUpdate();
          }else{
            msg_FailedToUPdate();
          }
          viewBarangayStreet();
        },
        error: function(xhr,textStatus, error){
          console.info( xhr.responseText);
        }
      });
    });
    
    $('#confirm-delete-Barangay-Street').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#confirm-delete-Barangay-Street').click();
      }
    });

    

    // Delete Selected Barangay
    $('#confirm-delete-Barangay-Street').click(function() {
      var barangay_street_id =  $('#delete_barangay_street_id').text();
      
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'delete_barangay_street':1,
          'barangay_street_id': barangay_street_id
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          JSON.parse(JSON.stringify(data));
          // afterBarangayAction();
          // Successful Delete
          if(response.msg == true){
            msg_SuccessfulDelete();
          }else{
            msg_FailedToDelete();
          }
          viewBarangayStreet();
          $('#deleteBarangayStreetModal').modal('hide');
        },
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      });
    });

    // fields is required Function
    function isBarangayRequiredForStreet(){
      if($('#barangay-list').val() == ""){
        $('#err_msgs_barangay_list').text('This field is required').effect( "shake", 500 );
        $('#barangay-list').css("border-color", "red").effect( "shake", 500 ).focus();
        $('#label_barangay').css("color", "red").effect( "shake", 500 );
        return true;
      }else{
        $('#err_msgs_barangay_list').empty();
        $('#barangay-list').css("border-color","").focus();
        $('#label_barangay').css("color","");
        return false;
      }
    }
    function isBarangayStreetRequired(){
      if($('#barangay_street').val().length<1){
        $('#err_msgs').text('This field is required').effect( "shake", 500 );
        $('#barangay_street').css("border-color", "red").focus().effect( "shake", 500 );
        $('#label_barangay_street').css("color", "red").effect( "shake", 500 );
        return true;
      }else{
        $('#err_msgs').empty();
        $('#barangay_street').css("border-color","").focus();
        $('#label_barangay_street').css("color","");
        return false;
      }
    }

    // do this after an actions
    function afterBarangayStreetAction(){
      $('#barangay-list').val(''); 
      $('#barangay_street').val(''); 
    }
  
    // Reset fields
    $(document).on('click','#reset_barangay_street',function(){
      $('#err_msgs_barangay_list').empty();
      $('#barangay-list').val('').css("border-color","").focus();
      $('#label_barangay').css("color","");
      $('#barangay_street').val('').css("border-color","").focus();
      $('#err_msgs').empty();
      $('#label_barangay_street').css("color","");

    });
  }
    

 
  /*********************************************************** 
  *
  * Barangay Crud with Ajax
  *
  ***********************************************************/

  if(filename == "barangay"){
    viewBarangay();
    function viewBarangay(){
      $.get("view_barangay.php", function(data) {
        // list of all Barangay  
        $("#list_of_barangay").html(data);
        var click_Count = 0;
        // Edit Barangay
        $('.edit-barangay').click(function() {
          $('#barangay').focus();
          $('#barangay').css("border-color","");
          $('#label').css("color","");
          $('#err_msgs').empty();
          
          var barangay_id = $(this).attr('id');
          $('#add_new_barangay').hide();
          if(click_Count<=0){
            $('#update-barangay').append('<button type="button" name="update_barangay" id="update_barangay" class="btn btn-primary  mb-xs mt-xs mr-xs "><i class="fa fa-edit"></i> Update</button>');
            click_Count++;
          }
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'edit_barangay':1,
              'barangay_id': barangay_id
            },
            async: true,
            dataType: 'JSON',
            success: function(response,data){
  
              // Pass the response value in an element
              $('#barangay_id').val(response.barangay_id);
              $('#barangay').val(response.barangay_name).focus();
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
          $('#delete_barangay_id').text(delete_id).hide();
          $('#deleteBarangayModal').modal('show');
        });

        
      });
    }
  

    // KeyPress
    $('#barangay').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#add_new_barangay').click();
      }
    });
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
            msg_FailedToDelete();
          }
          viewBarangay();
          $('#deleteBarangayModal').modal('hide');
        },
        error: function(xhr, textStatus, error){
          console.info(xhr.textStatus);
        }
      });
    });
  
    // Keypres
    $('#barangay').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#update_barangay').click();
      }
    });

    // Update Selected Barangay
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
            msg_FailedToUPdate();
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
        $('#err_msgs').text('This field is required').effect( "shake", 1000 );
        $('#barangay').css("border-color", "red").effect( "shake", 1000 ).focus();
        $('#label').css("color", "red").effect( "shake", 1000 );
        return true;
      }
    }
    // do this after an actions
    function afterBarangayAction(){
      $('#err_msgs').empty();
      $('#barangay').val('').css("border-color","").focus();;
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
  }

  
  
  /*********************************************************** 
  *
  * Position Crud with Ajax
  *
  ***********************************************************/
  
  if(filename == "position"){
    
    viewPosition();
    // $('#update_position').hide();

    // Functions for some purposes

    // purposed of this function is to view, edit, delete the data
    
    function viewPosition(){
      $.get("view_position.php", function(data) {
        // list of all position  
        $("#list_of_position").html(data);
        
        var click_Count = 0; 
        // Edit Position
        $('.edit-position').click(function() {
          $('#position').focus();
          $('#position').css("border-color","");
          $('#label').css("color","");
          $('#err_msgs').empty();
          
          var edit_id = $(this).attr('id');
          if(click_Count<=0){
            $("#update-position").append('<button type="button" name="update_position" id="update_position" class="btn btn-primary  mb-xs mt-xs mr-xs "><i class="fa fa-edit"></i> Update</button>');
            
            click_Count++;
          }
          
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
          $('#delete_position_id').text(delete_id).hide();
          $('#deletePositionModal').modal('show');
        });

    
      });
    }

    
    // fields is required Function
    function isPositionRequired(){
      if($('#position').val().length<1){
        $('#err_msgs').text('This field is required').effect( "shake", 900 );
        $('#position').css("border-color", "red").effect( "shake", 900 ).focus();
        $('#label').css("color", "red").effect( "shake", 900 );
        return true;
      }
    }
    
    // do this after an actions
    function afterPositionAction(){
      $('#err_msgs').empty();
      $('#position').val('').css("border-color","").focus();
      $('#label').css("color","");
    }


    // Using keypress
    $('#position').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#add_new_position').click();
      }
    });

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


    $('#position').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#update_position').click();
      }
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
            msg_FailedToUPdate();
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
      $('#position').css("border-color","").val('').focus();
      $('#err_msgs').empty();
      $('#label').css("color","");

    });
  }
  


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

  // Update Messages
  function msg_SuccessfulUpdate(){
    new PNotify({
      title: 'Updated!',
      text: 'New Record Updated',
      type: 'success'
    });
  }

  function msg_FailedToUPdate(){
    new PNotify({
      title: 'Error!',
      text: "Already Exist",
      type: 'error'
      
    });
  }


  // Delete Messages
  function msg_SuccessfulDelete(){
    new PNotify({
      title: 'Deleted',
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

  /*********************************************************** 
  *
  * Change Layout
  *
  ***********************************************************/
  
  // Default Layout
  $(document).on('click','#layout-default',function(){
    $('html').attr("class","fixed")
  });

  // Boxed Layout
  $(document).on('click','#layout-boxed',function(){
    $('html').attr("class","boxed")
  });

  // Menu Collapsed Layout
  $(document).on('click','#layout-menu-collapsed',function(){
    $('html').attr("class","fixed sidebar-left-collapsed")
  });
  
  // Scroll Layout
  $(document).on('click','#layouts-scroll',function(){
    $('html').attr("class","scroll sidebar-left-collapsed")
  });

});


