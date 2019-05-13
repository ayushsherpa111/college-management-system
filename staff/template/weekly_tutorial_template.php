<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Weekly Tutorial Management</h1>
	</div>

	<hr class="border-line"/>

	<div class="function">
			<div class="mod-records">
			
		<div class="recordViewAdd">
				
			<div class="record-data">

			<?php for ($i = 0; $i < 25; $i++) { ?>
				<div class="ex">
					<div class="ex-content">
						<h4>Week <?php echo ($i+1); ?></h4>
						<div class="ex-files">
							<p>Attached Files : </p>
							<div>
								<a href=""><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp; File 1</a>
								<a href=""><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp; File 2</a>
							</div>
						</div>
					</div>
					<div class="ex-action">
						<a href="" title="Archive "><i class="fa fa-archive fa-colorM" aria-hidden="true"></i></a>
						<a href="" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
						<a href="" title="Delete" onclick="return checkDelete()"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
					</div>
				</div>
			<?php }?>

			</div>

		<aside class="add-mod">
			<form action="" method="POST" class="mod-form" enctype="multipart/form-data">
			<span>Weekly Tutorial Management</span>
			<br>
			<label>Topic Name</label>
			<input type="text" name="">
			<label>File 1</label>
			<input type="file" name="">
			<label>File 2</label>
			<input type="file" name="">
			<label>File 3</label>
			<input type="file" name="">
			<label>File 4</label>
			<input type="file" name="">
			<br>
			<br>
			<input type="submit" name="" value="Save">
		</form>
		</aside>
	</div>


	</div>

</section>