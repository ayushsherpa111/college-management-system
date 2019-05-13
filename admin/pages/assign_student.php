<?php  
	$title = 'Students';
	// $course = new DatabaseFunctions('courses');
	// $numCourse = $course->findAll();
	$studentsDetails = new DatabaseFunctions('student');
	
	$table = new AssignTableGenerator();
	$headings = array('Select','Student id', 'Full Name', 'Email','Year');
	$fullname = "CONCAT(CONCAT(s.first_name , CONCAT(' ', s.middle_name)), CONCAT(' ', s.surname))";
	$year = new DatabaseFunctions('level');
	$vals=['s.student_id',$fullname, 's.email','l.level_id'];
    $str = implode(', ', $vals);
	$records = $pdo->prepare('SELECT '.$str.' FROM student s JOIN lvlstudent l ON s.student_id = l.student_id');
	$records->execute();
	
	$table->setHeadings($headings);
	foreach ($records as $row) {
		$table->addRow([
			'chck'=>'<input type="checkbox" value="'.$row[0].'">',
			'student_id'=>$row[0],
			'FullName'=>$row[1],
			'email'=>$row[2],
			'yr'=>'<span>'.$row[3].'</span>'
		]);
	}

	$content = loadTemp('../template/student_assign_template.php',['table'=>$table]);
?>