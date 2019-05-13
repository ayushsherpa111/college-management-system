<?php echo $aside; ?>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">View Assessment</h1>
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
							<h4><a href="index.php?page=submit_assessment&mod=<?php echo $_GET['mod'];?>&asId=<?php echo $value['brief_id']; ?>"><?php echo $value['title']; ?></a></h4>
							<div class="ex-files">
								<p>Submission Deadline <b><?php echo $value['submission_date']; ?></b></p>
							</div>
						</div>
					</div>
					
				<?php endforeach ?>
			<?php } ?>

			</div>

</section>

</div>