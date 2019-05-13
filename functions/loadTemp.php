<?php 
function loadTemp($filename,$vars)
{
	extract($vars);	
	ob_start();
	require $filename;
	$data = ob_get_clean();
	return $data;
}
?>