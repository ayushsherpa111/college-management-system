<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';
	error_reporting(0);
	$module = new DatabaseFunctions('module');
	$criteras = [
		'mcode' => $_POST['mcode'],
		'course_id' =>$_POST['course_id'],
 		'level_id' => $_POST['level_id'],
		'title' => $_POST['title'],
		'archive' => $_POST['archive'] 
	];
	$module->save($criteras,'mcode');
?>
<div class="ex" id="<?php echo $_POST['mcode']; ?>">
	<div class="ex-content">
		<h4><?php echo '('.$criteras['mcode'].') '.$criteras['title'].' (Year '.$criteras['level_id'].')'; ?></h4>
	</div>
	<div class="ex-action">
		<a href="" title="Archive "><i class="fa fa-archive fa-colorM" aria-hidden="true"></i></a>
		<a href="" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
		<a href="<?php echo $_POST['mcode']; ?>" title="Delete" id="deleteModule"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
	</div>
</div>	