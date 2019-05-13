<?php
	$title = 'My Attendance';
	$aside = loadTemp('../template/aside_function_template.php',[]);
	$attendance = new DatabaseFunctions('attendance');
	$myAttendance = $attendance->find('student_id',$_SESSION['student_id']);
	$numberOfSems = 0;
	$lastCount = 0;
	$present = 0;
	foreach ($myAttendance as $key => $row) {
		if ($lastCount != $row['semester']) {
			$numberOfSems++;
			$present+= $row['days'];
			$lastCount=$row['semester'];
		}
	}
	$content = loadTemp('../template/my_attendance_template.php',['aside'=>$aside,'myAttendance'=>$myAttendance,'numberOfSems'=>$numberOfSems,'pdo'=>$pdo]);
?>