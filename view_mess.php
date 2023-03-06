<?php
include('connectDB.php');

  
  $sqlm = "SELECT * FROM messages";
  $resm = mysqli_query($conn,$sqlm);
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
		  <style>
		  th
		  {
		   text-align:center;
		   font-size:16px;
		   color:#0000ff;
		  }
		  td
		  {
		   <!--text-align:justify;-->
		  }
		  </style>
		
	</head>
	<body>
		
		<section style="width:91%; margin:auto;">
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
				<!--<div id="formDiv" style="position:absolute;">-->
					
                    <table border="0" width="1000" style="margin:auto; border-bottom:1px solid; border-right:1px solid; border-left:1px solid;">
					<p><h3 style="text-align:center;">The Messages Page</h3></p>
                    <tr style="background-color:#eedff0;">
                    <th width="150" style="padding-right:10px;">Title</th>
                    <th width="150" style="padding-right:10px;">Memory Verse</th>
                    <th width="550" style="padding-right:10px;">Message</th>
                    <th width="150">&nbsp;</th>
                    </tr>
                    <?php
                     while($row = mysqli_fetch_assoc($resm)){
                    ?>
                    <tr>
                    <td style="padding-right:10px;"><?php echo $row['mess_title']; ?></td>
                    <td style="padding-right:10px;"><?php echo $row['memory_verse']; ?></td>
                    <td style="padding-right:10px; text-align:justify;"><?php echo $row['message']; ?></td>
                    <td><a href="del_mess.php?admin_mess_id=<?php echo $row['admin_mess_id'] ?>">DELETE</a></td>
                    </tr>
                    <?php } ?>
                    </table>
                   <!--</div>-->
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