<section class="admin-section">
				<h1 class="heading">Home</h1>
				<hr class="border-line"/>
				<div class="admin-function">
					<a href="index.php?page=my_record" class="icon-function">
						<div class="icon-function">
							<div class="index-icon">
								<i class="fa fa-address-card" aria-hidden="true"></i>
							</div>
							<div>
								<h2>My Profile</h2>
								<p>- View my Records</p>
							</div>
						</div>
					</a>
					<a href="index.php?page=course_record">
						<div class="icon-function">
							<div class="index-icon">
								<i class="fa fa-list" aria-hidden="true"></i>
							</div>
							<div>
								<h2>Course Records</h2>
								<p>- Create, Structure, Edit, Archive, Display, Delete Staff Records</p>
							</div>
						</div>
					</a>
					<a href="index.php?page=module_record">
						<div class="icon-function">
							<div class="index-icon">
								<i class="fa fa-list-ul" aria-hidden="true"></i>
							</div>
							<div>
								<h2>Module Management</h2>
								<p>- Create, Edit, Delete, Archive, View Modules</p>
							</div>
						</div>
					</a>
					<?php if (isset($_SESSION['mod_id'])): ?>
						<a href="index.php?page=assignment">
							<div class="icon-function">
								<div class="index-icon">
									<i class="fa fa-file-text" aria-hidden="true"></i>
								</div>
								<div>
									<h2>Assignment Management</h2>
									<p>- Mark/Grade, Create, Edit, Delete, Archive, Grade Assignments</p>
								</div>
							</div>
						</a>
					<?php endif ?>
					<a href="index.php?page=attendance">
						<div class="icon-function">
							<div class="index-icon">
								<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
							</div>
							<div>
								<h2>Attendance Records</h2>
								<p>- Create, Monitor, Edit, Archive, Monitor, Display Attendance</p>
							</div>
						</div>
					</a>
					<a href="index.php?page=personal_tutor">
						<div class="icon-function">
							<div class="index-icon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
							<div>
								<h2>Personal Tutor Management</h2>
								<p>- Create, Edit, Assign, Display Personal Tutors</p>
							</div>
						</div>
					</a>
					<a href="index.php?page=report" class="marginBottom">
						<div class="icon-function">
							<div class="index-icon">
								<i class="fa fa-file-o" aria-hidden="true"></i>
							</div>
							<div>
								<h2>Report Generation / Management</h2>
								<p>- Create, Display, Print Reports</p>
							</div>
						</div>
					</a>
				</div>
			</section>
