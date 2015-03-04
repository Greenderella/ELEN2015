<?php
	include "header.php";
?>

<div class="wrap">
				<div class="printSolo">
					<div class="content">
						<div class="column">
							<div>
								<div class="title">
									<p class="h2">
										<img src="image/icon1.png" title="<?php echo $L["index"]["latest"]; ?>" />
										<?php echo $L["index"]["latest"]; ?>
									</p>
								</div>
								<h3><?php echo $L["index"]["latestHeader"]; ?></h3>
								<p>
									<?php echo $L["index"]["latestBody"]; ?>
								</p>
							</div>
						</div>
						<div class="column">
							<div>
								<div class="title">
									<p class="h2">
										<img src="image/icon.png" title="<?php echo $L["index"]["institutions"]; ?>" />
										<?php echo $L["index"]["institutions"]; ?>
									</p>
								</div>
								<?php echo $L["index"]["institutionsBody"]; ?>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="info">
						<h2>V ELEN</h2>
						<div id="slider">
							<a class="control_next">></a>
							<a class="control_prev"><</a>
							<ul>
								<li><img src="image/car1.jpg" title="Pariposa" /></li>
								<li><img src="image/car2.jpg" title="Pariposa" /></li>
								<li><img src="image/car3.jpg" title="Pariposa" /></li>
								<li><img src="image/car4.jpg" title="Pariposa" /></li>
								<li><img src="image/car5.jpg" title="Pariposa" /></li>
							</ul>  
						</div>
						<div class="text">
							<p>
								<?php echo $L["index"]["body"]; ?>
							</p>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>

<?php
	include "footer.php";
?>