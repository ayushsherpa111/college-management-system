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
							<h4><?php echo $value['title']; ?></h4>
							<div class="ex-files">
								<p>Attached Files : </p>
								<div>
									<a href="http://localhost/woodlands_uc1/staff/public_html/<?php echo $value['word_file'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp; Assignment Brief</a>
									<a href="http://localhost/woodlands_uc1/staff/public_html/<?php echo $value['rubric'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp; Rubrics</a>
								</div>
							</div>
						</div>
					</div>
					
				<?php endforeach ?>
			<?php } ?>

			</div>

</section>

</div>