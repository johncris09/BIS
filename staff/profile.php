<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>

    <?php include('../component/metadata.php'); ?>

    <?php include('../component/csslink.php'); ?>
    
    
    <?php include('../component/cssthemelink.php'); ?>


  </head>
  <body>
    <section class="body">
      

      <?php include('../layout/header.php'); ?>
      <div class="inner-wrapper">

        <?php include('../layout/sidebar-left.php'); ?>
        
        <section role="main" class="content-body">
            <header class="page-header">
              <h2>Profile</h2>
            
              <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                  <li>
                    <a href="index.php">
                      <i class="fa fa-home"></i>
                    </a>
                  </li>
                  <li><span>User</span></li>
                  <li><span>Your Profile</span></li>
                </ol>
            
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
              </div>
            </header>

            <!-- Main Content -->

            

              
            
      </div>
      
      <?php include('../layout/sidebar-right.php'); ?>


    </section>
    <?php include('../component/jslink.php');  ?>
    <?php include('../component/themejslink.php'); ?>
  </body>
</html>