<?php 
	include '../../connect.php';
	include '../../functions/loadTemp.php';
	include '../../admin/classes/databaseFunctions.php';
	include '../../admin/classes/tableGenerator.php';
	include '../classes/TableGenerator.php';
	if (isset($_SESSION['moduleLeader'])||isset($_SESSION['courseleader'])) {
		$module = new DatabaseFunctions('module');
		$teachers = new DatabaseFunctions('module_teachers');
		$modLead = new DatabaseFunctions('module_leader');
		$years = new DatabaseFunctions('lvlstudent');
		$student = new DatabaseFunctions('student');
		$courseleaders = new DatabaseFunctions('courseleader');
		$tutees = new DatabaseFunctions('personal_tutor');
		if (isset($_GET['page'])) {
			require '../pages/'.$_GET['page'].'.php';
		}else{
			require '../pages/home.php';
		}
		$html = loadTemp('../template/layout.php',['title'=>$title,'content'=>$content]);
		echo $html; 
	}

?>