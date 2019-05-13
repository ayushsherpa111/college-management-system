<?php echo $aside; ?>

<section class="admin-section">
	<h1 class="heading">My Attendance</h1>
	<hr class="border-line"/>

	<div class="function">
			<!-- <div class="under-construction">
				<img src="../../images/pageUcons.jpg">
			</div> -->

	<div class="under-construction">
			
		<div class="center-div">

			<div class="bar-top">
				<div class="bar-percent">
					<?php for ($i=10; $i >= 0; $i--) { ?>
						<p><?php echo ($i * 10).' %'; ?></p>
					<?php } ?>
				</div>
				<div class="bar-graph">
					<?php for ($i=1; $i <= 6; $i++) { 

						$presentForCurrent = $pdo->prepare('SELECT days, total FROM attendance WHERE student_id =:id AND semester =:sem');
						$presentForCurrent->execute(['id'=>$_SESSION['student_id'],'sem'=>$i]);
						$present= 0;
						$total = 0;
						$allowedAbsent=0;
						foreach ($presentForCurrent as $row) {
							$present = $present+ $row['days'];
							$total = $total + $row['total'];
							$allowedAbsent = $allowedAbsent + 5;
						}
						$l = rand(0,100); ?>
						<div class="week">
							<div class="week-inDiv">
								<p><strong><?php if ($total == 0) {	} else { echo round(((($present/$total)*100))).'%'; } ?></strong></p>
								<div class="com-bg present" style="height: <?php if ($total == 0) {	} else { echo round((($present/$total)*100)).'%'; } ?>"></div>
							</div>
							<div class="week-inDiv">
								<p><strong><?php if ($total == 0) {	} else { echo round(((($total-$present)/$total)*100)).'%'; } ?></strong></p>
								<div class="com-bg absent" style="height: <?php if ($total == 0) { } else {  echo round(((($total-$present)/$total)*100)).'%'; } ?>"></div>
							</div>
							<div class="week-inDiv">
								<p><strong><?php if ($total == 0) {	} else { echo round(((($allowedAbsent-5)/$total)*100)).'%'; } ?></strong></p>
								<div class="com-bg left" style="height: <?php if ($total == 0) { } else { echo round(((($allowedAbsent-5)/$total)*100)).'%'; } ?>"></div>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="legend">
					<h3>Legend</h3>
					<hr>
					<div>
						<div class="leg-com present"></div>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;Present</p>
					</div>
					<div>
						<div class="leg-com absent"></div>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;Absent</p>
					</div>
					<div>
						<div class="leg-com left"></div>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;Left</p>
					</div>
				</div>
			</div>

			<div class="bar-bottom">
				<?php for ($j=1; $j <= 6; $j++) { ?>
					<span>Semester <?php echo ($j); ?></span>
				<?php } ?>
			</div>

		</div>
		</div>

	</div>

</section>

</div>