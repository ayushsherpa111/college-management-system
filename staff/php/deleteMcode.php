<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';

	$modules = new DatabaseFunctions('module');
	$modules->delete('mcode',$_POST['mcode']);

?>