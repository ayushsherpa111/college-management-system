<?php 
	include '../../connect.php';
	require '../classes/databaseFunctions.php';

	$course = new DatabaseFunctions('courses');
	$staff = new DatabaseFunctions('courseleader');
	$criteria= [
		'course_id'=>$_POST['course_id'],
		'course_name'=>$_POST['course_name']
	];
	$course->save($criteria,'course_id');
	$last = ($course->findLast('course_id'))->fetch();
?>
<div class="ex">
		<div class="ex-content">
			<h4><?php echo $last['course_name']; ?></h4>
			<p>Course Leader : <?php 
				$staffsInCourse = ($staff->find('course_id',$_POST['course_id']))->fetch();
				if (($staff->find('course_id',$_POST['course_id']))->rowCount() ==0) {
					echo "No Course Leader Assigned";
				}else{
					echo $staffsInCourse['first_name'].' '.$staffsInCourse['surname']; 
				}?>
			</p>
		</div>
		<div class="ex-action">
			<a href="index.php?page=course_record.php&eCID=<?php echo $last['course_id'];  ?>" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
			<a href="index.php?page=course_record.php&dCID=<?php echo $last['course_id'];  ?>" title="Delete" onclick="return checkDelete()"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
		</div>
	</div>
