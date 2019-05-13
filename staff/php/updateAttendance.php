<?php 
	include '../../connect.php';
	require '../../admin/classes/databaseFunctions.php';
	$attendance = new DatabaseFunctions('attendance');
	$students = $pdo->prepare('SELECT * FROM attendance WHERE student_id =:sId AND mcode =:code');
	$criteria = [
		'sId' => $_POST['student_id'],
		'code' => $_POST['mcode']
	];
	$students->execute($criteria);
	$days = 0;
	if($students->rowCount() == 0){
		$total = 2;
		if($_POST['tutorial'] == 'P'){
			$days++;
		}
		if($_POST['lecture'] == 'P'){
			$days++;
		}
		$datas = [
			'student_id'=>$_POST['student_id'],
			'mcode'=>$_POST['mcode'],
			'semester'=>$_POST['semester'],
			'days'=>$days,
			'total'=>$total
		];
		$attendance->insert($datas);
	}else{
		$studentAttendance = $students->fetch();
		$id = $studentAttendance['at_id'];
		$days = $studentAttendance['days'];
		$total = $studentAttendance['total'];
		if($_POST['tutorial'] == 'P'){
			$days++;
		}
		if($_POST['lecture'] == 'P'){
			$days++;
		}
		$total += 2;
		$criterias =[
			'at_id' => $id,
			'student_id'=>$_POST['student_id'],
			'mcode'=>$_POST['mcode'],
			'semester'=>$_POST['semester'],
			'days'=>$days,
			'total' =>$total
		];
		if ($studentAttendance['total'] != 24) {
			$attendance->edit($criterias,'at_id');
		}
	}
?>