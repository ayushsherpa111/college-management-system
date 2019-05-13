<script type="text/javascript">
	$(document).ready(function(){
		$('.att-attr #submitAttendance').submit(function(e){
			e.preventDefault();
			$('#attendaceTable tbody tr').each(function(){
				var lecture ="";
				var tutorial = "";
				$(this).find('form').find('input[id="attendanceL"]').each(function(){
					lecture = $(this).val();
				});
				$(this).find('form').find('input[id="attendanceT"]').each(function(){
					tutorial = $(this).val();
				});
				var attendanceData = new FormData();
				attendanceData.append('student_id',$(this).find('form').find('input[type=hidden]').val());
				attendanceData.append('semester',$('.att-attr #submitAttendance').find('input[name=sem]').val());
				attendanceData.append('mcode',$('.att-attr #submitAttendance').find('input[name=code]').val());
				attendanceData.append('tutorial',tutorial);
				attendanceData.append('lecture',lecture);
				$.ajax({
					url:$('.att-attr #submitAttendance').attr('action'),
					type:'POST',
					data : attendanceData,
					contentType: false,
			        cache: false,
			        processData:false,
					beforeSend:function(){
					},
					success:function(data,success){
					}
				})
			});
			window.location.href="http://localhost/woodlands_uc1/staff/public_html/index.php?page=attendance";
		});
	});
</script>
<section class="admin-section">
	<div class="att-staff">
		<h1 class="heading">Attendance Management</h1>
		<div class="att-attr">
			<form action="../php/updateAttendance.php" method="POST" id="submitAttendance">
				<div class="att-total">
					<input type="hidden" name="sem" value="<?php echo $semester;  ?>">
					<input type="hidden" name="code" value="<?php echo $mcode;  ?>">
					<p>Total Days &nbsp;:</p>
					<input type="text" name="" placeholder="24">
					<h3>Week 1</h3>
					<input type="submit" name="submit" value="save">
				</div>
			</form>
			<h3>Semester <?php echo $semester; ?></h3>
		</div>
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