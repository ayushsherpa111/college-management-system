<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';
	$reply = new DatabaseFunctions('reply');
	$toAdmin = new DatabaseFunctions('message');
	if ($_POST['sender'] == 16000000 || $_POST['sender'] == "ADMIN" || $_POST['sender'] == "admin" || $_POST['sender']=="Admin") {
		$criteria = [
		'm_id'=>'',
		'student_id'=> $_SESSION['student_id'],
		'subject'=>$_POST['subject'],
		'msg_date'=>date("Y/m/d"),
		'message'=>$_POST['message']
	];
	$toAdmin->save($criteria,'m_id');
	}else{
		$criteria = [
			'reply_id'=>'',
			'student_id'=> $_SESSION['student_id'],
			'subject'=>$_POST['subject'],
			'receive_date'=>date("Y/m/d"),
			'message'=>$_POST['message'],
			'toUser' => $_POST['sender']
		];
		$reply->save($criteria,'reply_id');
	}
	echo '<i class="fa fa-envelope msg-i" aria-hidden="true"></i>';

?>