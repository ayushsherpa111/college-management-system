<?php 
	include '../../connect.php';
	include '../../functions/loadTemp.php';
	require '../classes/databaseFunctions.php';
	require '../classes/tableGenerator.php';
	require '../classes/AttendanceTable.php';
	require '../classes/AssignTableGenerator.php';
	require '../classes/moduleTableGenerator.php';
	if (isset($_SESSION['admin'])) {
		if (isset($_GET['page'])) {
			require '../pages/'.$_GET['page'];
		}
		else{
			require '../pages/home.php';
		}
		$data = loadTemp('../template/layout.php',['title'=> $title,'content'=> $content]);
		echo $data;
	}else{
		header('Location:http://localhost/woodlands_uc1/login/login.php');
	}

?>