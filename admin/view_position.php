
<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Position.php';
  include_once '../classes/initial.php';
  
  $position = new Position($db);
  $prep_state = $position->getAllPosition();
  $fieldname = $position->getPositionFieldName();
  $fields = array_keys($fieldname->fetch(PDO::FETCH_ASSOC)); 
  $counter=1;
  $list = '
	<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
					
      <thead>
        <tr>
          <th>#</th>
          <th>Position</th> 
          <th>Action</th>    
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    $list .= '
        <tr>
          <td>'.$counter.'</td>
          <td>'.$row['position'].'</td>
          <td>
            <ul class="list-inline">
              <li><a id="' . $row['position_id'] . '" class="text-warning edit-position"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['position_id'] . '"  class="text-danger delete-position"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
            </ul>
          </td>
        </tr>
    ';
    $counter++;
  }
  $list = $list . '
      </tbody>
    </table>
  ';

  echo $list;

?>

		<script src=" ../assets/vendor/jquery/jquery.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/examples/js/datatables.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable').dataTable({
        "sPaginationType": "bs_normal",
        "scrollY": 400,
          "scrollX": true
			});	
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
			});
    });
   