<?php
	$title = 'Course Records';
	$courses = new DatabaseFunctions('courses');
	$allCourses = $courses->findAll();
	$staff = new DatabaseFunctions('courseleader');
	if (isset($_GET['eCID'])) {
		$courseRec = ($courses->find('course_id',$_GET['eCID']))->fetch();
		$content = loadTemp('../template/course_record_template.php',['allCourses'=>$allCourses,'staff'=>$staff,'courseRec'=>$courseRec]);	
	}else if(isset($_GET['dCID'])){
		$courses->delete('course_id',$_GET['dCID']);
		header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php?page=course_record.php');
	}
	else{
		$content = loadTemp('../template/course_record_template.php',['allCourses'=>$allCourses,'staff'=>$staff]);
	}
?>