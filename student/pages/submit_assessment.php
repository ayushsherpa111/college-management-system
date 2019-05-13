<?php
	$title = 'Submit Assessment';
	$assignment = $assignment_brief->find('mcode',$_GET['mod']);
	$aside = loadTemp('../template/aside_module_template.php',['findMod'=>$findMod]);
	if (isset($_GET['asId'])) {
		$mySubmits = $pdo->prepare('SELECT * FROM assignment_submit WHERE student_id =:id AND brief_id =:bid');
		$criteria = [
			'id'=>$_SESSION['student_id'],
			'bid'=>$_GET['asId']
		];
		$mySubmits->execute($criteria);
		$submit = $mySubmits->fetch();
		$details = $assignment->fetch();
		$content = loadTemp('../template/submit_assessment_template.php',['aside'=>$aside,'details'=>$details,'submit'=>$submit]);
	}else{
		$content = loadTemp('../template/choose_submission_template.php',['aside'=>$aside,'assignment'=>$assignment]);
	}
?>