<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="../../css/admin.css?<?php echo time(); ?>">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript">
			var temp = 0;

			function displayFunctionType() {
				var staff = document.getElementsByClassName('drop-down')[0];

				if (temp % 2 == 0) {
					staff.style.display = 'block';
					temp++;	
				}
				else {
					staff.style.display = 'none';
					temp++;					
				}
			  }

			  function changeProfile(){
			  	$.get('../template/change_profile.php',function(data){
			  		$('.port-details').html(data);
			  	});

			  }

			  $(document).ready(function(){
			  	$('#generateMessage').on('click',function(){
			  		$.post('../template/send_message_template.php',function(data){
				  		$('.message').html(data);
			  		});
			  	});

			  	$('.msgs .message .sendMsg .sendMsgBtn').on('click',function(){
		  			var m = $('.message .sendTxtArea').val();
		  			var s = $('.message .splitSend').find('input[name="subject"]').val();
		  			var to = $('.message .splitSend').find('input[name="student"]').val();
		  			if (m != "" && s!= "" && to != "") {
			  			$.post('../pages/reply.php',{subject:s,message:m,sender:to},function(data){
			  				$('.message').html(data);
			  			});
		  			}else{
		  				alert('Please fill in all the informations');
		  			}
		  		});
			  });

    	function getMsgTemplate(){
			var xmlHttp = new XMLHttpRequest();
			xmlHttp.open('POST', '../template/ajax/get_template.php', true);
			
			var data = new FormData();
			data.append('id', this.value);
			xmlHttp.send(data);
			
			xmlHttp.onreadystatechange = function(){
				if(xmlHttp.readyState == 4){
					var element = document.getElementById('text-area');
					element.innerHTML = xmlHttp.responseText;
				}
			}
			var element = document.getElementById('T-sub');
			element.value = this.value;
		}

		function myLoad() {
			var element = document.getElementById('msg-template');
			element.addEventListener('change', getMsgTemplate);
		}

		</script>
</head>
<body>

	<header class="header">
		<div class="logo">
			<div>
				<img src="../../images/General/logo.PNG">
			</div>
			<div class="wuc">
				<h1>Woodland's University College</h1>
			</div>
		</div>
		<div onclick="displayFunctionType();" class="drop-down-item">
			<div class="pro-file">
				<?php 
					$profilePic = ($student->find('student_id',$_SESSION['student_id']))->fetch();
				?>
				<img src="../../<?php echo $profilePic['image'] ?>">
				<span><strong><?php echo $_SESSION['student']; ?> &nbsp;&nbsp;&nbsp;  </strong></span>
				<i class="fa fa-caret-down" aria-hidden="true"></i> 
			</div>
			<div class="drop-down">
				<ul>
					<li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;&nbsp; Home</a></li>
					<li><a href="index.php?page=my_record"><i class="fa fa-address-card" aria-hidden="true"></i> &nbsp;&nbsp; My Profile</a></li>
					<li><a href="index.php?page=my_friends"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;&nbsp; My Friends</a></li>

					<li><a href="index.php?page=my_attendance"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> &nbsp;&nbsp; Attendance</a></li>
					<li><a href="index.php?page=my_messages"><i class="fa fa-comments-o" aria-hidden="true"></i> &nbsp;&nbsp; Messages</a></li>

					<li><a href="http://localhost/woodlands_uc1/login/logout.php" style="border:none;"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;&nbsp; Log Out</a></li>
				</ul>
			</div>
		</div>
	</header>
	
	<div class="nav-panel" style="z-index: 0;">
		<p><?php echo $title; ?></p>
	</div>

	<div class="std-container">		
		
		