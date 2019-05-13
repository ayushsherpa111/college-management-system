<?php
	include '../../connect.php';
	require '../classes/databaseFunctions.php';
	require '../classes/tableGenerator.php';

	$fullname = "CONCAT(CONCAT(s.first_name , CONCAT(' ', s.middle_name)), CONCAT(' ', s.surname))";
    $vals=['s.student_id',$fullname, 's.email','s.perm_address','s.phone_number','s.record_status'];
    $str = implode(', ', $vals);

	if ($_POST['sortBy'] == 'student_idAsc') {
			$query = 'SELECT '.$str.' FROM student s WHERE archive = "no" ORDER BY s.student_id ASC LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'student_idDesc') {
		$query = 'SELECT '.$str.' FROM student s WHERE archive = "no" ORDER BY s.student_id DESC LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'provisional') {
		$query = 'SELECT '.$str.' FROM student s WHERE s.record_status = "provisional" AND archive = "no" LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'live') {
		$query = 'SELECT '.$str.' FROM student s WHERE s.record_status = "live" AND archive = "no" LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'Dormant') {
		$query = 'SELECT '.$str.' FROM student s WHERE s.record_status = "Dormant" AND archive = "no" LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'Year1') {
		$query = 'SELECT '.$str.' FROM student s JOIN lvlstudent l on s.student_id = l.student_id WHERE l.level_id = 1  AND archive = "no" LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'Year2') {
		$query = 'SELECT '.$str.' FROM student s JOIN lvlstudent l on s.student_id = l.student_id WHERE l.level_id = 2  AND archive = "no" LIMIT 17';
	}
	elseif ($_POST['sortBy'] == 'Year3') {
		$query = 'SELECT '.$str.' FROM student s JOIN lvlstudent l on s.student_id = l.student_id WHERE l.level_id = 3  AND archive = "no" LIMIT 17';
	}

	$table = new tableGenerator();
	$headings = array('Student id','Full Name','Email','Address','Phone Number','Record Status','Action');
	$table->setHeadings($headings);
	$table->setArchive('yes');

	$students = $pdo->prepare($query);
	$students->execute();
	
	foreach ($students as $row) {
		$table->addRow($row);
	}

	echo $table->generateStudents();
?>