<?php
	$title = 'My Records';
	$aside = loadTemp('../template/aside_function_template.php',[]);
	$student = new DatabaseFunctions('student');
	$data = ($student->find('student_id',$_SESSION['student_id']))->fetch();
	$cName = ($course->find('course_id',$data['course_id']))->fetch();
	$record = [
				'Id' => $data['student_id'],
				'First Name' => $data['first_name'],
				'Middle Name' => $data['middle_name'],
				'Last Name' => $data['surname'],
				'Term-Time Address' => $data['perm_address'],
				'Non Term-Time Address' => $data['temp_address'],
				'Phone No.' => $data['phone_number'],
				'Email' => $data['email'],
				'Course'=> $cName['course_name'],
				'Entry Qualification'=>$data['entry_qualification'],
			];
	$content = loadTemp('../template/my_record_template.php',['aside'=>$aside,'record'=>$record,'image'=>$data['image']]);
?>