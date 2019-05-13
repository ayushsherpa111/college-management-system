<?php
	$title = 'View Students';

	$table = new AssignTableGenerator();
	$headings = array('Student Id', 'Name', 'Email', 'Address', 'Phone Number', 'View Details');	
	$table->setHeadings($headings);
	$myTutes = $tutees->find('mod_id',$_GET['mid']);
	foreach ($myTutes as $row) {
		$person = ($student->find('student_id',$row['student_id']))->fetch();
		$table->addRow(['std_id'=>''. $person['student_id'] . '', 
						'name'=>$person['first_name'].' '.$person['surname'], 
						'email'=>'<a href="mailto:'.$person['email'].'">'.$person['email'].'</a>', 
						'address'=>$person['perm_address'], 
						'ph_no'=>$person['phone_number'],
						'view_std'=>'<a href="index.php?page=my_record&id='.$person['student_id'].'">view</a>'
					   ]);
	}
	
	$content = loadTemp('../template/personal_tutor_total_std_template.php',['table'=>$table]);
?>