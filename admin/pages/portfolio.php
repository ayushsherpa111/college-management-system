<?php 
	$title = "Porfolio";
					
		$studentsDetails = new DatabaseFunctions('student');
		$course = new DatabaseFunctions('courses');
		$numCourse = $course->findAll();
		$module = new DatabaseFunctions('module'); 
		$teachers = new DatabaseFunctions('module_teachers');
		$moduleLeader = new DatabaseFunctions('module_leader');
		$courseLeader = new DatabaseFunctions('courseleader');

		if (isset($_POST['upload'])) {
			$criteria = [];
			$str ="";
			$handle = fopen($_FILES['ex']['tmp_name'], 'r');
			while ($data = fgetcsv($handle)) {
				foreach ($data as $row) {
					$str .= $row.'#';	
				}		
				$users = explode('#', $str);
				$password = substr($users[0], 0,2).substr($users[2], 0,2);
				$criteria = [
					'student_id' =>'',
					'first_name' => $users[0],
					'middle_name'=> $users[1],
					'surname' => $users[2],
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'email' => $users[3],
					'perm_address' =>$users[4],
					'temp_address' => $users[5],
					'phone_number' => $users[6],
					'course_id' => $users[7],
					'entry_qualification' => $users[8]
				];
				$studentsDetails->save($criteria,'student_id');
				$str="";		
			}	
			header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php?page=portfolio.php&msg=successful');
		}

		if (isset($_POST['insert'])) {
				unset($_POST['insert']);
				$criteria = $_POST;
				try {
					$p = substr($criteria['first_name'], 0,2).substr($criteria['surname'], 0,2);
					$criteria['password'] = password_hash($p, PASSWORD_DEFAULT);
					$studentsDetails->insert($criteria);	
				} catch (Exception $e) {
					unset($criteria['password']);
					$studentsDetails->edit($criteria,'student_id');	
					if ($criteria['record_status'] == 'Live') {
						$studentsDetails->insertInLevel($criteria['student_id']);
					}
				}
				header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php?page=portfolio.php&msg=successful');
						
		}
		
		if (isset($_POST['addStaff'])) {
			unset($_POST['addStaff']);
			$password = substr($_POST['first_name'], 0,2).substr($_POST['surname'], 0,2);
			$criteria = [
				'mod_id' =>$_POST['mod_id'],
				'first_name' =>$_POST['first_name'],
				'middle_name' =>$_POST['middle_name'],
				'surname' =>$_POST['surname'],
				'password' =>password_hash($password, PASSWORD_DEFAULT),
				'address' =>$_POST['address'],
				'phone_number' =>$_POST['phone_number'],
				'email' =>$_POST['email'] 
			];
			try {
				$moduleLeader->insert($criteria);
				$last = ($moduleLeader->findLast('mod_id'))->fetch();
				$mID = $last['mod_id'];
				$teachId = '';
			} catch (Exception $e) {
				unset($criteria['password']);
				$moduleLeader->edit($criteria,'mod_id');				
				$mID = $_POST['mod_id'];
				$teach = ($teachers->find('mod_id',$mID))->fetch();
				$teachId = $teach['teach_id'];
			}
				

				$c2 = [
					'teach_id' => $teachId,
					'mod_id' => $mID,
					'mcode' => $_POST['mcode']
				];
				$teachers->save($c2,'mod_id');
				header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php?page=portfolio.php&type=module&msg=successful');
			
		}
		if (isset($_POST['addCleader'])) {
			unset($_POST['addCleader']);
			$password = substr($_POST['first_name'], 0,2).substr($_POST['surname'], 0,2);
			$criteria = [
				'leader_id' =>$_POST['leader_id'],
				'first_name' =>$_POST['first_name'],
				'middle_name' =>$_POST['middle_name'],
				'surname' =>$_POST['surname'],
				'email' =>$_POST['email'], 
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'address' =>$_POST['address'],
				'phone_number' =>$_POST['phone_number'],
				'course_id'=>$_POST['course_id']
			];
			try {
				$courseLeader->insert($criteria);
			} catch (Exception $e) {
				unset($criteria['password']);
				$courseLeader->edit($criteria,'leader_id');				
			}
			header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php?page=portfolio.php&type=course&msg=successful');
		}

	
		if (isset($_GET['eid'])) {
			$editStudent = $studentsDetails->find('student_id',$_GET['eid']);
			$row = $editStudent->fetch();
			$content = loadTemp("../template/portfolio_template.php",['row'=>$row,'numCourse'=>$numCourse,'entry_qualification'=>$row['entry_qualification'],'exit_year'=>$row['exit_year']]);
		}else if (isset($_GET['type'])) {
			if ($_GET['type'] == 'module') {
				$courses = new DatabaseFunctions('module');
				$course = $courses->findAll();
				$content = loadTemp("../template/add_staff_template.php",['course'=>$course]);
			}
			if ($_GET['type'] == 'course') {
				$courses = new DatabaseFunctions('courses');
				$course = $courses->findAll();
				$content = loadTemp("../template/add_course_leader_template.php",['course'=>$course]);
			}
		}else if (isset($_GET['mEid'])) {
			$records = $moduleLeader->find('mod_id',$_GET['mEid']);
			$row = $records->fetch();
			$courses = new DatabaseFunctions('module');
			$course = $courses->findAll();
			$content = loadTemp('../template/add_staff_template.php',['row'=>$row,'course'=>$course]);
		}else if(isset($_GET['cEid'])){
			$records = $courseLeader->find('leader_id',$_GET['cEid']);
			$row = $records->fetch();
			$courses = new DatabaseFunctions('courses');
			$course = $courses->findAll();
			$content = loadTemp('../template/add_course_leader_template.php',['row'=>$row,'course'=>$course]);
		}else if (isset($_GET['id'])) {
			$records = new DatabaseFunctions("student");
			$rec = $records->find('student_id',$_GET['id']);
			$data = $rec->fetch();
			$record = [
				'Id' => $data['student_id'],
				'First Name' => $data['first_name'],
				'Middle Name' => $data['middle_name'],
				'Last Name' => $data['surname'],
				'Term-Time Address' => $data['perm_address'],
				'Non Term-Time Address' => $data['temp_address'],
				'Phone No.' => $data['phone_number'],
				'Email' => $data['email'],
				'Entry Qualification'=>$data['entry_qualification']
			];
			$course = new DatabaseFunctions('courses');
			$c = $course->find('course_id',$data['course_id']);
			$cName = $c->fetch();
			$content = loadTemp("../template/protfolio_display_template.php",['record'=>$record,'cName'=>$cName,'image'=>$data['image'],'data'=>$data]);
		}else if(isset($_GET['mid'])){
			$records = new DatabaseFunctions("module_leader");
			$rec = $records->find('mod_id',$_GET['mid']);
			$data = $rec->fetch();
			$mod = ($teachers->find('mod_id',$data['mod_id']))->fetch();
			$module = ($module->find('mcode',$mod['mcode']))->fetch();
			$record = [
				'Id' => $data['mod_id'],
				'First Name' => $data['first_name'],
				'Middle Name' => $data['middle_name'],
				'Last Name' => $data['surname'],
				'Address' => $data['address'],
				'Phone No.' => $data['phone_number'],
				'Email' => $data['email'],
				'Module Name' => $module['title'],
			];
			$content = loadTemp("../template/protfolio_display_template.php",['record'=>$record,'image'=>$data['image']]);
		}else if (isset($_GET['adID'])) {
			$records = new DatabaseFunctions("admin");
			$rec = $records->find('admin_id',$_GET['adID']);
			$data = $rec->fetch();
			$record = [
				'Id' => $data['admin_id'],
				'First Name' => $data['first_name'],
				'Last Name' => $data['surname'],
			];
			$content = loadTemp("../template/protfolio_display_template.php",['record'=>$record,'image'=>'images/General/default.png']);
		}else if(isset($_GET['cid'])){
			$records = new DatabaseFunctions("courseleader");
			$rec = $records->find('leader_id',$_GET['cid']);
			$data = $rec->fetch();
			$record = [
				'Id' => $data['leader_id'],
				'First Name' => $data['first_name'],
				'Middle Name' => $data['middle_name'],
				'Last Name' => $data['surname'],
				'Address' => $data['address'],
				'Phone No.' => $data['phone_number'],
				'Email' => $data['email'],
				'Course' => $data['course_id']
			];
		
			$course = new DatabaseFunctions('courses');
			$c = $course->find('course_id',$data['course_id']);
			$cName = $c->fetch();
			$content = loadTemp("../template/protfolio_display_template.php",['record'=>$record,'cName'=>$cName,'image'=>'images/General/default.png']);
		}
		else{
			$content = loadTemp("../template/portfolio_template.php",['numCourse'=>$numCourse]); 
		}

		
			
		
		

?>