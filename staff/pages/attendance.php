<?php
	$title = 'View Attendance';
	$table = new AssignTableGenerator();
	$headings = array('Student Id', 'Name', 'Total Days', 'Present Days', 'Absent Days', 'View Statistic');	
	$table->setHeadings($headings);
	if (isset($_SESSION['mod_id'])) {
		$mName = ($teachers->find('mod_id',$_SESSION['mod_id']))->fetch();
		$year = ($module->find('mcode',$mName['mcode']))->fetch();
		$allStudentsInYear = $years->find('level_id',$year['level_id']); 
		$moduleYear = $year['level_id'];
		$semester = 0;
		if ($moduleYear == 1) {
			$semester = 1;
		}elseif ($moduleYear == 2) {
			$semester = 3;
		}
		else{
			$semester = 5;
		}
	}else if (isset($_SESSION['leader_id'])) {
		$courses = new DatabaseFunctions('courses');
		$leader = ($courseleaders->find('leader_id',$_SESSION['leader_id']))->fetch();
		$cName = ($courses->find('course_id',$leader['course_id']))->fetch();
		$allStudentsInYear = $student->find('course_id',$cName['course_id']);
	}

	foreach ($allStudentsInYear as $rows) {
		if (isset($_SESSION['mod_id'])) {
			$allStudents = ($student->find('student_id',$rows['student_id']))->fetch();
			$myAttendance = $pdo->prepare('SELECT * FROM attendance WHERE student_id =:sID AND mcode =:mcode');
			$datas = [
				'sID' => $allStudents['student_id'],
				'mcode'=>$mName['mcode']
			];
			$myAttendance->execute($datas);
		}elseif(isset($_SESSION['leader_id'])){
			$allStudents = ($student->find('student_id',$rows['student_id']))->fetch();
			$myAttendance = $pdo->prepare('SELECT a.student_id,a.semester,a.days,a.total FROM attendance a WHERE a.student_id =:id');
			$datas = [
				'id' =>$allStudents['student_id']
			];
			$myAttendance->execute($datas);
		}
		$attendance = $myAttendance->fetch();
		$total =0;
		$present =0;
		$absent = 0;
		if (isset($attendance['total'])) {
			$total = $attendance['total'];
		}else{
			$total = 0;
		}
		if (isset($attendance['days'])) {
			$present = $attendance['days'];
		}else{
			$present = 0;
		}
		$absent = $total-$present;
		$table->addRow(['student_id'=>''. $allStudents['student_id'] . '', 
						'name'=> $allStudents['first_name'].' '.$allStudents['surname'], 
						'total'=>$total, 
						'present'=>$present, 
						'absent'=>$absent,
						'view'=>'<a href="index.php?page=attendance_stat&id='.$allStudents['student_id'].'">view</a>'
					   ]);
	}
	if (isset($_SESSION['mod_id'])) {
		$content = loadTemp('../template/attendance_view_template.php', ['table'=>$table,'semester'=>$semester]);
	}elseif (isset($_SESSION['leader_id'])) {
		$content = loadTemp('../template/attendance_view_template.php', ['table'=>$table]);
	}

?>
