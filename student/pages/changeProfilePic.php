<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';

	$student = new DatabaseFunctions('student');

	$profilePic ='images/Student/'.$_FILES['pic']['name'];
	$moveTo = '../images/Student/'.$_FILES['pic']['name'];
	$student->save(['student_id'=>$_SESSION['student_id'],'image'=>$profilePic],'student_id');
	move_uploaded_file($_FILES['pic']['tmp_name'], '../'.$moveTo);
	echo $profilePic;
?>