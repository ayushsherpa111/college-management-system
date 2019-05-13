<?php
	$title = 'Module Records';
	$myModule = new DatabaseFunctions('module_teachers');
	if (isset($_SESSION['mod_id'])) {
		$moduleName = ($myModule->find('mod_id',$_SESSION['mod_id']))->fetch();
		$myModuleFiles = new DatabaseFunctions('module_files');
		$files = $myModuleFiles->find('mcode',$moduleName['mcode']);
		$content = loadTemp('../template/module_record_template.php',['moduleName'=>$moduleName,'files'=>$files]);
	}elseif (isset($_SESSION['leader_id'])) {
		$levels = new DatabaseFunctions('level');
		$years = $levels->findAll();
		$courses = new DatabaseFunctions('courses');
		$myDetails = ($courseleaders->find('leader_id',$_SESSION['leader_id']))->fetch();
		$cID = ($courses->find('course_id',$myDetails['course_id']))->fetch();
		$allTheModules = $pdo->prepare('SELECT * FROM module WHERE course_id =:cId AND archive ="no"');
		$datas = [
			'cId'=>$myDetails['course_id']
		];
		$allTheModules->execute($datas);
		if (isset($_GET['aID'])) {
			$module->archiveMod($_GET['aID'],'yes','mcode');
			header('Location:http://localhost/woodlands_uc1/staff/public_html/index.php?page=module_record');
		}

		if (isset($_GET['eID'])) {
			$editModule = ($module->find('mcode',$_GET['eID']))->fetch();
			$content = loadTemp('../template/module_record_template.php',['years'=>$years,'cID'=>$cID,'allTheModules'=>$allTheModules,'editModule'=>$editModule,'archive'=>'no']);	
		}else {
			$content = loadTemp('../template/module_record_template.php',['years'=>$years,'cID'=>$cID,'allTheModules'=>$allTheModules,'archive'=>'no']);
		}
	}
?>