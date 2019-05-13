<?php 
	$title = "Home";
	$password = ($student->find('student_id',$_SESSION['student_id']))->fetch();
	$myDetails = $pdo->prepare('SELECT s.student_id, s.first_name,s.course_id, s.middle_name,s.surname,s.email,s.phone_number,s.image, l.level_id, c.course_name FROM student s JOIN lvlstudent l ON l.student_id = s.student_id JOIN courses c ON c.course_id = s.course_id WHERE s.student_id =:id');
	$myDetails->execute(['id'=>$_SESSION['student_id']]);
	$year = ($years->find('student_id',$_SESSION['student_id']))->fetch();
	$attendance = new DatabaseFunctions('attendance');
	$myAttendance = $attendance->find('student_id',$_SESSION['student_id']);
	$modules = $pdo->prepare('SELECT * FROM module WHERE archive = "no" AND level_id <='.$year['level_id'] .' AND course_id =:cID');
		$name = $myDetails->fetch();
	$modules->execute(['cID'=>$name['course_id']]);
	$searchModules = $pdo->prepare('SELECT * FROM module WHERE archive = "no" AND level_id <='.$year['level_id'].' AND course_id =:cID');
	$searchModules->execute(['cID'=>$name['course_id']]);
	$newUploads = new DatabaseFunctions('module_files');
	$submits = $pdo->prepare('SELECT g.g_id,s.submit_id,s.student_id,s.brief_id,b.mcode,g.grade FROM grade g JOIN assignment_submit s ON g.submit_id = s.submit_id JOIN assignment_brief b ON b.brief_id = s.brief_id WHERE s.student_id =:id ORDER BY g_id DESC');
	$con =[
		'id'=>$_SESSION['student_id']
	];
	$submits->execute($con);
	$myReply = $pdo->prepare('SELECT * FROM reply WHERE toUser =:ad AND student_id =:id OR student_id=:id ORDER BY reply_id DESC LIMIT 5');
	$datas = [
		'ad'=>16000000,
		'id'=>$_SESSION['student_id']
	];
	$myReply->execute($datas);
	$numberOfMessages = $myReply->rowCount();

	$assignmentBrief = new DatabaseFunctions('assignment_brief');
	$details = $pdo->prepare('SELECT s.student_id, s.first_name,s.course_id, s.middle_name,s.surname,s.email,s.phone_number,s.image, l.level_id, c.course_name FROM student s JOIN lvlstudent l ON l.student_id = s.student_id JOIN courses c ON c.course_id = s.course_id WHERE s.student_id =:id');
	$details->execute(['id'=>$_SESSION['student_id']]);

	$content = loadTemp('../template/home_template.php',['modules'=>$modules,'password'=>$password ,'myAttendance'=>$myAttendance,'myReply'=>$myReply,'numberOfMessages'=>$numberOfMessages,'submits'=>$submits,'newUploads'=>$newUploads,'searchModules'=>$searchModules,'details'=>$details,'assignmentBrief'=>$assignmentBrief]);
?>