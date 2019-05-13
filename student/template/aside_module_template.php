<div class="admin-container">		
		<aside class="aside">
			<ul class="">
				<p><?php echo $findMod['title'].' ('.$findMod['mcode'].')'; ?></p>
				<hr>
				<li><a href="http://localhost/woodlands_uc1/student/public_html/index.php">Home</a></li>
				<p>Module content</p>
				<li><a href="index.php?page=module&mod=<?php echo $findMod['mcode'] ?>">&nbsp;&nbsp; - &nbsp; Module Activities</a></li>
				<hr>

				<p>Assessment</p>
				<li><a href="index.php?page=view_assessment&mod=<?php echo $findMod['mcode'] ?>">&nbsp;&nbsp; - &nbsp; View Assessment</a></li>
				<li><a href="index.php?page=submit_assessment&mod=<?php echo $findMod['mcode'] ?>">&nbsp;&nbsp; - &nbsp; Submit Work</a></li>
				<li><a href="index.php?page=grade_assessment&mod=<?php echo $findMod['mcode'] ?>">&nbsp;&nbsp; - &nbsp; Grades</a></li>
				<hr>
			</ul>
		</aside>