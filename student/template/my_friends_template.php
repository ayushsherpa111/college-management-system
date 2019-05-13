<?php echo $aside; ?>
<section class="admin-section">
	<div class="adminMsgSearch">
		<h1 class="heading">My Friends</h1>
	</div>
	<hr class="border-line"/>

	<div class="function">
		
		<div class="my-friends">
			<?php foreach ($firends as $row): ?>
				<div class="port-pic mf-pp">
				<div class="pic-border mf-pb">
					<img src="../../<?php echo $row['image'] ?>" class="img">
					<h1><?php echo $row['first_name'].' '.$row['surname']; ?></h1>
					<p><a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email']; ?></a></p>
					</br>
					<div id="change-pro">
						<a href="index.php?page=my_messages&mID=<?php echo $row['student_id'] ?>" class="sendFMsg">Send Message</a>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>

</section>

</div>