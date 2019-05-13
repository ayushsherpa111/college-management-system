<?php 
	include '../../admin/classes/databaseFunctions.php';
	include '../../connect.php';
	$myMessages = new DatabaseFunctions('reply');
	$student = new DatabaseFunctions('student');
	$reply = ($myMessages->find('reply_id',$_POST['rID']))->fetch();
	if ($reply['toUser'] == 16000000) {
		$name = "Admin";
		$alis = "A";
	}else{
		$repName = ($student->find('student_id',$reply['toUser']))->fetch();
		$name = $repName['first_name'].' '.$repName['surname'];
		$alis = $repName['first_name'][0].$repName['surname'][0];
	}
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.msgs .message .message-function #delSpan a').on('click',function(e){
  			e.preventDefault();
  			var delId = $(this).attr('href');
  			$.post('../pages/deleteMessages.php',{msgDel:delId},function(data){
  				window.location.href="http://localhost/woodlands_uc1/student/public_html/index.php?page=my_messages";
  			});
  		});
	});
</script>
<div class="message-function">
		<span id="delSpan"><a href="<?php echo $reply['reply_id'];?>" id="deleteMessage"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a></span>
		<?php if ($reply['toUser'] == 16000000) { ?>
			<span><a href="index.php?page=my_messages&mID=<?php echo $reply['toUser']; ?>"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp; Reply</a></span>
		<?php	} else{ ?>
			<span><a href="index.php?page=my_messages&mID=<?php echo $reply['student_id']; ?>"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp; Reply</a></span>
		<?php } ?>
	</div>
	<h4><?php echo $reply['subject']; ?></h4>
	<div class="person-info">
		<div class="per-pic">
			<p><?php echo $alis; ?></p>
		</div>
		<div class="per-name">
			<h2><?php echo $name; ?></h2>
			<p><?php echo $reply['receive_date']; ?></p>
		</div>
	</div>

	<div class="msg-data">
		<p><?php echo $reply['message']; ?></p>
		<p style="padding-top: 50px;"><a href="">Sent from Yahoo Mail on Android</a></p>
			
	</div>