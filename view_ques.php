<?php
  include('connectDB.php');
  
   $question = ''; 
  $sqlq = "SELECT * FROM questions";
  $resq = mysqli_query($conn,$sqlq);
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Website </title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="style/myboot.css">
		<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->
          <script src="js/jquery-3.3.1.min.js"></script>
          <script src="js/biblereading.js"></script>
		
	</head>
	<body>
		
		<section style="width:90%; margin:auto;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12" style="height: 130px;">
					<img src="images/biblegurufinal.png" style="margin-top:0px; "/>
					<a href="admin_ssl.php" class="backToAdmin">Back to admin page</a>
					<a href="index.php" class="backToHome">Back to home page</a>	
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:auto;">
					
					<p><h2>View Your Questions</h2></p>
<table>
<tr>
<th style="padding-right:20px;">Question</th>
<th>&nbsp;</th>
</tr>
<?php
while($row = mysqli_fetch_array($resq)) {
?>
<tr>
<td style="padding-right:20px;"><?php echo $row[1]; ?></td>


<td><a href="del_ques.php?admin_ques_id=<?php echo $row[0]; ?>">DELETE</a></td>
</tr>
<?php } ?>
</table>

					
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="background-color:#b85c90; padding:7px; text-align:center;">
						<!--<h1>FOOTER</h1>-->
						<h5 style="color:white;">&copy; copyright 2019 Onyx Creative solutions</h5>
					</div>
				</div>
			</div>
		</section>


		
	</body>
</html>