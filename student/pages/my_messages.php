<?php
	$title = 'My Messages';
	// $messages = new DatabaseFunctions('reply');
	// $myMessage = $messages->find('toUser',$_SESSION['student_id']);
	$myMessage = $pdo->prepare('SELECT * FROM reply WHERE toUser =:ad AND student_id =:id OR student_id=:id');
	$datas = [
		'ad'=>16000000,
		'id'=>$_SESSION['student_id']
	];
	$myMessage->execute($datas);
	$aside = loadTemp('../template/aside_function_template.php',[]);
	$content = loadTemp('../template/my_message_template.php',['aside'=>$aside,'myMessage'=>$myMessage]);
?>