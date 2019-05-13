<?php 

include '../classes/databaseFunctions.php';
include '../../connect.php';
$student = new DatabaseFunctions('student');
$criteria = [];
$data = new Spreadsheet_Excel_Reader();
move_uploaded_file($_FILES['ex']['tmp_file'], '../bulkData/'.$_FILES['ex']['name']);
$data->read('../bulkData/'.$_FILES['ex']['name']);
$str="";
$users = array();
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		$str .= $data->sheets[0]['cells'][$i][$j]." ";
	}
	$str = trim($str);
	$users = explode(' ', $str);
	print_r($users);
	die();
	$criteria = [
		'student_id' =>'',
		'first_name' => $users[0],
		'middle_name'=> $users[1],
		'surname' => $users[2],
		'password' => password_hash('dummy', PASSWORD_DEFAULT),
		'email' => $users[3],
		'perm_address' =>$users[4],
		'temp_address' => $users[5],
		'phone_number' => $users[6],
		'course_id' => $users[7],
		'entry_qualification' => $users[8]
	];
	$student->save($criteria,'student_id');
	$str = "";
}
?>