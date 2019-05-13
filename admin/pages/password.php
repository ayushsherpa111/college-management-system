<?php 

	for ($i=0; $i < 100; $i++) { 
		$pass= password_hash('dummy', PASSWORD_DEFAULT);
		echo $pass;
		echo "<br>";
	}

?>