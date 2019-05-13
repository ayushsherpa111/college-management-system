<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';

	$oldPassword = $_POST['old'];
	$newPassword = $_POST['new'];
	$confirm = $_POST['confirm'];

	$student = new DatabaseFunctions('student');
	$pass = ($student->find('student_id',$_SESSION['student_id']))->fetch();

	if (!password_verify($oldPassword, $pass['password'])) {
		echo "old";
	}else if($newPassword != $confirm){
		echo "match";
	}else{
		$student->save(['student_id'=>$_SESSION['student_id'],'password'=>password_hash($newPassword, PASSWORD_DEFAULT)],'student_id');
	}


?>
