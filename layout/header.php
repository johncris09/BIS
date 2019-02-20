
<!-- start: header -->
<?php 
  
  if(isset($_SESSION['login_account_id'] )){
    $account_id = $_SESSION['login_account_id'];
    $user_id = $_SESSION['login_user_id'];
    $name = $_SESSION['first_name'] ." ".$_SESSION['middle_name'] ." ".$_SESSION['last_name'] ;
    $role = ($_SESSION['status'] == 0)? "Administration":"Staff";
  }else{
    header("location: ../index.php");
  }


?>
<header class="header">
  <div class="logo-container">
    <a href="index.php" class="logo">
    
      <!-- System Logo -->
      <!-- <img src="../assets/images/logo.png" height="35" alt="Logo" />
       -->
      <h4>Barangay Information System </h4>
      
    </a>
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>

  
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <!-- start: search & user box -->
  <div class="header-right">
    
  
    <span class="separator"></span>

    <div id="userbox" class="userbox">
      <a href="#" data-toggle="dropdown">
        <figure class="profile-picture">
          <img src="../assets/images/sample-user.jpg" alt="User Profile Picture" class="img-circle" data-lock-picture="../assets/images/sample-user.jpg" /> 
        </figure>
        <div class="profile-info" data-lock-name="<?php echo $name; ?>" data-lock-email="<?php echo $_SESSION['email']; ?>">
          <input type="hidden" value="<?php echo $account_id ?>" id="login_account_id"/>
          <input type="hidden" value="<?php echo $user_id ?>" id="login_user_id"/>
          
          <span class="name"> <?php echo $name; ?></span>
          <span class="role"><?php  echo $role; ?> </span>
        </div>

        <i class="fa custom-caret"></i>
      </a>

      <div class="dropdown-menu">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a role="menuitem" tabindex="-1" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
          </li>
          <li>
            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
          </li>
          <li>
            <a style="cursor: pointer" role="menuitem" id="log_out" tabindex="-1"><i class="fa fa-power-off"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end: search & user box -->
</header>
<!-- end: header -->