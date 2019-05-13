<?php 
	if (isset($_SESSION['admin'])) {
		$title = "Admin";
		$content = loadTemp('../template/view_admin_template.php', []);
	}
?>



