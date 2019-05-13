<section class="admin-section">
	<div class="att-staff">
		<h1 class="heading">Attendance Management</h1>
		<div class="att-attr">
	<?php if (isset($_SESSION['mod_id'])): ?>
			<form method="POST" action="index.php?page=attendance_view">
				<div class="att-total">
					<select name="semester">
						<option value="<?php echo $semester; ?>">Semester <?php echo $semester; ?></option>
						<option value="<?php echo $semester + 1; ?>">Semester <?php echo $semester + 1; ?></option>
					</select>
						<p>&nbsp;&nbsp;Total Days &nbsp;:</p>
						<input type="text" name="" placeholder="24" readonly style="background-color: #fff;">
						<input type="submit" name="Update for Week 1" value="Update">
				</div>
			</form>
	<?php endif ?>
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