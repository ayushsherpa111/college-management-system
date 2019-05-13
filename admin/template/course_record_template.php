<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Course Management</h1>
	</div>
	<div class="function-link">
		<ul>
			<li><a href="index.php?page=course_record.php">View Courses</a></li>
		</ul>
	</div>
	<hr class="border-line"/>

	<div class="function">
		<div class="mod-records">
			
		<div class="recordViewAdd">
				
			<div class="record-data">

			<?php foreach ($allCourses as $row): ?>
				<div class="ex">
					<div class="ex-content">
						<h4><?php echo $row['course_name']; ?></h4>
						<p>Course Leader : <?php 
							$staffsInCourse = ($staff->find('course_id',$row['course_id']))->fetch();
							if (($staff->find('course_id',$row['course_id']))->rowCount() == 0) {
								echo "No Course Leader Assigned";
							}else{
								echo $staffsInCourse['first_name'].' '.$staffsInCourse['surname'];  
							}?> 
						</p>
					</div>
					<div class="ex-action">
						<a href="index.php?page=course_record.php&eCID=<?php echo $row['course_id'];  ?>" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
						<a href="index.php?page=course_record.php&dCID=<?php echo $row['course_id'];  ?>" title="Delete" onclick="return checkDelete()"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
					</div>
				</div>
			<?php endforeach ?>

			</div>

		<aside class="add-mod">
			<form action="../pages/createNewCourse.php" method="POST" class="mod-form" id="course_form">
			<span>Course Management</span>
			<br>
			<input type="hidden" name="course_code" required value="<?php if(isset($_GET['eCID'])){
				echo $courseRec['course_id'];
			} ?>">
			<label>Course Name</label>
			<input type="text" name="course_name" required value="<?php if(isset($_GET['eCID'])){
				echo $courseRec['course_name'];
			} ?>">
			<br>
			<br>			
			<input type="submit" name="Save" value="Save" id="addCourse">
		</form>
		</aside>
	</div>


	</div>

</section>


