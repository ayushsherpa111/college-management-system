<?php 
include '../classes/databaseFunctions.php';
include '../../connect.php';
$lvlStudent = new DatabaseFunctions('lvlstudent');
$updateId = ($lvlStudent->find('student_id',$_POST['student_id']))->fetch();
$updateData =[
	'Lv_ID'=>$updateId['Lv_ID'],
	'student_id'=>$_POST['student_id'],
	'level_id'=>$_POST['level_id']
];
$lvlStudent->save($updateData,'Lv_ID');
?>