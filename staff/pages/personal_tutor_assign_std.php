<?php
	$title = 'Assign Students';
	$moduleLeader = new DatabaseFunctions('module_leader');
	$table = new AssignTableGenerator();
	$headings = array('Select Students', 'Student Id', 'Name', 'Email', 'Address', 'Year');	
	$table->setHeadings($headings);
	$allTheStudents = $student->find('record_status','Live');
	foreach ($allTheStudents as $row) {
		$tut = $tutees->find('student_id',$row['student_id']);
		if ($tut->rowCount() == 0) {
			$yr = ($years->find('student_id',$row['student_id']))->fetch();
			$table->addRow(['checkbox'=>'<input type="checkbox" value='.$row['student_id'].'>',
							'std_id'=>''. $row['student_id'] . '', 
							'name'=>$row['first_name'].' '.$row['surname'], 
							'email'=> $row['email'], 
							'address'=> $row['perm_address'],
							'year'=> $yr['level_id']
						   ]);
		}
	}
	$tutors = $moduleLeader->find('archive','no');
	$content = loadTemp('../template/personal_tutor_assign_std_template.php',['table'=>$table,'tutors'=>$tutors]);
?>