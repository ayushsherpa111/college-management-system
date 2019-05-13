<?php
	$title = 'View Assigned Students';
	$table = new AssignTableGenerator();
	$headings = array('Student Id', 'Name', 'Email', 'Address', 'Phone Number', 'Personal Tutor', 'Remove');	
	$table->setHeadings($headings);
	$allTheTutes = $tutees->findAll();
	foreach ($allTheTutes as $row) {
		$myTutor = ($modLead->find('mod_id',$row['mod_id']))->fetch();
		$detail = ($student->find('student_id',$row['student_id']))->fetch();
		$table->addRow(['std_id'=>'<input type="hidden" value="'.$row['student_id'].'">'. $row['student_id'] . '', 
						'name'=>$detail['first_name'].' '.$detail['surname'], 
						'email'=>$detail['email'], 
						'address'=>$detail['perm_address'], 
						'ph_no'=>$detail['phone_number'],
						'per_tut'=>$myTutor['first_name'].' '.$myTutor['surname'],
						'view_std'=>'<button id="rem-tut">Remove</button>'
					   ]);
	}

	$content = loadTemp('../template/personal_tutor_view_assigned_std_template.php',['table'=>$table]);
?>