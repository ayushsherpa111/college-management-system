<?php 
	session_start();
	$roles = array('admin_id' => 'admin' ,'student_id' => 'student','mod_id' => 'moduleLeader','leader_id'=>'courseleader');
	foreach ($roles as $key => $value) {
		if (isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
			unset($_SESSION[$value]);
			header('Location:http://localhost/woodlands_uc1/login/login.php');
			break;
		}
	}
?>