<?php
	$title = 'Attendance Statistic';
	if (isset($_GET['statID'])) {
		$attendance = new DatabaseFunctions('attendance');
		$statistics = $attendance->find('student_id',$_GET['statID']);
		$studentDetails = new DatabaseFunctions('student');
		$student = ($studentDetails->find('student_id',$_GET['statID']))->fetch(); 
		$numberOfSems = 0;
		$lastCount = 0;
		$present = 0;
		foreach ($statistics as $key => $row) {
			if ($lastCount != $row['semester']) {
				$numberOfSems++;
				$present+= $row['days'];
				$lastCount=$row['semester'];
			}
		}
		$content = loadTemp('../template/attendance_stat_template.php',['numberOfSems'=>$numberOfSems,'student'=>$student,'statistics'=>$statistics->fetch(),'pdo'=>$pdo]);
	}
?>