<?php 
	include '../connect.php';
	$student = new DatabaseFunction('student');
	$admin = new DatabaseFunction('admin');
	$moduleLeader = new DatabaseFunction('module_Leader');
	$courseLeader = new DatabaseFunction('courseleader');
	$login = '';
	$users=[
		'admin_id'=>$admin,
		'student_id'=$student,
		'mod_id'=>$moduleLeader,
		'leader_id'=>$courseLeader
	];
	foreach ($users as $key => $value) {
		if ($value->checkPassword($_POST['username'],$_POST['password'],$key)) {
			$login = $key;
		}
	}
	echo "<script>alert($login)</script>";
	 // $_SESSION['student_id'] = $stud['student_id'];
  //               $_SESSION['student_name'] = CONCAT($stud['first_name'],CONCAT(' ',$stud['surname']));

?>