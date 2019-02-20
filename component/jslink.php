
	<!-- Vendor -->
		<script src=" ../assets/vendor/jquery/jquery.js"></script>
		
		<script src=" ../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src=" ../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src=" ../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<!-- <script src=" ../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
		<script src=" ../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src=" ../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
		
		<?php
			echo isset($_SESSION['status']) && $_SESSION['status'] == 0 ? '<script src="../assets/app.js"></script>' : '<script src="../assets/staff-app.js"></script>';
		?>
		
		<!-- <script src="../assets/vendor/jquery-appear/jquery.appear.js"></script> -->
		

		
		
		
		
