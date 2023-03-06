<?php
include('connectDB.php');

	$sql = "SELECT * FROM biblestudent, answers WHERE biblestudent.student_id = answers.student_id";	  
          
  $result = mysqli_query($conn,$sql);
  //$numRows = mysql_num_rows($result);
  
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
					
					<p><h3 style="color:#0000ff;">Assessment Page for candidates</h3></p>
<table>
<tr>
<th style="padding-right:20px;">First Name</th>
<th style="padding-right:20px;">Last Name</th>
<th style="padding-right:20px;">Question</th>
<th style="padding-right:20px;">Answer</th>
<th style="padding-right:20px;">Assess</th>
<th style="padding-right:20px;">Scale</th>
<th style="padding-right:20px;">Answer time</th>
<th style="padding-right:20px;">&nbsp;</th>
<th style="padding-right:20px;">&nbsp;</th>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td style="padding-right:20px;"><?php echo $row['first_name']; ?></td>
<td style="padding-right:20px;"><?php echo $row['last_name']; ?></td>
<td style="padding-right:20px;"><?php echo $row['question']; ?></td>
<td style="padding-right:20px;"><?php echo $row['answer']; ?></td>
<td style="padding-right:20px;"><?php echo $row['assess']; ?></td>
<td style="padding-right:20px;"><?php echo $row['scale']; ?></td>
<td style="padding-right:20px;"><?php echo $row['answer_time']; ?></td>
<td style="padding-right:20px;"><a href="update_student.php?answer_id=<?php echo $row['answer_id'] ?>">EDIT</a></td>
<td><a href="delete_student.php?answer_id=<?php echo $row['answer_id'] ?>">DELETE</a></td>
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