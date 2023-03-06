<?php
include('connectDB.php');

  $sql = 'SELECT * FROM messages';
  $result = mysqli_query($conn,$sql);
  
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
	<body style="background-color:rgba(0, 0, 0, 0.03)";>
		
		<section style="width:90%; margin:auto;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12" style="height: 130px; position:relative;">
					<img src="images/biblegurufinal.png" style="margin-top:0px; "/>
					<a href="index.php" class="backToHome">Back to home page</a>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:auto; padding-left:7px; padding-right:7px; text-align:justify;">
					<?php
                   while($row = mysqli_fetch_assoc($result))
				   {
                    ?>

                   <h3 style="color:#0000ff; font-weight:bold;"><?php echo $row['mess_title']; ?></h3>
                   <p style="color:#70790b; font-size:15px; font-weight:bold;"><?php echo $row['memory_verse']; ?></p>
                   <p style="font-family:verdana; font-size:15px; line-height:20px;"><?php echo $row['message']; ?></p>


                   <?php } ?>
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="background-color:#b85c90; padding:7px; text-align:center; border:0px;">
						<!--<h1>FOOTER</h1>-->
						<h5 style="color:white;">&copy; copyright 2019 Onyx Creative solutions</h5>
					</div>
				</div>
			</div>
		</section>


		
	</body>
</html>