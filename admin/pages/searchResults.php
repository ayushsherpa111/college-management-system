<?php 
	include '../../connect.php';
	require '../classes/databaseFunctions.php';
	require '../classes/tableGenerator.php';

	$table = new tableGenerator();
	$headings = array('Student id','Full Name','Email','Address','Phone Number','Record Status','Action');
	$fullname = "CONCAT(CONCAT(first_name , CONCAT(' ', middle_name)), CONCAT(' ', surname))";
	$table->setHeadings($headings);
	$table->setArchive('yes');

	$students = new DatabaseFunctions('student');
	$query =[
		'cirteria'=>$_POST['criteria'],
		'data'=>$_POST['data']
	];
	$records = $students->search($query['cirteria'],$query['data'],'no');
	foreach ($records as $row) {
		$table->addRow($row);
	}

	echo $table->generateStudents();

?>