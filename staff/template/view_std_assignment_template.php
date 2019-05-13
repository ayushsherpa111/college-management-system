<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Submit Assessment</h1>
	</div>
	<hr class="border-line"/>

	<div class="function">
			<div class="records">

				<div class="ex">
					<div class="ex-content">
						<div class="ex-files">
						<p><strong>Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></p>
						<div>
							<a href="<?php echo $row['doc']; ?>"><i class="fa fa-file-o" aria-hidden="true"> <?php if ($row['doc'] == "") {
									echo "Not Submitted";
								} else { echo $row['student_id']; ?>-report-document.doc <?php } ?></i></a>
						</div>
						</div>
					</div>
				</div>

				<div class="ex">
					<div class="ex-content">
						<div class="ex-files">
						<p><strong>Source Code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></p>
						<div>
							<a href="<?php echo $row['code']; ?>"><i class="fa fa-file-o" aria-hidden="true"> <?php if ($row['code'] == "") {
									echo "Not Submitted";
								} else {echo $row['student_id']; ?>-source-code.doc <?php } ?></i></a>
						</div>
						</div>

					</div>
				</div>

				<div class="ex">
					<div class="ex-content">
						<div class="ex-files">
						<p><strong>Source Code Zip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></p>
						<div>
							<a href="<?php echo $row['zip']; ?>"><i class="fa fa-file-o" aria-hidden="true"> <?php if ($row['zip'] == "") {
									echo "Not Submitted";
								} else {echo $row['student_id']; ?>-code-zip.doc <?php } ?></i></a>
						</div>
						</div>
					</div>
				</div>

				<div class="ex">
					<div class="ex-content">
						<div class="ex-files">
						<p><strong>View Demonstration Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></p>
						<div>
							<a href="<?php echo $row['video_link']; ?>"><i class="fa fa-file-o" aria-hidden="true"> <?php if ($row['video_link'] == "") {
									echo "Not Submitted";
								} else { ?>Video Demonstration <?php } ?></i></a>
						</div>
						</div>
					</div>
				</div>

			</div>

</section>

</div>