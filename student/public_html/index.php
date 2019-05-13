<?php 
	include '../../connect.php';
	include '../../functions/loadTemp.php';
	include '../../admin/classes/databaseFunctions.php';
	include '../classes/TableGenerator.php';
	if (isset($_SESSION['student_id'])) {
		$module = new DatabaseFunctions('module');
		$years = new DatabaseFunctions('lvlstudent');
		$student = new DatabaseFunctions('student');
		$modules = new DatabaseFunctions('module');
		$course = new DatabaseFunctions('courses');
		$assignment_brief = new DatabaseFunctions('assignment_brief');
		$reply = new DatabaseFunctions('reply');
		if (isset($_GET['mod'])) {
			$findMod = ($modules->find('mcode',$_GET['mod']))->fetch();
		}
		if (isset($_GET['page'])) {
			require '../pages/'.$_GET['page'].'.php';
		}else{
			require '../pages/home.php';
		}
		$html = loadTemp('../template/layout.php',['title'=>$title,'content'=>$content]);
		echo $html; 
	}

?>