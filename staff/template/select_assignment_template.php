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

				<?php if ($assignment->rowCount() == 0) {
					echo "<h1>No assignments Currently posted</h1>";
				}else{ 
				foreach ($assignment as $key => $value): ?>
					<div class="ex">
						<div class="ex-content">
							<a href="http://localhost/woodlands_uc1/staff/public_html/index.php?page=view_submit&brief=<?php echo $value['brief_id'] ?>"><h4><?php echo $value['title']; ?></h4></a>
						</div>
					</div>
					
				<?php endforeach ?>
			<?php } ?>

			</div>

</section>

</div>