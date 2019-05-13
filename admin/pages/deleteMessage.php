<?php 
	include '../classes/databaseFunctions.php';
	include '../../connect.php';
	$myMessages = new DatabaseFunctions('message');
	$myMessages->delete('m_id',$_POST['msgDel']);
?>