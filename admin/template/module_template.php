<script type="text/javascript">
	function checkDelete() {
		return confirm('Are you sure you want to delete this record?');
	}
</script>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Module Leaders:</h1>
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
			<li><a href="index.php?page=moduleLeaders.php">Records</a></li>
			<li><a href="index.php?page=portfolio.php&type=module">Add Staff</a></li>
			<li><a href="index.php?page=moduleLeadersArchive.php">Archives</a></li>
		</ul>
	</div>
	<hr class="border-line"/>

	<div class="function">
		<div class="records">
			<!-- <div> -->
			<?php echo $moduleTable->generateStudents(); ?>
			<!-- </div> -->
		</div>

		
	</div>
</section>