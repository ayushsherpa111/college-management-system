<?php
	$title = 'Manage Attendance';
	$table = new AssignTableGenerator();
	$headings = array('Student Id', 'Name', 'Lecture', 'Tutorial');	
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
	}

	foreach ($allStudentsInYear as $rows) {
		$allStudents = ($student->find('student_id',$rows['student_id']))->fetch();
		$table->addRow(['student_id'=>''. $allStudents['student_id'] . '', 
						'name'=> $allStudents['first_name'].' '.$allStudents['surname'], 
						'form1'=>'<form method="POST" id="'.$allStudents['student_id'].'L"><input type="hidden" name="student_id" value="'.$allStudents['student_id'].'"><input type="text" class="tbl-attT" id="attendanceL" placeholder=""> <button class="tbl-attP tbl-a" id="presentL"> P </button> <button class="tbl-attA tbl-a" id="absentL"> A </button> </form>',
						'form2'=>'<form method="POST" id="'.$allStudents['student_id'].'T"><input type="hidden" name="student_id" value="'.$allStudents['student_id'].'"><input type="text" class="tbl-attT" id="attendanceT" placeholder=""> <button class="tbl-attP tbl-a" id="presentT"> P </button> <button class="tbl-attA tbl-a" id="absentT"> A </button> </form>'
					   ]);
	}
	$content = loadTemp('../template/attendance_template.php', ['table'=>$table,'semester'=>$semester,'mcode'=>$mName['mcode']]);
?>
