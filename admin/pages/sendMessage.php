<?php
	include '../../connect.php';
	require '../classes/databaseFunctions.php';
	$reply = new DatabaseFunctions('reply');
	$date = date("Y/m/d");
	$messageData = [
		'reply_id'=>'',
		'student_id'=>$_POST['student_id'],
		'subject'=>$_POST['subject'],
		'receive_date'=> $date,
		'message'=>$_POST['message'],
		'toUser'=>$_SESSION['admin_id']
	];
	$reply->save($messageData,'reply_id');
	echo '<i class="fa fa-envelope msg-i" aria-hidden="true"></i>';
?>