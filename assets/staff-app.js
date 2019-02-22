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

  $('#pwd').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      $('#unlock').click();
    }
  });
  
  // Unlock Screen
  $('#unlock').click(function() 
  {
    var password = $('#pwd').val();
    if(password == ""){
      $('#pwd').css('border','1px solid red').focus();
      $('.icon.icon-lg>.fa.fa-lock').css('color','red');
      $('#password_err').text("This field is required");
      $('.form-group.mb-lg').effect("shake",1000);
      return;
    }
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'unlock':1,
        'password':password
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        (response.msg > 0) ? $.magnificPopup.close():$('#password_err').text("Invalid Password");
      },
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }

    });    
  });

  

  $('#logout').click(function() 
  {
    $('#log_out').click();
  });


  $('#lock_screen').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom',
    modal: true
    
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
        $('body').append(xhr.responseText);
        // console.info(xhr.responseText);
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
  * All Resident
  *
  ***********************************************************/

  if(filename == "all-resident"){

    fetchAllPerson();
    function fetchAllPerson(){
      $.get("view-resident.php", function(data) {
        // list of all street within the barangay
        $("#lisf-of-resident").html(data);
        // var click_Count = 0;
        // Edit Person
        $('.edit-person').click(function() {
          
          
          var person_id = $(this).attr('id');
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'set_session_person_id':1,
              'person_id': person_id
            },
            // async: true,
            // dataType: 'JSON',
            success: function(response,data){
              window.location.replace("../staff/edit-resident.php");
            },

            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr);
            }
          });
          
        });

        // Call Modal to Delete Barangay Street
        $('.delete-person').click(function() {
          var person_id = $(this).attr('id');
          $('#delete_residence_household_id').text(person_id).hide();
          $('#deleteResidenceHouseholdModal').modal('show');
        });
      });
    }

    $('#confirm-delete-residen').click(function() {
      var person_id = $('#delete_residence_household_id').text();
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'delete_resident':1,
          'person_id': person_id
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          if(response.msg==true){
            msg_SuccessfulDelete();
          }else{
            msg_FailedToDelete();
          } 
          $('#deleteResidenceHouseholdModal').modal('hide');
          fetchAllPerson();
        },

        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText)
        }
      });
    });
  }



  

  /*********************************************************** 
  *
  * Edit Resident
  *
  ***********************************************************/


  if(filename == "edit-resident"){
    var person_id = $('#person_id').val();

    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'fetc_residence_household':1,
        'person_id': person_id

      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        $('#household_id').val(response.household_id);
        $('#first_name').val(response.first_name).focus();
        $('#middle_name').val(response.middle_name);
        $('#last_name').val(response.last_name);
        $('#extension').val(response.extension);
        $('#house_number').val(response.house_number);
        $('#birthplace').val(response.birthplace);
        $('#birthdate').val(response.birthdate);
        response.sex == "Male" ? $('#male').attr('checked','checked') :$('#female').attr('checked','checked');
        $('#status').val(response.civil_status);
        $('#citizenship').val(response.citizenship);
        // $("#occupation option['value=" + response.occupation + "']").attr('selected', 'selected');
        $("#occupation").val(response.occupation)
        $('#street').val(response.street_id);
        $('#household_number').val(response.household_number);

      },

      // Error Handler
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }
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

      // Update Residence household
      if ( validated ) {
        var person_id         = $('#person_id').val();
        var first_name        = $('#first_name').val();
        var middle_name       = $('#middle_name').val();
        var last_name         = $('#last_name').val();
        var extension         = $('#extension').val();
        var house_number      = $('#house_number').val();
        var birthplace        = $('#birthplace').val();
        var birthdate         = $('#birthdate').val();
        var gender            = $('input[name="gender"]:checked').val();
        var status            = $('#status').val();
        var citizenship       = $('#citizenship').val();
        var occupation        = $('#occupation').val();
        var street            = $('#street').val();
        var household_number  = $('#household_number').val();
        var household_id	    = $('#household_id').val();

        

        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'update_residence_household':1,
            'person_id'                 : person_id,
            'first_name'                : first_name,
            'middle_name'               : middle_name,
            'last_name'                 : last_name,
            'extension'                 : extension,
            'house_number'              : house_number,
            'birthplace'                : birthplace,
            'birthdate'                 : birthdate,
            'gender'                    : gender,
            'status'                    : status,
            'citizenship'               : citizenship,
            'occupation'                : occupation,
            'street'                    : street,
            'household_number'          : household_number,
            'household_id'              : household_id
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){
            
            if(response.msg == true){
              msg_SuccessfulUpdate();
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
    

  }



  /*********************************************************** 
  *
  * Add New Resident
  *
  ***********************************************************/

  if(filename == "new-resident"){
   
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
        var first_name        = $('#first_name').val();
        var middle_name       = $('#middle_name').val();
        var last_name         = $('#last_name').val();
        var extension         = $('#extension').val();
        var house_number      = $('#house_number').val();
        var birthplace        = $('#birthplace').val();
        var birthdate         = $('#birthdate').val();
        var gender            = $('input[name="gender"]:checked').val();
        var status            = $('#status').val();
        var citizenship       = $('#citizenship').val();
        var occupation        = $('#occupation').val();
        var street            = $('#street').val();
        var household_number  = $('#household_number').val();


        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'save_new_resident':1,
            'first_name'        : first_name,
            'middle_name'       : middle_name,
            'last_name'         : last_name,
            'extension'         : extension,
            'house_number'      : house_number,
            'birthplace'        : birthplace,
            'birthdate'         : birthdate,
            'gender'            : gender,
            'status'            : status,
            'citizenship'       : citizenship,
            'occupation'        : occupation,
            'street'            : street,
            'household_number'  : household_number
          },
          async: true,
          dataType: 'JSON',
          success: function(response,data){
            
            if(response.msg == true){
              msg_SuccessfulSave();
            }else{
              msg_FailedToSave();
            }
            // $('#first_name').val('').focus();
            // $('#middle_name').val('');
            // $('#last_name').val('');
            // $('#extension').val('');
            // $('#house_number').val('');
            // $('#birthplace').val('');
            // $('#birthdate').val('');
            // $('#female').removeAttr('checked');
            // $('#male').removeAttr('checked');
            // $('#status').val('Single');
            // $('#citizenship').val('');
            // $('#occupation').val('Student');
            // $('#street').val('Purok 2');
            // $('#household_number').val('');

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
  * User Profile
  *
  ***********************************************************/
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


  /*********************************************************** 
  *
  * Barangay Issue
  *
  ***********************************************************/
 
  if(filename == "all-issue"){


    fetchAllIssue();
    
    function fetchAllIssue(){
      $.get("view-issue.php", function(data) {
        // list of all issue within the barangay
        $("#lisf-of-issue").html(data);
        // var click_Count = 0;
        // Edit Issue
        $('.edit-issue').click(function() {
          
          
          var issue_id = $(this).attr('id');
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'set_issue_id':1,
              'issue_id': issue_id
            },
            // async: true,
            // dataType: 'JSON',
            success: function(response,data){
              window.location.replace("../staff/edit-issue.php");
            },

            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          });
          
        });

        // Call Modal to Delete Barangay Street
        $('.delete-issue').click(function() {
          var issue_id = $(this).attr('id');
          $('#delete_barangay_issue_id').text(issue_id);
          $('#deleteBarangayIssueModal').modal('show');
        });
        
        // View Selected Issue
        $('.view-issue').click(function() {
          var issue_id = $(this).attr('id');
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'view_selected_issue':1,
              'issue_id': issue_id
    
            },
            async: true,
            dataType: 'JSON',
            success: function(response,data){
              
              $('#complainant').text(response.complainant);
              $('#complained_resident').text(response.complained_resident);
              $('#datefilled').text(response.date_of_filling);
              $('#description').text(response.description);
              $('#oic').text(response.oic);
              $('#status').text(response.status);
            },
    
            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          });
          
        });
        $('.view-issue').magnificPopup({
          
          type: 'inline',

          fixedContentPos: false,
          fixedBgPos: true,

          overflowY: 'auto',

          closeBtnInside: true,
          preloader: false,
          
          midClick: true,
          removalDelay: 300,
          mainClass: 'my-mfp-zoom-in',
          modal: true
        });
      });
    }
    /*
    Modal Dismiss
    */
    $(document).on('click', '.modal-dismiss', function (e) {
      e.preventDefault();
      $.magnificPopup.close();
    });
    /*
    Modal Confirm
    */
    $(document).on('click', '.modal-confirm', function (e) {
      e.preventDefault();
      $.magnificPopup.close();

      new PNotify({
        title: 'Success!',
        text: 'Modal Confirm Message.',
        type: 'success'
      });
    });

    // Confirm Delete Selected Barangay Issue
    $(document).on('click','#confirm-delete-Barangay-Issue',function(){

      var delete_barangay_issue_id = $('#delete_barangay_issue_id').text();
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'confirm_delete_barangay_issue':1,
          'delete_barangay_issue_id': delete_barangay_issue_id

        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          
          if(response.msg==true){
            msg_SuccessfulDelete();
          }else{
            msg_FailedToDelete();
          } 
          $('#deleteBarangayIssueModal').modal('hide');
          fetchAllIssue();
        },

        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      });
      
    });
    
  }


  // 
  if(filename == "edit-issue"){

    fetch_selected_issue();
    function fetch_selected_issue(){
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'fetch_selected_issue':1,
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          
          $('#complainant').val(response.complainant)
          $('#complained_resident').val(response.complained_resident)
          $('#status').val(response.status).removeAttr('disabled')
          $('.note-editable').text(response.Description)
        },

        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      });
    }

    function isDescriptionRequired(){
      var description = $('.note-editable').text();
      if(description==""){
        $('#description_err').text('This field is required').effect("shake",900);
        $('#description-label').addClass('error').effect("shake",900);
        $('.note-editor').css("border","1px solid red").focus().effect("shake",900);
        return true;
      }else{
        $('#description_err').text('');
        $('#description-label').removeClass('error');
        $('.note-editor').css("border","");
        return false;
      }
    }

    $(document).on('click','#update_issue',function(){
      var complainant           = $('#complainant').val();
      var complained_resident   = $('#complained_resident').val();
      var status                = $('#status').val();
      var description           = $('.note-editable').text();
      
      if(isDescriptionRequired()){
        return;
      }
      
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'update_issue':1,
          'complainant': complainant,
          'complained_resident':complained_resident,
          'status':status,
          'description':description
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          
          if(response.msg==true){
            msg_SuccessfulUpdate();
          }else{
            msg_FailedToUPdate();
          } 
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
  * Barangay Issue
  *
  ***********************************************************/

  //Add New issue

  if(filename == "new-issue"){

    function isDescriptionRequired(){
      var description = $('.note-editable').text();
      if(description==""){
        $('#description_err').text('This field is required').effect("shake",900);
        $('#description-label').addClass('error').effect("shake",900);
        $('.note-editor').css("border","1px solid red").focus().effect("shake",900);
        return true;
      }else{
        $('#description_err').text('');
        $('#description-label').removeClass('error');
        $('.note-editor').css("border","");
        return false;
      }
    }

    $(document).on('click','#add_new_issue',function(){
      var complainant           = $('#complainant').val();
      var complained_resident   = $('#complained_resident').val();
      var status                = $('#status').val();
      var description           = $('.note-editable').text();
      if(isDescriptionRequired()){
        return;
      }
      
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'add_new_issue':1,
          'complainant': complainant,
          'complained_resident':complained_resident,
          'status':status,
          'description':description
        },
        async: true,
        dataType: 'JSON',
        success: function(response,data){
          if(response.msg==true){
            msg_SuccessfulSave();
          }else{
            msg_FailedToSave();
          }

          // clear input for description
          $('.note-editable').text('')
            
        },

        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      });
      
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


