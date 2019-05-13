<?php 
include '../../../connect.php';
require '../../../admin/classes/databaseFunctions.php';
$student = new DatabaseFunctions('student');
$detail = ($student->find('student_id',$_POST['student_id']))->fetch();	
$course = new DatabaseFunctions('courses');
$courseName = ($course->find('course_id',$detail['course_id']))->fetch();
	if ($_POST['id'] == 1) {
	$message ="
	<p class='let-head'>Woodland's university</p>

	<p>Dear ".$detail['first_name'].' '.$detail['surname'].",</p>
	  
    <p class='let-body'> 
	Congratulations! On behalf of woodland university. It is with great pleasure that you have been offered
	conditional acceptance to BSc. ".$courseName['course_name']." program. Through this email you have been offered an admission for the class of ".date('Y').'/'.date('Y', strtotime('+3 years')).".
	<br><br>
	We are here to help you with your academic goals in the days to come. To run in the path of achievement you must complete the steps needed to be officially enrolled as a student in the woodland university.
	<br><br>
	In order to get enrolled you are requested to provide your remaining details. You should provide your +2 documents, your percentage should to be above 70%. You should provide your marks on English subject if it is below 60 you must have given the ilets/toefl exam and result must be above 5.5.
	<br><br>
	I congratulate again on your conditional letter and request to provide the required details as soon as possible.
	</p>
	Sincerely,<br>
	WUC Administration
	";
	}elseif ($_POST['id'] == 2) {
	$message = "
	<p class='let-head'>Woodland's university</p>

	<p>Dear ".$detail['first_name'].' '.$detail['surname'].",</p>
	  
    <p class='let-body'>Congratulations! It is with great pleasure that you have been offered an admission to the Woodland's university for the class of ".date('Y').'/'.date('Y', strtotime('+3 years')).".
    <br><br>
    Woodland's has invited you to participate in Admit weekend of 2019 for a three day program. We request you to complete the enclosed enrollment response card and return it by ".date('d-M-Y', strtotime('+5 days'))."
    <br><br>
    Once again, I extend my congratulations on your admission to Woodland's university.</p>

	Sincerely,<br>
	WUC Administration
	
	";
	}
	$student->edit(['student_id'=>$_POST['student_id'],'record_status'=>'Live'],'student_id');
	$student->insertInLevel($_POST['student_id']);
	echo $message;
?>

