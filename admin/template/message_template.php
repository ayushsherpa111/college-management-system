<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">Messages</h1>
		<div class="search">
			<form action="search.php" method="POST">
				<input type="text" name="" placeholder="Enter a student name...">
				<div class="search-icon">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="submit" name="" value="Search">
				</div>
			</form>
		</div>
	</div>
	<hr class="border-line"/>
	<!-- <div class="msg-panel">
		<div class="search">
			<form action="search.php" method="POST">
				<input type="text" name="" placeholder="Enter a student name...">
				<input type="submit" name="" value="Search">
			</form>
		</div>
		<div class="msg-function">
			
		</div>
	</div> -->
	<!-- <div class="admin-function"> -->
		<div class="msgs">
			<div class="messages">
				<div class="genMsgDiv">
					<button name="" class="genMsgBtn" id="generateMessage">+ Generate a Message</button>
				</div>
				<ul id="messagesList">
					<?php foreach ($messages as $row): ?>
						<li>
							<a href="<?php echo $row['m_id']; ?>" id="viewMsg">
								<input type="hidden" name="mID" id="messageID" value="<?php echo $row['m_id']; ?>">
								<div class="person-msg">
									<div class="pic">
										<p><?php $person = ($student->find('student_id',$row['student_id']))->fetch(); 
										echo substr($person['first_name'], 0,1).substr($person['surname'], 0,1); ?></p>
									</div>
									<div class="person">
										<h3><?php echo $person['first_name'].' '.$person['surname']; ?></h3>
										<p><?php echo $row['subject']; ?></p>
									</div>
									<div class="date">
										<p>04-02-2019</p>
									</div>
								</div>
							</a>
						</li>
					<?php endforeach ?>
				</ul>

			</div>
			<div class="message">

				<?php if (isset($_GET['msgid'])) {
					?>	
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
								</select>
						</div>
					</div>
					<div class="splitSend">
						<label>From : </label>
						<input type="text" name="from" placeholder="Enter your Identification Number" value="Admin" required>
					</div>
					<div class="splitSend">
						<label>To : </label>
						<input type="text" name="student" value="<?php echo $mID['student_id']; ?>" placeholder="Enter receiver Identification Number" required> 
					</div>
					<div class="splitSend">
						<label>Subject : </label>
						<input type="text" name="subject" id="T-sub" placeholder="Enter your Subject">
					</div>
					<textarea class="sendTxtArea" rows="28" id="text-area"></textarea>

				<?php
					}
				else {
				?>
					<i class="fa fa-envelope msg-i" aria-hidden="true"></i>
					
				<?php
				}?>
				</div>
			</div>
		</div>
	<!-- </div> -->
</section>


