<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';

	$deleteReply = new DatabaseFunctions('reply');
	$deleteReply->delete('reply_id',$_POST['msgDel']);

?>