<?php echo $aside; ?>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Module Activities</h1>
	</div>
	<hr class="border-line"/>

	<div class="function">
				
			<div class="records">
			<?php foreach ($files as $row): ?>
				<div class="ex">
					<div class="ex-content">
						<h3>Week <?php echo $row['week']; ?></h3>
						<p><?php echo $row['title']; ?></p>
						
					<div class="ex-files">
						<p>Attached Files : </p>
					<div>
						<a href="http://localhost/woodlands_uc1/staff/moduleFiles/<?php echo $row['file1'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Lecture</a>
						<a href="http://localhost/woodlands_uc1/staff/moduleFiles/<?php echo $row['file2'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Tutorial</a>
						<a href="http://localhost/woodlands_uc1/staff/moduleFiles/<?php echo $row['file3'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Resources</a>



					</div>
				</div>
			<?php endforeach ?>

			</div>

</section>

</div>