<?php echo $aside; ?>
<section class="admin-section">
	<h1 class="heading">Portfolio</h1>
	<hr class="border-line"/>
		<div class="portfolio">
			<div class="port-pic">
				<div class="pic-border">
					<img src="../../<?php echo $image ?>" class="img" id="displayProfile">
					<h1><?php echo $_SESSION['student']; ?></h1>
					<p><?php ?></p>
					</br>
					<div id="change-pro">
						<button id="change-proLink" onclick="changeProfile()">Edit Profile</button>
					</div>
				</div>
			</div>

	<div class="port-details">
				<h2>My Profile</h2>
		<table class="port-table">
			<tbody>
				<?php 
				foreach ($record as $key => $value) {
				?>
				<tr>
					<th><?php echo $key;?></th>
					<td><?php echo $value;?></td>
				</tr><?php
				}
			
			?>
			</tbody>
		</table> 
	</div>
</div>

	<!-- </div> -->
</section>

</div>