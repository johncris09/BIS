
<?php session_start(); ?>
 
 <!DOCTYPE html>
 <html class="fixed">
   <head>
     <title>Position</title>
     <?php include('../component/metadata.php'); ?> 
     <?php include('../component/csslink.php'); ?>
     <!-- Specific Page Vendor CSS --> 
     <link rel="stylesheet" href="../assets/vendor/jquery-datatables/media/css/jquery.dataTables.css">
      <link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
      <link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
     <?php include('../component/cssthemelink.php'); ?>
     
   </head>
   <body>
     <section class="body">
 
       <!-- start: header -->
       <?php include('../layout/header.php'); ?>
       <!-- end: header -->
 
       <div class="inner-wrapper">
         <!-- start: sidebar -->
         <?php include('../layout/sidebar-left.php'); ?>
         <!-- end: sidebar -->
 
         <section role="main" class="content-body">
           <header class="page-header">
             <h2>All Position</h2>
           
             <div class="right-wrapper pull-right">
               <ol class="breadcrumbs">
                 <li>
                   <a href="index.php">
                     <i class="fa fa-home"></i>
                   </a>
                 </li>
                 <li><span>Barangay Position</span></li>
                 <li><span>Position</span></li>
               </ol>
               <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
             </div>
           </header>
 
           <!-- start: page -->
           
           <div class="row">
               <div class="col-md-5">
                 <form id="form_position" class="form-horizontal" >
                   <section class="panel panel-featured panel-featured-primary">
                     <header class="panel-heading">
                       <div class="panel-actions">
                         <a href="#" class="fa fa-caret-down"></a>
                         <a href="#" class="fa fa-times"></a>
                       </div>
                       <h2 class="panel-title" id="panel-title">Add Position</h2>
                     </header>
                     <div class="panel-body" style="display: block;">
                       <div class="form-group">
                         <label id="label" class="col-sm-4 control-label" for="position">Position Name </label>
                         <div class="col-sm-8">
                           <input type="hidden" id="position_id"  class="form-control">
                           <input type="text" id="position" name="position" placeholder="Position Name"  class="form-control" required autofocus >
                           <label class="error" id="err_msgs"></label>
                         </div>	
                       </div>
                     </div>
                     <footer class="panel-footer" style="display: block;">
                       <div class="row">
                         <div class="col-sm-12 text-right">
                           <span id="update-position"></span>
                           <button type="button" name="add_position" id="add_new_position" class="btn btn-primary   mb-xs mt-xs mr-xs "><i class="fa fa-save"></i> Save</button>
                           <button type="button" id="reset_position" class="btn btn-default  mb-xs mt-xs mr-xs "> Reset</button>
                         </div>
                       </div>
                     </footer>
                   </section>
                 </form>
               </div>
 
             <div class="col-md-7">
               <section class="panel panel-featured panel-featured-primary">
                 <header class="panel-heading">
                   <div class="panel-actions">
                     <a href="#" class="fa fa-caret-down"></a>
                     <a href="#" class="fa fa-times"></a>
                   </div>
                   <h2 class="panel-title">List of All Position</h2>
                 </header>
                 
                <div class="panel-body">
                  <table id="example" class="dislay table table-hover table-striped																																																																																																														" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>#</th>
                              <th>Position</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>						
                              <th>Id</th>
                              <th>#</th>
                              <th>Position</th>
                              <th>Action</th>
                          </tr>
                      </tfoot>
                  </table>
                </div>
              </section>
            </div>
 
           </div>
 
           <!-- Modal -->
           <div class="modal fade" id="deletePositionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <div class="modal-wrapper">
                     <div class="modal-icon center ">
                       <i class="text-primary fa fa-question-circle"></i>
                     </div>
                     <div class="modal-text text-center">
                       <h4>Are you sure?</h4>
                       <p>Are you sure that you want to delete this position <span id="delete_position_id"></span>?</p>
                     </div>
                   </div>
                 </div>
                 <div class="modal-footer">
                   <button type="button" id="confirm-delete-Position" class="btn btn-primary">Confirm</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
               </div>
             </div>
           </div>
             
             
           <!-- end: page -->
         </section>
       </div>
 
       <?php include('../layout/sidebar-right.php'); ?>
     </section>
     
 
     <!-- Vendor -->
     <?php include('../component/jslink.php'); ?>
      <!-- Specific Page Vendor -->
      <script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
      <script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
      <script src="../assets/vendor/select2/select2.js"></script>
          
      <?php include('../component/themejslink.php'); ?>
      <script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 

     
   </body>
 </html>