<script type="text/javascript">
	$(document).on('click', '.let-gen', function(){
		var messageData = new FormData();
		messageData.append('student_id',<?php echo $_GET['id']; ?>);
		messageData.append('subject',"Admission Letter");
		$('#modal-infos').children().last().remove();
		messageData.append('message',$('#modal-infos').html());
    	messageData.append('toUser',<?php echo $_SESSION['admin_id']; ?>);
    	$.ajax({
    		url:'../pages/sendMessage.php',
			type:'POST',
			data:messageData,
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function(){
			},
			success:function(data,success){
				alert('message sent');
			}
    	})
	});
	$(document).on('click', '#print i', function(){
		PrintDiv();
	});
</script>
<section class="admin-section">
	<h1 class="heading">Portfolio</h1>
	<hr class="border-line"/>
		<div class="portfolio">
			<div class="port-pic">
				<div class="pic-border">
					<img src="../../<?php echo $image; ?>" class="img">
					<h1><?php if(isset($_GET['id'])){echo $data['first_name'].' '.$data['middle_name'].' '.$data['surname'];}else{
						echo "--------";
					} ?></h1>
					<p><?php if(isset($_GET['id'])){echo $data['email'];}else{
						echo "--------";
					} ?></p>
				</div>
			</div>

			<div class="port-details">
				<h2>Portfolio Details</h2>

			<aside>
		</aside>
		<table class="port-table">
	<tbody>
	<?php 
		$user = '';
		foreach ($record as $key => $value) {
			if ($key=="Course") {?>
				<tr>
					<th>Course Name</th>
					<td><?php echo $cName['course_name']; ?></td>
				</tr><?php
			}else{
		?>
		<tr>
			<th><?php echo $key;?></th>
			<td><?php echo $value;?></td>
		</tr><?php
			if ($key == 'Entry Qualification') {
				$user = 'student';
			}
		}
	}
	?>
	
	</tbody>
	</table> 
	<?php 
		if ($user == 'student') {
			echo '<button type="button" class="button" id="modalBtn" onclick="openModal()">Generate a Letter</button>';
		}
	?>
	</div>
</div>

	<!-- </div> -->
</section>


<div id="simpleModal" class="modal">
	<div class="modal-content">
		<span class="closeBtn" onclick="closeModal()">&times;</span>
		<div class="modal-head">
			Generate a Letter for Student
		</div>
		<div id="modal-infos">
			<p class="let-ch" id="1" onclick="getLetter(this.id,<?php echo $_GET['id']; ?>)">Conditional Letter</p>
			<p class="let-ch" id="2" onclick="getLetter(this.id,<?php echo $_GET['id']; ?>)">Unconditional Letter</p>
		</div>
	<br>
	<br>
	<br>
	<br><br><br><br>
	<div id="print">
	</div>
	</div>
</div>
