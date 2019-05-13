<script type="text/javascript">
	$('.msgs .message .sendMsg .sendMsgBtn').on('click',function(){
  			var id = $('.message .splitSend').find('input[name="student"]').val();
  			var m = $('.message .sendTxtArea').val();
  			var s = $('.message .splitSend').find('input[name="subject"]').val();
  			if ( $('.message .splitSend').find('input[name="student"]').val().length === 0 || $('.message .splitSend').find('input[name="subject"]').val().length === 0) {
  				alert('Please enter all the required fields');
  			}else{
	  			$.post('../pages/sendMessage.php',{student_id:id,subject:s,message:m},function(data){
	  				$('.message').html(data);
	  			});
  			}
  		});
</script>
<div class="sendMsg">
	<button class="sendMsgBtn">Send</button>
	<div>
		<label>Choose Template : </label>
		<select name="" class="templSelect" id="msg-template" onclick="myLoad()">
			<option value="">None</option>	
			<option value="Failure to attend P.T.M.">Failure to attend P.T.M.</option>	
			<option value="Poor Attendance">Poor Attendance</option>	
			<option value="Failure to Submit Coursework">Failure to Submit Coursework</option>	
			<option value="Confirmation Letter">Confirmation Letter</option>	
	</select>
	</div>
</div>
	<div class="splitSend">
		<label>From : </label>
		<input type="text" name="from" placeholder="Enter your Identification Number" value="Admin">
	</div>
	<div class="splitSend">
		<label>To : </label>
		<input type="text" name="student" value="" placeholder="Enter receiver Identification Number">
	</div>
	<div class="splitSend">
		<label>Subject : </label>
		<input type="text" name="subject" id="T-sub" placeholder="Enter your Subject">
	</div>
	<textarea class="sendTxtArea" rows="28" id="text-area"></textarea>
</div>
