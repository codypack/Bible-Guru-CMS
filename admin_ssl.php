<?php

 $host = 'localhost';
$username = 'onyx5';
$password = 'shalom';
$db_name = 'biblesco'; 
$conn= mysqli_connect($host, $username, $password ,$db_name );
if(!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}   	
          
  
  
  
  
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
		
		<section style="width:91%; margin:auto;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12" style="height: 130px;">
					<img src="images/biblegurufinal.png" style="margin-top:0px; position:relative; "/>
					<a href="index.php" class="backToHome">Back to home page</a>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:500px;">
					<a href="view_all.php">View Members</a>&nbsp;&nbsp;&nbsp;
                    <a href="view_students.php">View Candidates</a>&nbsp;&nbsp;&nbsp;
                    <a href="post_ques.php">Post Questions</a>&nbsp;&nbsp;&nbsp;
					<a href="view_ques.php">View Questions</a>&nbsp;&nbsp;&nbsp;
                    <a href="post_mess.php">Post Messages</a>&nbsp;&nbsp;&nbsp;
					<a href="view_mess.php">View Messages</a>&nbsp;&nbsp;&nbsp;
					<a href="post_videos.php">Post Videos</a>
					
						
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