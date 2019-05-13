<?php
	$title = 'Weekly Tutorials';
	$submittedAssignmet = new DatabaseFunctions('assignment_submit');
	$row = ($submittedAssignmet->find('submit_id',$_GET['assID']))->fetch(); 
	$content = loadTemp('../template/view_std_assignment_template.php',['row'=>$row]);
?>