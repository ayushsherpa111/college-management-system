<?php 
	$title ="Module Leaders";
	$module = new DatabaseFunctions('module_leader');
	$moduleLeader=$module->findAll();
	$moduleTable = new moduleTableGenerator();
	$headings = array('mod_id','Full Name','Email','Address','Phone Number','Action');
	$fullname = "CONCAT(CONCAT(first_name , CONCAT(' ', middle_name)), CONCAT(' ', surname))";
	$records = $module->findSpc(['mod_id',$fullname,'email','address','phone_number'],'yes');

	$moduleTable->setHeadings($headings);

	if (isset($_GET['delid'])) {
		$module->delete('mod_id',$_GET['delid']);
		header('location: index.php?page=moduleLeadersArchive.php');
	}

	foreach ($records as $row) {
		$moduleTable->addRow($row);
	}
	
	if (isset($_GET['aid'])) {
		$module->archive($_GET['aid'], 'no','mod_id');
		header('location: index.php?page=moduleLeadersArchive.php');	
	}

	$content = loadTemp('../template/module_template.php',['moduleTable'=>$moduleTable]);


?>