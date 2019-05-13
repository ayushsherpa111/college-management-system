<?php 
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';
	$assignmentSubmit = new DatabaseFunctions('assignment_brief');
	$word ='../assignments/brief/'.$_FILES['word_file']['name'];
	$rubric='../assignments/rubric/'.$_FILES['rubric']['name'];
	$criteria =[
		'brief_id'=>$_POST['brief_id'],
		'title'=>$_POST['title'],
		'mcode'=>$_POST['mcode'],
		'word_file'=>$word,
		'rubric'=>$rubric,
		'submission_date'=>$_POST['submission_date']
	];

	move_uploaded_file($_FILES['word_file']['tmp_name'], $word);
	move_uploaded_file($_FILES['rubric']['tmp_name'], $rubric);
	$assignmentSubmit->save($criteria,'brief_id');
	$row = ($assignmentSubmit->find('word_file',$word))->fetch();
?>
<div class="ex">
	<div class="ex-content">
		<h4><?php echo $row['title']; ?></h4>
		<div class="ex-files">
			<p>Attached Files : </p>
			<div>
				<a href="<?php echo $row['word_file'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;<?php echo "Assignment Brief"; ?></a>
				<a href="<?php echo $row['rubric'] ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;<?php echo "Assignment Rubrics"; ?></a>
			</div>
			<label>Submission Date: <?php echo $row['submission_date']; ?></label>
		</div>
	</div>
	<div class="ex-action">
		<a href="" title="Archive "><i class="fa fa-archive fa-colorM" aria-hidden="true"></i></a>
		<a href="" title="Edit"><i class="fa fa-pencil fa-colorM" aria-hidden="true"></i></a>
		<a href="" title="Delete" onclick="return checkDelete()"><i class="fa fa-trash fa-colorM" aria-hidden="true"></i></a>
	</div>
</div>	
