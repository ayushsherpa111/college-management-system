<?php  
	$title = 'Students';
	// $course = new DatabaseFunctions('courses');
	// $numCourse = $course->findAll();
	$studentsDetails = new DatabaseFunctions('student');
	
	$table = new tableGenerator();
	$headings = array('Student id','Full Name','Email','Address','Phone Number','Record Status','Action');
	$fullname = "CONCAT(CONCAT(first_name , CONCAT(' ', middle_name)), CONCAT(' ', surname))";
	$records = $studentsDetails->findSpc(['student_id', $fullname,'email','perm_address','phone_number','record_status'], 'yes');
	
	$table->setHeadings($headings);

	$student = new DatabaseFunctions('student');

	if (isset($_GET['aid'])) {
		$student->archive($_GET['aid'], 'no','student_id');
		header('location: index.php?page=archive.php');	
	}

	foreach ($records as $row) {
		$table->addRow($row);
	}
	
	$content = loadTemp('../template/view_student_template.php',['table'=>$table]);

?>