<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Attendance Records</h1>
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
			<!-- <li><a href="attendance.php">Records</a></li>
			<li><a href="#">Create</a></li>
			<li><a href="#">Edit</a></li>
			<li><a href="#">Archive</a></li>
			<li><a href="#">Display</a></li>
			<li><a href="#">Assign</a></li> -->
		</ul>
	</div>
	<hr class="border-line"/>
	<div class="function">
		<div class="records">
			<!-- <div> -->
			<?php echo $table->generateTable(); ?>
			<!-- </div> -->
		</div>
			
	</div>
</section>