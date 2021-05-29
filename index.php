<!DOCTYPE html>
<html>
<head>
	<title>Poll</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Radio validation -->
	<script type="text/javascript">
		function checkforblank() {
			
			var getSelectedValue = document.querySelector( 'input[name="author"]:checked'); 
			if(getSelectedValue ==null)
			{ 
				document.getElementById("message").innerHTML="*Please Select an option.. ";  
			}
			else
			{
				var a= document.forms.author;

				for(i=0;i<a.length();i++)
				{
					if(a[i].checked == true)
					{
						return true;
					}
				}
			}
			return false;
			
		}
	</script>



</head>
<style type="text/css">
	body, h1, h2, h3, h4, h5, h6 {
		font-family: Arial, Helvetica, sans-serif;
	}
	.container
	{
		background-color: #f5f5f5;

	}
	
	/*Heading Start*/
	.heading
	{
		color: #17a2b8;
		font-variant-caps: small-caps;
	}
	/*Heading End*/

	/*Poll Start*/
	.card
	{
		padding:30px;
		margin: 30px;
		
	}
	
	.options
	{
		padding-left: 15px;
	}


	@media screen and (max-width: 600px) {
		.card
		{
			padding:35px;
			margin: 35px;
			
		}
		
		.options
		{
			padding-left: 15px;
		}
	}
	/*Poll End*/

</style>
<body>

	<div class="container my-3">
		<br>
		<hr>
		<center><span class="heading"><h2>Opinion Poll</h2></span></center>
		<div class="row my-3">
			<div class="col">
				
			</div>
			<div class="col-md-5 card">
				<form name="forms" action="index.php" method="POST" onsubmit="return checkforblank()">
					
					<span><h4>Who is your favorite author?</h4></span>
					<div class="options">
						<input type="radio" id="author" name="author" value="Miguel de Cervantes">
						<label >Miguel de Cervantes</label><br>
						<input type="radio" id="author" name="author" value="Charles Dickens">
						<label >Charles Dickens</label><br>
						<input type="radio" id="author" name="author" value="J.R.R. Tolkien">
						<label >J.R.R. Tolkien</label><br>
						<input type="radio" id="author" name="author" value="Antoine de Saint-Exuper">
						<label >Antoine de Saint-Exuper</label>
					</div>
					<div><p id="message" style="color: red; font-style: italic; font-size: 14px;"></p></div>


					<input type="submit" name="submit" value="Submit" style="float: right;" class="btn btn-info btn-sm">
					
				</form>	
			</div>
			<div class="col">
				
			</div>
			
			

		</div>

		
		<hr>
		
	</div>
	<?php

	include 'conn.php';
	if(isset($_POST['submit']) && isset($_POST['author']))
	{
		$author=$_POST['author'];

		if($author=="Miguel de Cervantes")
		{
			$sql = "UPDATE poll SET op1=op1+1";
		}
		if($author=="Charles Dickens")
		{
			$sql = "UPDATE poll SET op2=op2+1";
		}
		if($author=="J.R.R. Tolkien")
		{
			$sql = "UPDATE poll SET op3=op3+1";
		}
		if($author=="Antoine de Saint-Exuper")
		{
			$sql = "UPDATE poll SET op4=op4+1";
		}

		

		if ($conn->query($sql) === TRUE) {
			echo
			"<script type='text/javascript'>
			alert('Thanks For Your Vote');
			window.location.href = 'res.php';
			</script>
			";

		} else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	?>
</body>
</html>