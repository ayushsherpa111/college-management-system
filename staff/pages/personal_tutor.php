<?php
if (isset($_SESSION['mod_id'])) {
	$title = 'View Students';

	$table = new AssignTableGenerator();
	$headings = array('Student Id', 'Name', 'Email', 'Address', 'Phone Number', 'View Details');	
	$table->setHeadings($headings);
	$mytutees = $tutees->find('mod_id',$_SESSION['mod_id']);
	foreach ($mytutees as $row) {
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
}elseif (isset($_SESSION['leader_id'])) {
	$title = 'Personal Tutor';
	$myDetails = ($courseleaders->find('leader_id',$_SESSION['leader_id']))->fetch();
	$year = 
	$allModules = $pdo->prepare('SELECT m.mod_id, m.first_name,m.middle_name,m.surname,m.address,m.phone_number,m.email FROM module_leader m JOIN module_teachers mt ON mt.mod_id = m.mod_id JOIN module d ON d.mcode = mt.mcode WHERE d.course_id = :year');
	$yearModule = [
		'year' => $myDetails['course_id']
	];
	$allModules->execute($yearModule);
	$table = new AssignTableGenerator();
	$headings = array('Module Id', 'Name', 'Email', 'Address', 'Phone Number', 'Total Students', 'View Students');	
	$table->setHeadings($headings);

	foreach ($allModules as $row) {
		$numsOfTuts = $tutees->find('mod_id',$row['mod_id']);
		$table->addRow(['mod_id'=>''. $row['mod_id'] . '', 
						'name'=>$row['first_name'].' '.$row['middle_name'].' '.$row['surname'], 
						'email'=>$row['email'], 
						'address'=>$row['address'], 
						'ph_no'=>$row['phone_number'],
						'total_std'=>$numsOfTuts->rowCount(),
						'view_std'=>'<a href="index.php?page=personal_tutor_total_std&mid='.$row['mod_id'].'">view</a>'
					   ]);
	}

		$content = loadTemp('../template/personal_tutor_template.php',['table'=>$table]);
	}
?>