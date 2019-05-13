<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';
	$personal_tutor = new DatabaseFunctions('personal_tutor');
	$datas = [
		'tutor_id' => '',
		'student_id' => $_POST['student_id'],
		'mod_id' => $_POST['mod_id']
	];
	$personal_tutor->save($datas,'tutor_id');
?>