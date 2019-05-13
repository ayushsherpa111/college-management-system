<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';
	$grades = new DatabaseFunctions('grade');
	$submits = new DatabaseFunctions('assignment_submit');
	$exists = $pdo->prepare('SELECT * FROM assignment_submit WHERE student_id = :id AND brief_id = :bid');
	$cirteria = [
		'id' => $_POST['student_id'],
		'bid' => $_POST['brief']
	];
	$exists->execute($cirteria);
	if ($exists->rowCount() == 0) {
		$submits->save(['student_id'=> $_POST['student_id'],'brief_id' => $_POST['brief'],'zip'=>'' ,'doc'=>'' ,'code'=>'' ,'video_link'=>'','submitDate'=> date('Y/m/d') ]);
		$lastAdded = ($submits->findLast('submit_id'))->fetch();
		echo $lastAdded['submit_id'];
		$grades->save(['submit_id'=>$lastAdded['submit_id'],'grade'=> $_POST['grade']],'g_id');
	}else{
		$grades->save(['submit_id'=>$_POST['submit_id'],'grade'=> $_POST['grade']],'g_id');
	}


?>