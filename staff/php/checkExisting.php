<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';
	$module = new DatabaseFunctions('module');
	$check = $module->find('mcode',$_POST['mcode']);
	if ($check->rowCount() == 0) {
		echo "no";
	}else{
		echo "yes";
	}
?>