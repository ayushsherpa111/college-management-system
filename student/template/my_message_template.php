<script type="text/javascript">
	$(document).ready(function(){
		$('#replyList li').on('click',function(e){
  			e.preventDefault();
  			
  			var id = $(this).closest('li').children('a').attr('href');
  			
  			$.post('../template/view_reply_template.php',{rID:parseInt(id)},function(data){
	  				$('.message').html(data);
	  			});
  		});

	});
</script>
<?php echo $aside; 
$student = new DatabaseFunctions('student');
?>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Messages</h1>
	</div>
	<hr class="border-line"/>

		<div class="msgs">
	
			<div class="messages">
				
				<div class="genMsgDiv">
					<button name="" class="genMsgBtn" id="generateMessage">+ Generate a Message</button>
				</div>
				<ul id="replyList">
					<?php 
					if ($myMessage->rowCount() == 0) {
						echo '<p  id="noMsgPost">No messages</p>';
					}
					else {
						foreach ($myMessage as $row): ?>
							<li>
								<a href="<?php echo $row['reply_id']; ?>" id="viewMsg">
								<div class="person-msg">
									<div class="pic">
										<?php if ($row['toUser'] == 16000000) { ?>
											<p>A</p>
											</div>
											<div class="person">
												<h3>Admin</h3>
												<p><?php echo $row['subject']; ?></p>
											</div>
										<?php } else { ?>
											<?php $sender = ($student->find('student_id',$row['toUser']))->fetch(); ?>
											<p><?php echo $sender['first_name'][0].$sender['surname'][0]; ?></p>
											</div>
											<div class="person">
												<h3><?php echo $sender['first_name'].' '.$sender['surname']; ?></h3>
												<p><?php echo $row['subject']; ?></p>
											</div>
										<?php } ?>
										
									<div class="date">
										<p><?php echo $row['receive_date']; ?></p>
									</div>
									<!-- <h4>Messages 1</h4> -->
								</div>
								</a>
							</li>
					<?php endforeach ?>
					<?php } ?>
				</ul>

			</div>
			<div class="message">
				<?php if (isset($_GET['mID'])) { ?> 
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
							<input type="text" name="student" value="<?php echo $_GET['mID'] ?>" placeholder="Enter receiver Identification Number" required>
						</div>
						<div class="splitSend">
							<label>Subject : </label>
							<input type="text" name="subject"  id="T-sub" value="(No Subject)">
						</div>
						<textarea class="sendTxtArea" rows="28" id="text-area"></textarea>
					</div>

				<?php }else{ ?>
					<i class="fa fa-envelope msg-i" aria-hidden="true"></i>
				<?php } ?>

			</div>
		</div>

</section>

</div>