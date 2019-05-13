<?php 
include '../../../connect.php';
require '../../../admin/classes/databaseFunctions.php';

	$student = new DatabaseFunctions('student');
	$detail = ($student->find('student_id',$_POST['student_id']))->fetch();	
$datePlusFive = date('d-M-Y', strtotime('+5 days'));
$message ="";
	if ($_POST['id'] == 'Failure to attend P.T.M.') {
		$message =  date('d-M-Y') . "

Dear ".$detail['first_name'].' '.$detail['surname']."
Your name has been referred as a possible cause for concern by your module co-ordinator because you are recorded as: Not attending a personal tutorial meeting.

It is essential that you see me as soon as possible.  You must do this by ".$datePlusFive.". The meeting will check and review your progress and find a means of resolving any difficulties you may be experiencing. The Student Code details the implications of 'failure to attend personal tutor meetings' and whilst there may be mitigating circumstances not known to us at this time, you should regard this letter as an informal warning that your continuation on the course may be at risk. 

If for any reason you are experiencing difficulties which impact on your academic work, you should contact your personal tutor for advice. You must however see me as instructed by the [###module tutor name###]. 

Yours sincerely,
Administrator
";
	}
	elseif ($_POST['id'] == 'Poor Attendance') {
		$message =  date('d-M-Y') . "

Dear ".$detail['first_name'].' '.$detail['surname']." 
Your name has been referred as a possible cause for concern by your module co-ordinator because you are recorded as: Having poor or no attendance at classes.

It is essential that you see me as soon as possible.  You must do this by ".$datePlusFive.". You are reminded that all students enrolling on a course at UCN are expected to meet the academic requirements of their programme.  The Student Code details the implications of 'failure to meet required attendance' and whilst there may be mitigating circumstances not known to us at this time, you should regard this letter as an informal warning that your continuation on the course may be at risk. Failure to make contact may result in us deeming you to be withdrawn from your course.

If for any reason you are experiencing difficulties which impact on your academic work, you should contact your personal tutor for advice.  You must however see me as instructed by the [ module tutor name ]. 

Yours sincerely,
Administrator
";
	}
	elseif ($_POST['id'] == 'Failure to Submit Coursework') {
		$message = date('d-M-Y') . "

Dear ".$detail['first_name'].' '.$detail['surname']."
Your name has been referred as a possible cause for concern by your module co-ordinator because you are recorded as: Not submitting coursework.

It is essential that you see me as soon as possible.  You must do this by ".$datePlusFive." . You are reminded that all students enrolling on a course at UCN are expected to meet the academic requirements of their programme.  The Student Code details the implications of 'failure to meet academic, professional or vocational requirements' and whilst there may be mitigating circumstances not known to us at this time, you should regard this letter as an informal warning that your continuation on the course may be at risk. Failure to make contact may result in us deeming you to be withdrawn from your course.

If for any reason you are experiencing difficulties which impact on your academic work, you should contact your personal tutor for advice.  You must however see me as instructed by the [###module tutor name###]. 

Yours sincerely,
Administrator
";
	}
	elseif ($_POST['id'] == 'Confirmation Letter') {
		$message = date('d-M-Y') . "

Dear ".$detail['first_name'].' '.$detail['surname']."
Your Amendment of Address from ". $detail['perm_address']." to [###new address####] has been verified and confirmed. 

Your Profile has been Updated successfully.

If you have any queries, please do contact, Student Service Office.

Yours sincerely,
Administrator
";
	}

	echo $message;
?>