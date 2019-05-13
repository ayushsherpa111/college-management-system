<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="../../css/admin.css?<?php echo time(); ?>">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

	<header class="header">
		<div class="logo">
			<div>
				<img src="../../images/logo.PNG">
			</div>
			<div class="wuc">
				<h1>Woodland's University College</h1>
			</div>
		</div>
		<div class="log">
			<form action="logout.php" method="">
				<input type="submit" name="logout" value="Logout">
			</form>
		</div>
	</header>
	
	<div class="nav-panel">
		<p>Navigation Panel &nbsp;&nbsp;&nbsp; > &nbsp;&nbsp;&nbsp; Records &nbsp;&nbsp;&nbsp; > &nbsp;&nbsp;&nbsp; Create 		&nbsp;&nbsp;&nbsp; > &nbsp;&nbsp;&nbsp; Display</p>
	</div>

	<div class="admin-container">		
		<aside class="aside">
			<!-- navigation pannel -->
			<ul class="">
				<!-- <li><a href=""></a></li> -->
				<li><a href="home.php"><i class="fa fa-home"></i>
				&nbsp; Home</a></li>
				<li><a href="my_record.php"><i class="fa fa-address-card"></i>&nbsp;&nbsp; My Record</a></li>
			</ul><br/>
			<ul class="">
				<li><a href="course_record.php"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp; Course Records</a></li>
				<!-- <li><a onclick="displayStaffType();"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp; Staff Records</a>
					<div class="link-staff">
						<a href="#">-&nbsp;&nbsp; Module Leader</a>
						<a href="#">-&nbsp;&nbsp; Course Leader</a>
					</div>
				</li> -->
				<li><a href="module_record.php"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp; Module Records</a></li>
				<li><a href="assignment.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; Assignment</a></li>
				<li><a href="attendance.php"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp; Attendance</a></li>
				<li><a href="personal_tutor.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; Personal Tutor</a></li>
				<li><a href="report.php"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp; Report</a></li>
				<!-- <li><a href=".php">Review</a></li> -->
				<br/>
				<!-- <li><a href=".php"></a></li> -->
				<!-- <li><a href=".php"></a></li> -->
			</ul>		
		</aside>

		<!-- <script type="text/javascript">
			var temp = 0;

			function displayStaffType() {
				var staff = document.getElementsByClassName('link-staff')[0];

				if (temp % 2 == 0) {
					staff.style.display = 'block';
					temp++;	
				}
				else {
					staff.style.display = 'none';
					temp++;					
				}
			  	// cross.style.transition = 'transform ease-out 1s';
			  	// cross.style.transition = 'transform ' + 'ease-out ' + 3 + 's';
			  	// cross.style.transform = 'translateX(0px)';
			  }
			</script> -->