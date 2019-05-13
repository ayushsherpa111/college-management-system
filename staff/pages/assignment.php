<?php
	$title = 'Assignment';
	$brief = new DatabaseFunctions('assignment_brief');
	$module = new DatabaseFunctions('module_teachers');
	$teacher = ($module->find('mod_id',$_SESSION['mod_id']))->fetch();
	$assignments = $brief->find('mcode',$teacher['mcode']);
	$content = loadTemp('../template/assignment_template.php',['assignments'=>$assignments,'mcode'=>$teacher]);
?>