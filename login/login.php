<?php 
	include '../connect.php';
	include '../admin/classes/databaseFunctions.php';
	if (isset($_SESSION['admin_id'])) {
		header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php');
	}elseif (isset($_SESSION['student_id'])) {
		header('Location:http://localhost/woodlands_uc1/student/public_html/index.php');
	}elseif (isset($_SESSION['mod_id']) || isset($_SESSION['leader_id'])) {
		header('Location:http://localhost/woodlands_uc1/staff/public_html/index.php');
	}else{
	$title = 'Login'; 

	$student = new DatabaseFunctions('student');
	$admin = new DatabaseFunctions('admin');
	$moduleLeader = new DatabaseFunctions('module_Leader');
	$courseLeader = new DatabaseFunctions('courseleader');
	$users=[
		'admin_id'=>&$admin,
		'student_id'=>&$student,
		'mod_id'=>&$moduleLeader,
		'leader_id'=>&$courseLeader
	];
	$role="";
	if (isset($_POST['login'])) {
		foreach ($users as $key => $user) {
			if ($user->checkPassword($_POST['username'],$_POST['password'],$key)) {
				switch ($key) {
					case 'admin_id':
						$role = "admin";
						break;
					case 'student_id':
						$role = "student";
						break;
					case 'mod_id':
						$role = "moduleLeader";
						break;
					case 'leader_id':
						$role = "courseleader";
						break;
					
				}
				$u = ($user->find($key,$_POST['username']))->fetch();
				$_SESSION[$key] = $u[$key];
				$_SESSION[$role] = $u['first_name'].' '.$u['surname'];
				break;
			}
			else {
				header('Location:http://localhost/woodlands_uc1/login/login.php?msg=error');
			}
		}
		if ($role == "admin") {
			header('Location:http://localhost/woodlands_uc1/admin/public_html/index.php');
		}else if ($role == "student") {
			header('Location:http://localhost/woodlands_uc1/student/public_html/index.php');
		}else if ($role == "moduleLeader" || $role == "courseleader"){
			header('Location:http://localhost/woodlands_uc1/staff/public_html/index.php');
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../css/students.css?<?php echo time(); ?>"> -->
	<link rel="stylesheet" type="text/css" href="../css/login.css?<?php echo time(); ?>">

	<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<script>
		particlesJS.load('particles-js', 'json/bubble.json', function(){
			console.log('particles.json loaded...');
		});
	</script>
</head>
<body>
	<header class="pri-header">
		<div class="logo">
			<div>
			<img src="../images/General/logo.PNG">
			</div>
			<div class="wuc">
			<h1>Woodland's University College</h1>
			</div>
		</div>
		<div class="log">
			
		</div>
	</header>
	<main class="ind-main" id="particles-js">
		
		<section class="login-form">
			<form action="login.php" method="POST">
				<label>Sign In:</label>
				<input type="text" name="username" placeholder="User Id" required>
				<input type="password" name="password" placeholder="Password">
				<div style="display: flex; flex-direction: row-reverse;">
				<input type="submit" name="login" value="Login">
				</div>
				<?php 
					if (isset($_GET['msg'])) {
						if ($_GET['msg'] == 'error') {
							echo '<p class="loginFailed">Please enter valid Username or Password!</p>';
						}
					}
				?>
				<p><a href="">Forgot Password?</a></p>
			</form>
			
		</section>
		<section class="login-desc">
			<div>
			<h1>Woodland's University College</h1>
			<p>You Don't Have To Be Great To Start, But You Have To Start To Be Great</p>
			<p>Winners focus on Winning, Looser Focus on Winners. 
			   Now its your choice whom you want to become...</p>
			<p>Life is not about storm to pass. It's about dancing in the rain.</p>
			</div>
		</section>
	</main>
</body>
</html>

<?php } ?>