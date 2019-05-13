<?php 
	$title = "CourseLeaders";
	$course = new DatabaseFunctions('courseleader');
	$courseLeader=$course->findAll();
	$courseTable = new moduleTableGenerator();
	$headings = array('ID','Full Name','Email','Address','Course','Phone Number','Action');
	$fullname = "CONCAT(CONCAT(first_name , CONCAT(' ', middle_name)), CONCAT(' ', surname))";
	$records = $course->findSpc(['leader_id',$fullname,'email','address','course_id','phone_number'],'no');

	$courseTable->setHeadings($headings);
	$courseTable->setArchive('yes');

	foreach ($records as $row) {
		$courseTable->addRow($row);
	}
	
	if (isset($_GET['aCid'])) {
		$course->archive($_GET['aCid'], 'yes','leader_id');
		header('location: index.php?page=courseLeader.php');	
	}

	if (isset($_GET['delCid'])) {
		$course->delete('leader_id',$_GET['delCid']);
		header('location: index.php?page=courseLeader.php');
	}
	$content = loadTemp('../template/courseLeader_template.php',['courseTable'=>$courseTable]);
?>