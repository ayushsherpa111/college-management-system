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
					<img src="<?php if(isset($row)){ echo '../../'.$row['image'];}else{ echo '../../images/General/default.png';} ?>" class="img">
					<h1><?php if (isset($row)) {
						echo $row['first_name'].' '.$row['surname'];
					}else{ echo "---------";} ?></h1>
					<p><?php if (isset($row)) {
						echo $row['email'];
					}else{ echo "---------";} ?></p>
				</div>
			</div>

			<div class="port-details">
				<h2>Portfolio Details</h2>

				<aside>
					<form action="index.php?page=portfolio.php" method="POST" class="admin-form">
						<input type="hidden" name="mod_id" required value="<?php if(isset($_GET['mEid'])) {echo $row['mod_id'];} ?>">
						<div class="form-element">
							<label>First Name</label>
							<input type="text" name="first_name" required value="<?php if(isset($_GET['mEid'])){echo $row['first_name'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Middle Name</label>
							<input type="text" name="middle_name" value="<?php if(isset($_GET['mEid'])){echo $row['middle_name'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Sur Name</label>
							<input type="text" name="surname" required value="<?php if(isset($_GET['mEid'])){echo $row['surname'];} ?>">
						</div>
						
						<input type="hidden" name="password" required value="<?php if(isset($_GET['mEid'])){echo $row['password'];}else{echo 'dummy';} ?>">
						
						<div class="form-element">
							<label>Address </label>
							<input type="text" name="address" required value="<?php if(isset($_GET['mEid'])){echo $row['address'];} ?>">
						</div>
						
						
						<div class="form-element">
							<label>Phone No.</label>
							<input type="text" name="phone_number" required value="<?php if(isset($_GET['mEid'])){echo $row['phone_number'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Email</label>
							<input type="text" name="email" required value="<?php if(isset($_GET['mEid'])){echo $row['email'];} ?>">
						</div>
						
						<div class="form-element">
							<label>Code</label>
							<select name="mcode">
								<?php foreach ($course as $row): ?>
									<option value="<?php echo $row['mcode']; ?>"><?php echo $row['title'];?></option>	
								<?php endforeach ?>
							</select>
						</div>
						
						<input type="submit" name="addStaff" value="Save">
					</form>
				</aside>

			</div>
		</div>
		<!-- </div> -->
	</section>