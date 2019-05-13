<?php 
include '../../classes/tableGenerator.php';
include '../../../connect.php';
$students  = $pdo->prepare('SELECT student_id, CONCAT(CONCAT(first_name , CONCAT(" ", middle_name)), CONCAT(" ", surname)),email, perm_address , phone_number , record_status FROM student WHERE student_id > :val LIMIT 17');
$students->execute(['val'=>$_POST['val']]);
if ($students->rowCount() == 0) {
	echo "No";
}else{
	$headings = array('Student id','Full Name','Email','Address','Phone Number','Record Status','Action');
	$table = new tableGenerator();
	$table->setHeadings($headings);
	$table->setArchive('yes');
	foreach ($students as $row) {
		$table->addRow($row);
	}

	echo $table->generateStudents();
}

?>