<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="../../css/admin.css?<?php echo time(); ?>">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function changeProfile(){
			$.get('../template/change_profile.php',function(data){
				$('.port-details').html(data);
			});
		}
		$(document).ready(function() {
			
			$('#attendaceTable tbody tr').each(function(){
				var check = "";
				$('#attendaceTable tbody tr form').find('button').on('click',function(){
					if (($(this).attr('id') == "presentT") || ($(this).attr('id') == "presentL")) {
						check = "P";
					}else if(($(this).attr('id') == "absentT") || ($(this).attr('id') == "absentL")){
						check = "A";
					}
				});
				$(this).find('form').on('submit',function(e){
					e.preventDefault();
					// var id = $(this).attr('id');
					$(this).find('input[type=text]').val(check);
				});
			});

			$('.add-mod #assignmentSubmit').on('submit',function(e){
				e.preventDefault();
				var wordFile = document.getElementById('word').files[0];
				var rubric = document.getElementById('rubric').files[0];
				var uploadData = new FormData(this);
				// uploadData.append('mcode',$('.add-mod #assignmentSubmit #code').val());
				uploadData.append('word_file',wordFile);
				uploadData.append('rubric',rubric);
				$.ajax({
					url:$(this).attr('action'),
					type:'POST',
					data : uploadData,
					contentType: false,
			        cache: false,
			        processData:false,
					beforeSend:function(){
						alert("UPLOADING");
					},
					success:function(data,success){
						$(".record-data").append(data);
						$('.add-mod #assignmentSubmit').find('input[name="title"]').val('');
						$('.add-mod #assignmentSubmit').find('input[name="word_file"]').val('');
						$('.add-mod #assignmentSubmit').find('input[name="rubric"]').val('');
						$('.add-mod #assignmentSubmit').find('input[type="date"]').val('');
					}
				});
			});
		});
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
		<div class="log">
			<form action="../../login/logout.php" method="">
				<input type="submit" name="logout" value="Logout">
			</form>
		</div>
	</header>
	
	<div class="nav-panel">
		<p><?php echo $title; ?></p>
	</div>

	<div class="admin-container">		
		<aside class="aside">
			<!-- navigation pannel -->
			<ul class="">
				<!-- <li><a href=""></a></li> -->
				<li><a href="index.php"><i class="fa fa-home"></i>
				&nbsp; Home</a></li>
				<li><a href="index.php?page=my_record"><i class="fa fa-address-card"></i>&nbsp;&nbsp; My Record</a></li>
			</ul><br/>
			<ul class="">
				
				<!-- <li><a onclick="displayStaffType();"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp; Staff Records</a>
					<div class="link-staff">
						<a href="#">-&nbsp;&nbsp; Module Leader</a>
						<a href="#">-&nbsp;&nbsp; Course Leader</a>
					</div>
				</li> -->
				<li><a href="index.php?page=module_record"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp; <?php if (isset($_SESSION['mod_id'])) {
					echo "Module records";
				}elseif(isset($_SESSION['leader_id'])){
					echo "Course Records";
				} ?></a></li>
				<?php if (isset($_SESSION['mod_id'])) { ?>
				<li><a href="index.php?page=assignment"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; Assignment</a></li>
				<?php } ?>
				<li><a href="index.php?page=attendance"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp; Attendance</a></li>
				<li><a href="index.php?page=personal_tutor"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; Personal Tutor</a></li>
				<li><a href="index.php?page=report"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp; Report</a></li>
				<!-- <li><a href=".php">Review</a></li> -->
				<br/>
				<!-- <li><a href=".php"></a></li> -->
				<!-- <li><a href=".php"></a></li> -->
			</ul>		
		</aside>


			<?php echo $content; ?>

		
		</div>
	</body>
	</html>