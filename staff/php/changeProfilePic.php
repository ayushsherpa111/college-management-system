<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';

	if (isset($_SESSION['mod_id'])) {
		$person = new DatabaseFunctions('module_leader');
		$profilePic ='images/moduleLeader/'.$_FILES['pic']['name'];
		$moveTo = '../images/moduleLeader/'.$_FILES['pic']['name'];
		$id = 'mod_id'; 
	}else if (isset($_SESSION['leader_id'])) {
		$person = new DatabaseFunctions('courseleader');
		$profilePic ='images/courseLeader/'.$_FILES['pic']['name'];
		$moveTo = '../images/courseLeader/'.$_FILES['pic']['name'];
		$id = 'leader_id';
	}
	$person->save([$id=>$_SESSION[$id],'image'=>$profilePic],$id);
	move_uploaded_file($_FILES['pic']['tmp_name'], '../'.$moveTo);
	echo $profilePic;
?>
