<script type="text/javascript">
	$(document).ready(function() {
		$('.msgs .message .message-function #delSpan a').on('click',function(e){
  			e.preventDefault();
  			var delId = $(this).attr('href');
  			$.post('../pages/deleteMessage.php',{msgDel:delId},function(data){
  				$('.message').html('');
  				$('#messagesList li').find('a[href=delId]').css("background-color", "red");
  			});
  		});
	});
</script>
<?php 
	include '../classes/databaseFunctions.php';
	include '../../connect.php';
	$myMessages = new DatabaseFunctions('message');
	$student = new DatabaseFunctions('student');
	$from = ($myMessages->find('m_id',$_POST['mID']))->fetch();
	$userFrom = ($student->find('student_id',$from['student_id']))->fetch();
?>
<div class="message-function">
		<span id="delSpan"><a href="<?php echo $from['m_id'];?>" id="deleteMessage"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a></span>
		<span><a href="index.php?page=message.php&msgid=<?php echo $userFrom['student_id']; ?>"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp; Reply</a></span>
	</div>
	<h4><?php echo $from['subject']; ?></h4>
	<div class="person-info">
		<div class="per-pic">
			<p><?php echo substr($userFrom['first_name'], 0,1).substr($userFrom['surname'], 0,1); ?></p>
		</div>
		<div class="per-name">
			<h2><?php echo $userFrom['first_name'].' '.$userFrom['surname']; ?></h2>
			<p><?php echo $from['msg_date']; ?></p>
		</div>
	</div>

	<div class="msg-data">
		<p><?php echo $from['message']; ?></p>
		<p style="padding-top: 50px;"><a href="">Sent from Yahoo Mail on Android</a></p>
			
	</div>