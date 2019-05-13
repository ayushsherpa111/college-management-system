<?php
	$title = 'My Friends';
	$aside = loadTemp('../template/aside_function_template.php',[]);
	$firends = $student->find('record_status','Live'); 
	$content = loadTemp('../template/my_friends_template.php',['aside'=>$aside,'firends'=>$firends]);
?>