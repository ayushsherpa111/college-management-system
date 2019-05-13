<?php 
	$title = "Attendance";

	$table = new AttendanceTable();
	$headings = array('Student Id', 'Name','Total Days', 'Present Days', 'Absent Days', 'View Statistic', 'Message');	
	$table->setHeadings($headings);

	
    $vals=['s.student_id','s.first_name','s.middle_name','s.surname','a.total','a.days'];
    $str = implode(', ', $vals);

	$students = $pdo->prepare('SELECT '.$str.' FROM student s JOIN attendance a ON s.student_id = a.student_id ORDER BY student_id');
	$students->execute();
	$lastAdded = 0;
	foreach ($students as $key => $row) {
		if ($lastAdded != $row['student_id']) {
			$allTheAttendances = $pdo->prepare('SELECT days, total FROM attendance WHERE student_id ='.$row['student_id']);
			$allTheAttendances->execute();
			$totalDays=0;
			$present=0;
			foreach ($allTheAttendances as $r) {
				$totalDays = $totalDays + $r['total'];
				$present = $present + $r['days'];
			}
			$attendance = [
				'student_id'=>$row['student_id'],
				'name'=>$row['first_name'].' '.$row['middle_name'].' '.$row['surname'],
				
				'total'=>$totalDays,
				'present'=>$present,
				'absent'=>$totalDays-$present
			];
			$table->addRow($attendance);	
			$lastAdded = $row['student_id'];
		}	
	}

	$content = loadTemp('../template/attendance_template.php', ['table'=>$table]);
?>
