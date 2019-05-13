<script type="text/javascript">
	function checkDelete() {
		return confirm('Are you sure you want to delete this record?');
	}
	$(document).on('click','.prev',function(){
		$.post('../template/ajax/get_prev_values.php',{val:$('.list-table tbody tr:first').find('td:first').text()},
			function(data){
				if (data != "No") {
					$('.function .records').html(data);
				}
			});
	})
	$(document).on('click','.next',function(){
		$.post('../template/ajax/get_next_values.php',{val:$('.list-table tbody tr:last').find('td:first').text()},
			function(data){
				if (data != "No") {
					$('.function .records').html(data);
				}
			});
		
	})
</script>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Student Records</h1>
		<div class="search searchSelectStd">
			<form action="../pages/searchResults.php" method="POST" id="searchForm">
				<input type="text" name="data" placeholder="Enter a student name...">
				<select name="criteria" class="">
							<option value="student_id">Id Number</option>	
							<option value="first_name">Name</option>	
							<option value="perm_address">Address</option>	
				</select>
				<div class="search-icon">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="submit" name="search" value="Search" id="search">
				</div>
			</form>
		</div>
	</div>

	<!-- <div class="assign-student"> -->
	<div class="function-link">
		<ul>
			<li><a href="index.php?page=students.php">Records</a></li>
			<li><a href="index.php?page=portfolio.php">Add Student</a></li>
			<li><a href="index.php?page=archive.php">Archives</a></li>
			<li><a href="index.php?page=assign_student.php">Assign</a></li>
		</ul>
	<div class="assign-year">
		<label>Sort By &nbsp;&nbsp;&nbsp;: </label>
		<select name="assign-select" id="assign-select">
				<option value="student_idAsc">Id No. Ascending</option>	
				<option value="student_idDesc">Id No. Descending</option>	
				<option value="provisional">Provisional</option>	
				<option value="live">Live</option>	
				<option value="Dormant">Dormant</option>	
				<option value="Year1">Year 1</option>	
				<option value="Year2">Year 2</option>	
				<option value="Year3">Year 3</option>	
		</select>
		<button name="Sort" id="Sort">Ok</button>
	</div>  
	</div>
	<!-- </div> -->

	<hr class="border-line"/>

	<div class="function">
		<div class="records">
			<!-- <div> -->
			<?php echo $table->generateStudents(); ?>
			<!-- </div> -->
		</div>
	</div>
	<?php if ($_GET['page'] != "archive.php") { ?>
		<div class="pre-nex">
			<button class="prev"><i class="fa fa-angle-left prev-l" aria-hidden="true"></i> &nbsp;&nbsp; Prev</button>
			<button class="next">Next &nbsp;&nbsp; <i class="fa fa-angle-right next-r" aria-hidden="true"></i></button>
		</div>
	<?php } ?>

</section>