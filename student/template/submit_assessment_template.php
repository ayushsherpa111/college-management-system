<script type="text/javascript">
	$(document).ready(function(){
		 $(".ex .ex-content form input:file").change(function() {
		        var file = this.files[0];
		        var imagefile = file.type;
		        var fileNameExt = imagefile.substr(imagefile.lastIndexOf('.') + 1);
		        var match = ["zip","docx","doc"];
		        if(($.inArray(fileNameExt,match)) != -1){
		            $(this).val('');
		            return false;
		        }
		    });

		 $('#docSubmitForm').submit(function(e){
		 	e.preventDefault();
		 	var docFile = new FormData();
		 	var doc = document.getElementById('doc').files[0];
		 	docFile.append('asId',$('#docSubmitForm').find('input[type="hidden"]').val());
		 	docFile.append('type','doc');
		 	docFile.append('docFile',doc);
		 	$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				data:docFile,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
					alert('uploading');
				},
				success:function(data,success){
					$('#doc').val('');
					$('#docSpan').html('<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>');
				}
		 	});
		 });

		 $('#codeSubmitForm').submit(function(e){
		 	e.preventDefault();
		 	e.preventDefault();
		 	var codeFile = new FormData();
		 	var code = document.getElementById('code').files[0];
		 	codeFile.append('asId',$('#codeSubmitForm').find('input[type="hidden"]').val());
		 	codeFile.append('type','code');
		 	codeFile.append('codeFile',code);
		 	$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				data:codeFile,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
					alert('uploading');
				},
				success:function(data,success){
					$('#code').val('');
					$('#codeSpan').html('<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>');
				}
		 	});
		 });

		 $('#zipSubmitForm').submit(function(e){
		 	e.preventDefault();
		 	var zipFile = new FormData();
		 	var zip = document.getElementById('zip').files[0];
		 	console.log(zip);
		 	zipFile.append('asId',$('#docSubmitForm').find('input[type="hidden"]').val());
		 	zipFile.append('type','zip');
		 	zipFile.append('zipFile',zip);
		 	$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				data:zipFile,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
					alert('uploading');
				},
				success:function(data,success){
					$('#zip').val('');
					$('#zipSpan').html('<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>');
				}
		 	});
		 });

		 $('#videoSubmitForm').submit(function(e){
		 	e.preventDefault();
		 	var docFile = new FormData(this);
		 	docFile.append('asId',$('#docSubmitForm').find('input[type="hidden"]').val());
		 	docFile.append('type','video');
		 	$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				data:docFile,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
					alert('uploading');
				},
				success:function(data,success){
					$('#video').val('');
					$('#videoSpan').html('<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>');
				}
		 	});
		 });

	});

</script>
<?php echo $aside; ?>

<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Submit Assessment</h1>
	</div>
	<hr class="border-line"/>

	<div class="function">
			<div class="records">

				<div class="ex">
					<div class="ex-content">
						<h4>Submission Guidlines</h4>
							<p>You have to consider following points when submitting your Assignment: </p>
							<ul>
								<li>Report (Word Document) : Do not forget to provide your details in Word Document.</li>
								<li>Source Code (Word Document) : Copy and paste the contents of ALL code into single word document.</li>
								<li>Source Code Zip (Zip file) : Please upload the Zip File.</li>
								<li>Video Demonstration : Please upload the video link in the description. You can upload video in youtube and paste the link in Text field of Video Demonstration as well as at the top of the report document.</li>
							</ul>
					</div>
				</div>
				
				<div class="ex">
					<div class="ex-content">
						<h4>Submission Deadline</h4>
						<p>The submission for this project is <b><?php echo $details['submission_date'] ; ?></b>.</p>
					</div>
				</div>


				<div class="ex">
					<div class="ex-content">
						<h4>Report</h4>
						<form action="../pages/uploadAssignment.php" method="POST" id="docSubmitForm" enctype="multipart/form-data">
							<input type="hidden" name="asId" value="<?php echo $_GET['asId'] ?>">
							<input type="file" name="doc" id="doc" required>
							<input type="submit" name="docSubmit" value="Submit">
						</form>
						<span id="docSpan">
						<?php if (isset($submit['doc']) && $submit['doc'] != ''): ?>
							<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>
						<?php endif ?>
						</span>
					</div>
				</div>

				<div class="ex">
					<div class="ex-content">
						<h4>Source Code</h4>
						<form action="../pages/uploadAssignment.php" enctype="multipart/form-data" method="POST" id="codeSubmitForm">
							<input type="hidden" name="asId" value="<?php echo $_GET['asId'] ?>">
							<input type="file" name="code" id="code" required>
							<input type="submit" name="codeSubmit" value="Submit">
						</form>
						<span id="codeSpan">
						<?php if (isset($submit['code'])  && $submit['code'] != ''): ?>
							<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>
						<?php endif ?>
						</span>
					</div>
				</div>

				<div class="ex">
					<div class="ex-content">
						<h4>Source Code Zip</h4>
						<form action="../pages/uploadAssignment.php" enctype="multipart/form-data" method="POST" id="zipSubmitForm">
							<input type="hidden" name="asId" value="<?php echo $_GET['asId'] ?>">
							<input type="file" name="zip" id="zip" required>
							<input type="submit" name="zipSubmit" value="Submit">
						</form>
						<span id="zipSpan">
						<?php if (isset($submit['zip'])  && $submit['zip'] != ''): ?>
							<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>
						<?php endif ?>
						</span>
					</div>
				</div>

				<div class="ex">
					<div class="ex-content">
						<h4>View Demonstration Link</h4>
						<form action="../pages/uploadAssignment.php" method="POST" id="videoSubmitForm">
							<input type="hidden" name="asId" value="<?php echo $_GET['asId'] ?>">
							<input type="text" name="video_link" id="video" placeholder="Enter video link" required>
							<input type="submit" name="videoSubmit" value="Submit">
						</form>
						<span id="videoSpan">
						<?php if (isset($submit['video_link']) && $submit['video_link'] != ''): ?>
							<p style="color:#33AA11"><i class="fa fa-check-circle"></i> <b>Submitted</b></p>
						<?php endif ?>
						</span>
					</div>
				</div>

			</div>

</section>

</div>