<script type="text/javascript">
	$(document).ready(function(){
		$('.list-table tbody tr').each(function(){
			$(this).find('button').on('click',function(){
				var id = $(this).parents("tr").find('input[type=hidden]').val();
				$.post('../php/deleteTutee.php',{student_id:id});
				$(this).parents("tr").remove();
			});
		})
	});
</script>
<section class="admin-section">
	<div class="adminMsgSearch">
			<h1 class="heading">Personal Tutor Management</h1>
			<div class="search">
				<form action="search.php" method="POST">
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