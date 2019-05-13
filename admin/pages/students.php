<?php  
	$title = 'Students';
	$course = new DatabaseFunctions('courses');
	$numCourse = $course->findAll();
	$studentsDetails = new DatabaseFunctions('student');
	
	$table = new tableGenerator();
	$headings = array('Student id','Full Name','Email','Address','Phone Number','Record Status','Action');
	$fullname = "CONCAT(CONCAT(first_name , CONCAT(' ', middle_name)), CONCAT(' ', surname))";
	// $records = $studentsDetails->findSpc(['student_id', $fullname,'email','perm_address','phone_number','record_status'], 'no');
	$records = $pdo->prepare('SELECT student_id, CONCAT(CONCAT(first_name , CONCAT(" ", middle_name)), CONCAT(" ", surname)),email, perm_address , phone_number , record_status FROM student WHERE archive ="no" LIMIT 17');
	$records->execute();
	$table->setHeadings($headings);
	$table->setArchive('yes');

	$student = new DatabaseFunctions('student');


	if (isset($_GET['delid'])) {
		$student->delete('student_id',$_GET['delid']);
		header('location: index.php?page=students.php');	
	}

	if (isset($_GET['aid'])) {
		$student->archive($_GET['aid'], 'yes','student_id');
		header('location: index.php?page=students.php');	
	}

	foreach ($records as $row) {
		$table->addRow($row);
	}

	
	$content = loadTemp('../template/view_student_template.php',['table'=>$table]);
?>