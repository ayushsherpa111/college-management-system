<script type="text/javascript">
	$(document).ready(function(){
		$('.assign-year button').on('click',function(){
			$('.list-table tbody tr').each(function(){
				if($(this).find('input[type=checkbox]').is(':checked')){
					var tutorData = new FormData();
					tutorData.append('mod_id',$('.assign-year select').val());
					tutorData.append('student_id',$(this).find('input[type=checkbox]').val());
					$.ajax({
						url:'../php/assignTutor.php',
						type:'POST',
						data : tutorData,
						contentType: false,
				        cache: false,
				        processData:false,
						beforeSend:function(){
						},
						success:function(data,success){
							window.location.href="http://localhost/woodlands_uc1/staff/public_html/index.php?page=personal_tutor_view_assigned_std";
						}
					})
				}
			});
		});
	});
</script>
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

		<div class="assign-year">
				<label>Select Tutor &nbsp;&nbsp;&nbsp;: </label>
				<select name="assign-select">
					<?php foreach ($tutors as $row): ?>
						<option value="<?php echo $row['mod_id']; ?>"><?php echo $row['first_name'].' '.$row['surname'];?></option>	
					<?php endforeach ?>
				</select>
			<button name="AssignTut">Assign</button>
		</div>  
	</div>  


	<hr class="border-line"/>

	<div class="function">
		<div class="records">
			<?php echo $table->generateTable(); ?>
		</div>
	</div>

</section>