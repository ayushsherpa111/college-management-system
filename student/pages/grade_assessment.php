<?php
	$title = 'View Assessment Grade';

	$table = new AssignTableGenerator();
	$grade = $pdo->prepare('SELECT g.g_id,s.submit_id,s.student_id,s.submitDate,b.title,s.brief_id,b.mcode,b.submission_date,g.grade FROM grade g JOIN assignment_submit s ON g.submit_id = s.submit_id JOIN assignment_brief b ON b.brief_id = s.brief_id WHERE s.student_id =:id AND mcode =:code');
	$dats =[
		'id'=>$_SESSION['student_id'],
		'code'=>$_GET['mod']
	];
	$grade->execute($dats);
	$headings = array('Title', 'Deadline', 'Submission Date', 'Grade');	
	$table->setHeadings($headings);

	foreach ($grade as $row) {
	$table->addRow([
					'Title'=>$row['title'], 
					'deadline'=>$row['submission_date'], 
					'submission_date'=>$row['submitDate'], 
					'grade'=>$row['grade']
				]);
	}	

	$aside = loadTemp('../template/aside_module_template.php',['findMod'=>$findMod]);
	$content = loadTemp('../template/grade_assessment_template.php',['aside'=>$aside, 'table'=>$table]);
?>