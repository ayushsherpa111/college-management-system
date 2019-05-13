<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';
	$personal_tutor = new DatabaseFunctions('personal_tutor');
	$personal_tutor->delete('student_id',$_POST['student_id']);
?>