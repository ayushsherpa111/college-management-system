<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';

	$uploadModules = new DatabaseFunctions('module_files');
	$file1 = '../moduleFiles/'.$_FILES['file1']['name'];
	$file2 = '../moduleFiles/'.$_FILES['file2']['name'];
	$file3 = '../moduleFiles/'.$_FILES['file3']['name'];
	$id = '';
	if (isset($_POST['file_id'])) {
		$id = $_POST['file_id'];
	}
	$criteria =[
		'file_id'=> $id, 
		'mcode'=>$_POST['mcode'],
		'week'=>$_POST['week'],
		'title'=>$_POST['title'],	
		'file1'=>$file1,
		'file2'=>$file2,
		'file3'=>$file3
	];
	$uploadModules->save($criteria,'file_id');
	move_uploaded_file($_FILES['file1']['tmp_name'], $file1);
	move_uploaded_file($_FILES['file2']['tmp_name'], $file2);
	move_uploaded_file($_FILES['file3']['tmp_name'], $file3);
?>
<div class="ex" id="<?php echo $id; ?>">
	<div class="ex-content">
		<h4 style="display: inline;">Week <?php echo $_POST['week']; ?> &nbsp;&nbsp;&nbsp; </h4>
		<h3 style="display: inline;"><?php echo $_POST['title'];  ?></h3>
	<div class="ex-files">
		<p>Attached Files : </p>
	<div>
		<a href="<?php echo $file1; ?>"><i class="fa fa-file-o" aria-hidden="true"> File1</i></a>
		<a href="<?php echo $file2; ?>"><i class="fa fa-file-o" aria-hidden="true"> File2</i></a>
	</div>
	</div>
	
	<div class="ex-files">
	<p>Resources &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</p>
	<div>
		<a href="<?php echo $file3; ?>"><i class="fa fa-file-o" aria-hidden="true"> File3</i></a>
	</div>
	</div>
	</div>


	<div class="ex-action">
		<a href="<?php echo $id; ?>" title="Delete" id="delete"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
	</div>
</div>