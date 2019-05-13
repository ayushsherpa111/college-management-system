<section class="admin-section">
	<h1 class="heading">Portfolio</h1>
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
	<!-- <div class="function"> -->
		<?php 
		// notification messages

		if (isset($_GET['msg'])) {
			extract($_GET);
			if ($msg == "empty") {
				echo "<p class=\"error\">Please enter all fields!</P>";
			}
			else if ($msg == "successful") { 
				echo "<p class=\"success\">Records added successfully!</P>"; 
			}

		} 
		?> 

		<div class="portfolio">
			<div class="port-pic">
				<div class="pic-border">
					<img src="../../images/General/default.png" class="img">
					<h1><?php if(isset($_GET['eid'])){echo $row['first_name'];}else{
						echo "--------";
					} ?></h1>
					<p><?php if(isset($_GET['eid'])){echo $row['email'];}else{
						echo "--------";
					} ?></p>
				</div>
			</div>

			<div class="port-details">
				<h2>Portfolio Details</h2>

				<aside>
					<form action="index.php?page=portfolio.php" method="POST" id="addStd" class="admin-form">
						<input type="hidden" name="student_id" required value="<?php if(isset($_GET['eid'])){echo $row['student_id'];} ?>">
						<div class="form-element">
							<label>First Name</label>
							<input type="text" name="first_name" required value="<?php if(isset($_GET['eid'])){echo $row['first_name'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Middle Name</label>
							<input type="text" name="middle_name" value="<?php if(isset($_GET['eid'])){echo $row['middle_name'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Sur Name</label>
							<input type="text" name="surname" required value="<?php if(isset($_GET['eid'])){echo $row['surname'];} ?>">
						</div>
						
											
						<div class="form-element">
							<label>Address Term Time</label>
							<input type="text" name="perm_address" required value="<?php if(isset($_GET['eid'])){echo $row['perm_address'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Address Non-Term Time</label>
							<input type="text" name="temp_address" required value="<?php if(isset($_GET['eid'])){echo $row['temp_address'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Phone No.</label>
							<input type="text" name="phone_number" required value="<?php if(isset($_GET['eid'])){echo $row['phone_number'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Email</label>
							<input type="text" name="email" required value="<?php if(isset($_GET['eid'])){echo $row['email'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Course Code</label>
							<!-- <input type="text" name=""> -->
							<select name="course_id">
								<?php foreach ($numCourse as $row): ?>
									<option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name'];?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-element">
							<label>Exit Year</label>
							<input type="date" name="exit_year" value="<?php if(isset($_GET['eid'])){echo $exit_year;} ?>">
						</div>
						<div class="form-element">
							<label>Entry Qualification</label>
							<input type="text" name="entry_qualification" required value="<?php if(isset($_GET['eid'])){echo $entry_qualification;} ?>">
						</div>

						<?php 
							if (isset($_GET['eid'])) {
						?>
						
						<div class="form-element">
							<label>Record Status</label>
							<div class="radio">
								<input type="radio" name="record_status" value="Provisional" style="margin-left: 0">
								<label id="radio">Provisional</label>
								<input type="radio" name="record_status" checked="checked" value="Live">
								<label id="radio">Live</label>
								<input type="radio" name="record_status"value="Dormant">
								<label id="radio">Dormant</label> 
							</div>
						</div>

						<div class="form-element">
							<label>Dormant</label>
							<div class="radio">
								<input type="radio" name="dormant" value="Graduated" style="margin-left: 0">
								<label id="radio">Graduated</label>
								<input type="radio" name="dormant" value="Withdrawal">
								<label id="radio">Withdrawal</label>
								<input type="radio" name="dormant"value="Terminated">
								<label id="radio">Terminated</label> 
								<input type="radio" name="dormant"  checked="checked" value="Null">
								<label id="radio">Null</label> 
							</div>
						</div>
						<?php } ?>
					</form>
						<div id="bulk-ins">
							<input type="submit" form="addStd" name="insert" value="Save">
							<p id="bulk-insA" onclick="getBulkInsert()">Upload Excel File</p>
						</div>
				</aside>

			</div>
		</div>
		<!-- </div> -->
	</section>