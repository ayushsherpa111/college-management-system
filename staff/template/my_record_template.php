<section class="admin-section">
	<h1 class="heading">Portfolio</h1>
	<hr class="border-line"/>
		<div class="portfolio">
			<div class="port-pic">
				<div class="pic-border">
					<img src="../../<?php echo $image;?>" class="img" id="displayProfile">
					<h1><?php echo $staffDetails['First Name'].' '.$staffDetails['Sur Name']; ?></h1>
					<p><?php echo $staffDetails['Email']; ?></p>
					<div id="change-pro">
						<button id="change-proLink" onclick="changeProfile()">Edit Profile</button>
					</div>
				</div>
			</div>

			<div class="port-details">
				<h2>Portfolio Details</h2>

			<aside>
		</aside>
		<table class="port-table">
	<tbody>
	<?php 
		foreach ($staffDetails as $key => $value) {
			if (!is_numeric($key)) {	
		?>
		<tr>
			<th><?php echo $key;?></th>
			<td><?php echo $value;?></td>
		</tr><?php
		}
		}
	
	?> 
	
	</tbody>
	</table> 
				</div>
			</div>

	<!-- </div> -->
</section>