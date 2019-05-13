<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';

	$uploadModules = new DatabaseFunctions('module_files');
	$uploadModules->delete('file_id',$_POST['file_id']);

?>