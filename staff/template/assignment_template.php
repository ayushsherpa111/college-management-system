<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Assigment Management</h1>
	</div>

	<div class="assign-student">
		<div class="function-link">
			<ul>
				<li><a href="index.php?page=assignment">Assigments Management</a></li>
				<li><a href="index.php?page=submitted_assignment">Submitted Assignments</a></li>
			</ul>
		</div>
	</div>
	<hr class="border-line"/>

	<div class="function">
		<div class="mod-records">
			
		<div class="recordViewAdd">
				
			<div class="record-data">

			<?php foreach ($assignments as $row): ?>
				<div class="ex">
					<div class="ex-content">
						<h4><?php echo $row['title']; ?></h4>
						<div class="ex-files">
							<p>Attached Files : </p>
							<div>
								<a href="<?php echo $row['word_file'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;<?php echo "Assignment Brief"; ?></a>
								<a href="<?php echo $row['rubric'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;<?php echo "Assignment Rubrics"; ?></a>
							</div>
							<label>Submission Date: <?php echo $row['submission_date']; ?></label>
						</div>
					</div>
					<div class="ex-action">
						<a href="" title="Archive "><i class="fa fa-archive fa-colorM" aria-hidden="true"></i></a>
						<a href="" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
						<a href="" title="Delete" onclick="return checkDelete()"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
					</div>
				</div>				
			<?php endforeach ?>


			</div>



		<aside class="add-mod">
			<form action="../pages/upload_assignment.php" method="POST" class="mod-form" id="assignmentSubmit" enctype="multipart/form-data">
				<input type="hidden" name="brief_id"  value="">
				<input type="hidden" name="mcode" id="code" value="<?php echo $mcode['mcode']; ?>">
				<span>Assignment Management</span>
				<br>
				<label>Assignment Name</label>
				<input type="text" required name="title">
				<label>Word File</label>
				<input type="file" required name="word_file" id="word" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
				<label>Rubrics</label>
				<input type="file" required name="rubric" id="rubric" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
				<label>Submission Date</label>
				<input type="date" name="submission_date">
				<br>
				<br>
				<input type="submit" id="upload" value="Save">
		</form>
		</aside>
	</div>


	</div>

</section>