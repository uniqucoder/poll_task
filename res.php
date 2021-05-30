<?php
include 'conn.php';

$sql = "SELECT op1,op2,op3,op4 FROM poll";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
			   // echo "".$row["op1"];
		$op1 = $row["op1"];
		$op2 = $row["op2"];
		$op3 = $row["op3"];
		$op4 = $row["op4"];
		$total = $op1+$op2+$op3+$op4;
		
		$max = max($op1,$op2,$op3,$op4);

		$op1_per = round($op1/$total *100,1);
		$op2_per = round($op2/$total *100,1);
		$op3_per = round($op3/$total *100,1);
		$op4_per = round($op4/$total *100,1);


	}
	
} else {
	echo "0 results";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>result</title>
	<title>Author Poll</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet"> 
	<!-- pie chart link -->
	<script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
	<script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
	<!-- pie chart link end -->

	
</head>
<style type="text/css">
	body
	{
		margin: 0;
		padding:0;
		font-family: "Times New Roman", Times, serif;
		/*background: #262626;*/
	}
	/*Progress Bar start*/
	h1
	{
		margin: 0;
		padding: 0;
		color: #17a2b8;
		text-transform: capitalize;
		/*text-transform: uppercase;*/
		letter-spacing: 2px;
		font-size: 6vh;
	}
	h2
	{
		margin: 0;
		padding: 0;
		color: #17a2b8;
		text-transform: capitalize;
		/*text-transform: uppercase;*/
		letter-spacing: 2px;
		font-size: 5vh;
	}

	.card
	{
		padding: 10px;
		/*margin: 15px;*/
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		height: 70vh;
	}
	.skillBox
	{
		box-sizing: border-box;
		width: 100%;
		margin: 10px 0;
	}

	.skillBox p
	{
		color: black;
		text-transform: uppercase;
		margin: 0 0 10px;
		padding: 0;
		font-weight: bold;
		letter-spacing: 1px;
	}
	.skillBox p:nth-child(2)
	{
		float: right;
		position: relative;
		top: -34px;
	}
	.skill
	{
		background: #262626;
		padding: 4px;
		box-sizing: border-box;
		border:1px solid #17a2b8;
		border-radius: 2px;

	}
	.skill_level
	{
		background: #17a2b8;
		width: 100%;
		height: 10px;
	}

	@media screen and (max-width: 600px) {
		h1,h2
		{
			margin: 0;
			padding: 0;
			color: #17a2b8;
			text-transform: capitalize;
			/*text-transform: uppercase;*/
			letter-spacing: 2px;
			font-size: 4vh;
		}
		.card
		{
			padding: 20px;
			/*margin: 15px;*/
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			height: 60vh;
			margin-bottom: 10px;
		}
		.skillBox
		{
			box-sizing: border-box;
			width: 100%;
			margin: 7px 0;
		}
		.skillBox p
		{
			color: black;
			text-transform: uppercase;
			margin: 0 0 7px;
			padding: 0;
			/*font-weight: bold;*/
			letter-spacing: 1px;
		}
		.skill
		{
			background: #262626;
			padding: 3px;
			box-sizing: border-box;
			border:1px solid #17a2b8;
			border-radius: 1px;

		}

		.skill_level
		{
			background: #17a2b8;
			width: 100%;
			height: 7px;
		}
	}

	/*End Progress Bar*/

	/*Annimated Progress Bar Start*/
	.b-skills
	{
		border-top: 1px solid #f9f9f9;
		padding-top: 46px;
		text-align: center;
	}

	.b-skills:last-child { margin-bottom: -30px; }

	.b-skills h2 { margin-bottom: 50px; font-size:6vh;}

	.skill-item
	{
		position: relative;
		max-width: 250px;
		width: 100%;
		margin-bottom: 30px;
		color: #555;

	}

	.chart-container
	{
		position: relative;
		width: 100%;
		height: 0;
		padding-top: 100%;
		margin-bottom: 27px;


	}

	.skill-item .chart,
	.skill-item .chart canvas
	{
		position: absolute;
		top: 0;
		left: 0;
		width: 100% !important;
		height: 100% !important;


	}

	.skill-item .chart:before
	{
		content: "";
		width: 0;
		height: 100%;

		

	}

	.skill-item .chart:before,
	.skill-item .percent
	{
		display: inline-block;
		vertical-align: middle;


	}

	.skill-item .percent
	{
		position: relative;
		line-height: 1;
		font-size: 40px;
		font-weight: 900;
		z-index: 2;



	}
	
	.skill-item  .percent:after
	{
		content: attr(data-after);
		font-size: 20px;

	}
	p{
		font-weight: 900;
	}
	.para
	{
		width: 40%;


	}


	.fa2
	{
		text-align: right;
	}

	@media screen and (max-width: 600px) {
		.fa2
		{
			text-align: left;
		}
		
		.b-skills
		{
			border-top: 1px solid #f9f9f9;
			padding-top: 10px;
			text-align: center;
			justify-content: center;

		}

		

		.skill-item
		{
			position: relative;
			max-width: 200px;
			width: 100%;
			margin-bottom: 30px;
			color: #555;


		}

		.chart-container
		{
			position: relative;
			width: 100%;
			height: 0;
			padding-top: 100%;
			margin-bottom: 27px;


		}

		
		
		

		.skill-item .percent
		{
			position: relative;
			line-height: 1;
			font-size: 40px;
			font-weight: 900;
			z-index: 2;



		}
		
		.b-skills,.container,.skill-item
		{
			margin-left: 33px;

		}	
		.para
		{
			width: 100%;
		}
	}
	/*Annimated Progress Bar End*/

	.anychart-credits-text,.anychart-credits-logo
	{
		display: none;
	}
	
</style>
<body>


	<div class="container-fluid">
		<div class="row my-2">
			<div class="col-md-12 col-sm-12">
				<center><h1>Opinion Results</h1></center>
			</div>
			
		</div>
		<div class="row my-4">

			<div class="col-md-6 col-sm-12">
				<div class="card">
					<div class="row">
						<div class="col-md-8">
							<h2 >Favorite author</h2>
						</div>
						<div class="fa2 col-md-4 " style="">
							<h2 style="">Total : <?php echo "".$total; ?></h2>
						</div>

						
					</div>
					
					

					

					<div class="skillBox A">
						<?php
						if($max==$op1)
							{ ?>

								
								<p class="para" style="background-color: yellow; padding: 3px 0px;">Miguel de Cervantes</p>
								<p><?php echo"".$op1_per; ?>%</p>
								<div class="skill ">
								<div class="skill_level" style="background-color: green; width: <?php echo"".$op1_per; ?>%;">
								</div>
								</div>

								<?php 
							}
							else{
								?>
								<p>Miguel de Cervantes</p>
								<p><?php echo"".$op1_per; ?>%</p>
								<div class="skill ">
								<div class="skill_level" style="width: <?php echo"".$op1_per; ?>%;">
								</div>
								</div>
								<?php
							}
							?>

							
							
						</div> 
						<div class="skillBox B">
							<?php
							if($max==$op2)
								{ ?>

									
									<p class="para"  style="background-color: yellow; padding: 3px 0px;">Charles Dickens</p>
									<p ><?php echo"".$op2_per; ?>%</p>
									<div class="skill">
									<div class="skill_level" style="background-color: green; width: <?php echo"".$op2_per; ?>%;">
									</div>
									</div>

									<?php 
								}
								else{
									?>
									<p>Charles Dickens</p>
									<p ><?php echo"".$op2_per; ?>%</p>
									<div class="skill">
									<div class="skill_level" style="width: <?php echo"".$op2_per; ?>%;">
									</div>
									</div>
									<?php
								}
								?>
								<!-- <p>Charles Dickens</p> -->
								
							</div>
							<div class="skillBox C">
								<?php
								if($max==$op3)
									{ ?>

										
										<p class="para" style="background-color: yellow; padding: 3px 0px;">J.R.R. Tolkien</p>
										<p><?php echo"".$op3_per; ?>%</p>
										<div class="skill">
										<div class="skill_level" style="background-color: green; width: <?php echo"".$op3_per; ?>%;">
										</div>
										</div>

										<?php 
									}
									else{
										?>
										<p>J.R.R. Tolkien</p>
										<p><?php echo"".$op3_per; ?>%</p>
										<div class="skill">
										<div class="skill_level" style="width: <?php echo"".$op3_per; ?>%;">
										</div>
										</div>
										<?php
									}
									?>
									<!-- <p>J.R.R. Tolkien</p> -->
									
								</div>
								<div class="skillBox D">
									<?php
									if($max==$op4)
										{ ?>

											
											<p class="para" style="background-color: yellow; padding: 3px 0px;">Antoine de Saint-Exuper</p>
											<p><?php echo"".$op4_per; ?>%</p>
											<div class="skill">
											<div class="skill_level" style="background-color: green; width: <?php echo"".$op4_per; ?>%;">
											</div>
											</div>
											<?php 
										}
										else{
											?>
											<p>Antoine de Saint-Exuper</p>
											<p><?php echo"".$op4_per; ?>%</p>
											<div class="skill">
											<div class="skill_level" style="width: <?php echo"".$op4_per; ?>%;">
											</div>
											</div>
											<?php
										}
										?>
										<!-- <p>Antoine de Saint-Exuper</p> -->
										
									</div> 
								</div>
							</div>
		<!-- <div class="col-md-4">
				
		</div> -->
		<div class="col-md-6 col-sm-12">
			<div class="card">
				<div id="container" style="width: 100%; height: 100%"></div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<section id="s-team" class="section">
				
				<div class="b-skills">
					<div class="container">
						<h2 style="margin-left:-15px; ">Favorite author</h2>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="skill-item center-block">
									<div class="chart-container">
										<div class="chart " data-percent="<?php echo"".$op1/$total *100; ?>" data-bar-color="#23afe3">
											<span class="percent" data-after="%"><?php echo"".$op1_per; ?></span>
										</div>
									</div>

									<p>Miguel de Cervantes</p>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="skill-item center-block">
									<div class="chart-container">
										<div class="chart " data-percent="<?php echo"".$op2/$total *100; ?>" data-bar-color="#a7d212">
											<span class="percent" data-after="%"><?php echo"".$op2_per; ?></span>
										</div>
									</div>

									<p>Charles Dickens</p>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="skill-item center-block">
									<div class="chart-container">
										<div class="chart " data-percent="<?php echo"".$op3/$total *100; ?>" data-bar-color="#ff4241">
											<span class="percent" data-after="%"><?php echo"".$op3_per; ?></span>
										</div>
									</div>

									<p>J.R.R. Tolkien</p>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="skill-item center-block">
									<div class="chart-container">
										<div class="chart " data-percent="<?php echo"".$op4/$total *100; ?>" data-bar-color="#edc214">
											<span class="percent" data-after="%"><?php echo"".$op4_per; ?></span>
										</div>
									</div>

									<p>Antoine de Saint-Exuper</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<script src="plugins/jquery-2.2.4.min.js"></script>
			<script src="plugins/jquery.appear.min.js"></script>
			<script src="plugins/jquery.easypiechart.min.js"></script> 
			<script>
				'use strict';
				var $window = $(window);

				function run()
				{
					var fName = arguments[0],
					aArgs = Array.prototype.slice.call(arguments, 1);
					try {
						fName.apply(window, aArgs);
					} catch(err) {
						
					}
				};
				
			/* chart
			================================================== */
			function _chart ()
			{
				$('.b-skills').appear(function() {
					setTimeout(function() {
						$('.chart').easyPieChart({
							easing: 'easeOutElastic',
							delay: 3000,
							barColor: '#369670',
							trackColor: '#b3ffff',
							scaleColor: false,
							lineWidth: 21,
							trackWidth: 21,
							size: 250
							// lineCap: 'round',
							// onStep: function(from, to, percent) {
							// 	this.el.children[0].innerHTML = Math.round(percent);
							// }
						});
					}, 150);
				});
			};
			

			$(document).ready(function() {
				
				run(_chart);
				
				
			});


			
		</script>   


		
	</div>
</div>


</div>

<!-- Pie chart script start -->
<script type="text/javascript">
	anychart.onDocumentReady(function() {

	  // set the data
	  var data = [
	  {x: "Miguel de Cervantes", value: <?php echo "".$op1; ?>},
	  {x: "Charles Dickens", value: <?php echo "".$op2; ?>},
	  {x: "J.R.R. Tolkien", value: <?php echo "".$op3; ?>},
	  {x: "Antoine de Saint-Exuper", value:<?php echo "".$op4; ?>},
	  
	  ];

	  // create the chart
	  var chart = anychart.pie();

	  // set the chart title
	  chart.title("Favorite Author Poll");


	  // add the data
	  chart.data(data);

	  // display the chart in the container
	  chart.container('container');
	  chart.draw();
	  // set legend position
	// chart.legend().position("center");
	// set items layout
	// chart.legend().itemsLayout("vertical");
	chart.sort("desc");


});
	
</script>
<!-- pie chart script end -->

</body>
</html>