<?php 
	$title = "Message";
	$myMessages = new DatabaseFunctions('message');
	$messages = $myMessages->findAll();
	$student = new DatabaseFunctions('student');

	if (isset($_GET['msgid'])) {
		$message = ($student->find('student_id',$_GET['msgid']))->fetch();
		$content = loadTemp('../template/message_template.php',['messages'=>$messages,'student'=>$student,'mID'=>$message]);
	}else{
		$content = loadTemp('../template/message_template.php',['messages'=>$messages,'student'=>$student]);
	}

?>


