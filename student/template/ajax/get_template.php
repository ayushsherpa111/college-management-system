<?php 
include '../../../connect.php';
include '../../../admin/classes/databaseFunctions.php';
$student = new DatabaseFunctions('student');
$myDetails = ($student->find('student_id',$_SESSION['student_id']))->fetch();
	if ($_POST['id'] == 'Address Amendment') {
		$message = date('d-M-Y') . "

Dear Administrator, 
This letter is to notify you about my change of residency. As I have recently moved into new location, I would like to amend on my previous address on my profile. My full details are provided below:-

Name:
".$myDetails['first_name'].' '.$myDetails['surname']."

Uni ID: 
".$myDetails['student_id']."

Previous Address:
".$myDetails['perm_address']."

Current Address:
[ --------------- ]

I would be very grateful for your help.

Thanks and regards,
".$myDetails['first_name'].' '.$myDetails['surname']."
";
	}
	echo $message;
?>