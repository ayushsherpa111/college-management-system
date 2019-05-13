<script type="text/javascript">
	$(document).ready(function(){
		$('#attendaceTable tbody tr').each(function(){
			$(this).find('form[id=gradeForm]').on('submit',function(e){
				e.preventDefault();
				var grade = $(this).find('select[id=assGradeSelect]').val();
				var submits = $(this).find('input[id=submit]').val();
				var id = $(this).find('input[id=sId]').val();
				var gradeData = new FormData();
				gradeData.append('student_id',id);
				gradeData.append('submit_id',submits);
				gradeData.append('grade',grade);
				gradeData.append('brief',$('.records').find('input[type=hidden]').val());
				$.ajax({
					url:'../php/gradeStudent.php',
					type:'POST',
					data : gradeData,
					contentType: false,
			        cache: false,
			        processData:false,
					beforeSend:function(){
					},
					success:function(data,success){
						alert(data);
					}
				})
				$('#attendaceTable tbody tr').each(function(){
					if ($(this).find('span').attr('id') == id) {
						$(this).find('span').html(grade);
					}
				});
					

			});

		})
	});
</script>
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
		<div class="records">
			<input type="hidden" name="brief" value="<?php echo $_GET['brief']; ?>">
			<!-- <div> -->
			<?php echo $table->generateTable(); ?>
			<!-- </div> -->
		</div>
			
	</div>

</section>