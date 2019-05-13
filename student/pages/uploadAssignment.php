<?php 	
	include '../../connect.php';
	include '../../admin/classes/databaseFunctions.php';

	$submit = new DatabaseFunctions('assignment_submit');
	$lastSubmit = $pdo->prepare('SELECT * FROM assignment_submit WHERE brief_id =:b AND student_id =:s');
	$search =[
		'b'=>$_POST['asId'],
		's'=>$_SESSION['student_id']
	];
	$lastSubmit->execute($search);
	$id = $lastSubmit->fetch();
	if ($_POST['type'] == "doc") {
		$doc = '../../staff/submits/doc/'.$_FILES['docFile']['name'];
		$criteria = [
			'student_id'=>$_SESSION['student_id'],
			'brief_id'=>$_POST['asId'],	
			'doc'=>$doc,
			'submitDate'=> date("Y/m/d")
		];
		if ($lastSubmit->rowCount() > 0) {
			$update = $pdo->prepare('UPDATE assignment_submit SET doc =:d, submitDate=:s WHERE submit_id =:id');
			$c = [
				'id'=>$id['submit_id'],
				'd'=>$doc,
				's'=> date("Y/m/d")
			];		
			$update->execute($c);	
			echo "UPDATED";
		}else{
			$submit->insert($criteria);
			echo "INSERTED";
		}
		move_uploaded_file($_FILES['docFile']['tmp_name'], $doc);
	}
	if ($_POST['type'] == "code") {
		$code = '../../staff/submits/code/'.$_FILES['codeFile']['name'];
		$criteria = [
			'student_id'=>$_SESSION['student_id'],
			'brief_id'=>$_POST['asId'],	
			'code'=>$code,
			'submitDate'=> date("Y/m/d")
		];
		if ($lastSubmit->rowCount() > 0) {	
			$update = $pdo->prepare('UPDATE assignment_submit SET code =:c, submitDate=:s WHERE submit_id =:id');
			$c = [
				'id'=>$id['submit_id'],
				'c'=>$code,
				's'=> date("Y/m/d")
			];	
			$update->execute($c);	
			echo "UPDATED";
		}else{
			$submit->insert($criteria);
			echo "INSERTED";
		}
		move_uploaded_file($_FILES['codeFile']['tmp_name'], $code);
	}

	if ($_POST['type'] == "zip") {
		$zip = '../../staff/submits/zip/'.$_FILES['zipFile']['name'];
		$criteria = [
			'student_id'=>$_SESSION['student_id'],
			'brief_id'=>$_POST['asId'],	
			'zip'=>$zip,
			'submitDate'=> date("Y/m/d")
		];
		if ($lastSubmit->rowCount() > 0) {	
			$update = $pdo->prepare('UPDATE assignment_submit SET zip =:z, submitDate=:s WHERE submit_id =:id');
			$c = [
				'id'=>$id['submit_id'],
				'z'=>$zip,
				's'=> date("Y/m/d")
			];
			$update->execute($c);	
			echo "UPDATED";
		}else{
			$submit->insert($criteria);
			echo "INSERTED";
		}
		move_uploaded_file($_FILES['zipFile']['tmp_name'], $zip);
	}
	if ($_POST['type'] == "video") {
		$criteria = [
			'student_id'=>$_SESSION['student_id'],
			'brief_id'=>$_POST['asId'],	
			'video_link'=>$_POST['video_link'],
			'submitDate'=> date("Y/m/d")
		];
		if ($lastSubmit->rowCount() > 0) {	
			$update = $pdo->prepare('UPDATE assignment_submit SET video_link =:v, submitDate=:s WHERE submit_id =:id');
			$c = [
				'id'=>$id['submit_id'],
				'v'=>$_POST['video_link'],
				's'=> date("Y/m/d")
			];
			$update->execute($c);	
			echo "UPDATED";
		}else{
			$submit->insert($criteria);
			echo "INSERTED";
		}
	}
	
?>