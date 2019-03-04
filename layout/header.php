<?php 
  
  if(isset($_SESSION['login_account_id'] )){
    $account_id = $_SESSION['login_account_id'];
    $user_id = $_SESSION['login_user_id'];
    $name = $_SESSION['first_name'] ." ".$_SESSION['middle_name'] ." ".$_SESSION['last_name'] ;
    $role = ($_SESSION['status'] == 0)? "Administration":"Staff";
  }else{
    header("location: ../index.php");
  }

  $lock_screen = isset($_SESSION['lock_screen'])?1:0;
?>

          <!-- start: header -->
          <header class="header">
            <div class="logo-container">
              <a href="index.php" class="logo">
                <h4 id="brandName">Barangay Information System </h4>
              </a>
              <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
              </div>
              <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
              </div>
            </div>
            
            <div class="header-right">
              <span class="separator"></span>
              <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                  <figure class="profile-picture">
                    <img src="../assets/images/default-avatar.jpg" alt="User Profile Picture" class="img-circle" data-lock-picture="../assets/images/sample-user.jpg" /> 
                  </figure>
                  <div class="profile-info" data-lock-name="<?php echo $name; ?>" data-lock-email="<?php echo $_SESSION['email']; ?>">
                  <input type="hidden" value="<?php echo $lock_screen ?>" id="lock-screen"/>
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
                      <a id="lock_screen"  class="lockMe" role="menuitem" tabindex="-1" href="#lockScreen"><i class="fa fa-lock"></i> Lock Screen</a>
                    </li>
                    <li>
                      <a style="cursor: pointer" role="menuitem" id="log_out" tabindex="-1"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Lock Screen -->
            <div id="lockScreen" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
              <section class="panel">
                <div class="panel-body">
                    <div class="current-user text-center mb-2">
                      <img id="LockUserPicture"  src="../assets/images/default-avatar.jpg"  height="100px" width="100px" alt="User Logo" class="img-circle user-image" />
                      <h2 id="LockUserName" class="user-name text-dark m-none"><?php echo $name; ?></h2>
                      <p  id="LockUserEmail" class="user-email m-none"><?php echo $_SESSION['email'] ?></p>
                    </div>
                    <div class="form-group mb-lg col-sm-10 col-sm-offset-1">
                      <div class="input-group input-group-icon">
                        <input id="pwd" name="pwd" type="password" class="form-control input-lg" placeholder="Password" required	/>
                        <span class="input-group-addon">
                          <span class="icon icon-lg">
                            <i class="fa fa-lock"></i>
                          </span>
                        </span>
                      </div>
                      <label class="col-md-10 col-sm-offset-1 error text-center" id="password_err"></label>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 text-center">
                        <p>
                          <a href="#" id="logout">Not <?php  echo $name; ?>?</a>
                        </p>
                      </div>
                      <div class="col-sm-10 col-sm-offset-1 text-right">
                        <button type="button" id="unlock" class="btn btn-primary"> <i class="fa  fa-unlock-alt " style="color:white" aria-hidden="true"></i> Unlock</button>
                      </div>
                    </div>
                </div>
              </section>
            </div>
          </header>
          <!-- end: header -->
