<?php
include('connectDB.php');

$sql = 'SELECT * FROM biblestudent';
  $result = mysqli_query($conn,$sql);
  $numRows = mysqli_num_rows($result);
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
					<div class="col-sm-12" style="height: 130px; position:relative;">
					<img src="images/biblegurufinal.png" style="margin-top:0px; "/>
					<a href="admin_ssl.php" class="backToAdmin">Back to admin page</a>
                    <a href="index.php" class="backToHome">Back to home page</a>					
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:auto;">
					
					<p style="font-size:20px; color:#0000ff;">The number of registered members is <?php echo $numRows ?></p>
<table>
<tr>
<th style="padding-right:20px;">First Name</th>

<th style="padding-right:20px;">Last Name</th>

<th style="padding-right:20px;">Address</th>

<th style="padding-right:20px;">Email</th>

<th style="padding-right:20px;">Phone</th>

<th style="padding-right:20px;">User Name</th>

<th>Password</th>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td style="padding-right:20px;"><?php echo $row['first_name']; ?></td>
<td style="padding-right:20px;"><?php echo $row['last_name']; ?></td>
<td style="padding-right:20px;"><?php echo $row['res_address']; ?></td>
<td style="padding-right:20px;"><?php echo $row['email_add']; ?></td>
<td style="padding-right:20px;"><?php echo $row['phoneNo']; ?></td>
<td style="padding-right:20px;"><?php echo $row['user_name']; ?></td>
<td><?php echo $row['pass_word']; ?></td>
</tr>
<?php } ?>
</table>

					
						
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