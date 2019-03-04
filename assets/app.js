$(document).ready(function(){

  // Page Load Animation
  // Main Content Animation
  
  $( "section.content-body").effect( "slide", 1000);
  $( "header.header").fadeIn();
  // $( "section div.row").hide();
  // $( "section div.row").slideDown(900);

  // Animation from animte.css
  // $( "header.header").addClass('animated fadeInLeft');
  // $( "header.header").removeClass('animated fadeInLeft');
  // $( "header.page-header").addClass('animated fadeInRight');
  
  // $( "div.right-wrapper.pull-right").addClass('animated wobble delay-2s ');
  // $( "aside#sidebar-left").addClass('animated fadeInUp');
  $( "h4#brandName").addClass('animated rubberBand infinite ');
  // $( "nav ul li").addClass('animated tada ');
  // $( ".sidebar-toggle.hidden-xs").addClass('animated jackInTheBox ');

  $( "section.content-body .row").addClass('animated zoomIn ');
  $( "section.panel.panel-featured.panel-featured-primary").addClass('animated zoomIn ');
  $( "section div.col-md-12").addClass('animated zoomIn ');
  

    

  $( "div.modal-icon.center").addClass('animated shake infinite ');
  

  // $( "div.ui-pnotify").addClass('animated rotateInDownRight ');

  
  // $('section.body').addClass('animated pulse')

  try{
    //  Pull the file name from the URL
    var filename = window.location.pathname.match(/.*\/([^/]+)\.([^?]+)/i)[1];
    filename = filename.toLocaleLowerCase();
  }catch(ex){
    filename ="index";
  }


  var text = window.location.href;
  var result = text.split('/') 

  if(result.length == 6){
    if(result[4] != "admin"){
      window.location.replace(result[0] + '/' + result[1] + '/' + result[2] + '/' + result[3] + '/admin/404.php');
    }

  }else{
    if(result[3] != "admin"){
      window.location.replace(result[0] + '/' + result[1] + '/' + result[2] + '/' + 'admin/404.php')
    }
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
        

        if(response.msg > 0){
          $.magnificPopup.close()
          $('#pwd').val('');
          $('#lockScreen').effect("explode",callback());
          function callback(){
            setTimeout(function() {
              $( "#lockScreen" ).removeAttr( "style" ).hide().fadeIn();
            }, 3000 );
      
          }
          $('#password_err').text('');
          
        }else{
          $('#password_err').text("Invalid Password")
        }
        
        
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


  $('.lockMe').click(function() 
  {
    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'lockMe':1,
      },
      success: function(response,data){
        lock();
      },
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }

    }); 
  });

  lock();
  var lock_screen = $('#lock-screen').val();
  if(lock_screen==1){
    $('.lockMe').click();
  }



  function lock(){
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
  }
  


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
        $('#LockUserEmail').text(response.email);
        $('#logout').text("Not "+response.first_name + " " + response.middle_name + " " + response.last_name +"?" );
        $('#LockUserName').text(response.first_name + " " + response.middle_name + " " + response.last_name );
        
      },

      // Error Handler
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }

    });

  }
  

  /*********************************************************** 
  *
  * Admin Dashboard
  *
  ***********************************************************/

  if(filename == "index"){ 

    $('#barangay-list').click();
    $('#barangay-list').click(function(){
      var barangay_id = $(this).val() 
      $.ajax({
        url: '../classes/main.php',
        type: 'POST',
        data:{
          'population-chart':1,
          'barangay_id': barangay_id
        },
        // async: true,
        // dataType: 'JSON',
        success: function(response,data){
          // var datapoints = JSON.parse(response)
          let datapoints = (JSON.parse(response))

          let result = datapoints.map(function(x) { 
              x.y = Number(x.y);  
              return x;
          }); 
          var chart = new CanvasJS.Chart("chartContainer", {
            theme:"light2",
            zoomEnabled: true,
            animationEnabled: true,
            animationEnabled: true,
            axisX: {
              title: "Street Name",
              gridThickness: .9,
              lineThickness: .9,
              titleFontSize: 14,
              labelFontSize: 12,
              
            },
            axisY :{
              includeZero: true,
              title: "Number of Population",
              gridThickness: .9,
              lineThickness: .9,
              titleFontSize: 14,
              labelFontSize: 12
            },
            toolTip: {
              shared: "true"
            },
            legend:{
              cursor:"pointer",
              itemclick : toggleDataSeries,
              verticalAlign: "bottom",
              horizontalAlign: "center"
            },
            data: [{
              type: "spline", 
              showInLegend: true,
              name: "Populaltion Number",
              dataPoints: 
                result
            }]
          }); 
          chart.render();
      
          function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
              e.dataSeries.visible = false;
            } else {
              e.dataSeries.visible = true;
            }
            chart.render();
          }
           
        },
        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      }); 

    });


    $.ajax({
      url: '../classes/main.php',
      type: 'POST',
      data:{
        'admin_dashboard':1
      },
      async: true,
      dataType: 'JSON',
      success: function(response,data){
        
        $('#user_num').text(response.num_user)
        $('#barangay_num').text(response.num_barangay)
        $('#barangay_street_num').text(response.num_street)
        $('#position_num').text(response.num_position)
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
    var click_Count = 0;
    function viewAllUser(){
      
      var table = $('#example').DataTable( {
        "destroy": true,    // Destroy after event
        "retrieve":true,    // retrieve after event
        "paging": true,     // pagination
        "ajax":"view_user.php",  // data
        "bDestroy": true,   // destro after event
        "columnDefs": [ {   // define the column
            "targets": -1,
            "data": null,
            "defaultContent": 
                `<a  style="cursor: pointer"  id="edit" class="text-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
                <a style="cursor: pointer"  class='text-danger' id='delete'><i class='fa  fa-trash-o '> Delete </i></a>`
        } ],
        "scrollY": 400,     // scroll vertical
        "scrollX": true	    // scroll horizontal
      } );

      var column = table.column(0);
      // Get the column API object
      // Hide the  ID
 
      // Toggle the visibility
      column.visible( ! column.visible() );
      

      // Edit Barangay
      
      $('#example tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $.ajax({
          url: '../classes/main.php',
          type: 'POST',
          data:{
            'edit_account':1,
            'account_id': data[0]
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
  
          
      $('#example tbody').on( 'click', '#delete', function () {
          var data = table.row( $(this).parents('tr') ).data();
          
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'find_user_id':1,
              'account_id': data[0]
            },
            async: true,
            dataType: 'JSON',
            success: function(response,data){
              // console.info(response)
              $('#deleteUserAccountModal').modal('show');
              $('#delete_account_id').text(response.account_id).hide() 
              $('#delete_user_id').text(response.user_id).hide() 
            },
            // Error Handler
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
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
          $('#example').DataTable().ajax.reload();
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
    

    $('#old_password').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $('#check_password').click();
      }
    });

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
              new_password_form   +=  ' <div class="col-md-3"></div> ';   
              new_password_form   +=  '  <div class="col-md-9"> ';
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
  var click_Count = 0;
  function viewBarangayStreet(){
    
    var table = $('#example').DataTable( {
      "destroy": true,    // Destroy after event
      "retrieve":true,    // retrieve after event
      "paging": true,     // pagination
      "ajax":"view_barangay_street.php",  // data
      "bDestroy": true,   // destro after event
      "columnDefs": [ {   // define the column
          "targets": -1,
          "data": null,
          "defaultContent": 
              `<a  style="cursor: pointer"  id="edit" class="text-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
              <a style="cursor: pointer"  class='text-danger' id='delete'><i class='fa  fa-trash-o '> Delete </i></a>`
      } ],
      "scrollY": 400,     // scroll vertical
      "scrollX": true	    // scroll horizontal
    } );

    var column = table.column(0);
    // Get the column API object
    // Hide the  ID

    // Toggle the visibility
    column.visible( ! column.visible() );
    

    // Edit Barangay
    
    $('#example tbody').on( 'click', '#edit', function () {
      var data = table.row( $(this).parents('tr') ).data();
      $('#barangay_street').css("border-color","").focus();
      $('#label').css("color","");
      $('#err_msgs').empty(); 
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
          'barangay_street_id': data[0]
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

        
    $('#example tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $('#delete_barangay_street_id').text(data[0]).hide();
        $('#deleteBarangayStreetModal').modal('show');
    });
  }
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
        $('#example').DataTable().ajax.reload();
        click_Count = 0;  
        
      },
      error: function(xhr, textStatus, error){
        console.info(xhr.responseText);
      }
    });
  });

  //  Update Selected Barangay Street
  $(document).on('click','#update_barangay_street',function(){
    $(this).hide()
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
        $('#add_new_barangay_street').slideDown(500);
        if(response.msg == true){
          msg_SuccessfulUpdate();
        }else{
          msg_FailedToUPdate();
        }
        $('#example').DataTable().ajax.reload();
        click_Count = 0;
      },
      error: function(xhr,textStatus, error){
        console.info( xhr.responseText);
      }
    });
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
        // Successful Delete
        if(response.msg == true){
          msg_SuccessfulDelete();
        }else{
          msg_FailedToDelete();
        }
        $('#example').DataTable().ajax.reload();
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
      $('#err_msgs_barangay_list').text('This field is required').effect( "shake", 900 );
      $('#barangay-list').css("border-color", "red").effect( "shake", 900 ).focus();
      $('#label_barangay').css("color", "red").effect( "shake", 900 );
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
      $('#err_msgs').text('This field is required').effect( "shake", 900 );
      $('#barangay_street').css("border-color", "red").focus().effect( "shake", 900 );
      $('#label_barangay_street').css("color", "red").effect( "shake", 900 );
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

  // Barangay page
  if(filename == "barangay"){
    var click_Count = 0; 
    viewPosition();
    function viewPosition(){
      
      var table = $('#example').DataTable( {
        "destroy": true,    // Destroy after event
        "retrieve":true,    // retrieve after event
        "paging": true,     // pagination
        "ajax":"view_barangay.php",  // data
        "bDestroy": true,   // destro after event
        "columnDefs": [ {   // define the column
            "targets": -1,
            "data": null,
            "defaultContent": 
                `<a  style="cursor: pointer"  id="edit" class="text-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
                <a style="cursor: pointer"  class='text-danger' id='delete'><i class='fa  fa-trash-o '> Delete </i></a>`
        } ],
        "scrollY": 400,     // scroll vertical
        "scrollX": true	    // scroll horizontal
      } );

      var column = table.column(0);
      // Get the column API object
      // Hide the  ID
 
      // Toggle the visibility
      column.visible( ! column.visible() );
      

      // Edit Barangay
      
      $('#example tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
          if(click_Count<=0){
            $("#update-barangay").append('<button type="button"  id="update_barangay" class="btn btn-primary  mb-xs mt-xs mr-xs "><i class="fa fa-edit"></i> Update</button>');
            click_Count++;
            
          }
          $('#add_new_barangay').hide();
          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'edit_barangay':1,
              'barangay_id': data[0]
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
  
          
      $('#example tbody').on( 'click', '#delete', function () {
          var data = table.row( $(this).parents('tr') ).data();
          $('#delete_barangay_id').text(data[0]).hide();
          $('#deleteBarangayModal').modal('show');
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
          $('#example').DataTable().ajax.reload();
          click_Count = 0;
        },
        error: function(xhr, textStatus, error){
          console.info(textStatus);
        }
      });
  
    });

    // Delete selected Barangay
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
          $('#example').DataTable().ajax.reload();
          $('#deleteBarangayModal').modal('hide');
        },
        error: function(xhr, textStatus, error){
          console.info(xhr.textStatus);
        }
      });
    });

    // Update Selected Barangay
    $(document).on('click','#update_barangay',function(){
  
      $(this).hide()
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
          
          $('#example').DataTable().ajax.reload();
          click_Count = 0;
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
 
  // Position page
  if(filename == "position"){
 
    viewPosition();

    var click_Count = 0;
    function viewPosition(){
      
      var table = $('#example').DataTable( {
        "destroy": true,    // Destroy after event
        "retrieve":true,    // retrieve after event
        "paging": true,     // pagination
        "ajax":"view-position.php",  // data
        "bDestroy": true,   // destro after event
        "columnDefs": [ {   // define the column
            "targets": -1,
            "data": null,
            "defaultContent": 
                `<a  style="cursor: pointer"  id="edit" class="text-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
                <a style="cursor: pointer"  class='text-danger' id='delete'><i class='fa  fa-trash-o '> Delete </i></a>`
        } ],
        "scrollY": 400,     // scroll vertical
        "scrollX": true	    // scroll horizontal
      } );

      var column = table.column(0);
      // Get the column API object
      // Hide the Position Id
 
      // Toggle the visibility
      column.visible( ! column.visible() );


      // Edit Position
      
      $('#example tbody').on( 'click', '#edit', function () {
        var position_id = table.row( $(this).parents('tr') ).data();
        // alert( data[0] +"'s salary is: "+ data[ 0 ] );
          $('#position').focus();
          $('#position').css("border-color","");
          $('#label').css("color","");
          $('#err_msgs').empty();
          if(click_Count<=0){
            
            // click_Count+=1;
            $("#update-position").append('<button type="button" name="update_position" id="update_position" class="btn btn-primary  mb-xs mt-xs mr-xs "><i class="fa fa-edit"></i> Update</button>');
            click_Count++;
          }
          $('#add_new_position').hide();

          $.ajax({
            url: '../classes/main.php',
            type: 'POST',
            data:{
              'edit_position':1,
              'edit_id': position_id[0]
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
  
          
      $('#example tbody').on( 'click', '#delete', function () {
          // console.info(table.row( $('#delete').parents('tr') ).data())
          var position_id = table.row( $(this).parents('tr') ).data();
          // alert( data[0] +"'s salary is: "+ data[ 0 ] );
          $('#delete_position_id').text(position_id[0]);
          $('#deletePositionModal').modal('show');
      });
    }


    // Update Selected Position
    $(document).on('click','#update_position',function(){
      $(this).hide();
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
          // $(this).hide();
          
          $('#add_new_position').slideDown(500);
          if(response.msg == true){
            msg_SuccessfulUpdate();
          }else{
            msg_FailedToUPdate();
          } 
          $('#example').DataTable().ajax.reload();
          click_Count = 0;
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
          $('#example').DataTable().ajax.reload();
          $('#deletePositionModal').modal('hide');
        },
        error: function(xhr, textStatus, error){
          console.info(textStatus);
        }
      });
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
          $('#example').DataTable().ajax.reload();
          click_Count = 0;
          
        },
        error: function(xhr, textStatus, error){
          console.info(textStatus);
        }
      });
    });


    // $('#position').keypress(function(event){
    //   var keycode = (event.keyCode ? event.keyCode : event.which);
    //   if(keycode == '13'){
    //     $('#add_new_position').click();
    //   }
    // });
    // Reset fields
    $(document).on('click','#reset_position',function(){
      $('#position').css("border-color","").val('').focus();
      $('#err_msgs').empty();
      $('#label').css("color","");

    });

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


