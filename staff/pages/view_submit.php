<?php 
	$title = 'Submits';
	$brief = $_GET['brief'];
	$table = new AssignTableGenerator();
	$grade = new DatabaseFunctions('grade');
	$heading = ['Student ID','Submit Date','Deadline','Status', 'View Assignment','Grade','Action'];
	$table->setHeadings($heading); 
	$assignmentBrief = new DatabaseFunctions('assignment_brief');
	$briefDetails = ($assignmentBrief->find('brief_id',$brief))->fetch();
	$assingmentSubmits = new DatabaseFunctions('assignment_submit');
	$mYear = ($teachers->find('mod_id',$_SESSION['mod_id']))->fetch();
	$level = ($module->find('mcode',$mYear['mcode']))->fetch();
	$status = "";
	$ss = $years->find('level_id',$level['level_id']);
	$allSubmit = $pdo->prepare('SELECT a.submit_id,a.student_id,a.brief_id,a.zip,a.code,a.doc,a.video_link, a.submitDate FROM assignment_submit a WHERE a.student_id = :id AND a.brief_id =:b');
	foreach ($ss as $row) {
		$datas = [
			'id'=>$row['student_id'],
			'b' =>$brief
		];
		$allSubmit->execute($datas);
		$a = $allSubmit->fetch();
		if ($a['student_id'] == $row['student_id']) {
			if ($a['zip'] == "" || $a['doc'] == "" || $a['code'] == "" || $a['video_link'] == "") {
				$status = "Partially Submitted";
			}if ($a['zip'] == "" && $a['doc'] == "" && $a['code'] == "" && $a['video_link'] == "") {
				$status = "Not Submitted";
			}
			else{
				$status = "Submitted";
			}
			if (($grade->find('submit_id',$a['submit_id']))->rowCount() > 0 ) {
				$myGrade = ($grade->find('submit_id',$a['submit_id']))->fetch();
				$g = $myGrade['grade'];
			}else{
				$g = "Not Graded";
			}
			$table->addRow([
					'Student id'=>$row['student_id'],
					'Submit Date'=> $a['submitDate'],
					'deadline'=>$briefDetails['submission_date'],
					'Status'=> $status,
					'view'=>'<a href="index.php?page=view_std_assignment&assID='.$a['submit_id'].'">view</a>',
					'Grade'=> '<span id="'.$row['student_id'].'">'.$g.'</span>',
					'action' =>'<form method="post" action="" id="gradeForm">
					<input type="hidden" id="submit" value='.$a['submit_id'].'>
					<input type="hidden" id="sId" value='.$row['student_id'].'>
					<select id="assGradeSelect" name="ass_grade">
									<option value="A+">A+</option>
									<option value="A">A</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B">B</option>
									<option value="B-">B-</option>
									<option value="C+">C+</option>
									<option value="C">C</option>
									<option value="C-">C-</option>
									<option value="D+">D+</option>
									<option value="D">D</option>
									<option value="D-">D-</option>
									<option value="F">F</option>
									<option value="Z">Z</option>
								</select>
								<input type="submit" id="assGradeSubmit" value="grade"></form>'
				]);
		}else{
			$table->addRow([
				'Student id'=>$row['student_id'],
				'Submit Date' =>'-----------------',
				'deadline'=>$briefDetails['submission_date'],
				'Status'=>'Not Submitted',
				'view'=>'Assignment not available',
				'Grade'=>'<span id="'.$row['student_id'].'">Not Graded</span>',
				'action' =>'<form method="post" action="" id="gradeForm">
				<input type="hidden" id="submit" value="">
				<input type="hidden" id="sId" value='.$row['student_id'].'>
				<select id="assGradeSelect" name="ass_grade">
									<option value="A+">A+</option>
									<option value="A">A</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B">B</option>
									<option value="B-">B-</option>
									<option value="C+">C+</option>
									<option value="C">C</option>
									<option value="C-">C-</option>
									<option value="D+">D+</option>
									<option value="D">D</option>
									<option value="D-">D-</option>
									<option value="F">F</option>
									<option value="Z">Z</option>
								</select>
								<input type="submit" id="assGradeSubmit" value="grade"></form>'
			]);
		}
	}
	$content =  loadTemp('../template/submitted_assignment_template.php',['table'=>$table]);

?>