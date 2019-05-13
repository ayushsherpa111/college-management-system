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
  	$(document).ready(function(){
  		

  		$('#messagesList li').on('click',function(e){
  			e.preventDefault();
  			//gets the id of the a that was clicked
  			var id = $(this).closest('li').children('a').attr('href');
  			//sends a post request to the link in the first parameter with the variable defined in second parameter and append the callback in the third parameter
  			$.post('../template/view_message_template.php',{mID:parseInt(id)},function(data){
	  				$('.message').html(data);
	  			});
  		});

  		$('#generateMessage').on('click',function(){
  			$('.message').html('');
  			$.ajax({
  				url:'../template/send_message_template.php',
				type:'POST',
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
				},
				success:function(data,success){
					$('.message').html(data);
				}
  			});
  		});

  		$('#searchForm').on('submit',function(e){
  			e.preventDefault();
  			$('.records').html('');
  			$.ajax({
  				url:$('#searchForm').attr('action'),
				type:'POST',
				data: new FormData(this),
				contentType: false,
	            cache: false,
	            processData:false,
				beforeSend:function(){
				},
				success:function(data,success){
					$('.records').html(data);
				}
  			});
  		});

  		$(document).on('click','#Sort',function(){
  			var sortForm = new FormData();
  			sortForm.append('sortBy',$('#assign-select').val());
  			$.ajax({
  				url:'../pages/sortData.php',
  				type:'POST',
  				data:sortForm,
  				contentType:false,
  				cache:false,
  				processData:false,
  				beforeSend:function(){
				},
				success:function(data,success){
					$('.records').html(data);
				}
  			})
  		});

  		//send Message to student
  		$('.msgs .message .sendMsg .sendMsgBtn').on('click',function(){
  			var id = $('.message .splitSend').find('input[name="student"]').val();
  			var m = $('.message .sendTxtArea').val();
  			var s = $('.message .splitSend').find('input[name="subject"]').val();
  			if ( $('.message .splitSend').find('input[name="student"]').val().length === 0 || $('.message .splitSend').find('input[name="subject"]').val().length === 0) {
  				alert('EMPLT');
  			}else{
	  			$.post('../pages/sendMessage.php',{student_id:id,subject:s,message:m},function(data){
	  				$('.message').html(data);
	  			});
  			}
  		});
  		
  		$('.add-mod #course_form').on('submit',function(e){
  			e.preventDefault();
  			var cID = $('.add-mod').find('input[name="course_code"]').val();
  			var cName = $('.add-mod').find('input[name="course_name"]').val();
  			var actionType = $(location).attr('href');
  			var t = "add";
  			if (actionType.indexOf("eCID") > 0) {
				t ="edit";
			}	
  			$.post($('.add-mod #course_form').attr('action'),{
  				course_id: cID,
  				course_name:cName
  			},function(data){
  				if (t == "edit") {
  					window.location.href="http://localhost/woodlands_uc1/admin/public_html/index.php?page=course_record.php";
  				}else{
	  				$('.record-data').append(data);
  				}
  			});
  		});
  	
  		
  	
  	});

	function getMsgTemplate(){
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.open('POST', '../template/ajax/get_template.php', true);
		
		var data = new FormData();
		data.append('id', this.value);
		var id = $('.splitSend').find('input[name=student]').val();
		data.append('student_id',id);
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

	function getBulkInsert(){
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.open('POST', '../template/ajax/get_bulk_insert.php', true);
				
		var data = new FormData();
		data.append('id', this.value);
		xmlHttp.send(data);
		
		xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState == 4){
				var element = document.getElementById('bulk-ins');
				element.innerHTML = xmlHttp.responseText;
			}
		}
	}

	function getLetter(clickedId,student_id){
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.open('POST', '../template/ajax/get_letters.php', true);
				
		var data = new FormData();
		data.append('id', clickedId);
		data.append('student_id',student_id);
		xmlHttp.send(data);
		var button = document.createElement('button');
		button.innerHTML = "Generate";
		button.className='let-gen';

		
		xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState == 4){
				var element = document.getElementById('modal-infos');
				element.innerHTML = xmlHttp.responseText;
				// element.appendChild(button);
				$('#print').html("<i class='fa fa-print button let-p' aria-hidden='true'></i>");
				$('#print').append(button);
			}
		}
	}

	// modal
	function openModal() {
		var modal = document.getElementById('simpleModal');
		modal.style.display = 'block';
	}

	function closeModal() {
		var modal = document.getElementById('simpleModal');
		modal.style.display = 'none';
	}

	window.addEventListener('click', outsideClick);
	
	function outsideClick(e) {
		var modal = document.getElementById('simpleModal');
		if (e.target == modal) {
			modal.style.display = 'none';
		}
	}


	// modal
 	function PrintDiv() {    
       var divToPrint = document.getElementById('modal-infos');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
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
		<div class="log">
			<form action="../../login/logout.php" method="POST">
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
				<li><a href="?page=portfolio.php&adID=16000000"><i class="fa fa-address-card"></i>&nbsp;&nbsp; Administrator</a></li>
			</ul><br/>
			<ul class="">
				<li><a href="index.php?page=students.php"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp; Student Records</a></li>
				<li><a onclick="displayStaffType();"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp; Staff Records</a>
					<div class="link-staff">
						<a href="index.php?page=moduleLeaders.php">-&nbsp;&nbsp; Module Leader</a>
						<a href="index.php?page=courseLeader.php">-&nbsp;&nbsp; Course Leader</a>
					</div>
				</li>
				<li><a href="index.php?page=course_record.php"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp; Course Records</a></li>
				<li><a href="index.php?page=attendance.php"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp; Attendance Records</a></li>
				<li><a href="index.php?page=message.php"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;&nbsp; Messages</a></li>
				<!-- <li><a href=".php">Review</a></li> -->
				<br/>
				<!-- <li><a href=".php"></a></li> -->
				<!-- <li><a href=".php"></a></li> -->
			</ul>		
		</aside>

		<script type="text/javascript">
			var temp = 0;

			function displayStaffType() {
				var staff = document.getElementsByClassName('link-staff')[0];

				if (temp % 2 == 0) {
					staff.style.display = 'block';
					temp++;	
				}
				else {
					staff.style.display = 'none';
					temp++;					
				}
			  	// cross.style.transition = 'transform ease-out 1s';
			  	// cross.style.transition = 'transform ' + 'ease-out ' + 3 + 's';
			  	// cross.style.transform = 'translateX(0px)';
			  }
			</script>

			<?php
			echo $content;
			?>
		</div>
	</body>
	</html>