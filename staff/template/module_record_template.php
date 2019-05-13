<?php 
error_reporting(0);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#moduleFile').submit(function(e){
			e.preventDefault();
			var uploadData = new FormData();
			var uploadFiles1 = document.getElementById('file1').files[0];
			var uploadFiles2 = document.getElementById('file2').files[0];
			var uploadFiles3 = document.getElementById('file3').files[0];
			uploadData.append('mcode',$('#moduleFile #moduleCode').val());
			uploadData.append('title',$('#moduleFile').find('input[name="title"]').val());
			uploadData.append('week',$('#moduleFile #weekID').val());
			uploadData.append('file1',uploadFiles1);
			uploadData.append('file2',uploadFiles2);
			uploadData.append('file3',uploadFiles3);
			$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				data:uploadData,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
				},
				success:function(data,success){
					$('.record-data').append(data);
					$('#moduleFile').find('input[name="title"]').val('');
					$('#moduleFile #file1').val('');
					$('#moduleFile #file2').val('');
					$('#moduleFile #file3').val('');
				}
			});
		});

		$('#courseForm').submit(function(e){
			e.preventDefault();
			var check = false;
			var uploadData = new FormData();
			uploadData.append('mcode',$('#courseForm').find('input[name="mcode"]').val());
			uploadData.append('course_id',$('#courseForm').find('input[name="course_id"]').val());
			uploadData.append('level_id',$('#courseForm #yearID').val());
			uploadData.append('title',$('#courseForm').find('input[name="title"]').val());
			uploadData.append('archive','no');
			console.log($('#courseForm').find('input[name="mcode"]').val());
				console.log($('#courseForm').find('input[name="course_id"]').val());
				console.log($('#courseForm #yearID').val());
				console.log($('#courseForm').find('input[name="title"]').val());
				console.log($(location).attr("href").indexOf('eID'));
			if ($(location).attr("href").indexOf('eID') > -1) {
				console.log('IN');
				$.post('../php/checkExisting.php',{mcode:$('#courseForm').find('input[name="mcode"]').val()},function(data){
				console.log(data);
				if (data == 'no') {
					check = false;
				}else if(data == 'yes'){
					check = true;
				}
				});
			}else{
				check = true;
			}
			console.log(check);
			if (!check) {
				alert('Id already exists');
			}
			else{
			$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				data:uploadData,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
				},
				success:function(data,success){
					if (window.location.href.indexOf('&eID') > 0) {
						window.location.href="http://localhost/woodlands_uc1/staff/public_html/index.php?page=module_record";
					}else{
						$('.record-data').append(data);
						$('#courseForm').find('input[name="title"]').val('');
						$('#courseForm').find('input[name="mcode"]').val('');
					}
				}
			});
			}		
		});
	

		$('.ex .ex-action').find('#delete').on('click',function(e){
			e.preventDefault();
			
			var id = $(this).attr('href');
			var deleteData = new FormData();
			deleteData.append('file_id',id);

			$.ajax({
				url:'../php/deleteModule.php',
				type:'POST',
				data:deleteData,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
				},success:function(data){
				}
			});

			var elements = document.getElementsByClassName('ex');
			for (var i = 0; i < elements.length; i++) {
				if (elements[i].getAttribute('id') == id) {
					$(elements[i]).fadeOut('normal');
				}
				
			}
		});

		$('.ex .ex-action').find('#deleteModule').on('click',function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			var deleteData = new FormData();
			deleteData.append('mcode',id);
			$.ajax({
				url:'../php/deleteMcode.php',
				type:'POST',
				data:deleteData,
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
				},success:function(data){
				}
			});

			var elements = document.getElementsByClassName('ex');
			for (var i = 0; i < elements.length; i++) {
				if (elements[i].getAttribute('id') == id) {
					$(elements[i]).fadeOut('normal');
				}
				
			}
		});

	});
</script>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Module Management</h1>
	</div>
	<div class="function-link">
		<ul>
			<li><a href="index.php?page=module_record">View Modules</a></li>
			<?php if (isset($_SESSION['leader_id'])) { ?>
				<li><a href="index.php?page=archive_module">Archives</a></li>
			<?php } ?>
		</ul>
	</div>
	<hr class="border-line"/>

	<div class="function">
		<div class="mod-records">
			
		<div class="recordViewAdd">
				
			<div class="record-data">
				<?php if (isset($_SESSION['mod_id'])) { ?>
		<?php foreach ($files as $row): ?>
				<div class="ex" id="<?php echo $row['file_id']; ?>">
					<div class="ex-content">
						<h4 style="display: inline;">Week <?php echo $row['week']; ?> &nbsp;&nbsp;&nbsp; </h4>
						<h3 style="display: inline;"><?php echo $row['title'];  ?></h3>
					<div class="ex-files">
						<p>Attached Files : </p>
					<div>
						<a href="<?php echo $row['file1']; ?>"><i class="fa fa-file-o" aria-hidden="true"> File1</i></a>
						<a href="<?php echo $row['file2']; ?>"><i class="fa fa-file-o" aria-hidden="true"> File2</i></a>
					</div>
					</div>
					
					<div class="ex-files">
					<p>Resources &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</p>
					<div>
						<a href="<?php echo $row['file3']; ?>"><i class="fa fa-file-o" aria-hidden="true"> File3</i></a>
					</div>
					</div>
					</div>


					<div class="ex-action">
						<a href="<?php echo $row['file_id']; ?>" title="Delete" id="delete"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
					</div>
				</div>
		<?php endforeach ?>
				<?php } elseif (isset($_SESSION['leader_id'])) { ?>
					<?php foreach ($allTheModules as $rows): ?>
						<div class="ex" id="<?php echo $rows['mcode']; ?>">
							<div class="ex-content">
								<h4><?php echo '('.$rows['mcode'].') '.$rows['title'].' (Year '.$rows['level_id'].')'; ?></h4>
							</div>
							<div class="ex-action">
								<?php if ($archive == "yes") { ?>
									<a href="http://localhost/woodlands_uc1/staff/public_html/index.php?page=archive_module&aID=<?php echo $rows['mcode']; ?>" title="Archive "><i class="fa fa-archive fa-colorM" aria-hidden="true"></i></a>
								<?php } else if ($archive =="no") { ?>
									<a href="http://localhost/woodlands_uc1/staff/public_html/index.php?page=module_record&aID=<?php echo $rows['mcode']; ?>" title="Archive "><i class="fa fa-archive fa-colorM" aria-hidden="true"></i></a>
								<?php } ?>
								<a href="index.php?page=module_record&eID=<?php echo $rows['mcode']; ?>" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
								<a href="<?php echo $rows['mcode']; ?>" title="Delete" id="deleteModule"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
							</div>
						</div>	
					<?php endforeach ?>
				<?php } ?>

			</div>

		<aside class="add-mod">
		<?php if (isset($_SESSION['mod_id'])) {
		 ?>
			<form action="../php/uploadModule.php" method="POST" class="mod-form" id="moduleFile">
			<input type="hidden" name="mcode" id="moduleCode" value="<?php echo $moduleName['mcode']; ?>">
			<span>Module Management</span>
			<br>
			<label>Title</label>
			<input type="text" name="title" required>
			<label>Week</label>
			<select name="week" id="weekID">
				<?php for ($i=1; $i <=20; $i++) {	?> 
				<option value="<?php echo $i; ?>">Week <?php echo $i; ?></option>
			<?php } ?>
			</select>
			<label>File 1</label><input type="File" name="file1" id="file1" required/>
			<label>File 2</label><input type="File" name="file2" id="file2" required/>
			<label>File 3</label><input type="File" name="file3" id="file3" required/>
			<br>
			<br>
			<input type="submit" name="submit" value="Save">
		</form>
		<?php } elseif (isset($_SESSION['leader_id'])) { ?>
			<form action="../php/createNewModule.php" method="POST" class="mod-form" id="courseForm">
				<input type="hidden" name="course_id" value="<?php echo $cID['course_id']; ?>">
				<span>Add Module: </span>
				<br>
				<label>Module code</label>
				<input type="text" name="mcode" <?php if (isset($_GET['eID'])) {
					echo "readonly";
				} ?> value="<?php if(isset($_GET['eID'])){ echo $_GET['eID'];} ?>" required>
				<label>Module Name</label>
				<input type="text" name="title" value="<?php if(isset($_GET['eID'])){ echo($editModule['title']); } ?>" required>
				<label>Year</label>
				<select name="year" id="yearID">
					<?php foreach ($years as $year): ?>
						<?php if(isset($_GET['eID']) && ($editModule['level_id'] == $year['level_id'])) { ?>
						<option value="<?php echo $year['level_id']; ?>" selected><?php echo $year['yr']; ?></option>
						<?php } else{ ?>
						<option value="<?php echo $year['level_id']; ?>"><?php echo $year['yr']; ?></option>
						<?php } ?>
					<?php endforeach ?>
				</select>
				<br>
				<input type="submit" name="submit" value="Save">
			</form>
		<?php } ?>
		</aside>
		
	</div>


	</div>

</section>