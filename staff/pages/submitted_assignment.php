<?php
	$title = 'Submitted Assignment';
	$assigments = new DatabaseFunctions('assignment_brief');
	$submits = new DatabaseFunctions('assignment_submit');
	if (isset($_SESSION['mod_id'])) {
		$myDetails = ($teachers->find('mod_id',$_SESSION['mod_id']))->fetch();
		$assignment = $assigments->find('mcode',$myDetails['mcode']);
		$moduleYear = ($module->find('mcode',$myDetails['mcode']))->fetch();
		$allAssignments = $assigments->find('mcode',$myDetails['mcode']);
		$myStudents = $years->find('level_id',$moduleYear['level_id']);
		$content = loadTemp('../template/select_assignment_template.php',['assignment'=>$assignment]);
	}

?>