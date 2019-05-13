<section class="admin-section">

	<div class="std-home">
		<div class="std-func"> 
			<div class="std-box">
				<a href="index.php?page=my_record"><span>View Profile</span></a>					
				<div class="std-bx">
					<?php $detail = $details->fetch(); ?>
					<div class="bx-img">
						<img src="../../<?php echo $detail['image']; ?>">
					</div>
					<div class="bx-sInfo">
						<div>
							<p class="bx-bold">WUC ID </p>
							<p class="bx-slim"><?php echo $detail['student_id']; ?></p>
						</div>
						<div>
							<p class="bx-bold">Name</p>
							<p class="bx-slim"><?php echo $detail['first_name'].' '.$detail['surname']; ?></p>
						</div>
						<div>
							<p class="bx-bold">Year</p>
							<p class="bx-slim"><?php echo $detail['level_id']; ?></p>
						</div>
						<div>
							<p class="bx-bold">Course</p>
							<p class="bx-slim"><?php echo $detail['course_name']; ?></p>
						</div>
						<div>
							<p class="bx-bold">Email</p>
							<p class="bx-slim"><?php echo $detail['email']; ?></p>
						</div>
						<div>
							<p class="bx-bold">Phone number</p>
							<p class="bx-slim"><?php echo $detail['phone_number']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="std-box">
				<a href="index.php?page=my_messages"><span>Messages</span></a>
				<div>
					<p class="msg-und">You have <?php echo $myReply->rowCount();?> message(s).</p>

					<?php foreach ($myReply as $row): ?>
						<p class="msg-und">Sent By:<strong><?php if ($row['toUser'] == 16000000) {
							echo "Admin";
						} else{
							$student = new DatabaseFunctions('student');
							$names = ($student->find('student_id',$row['student_id']))->fetch();
							echo $names['first_name'].' '.$names['surname'];
						} ?></strong><br>Receive Date: <?php echo $row['receive_date']; ?><br>Subject: <?php echo $row['subject']; ?></p>
					<?php endforeach ?>	
				
				</div>
				
			</div>
		</div>
		<div class="std-ann">
			<div class="std-box">
				<span>Announcement</span>
				<div>
				<?php 
					$pass = substr($password['first_name'], 0,2).substr($password['surname'], 0,2);
					if (password_verify($pass, $password['password'])) {
						echo "<p id='changePass'  class=\"msg-und\">Please Change Your password</p>";
					}

					foreach ($searchModules as $row) {
						$ups =$newUploads->find('mcode',$row['mcode']);
						$subs = $assignmentBrief->find('mcode',$row['mcode']);
						if ($subs->rowCount() > 0) {
							$sub = $subs->fetch();
							echo "<p class=\"msg-und\">Assignment for ".$sub['mcode']." has been Uploaded</p>";
						}
						if ($ups->rowCount() > 0) {
							$note = $ups->fetch();
							echo "<p class=\"msg-und\">Weekly tutorials for ".$note['mcode']." has been posted</p>";
						}
					}
				?>
				<?php if ($submits->rowCount() == 0) { ?>
					<p><i>No Grades posted</i></p>
				<?php	} ?>
				<?php foreach ($submits as $row): ?>
					<p>Your grades for <?php echo $row['mcode']; ?> has been posted.</p>
				<?php endforeach ?>
				</div>
			</div>

			<div class="std-box">
				<span>Journey Through Life</span>
				<div>
					<video width="100%" height="250px" controls class="bx-vid">
						<source src="../video/intro.mp4" type="video/mp4">
					</video>
				</div>
			</div>
			<div class="std-box">
				<a href="index.php?page=my_attendance"><span>Attendance Records</span></a>
				<div>
				<?php if ($myAttendance->rowCount() > 0) { 
					$total = 0;
					?>
					<?php foreach ($myAttendance as $row): ?>
						<p class="msg-und">Present Days in <?php echo $row['mcode'];?> (Semester <?php echo $row['semester']; ?>): <?php echo $row['days']; ?></p>
						<?php $total += $row['days']; ?>
					<?php endforeach ?>
					<p class="msg-und">Total present Days: <?php echo $total; ?></p>					
				<?php } else{ ?>
					<p class="msg-und"><i>No Attendance records currently available</i></p>
				<?php } ?>
				</div>
				
			</div>
		</div>
		<div class="std-modules">
			<div class="std-box">
				<span>Module Content</span>
				<div class="std-mod">
					<?php foreach ($modules as $m): ?>
						<a href="index.php?page=module&mod=<?php echo $m['mcode']; ?>"><p>WUC Year(<?php echo $m['level_id']; ?>): 17/18 <?php echo $m['title'] .' ('. $m['mcode']; ?>)</p></a>
					<?php endforeach ?>
				</div>
				
			</div>

		</div>
	</div>

</section>