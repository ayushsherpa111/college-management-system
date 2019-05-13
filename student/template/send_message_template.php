<?php session_start(); ?>
<script type="text/javascript">
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
</script>
<div class="sendMsg">
	<button class="sendMsgBtn">Send</button>
	<div>
		<label>Choose Template : </label>
		<select name="" class="templSelect" id="msg-template" onclick="myLoad()">
			<option value="">None</option>	
			<option value="Address Amendment">Address Amendment</option>	
	</select>
	</div>
</div>
	<div class="splitSend">
		<label>From : </label>
		<input type="text" name="from" placeholder="Enter your Identification Number" value="<?php echo $_SESSION['student_id']; ?>">
	</div>
	<div class="splitSend">
		<label>To : </label>
		<input type="text" name="student" value="" placeholder="Enter receiver Identification Number" required>
	</div>
	<div class="splitSend">
		<label>Subject : </label>
		<input type="text" name="subject"  id="T-sub" value="(No Subject)">
	</div>
	<textarea class="sendTxtArea" rows="28" id="text-area"></textarea>
</div>
