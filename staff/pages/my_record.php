<?php
	$title = 'My Record';
	$pk ="";
	$module = new DataBaseFunctions('module');
	$course = new DataBaseFunctions('courses');
	$moduleTeacher = new DataBaseFunctions('module_teachers');
	if (isset($_SESSION['leader_id'])) {
		$staff = new DataBaseFunctions('courseleader');
		$pk = 'leader_id';
	}else if (isset($_SESSION['mod_id'])) {
		$staff = new DataBaseFunctions('module_leader');
		$pk = 'mod_id';
	}
	$staffDetails = ($staff->find($pk,$_SESSION[$pk]))->fetch();
	$record =[
		'First Name'=>$staffDetails['first_name'],
		'Middle Name'=>$staffDetails['middle_name'],
		'Sur Name'=>$staffDetails['surname'],
		'Email'=>$staffDetails['email'],
		'Address'=>$staffDetails['address'],
		'Phone Number'=>$staffDetails['phone_number']
	];
	if (isset($_SESSION['leader_id'])) {
		$cName = ($course->find('course_id',$staffDetails['course_id']))->fetch();
		$record['Course']= $cName['course_name'];
	}else if (isset($_SESSION['mod_id'])) {
		$mod = ($moduleTeacher->find('mod_id',$staffDetails['mod_id']))->fetch();
		$cName = ($module->find('mcode',$mod['mcode']))->fetch();
		$record['Module']= $cName['title'];
	}
	if (isset($_GET['id'])) {
		$student = new DataBaseFunctions('student');
		$details = ($student->find('student_id',$_GET['id']))->fetch();
		$courseName = ($course->find('course_id',$details['course_id']))->fetch();
		$record = [
		'First Name'=>$details['first_name'],
		'Middle Name'=>$details['middle_name'],
		'Sur Name'=>$details['surname'],
		'Email'=>$details['email'],
		'Address'=>$details['perm_address'],
		'Phone Number'=>$details['phone_number'],
		'Course' =>$courseName['course_name'],
		
	];
		$content = loadTemp('../template/my_record_template.php',['staffDetails' => $record,'image'=>$details['image']]);
	}else{
		$content = loadTemp('../template/my_record_template.php',['staffDetails' => $record,'image'=>$staffDetails['image']]);
	}
?>