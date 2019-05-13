<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';

	$oldPassword = $_POST['old'];
	$newPassword = $_POST['new'];
	$confirm = $_POST['confirm'];

	if (isset($_SESSION['mod_id'])) {
		$person = new DatabaseFunctions('module_leader');
		$pass = ($person->find('mod_id',$_SESSION['mod_id']))->fetch();
	}else if (isset($_SESSION['leader_id'])) {
		$person = new DatabaseFunctions('courseleader');
		$pass = ($person->find('leader_id',$_SESSION['leader_id']))->fetch();		
	}

	if (!password_verify($oldPassword, $pass['password'])) {
		echo "old";
	}else if($newPassword != $confirm){
		echo "match";
	}else{
		if (isset($_SESSION['mod_id'])) {
			$person->save(['mod_id'=>$_SESSION['mod_id'],'password'=>password_hash($newPassword, PASSWORD_DEFAULT)],'mod_id');
		}else if(isset($_SESSION['leader_id'])){
			$person->save(['leader_id'=>$_SESSION['leader_id'],'password'=>password_hash($newPassword, PASSWORD_DEFAULT)],'leader_id');
		}
	}
?>
