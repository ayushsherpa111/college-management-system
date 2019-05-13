<?php
	$title = 'Module';
	$moduleFiles = new DatabaseFunctions('module_files');
	$files = $moduleFiles->find('mcode',$_GET['mod']);
	$aside = loadTemp('../template/aside_module_template.php',['findMod'=>$findMod]);
	$content = loadTemp('../template/modules_template.php',['aside'=>$aside,'files'=>$files]);
?>