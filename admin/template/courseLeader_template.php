<script type="text/javascript">
	function checkDelete() {
		return confirm('Are you sure you want to delete this record?');
	}
</script>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Course Leaders:</h1>
		<div class="search">
			<form action="#" method="POST">
				<input type="text" name="" placeholder="Enter a student name...">
				<div class="search-icon">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="submit" name="" value="Search">
				</div>
			</form>
		</div>
	</div>
<div class="function-link">
		<ul>
			<li><a href="index.php?page=courseLeader.php">Records</a></li>
			<li><a href="index.php?page=portfolio.php&type=course">Add Staff</a></li>
			<li><a href="index.php?page=courseLeaderArchive.php">Archives</a></li>
		</ul>
	</div>
	<hr class="border-line"/>

	<div class="function">
		<div class="records">
			<!-- <div> -->
			<?php echo $courseTable->generateStudents(); ?>
			<!-- </div> -->
		</div>

		
	</div>
</section>