<?php
	$title = 'View Assessment';
	$assignment = $assignment_brief->find('mcode',$_GET['mod']);
	$aside = loadTemp('../template/aside_module_template.php',['findMod'=>$findMod]);
	$content = loadTemp('../template/view_assessment_template.php',['aside'=>$aside,'assignment'=>$assignment]);
?>