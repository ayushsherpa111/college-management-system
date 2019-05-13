<script type="text/javascript">
	$(document).ready(function(){
		$('#changeYear').on('click',function(){
			$('.list-table tbody tr').each(function(){
				if ($(this).find('input[type=checkbox]').is(':checked')) {
					var id = $(this).find('input[type=checkbox]').val();
					var year = $('.assign-year select').val();
					$.post('../pages/changeYear.php',{
						student_id : id,
						level_id : year,
					});
					$(this).find('span').html(year);
					$(this).find('input[type=checkbox]').prop('checked',false);
				}
			});
		})
	});
</script>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Student Records</h1>
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

	<div class="assign-student">
		<div class="function-link">
			
			<ul>
				<li><a href="index.php?page=students.php">Records</a></li>
				<li><a href="index.php?page=portfolio.php">Add Student</a></li>
				<li><a href="index.php?page=archive.php">Archives</a></li>
				<li><a href="index.php?page=assign_student.php">Assign</a></li>
			</ul>
			<div class="assign-year">
				<label>Select Year &nbsp;&nbsp;&nbsp;: </label>
					<select name="assign-select">
						<?php for ($i = 1; $i < 4; $i++) { ?>
							<option value="<?php echo $i; ?>"><?php echo "Year " .  $i;?></option>	
						<?php } ?>
					</select>
					<button id="changeYear">Submit</button>
			</div>  
		</div>  
		<hr class="border-line"/>
	</div>

	

	<div class="function assignStudentTable">
		<div class="records">
			
			<!-- <div> -->
			<?php echo $table->generateTable(); ?>
			<!-- </div> -->
		</div>

		
	</div>
</section>