<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Personal Tutor Management</h1>
	</div>
	
	<div class="function-link">
			<ul>
				<li><a href="index.php?page=personal_tutor">View Tutors</a></li>
				<li><a href="index.php?page=personal_tutor_assign_std">Assign Students</a></li>
				<li><a href="index.php?page=personal_tutor_view_assigned_std">View Assigned Students</a></li>
				
			</ul>
		</div>
	<hr class="border-line"/>

	<div class="function">
		<div class="records">
			<?php echo $table->generateTable(); ?>
		</div>
	</div>

</section>