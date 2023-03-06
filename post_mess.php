<?php
$title = $verse = $message = "";
include('connectDB.php');

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



  if(isset($_POST['title']))
  {
   $title = test_input($_POST['title']);
  }
  if(isset($_POST['verse']))
  {
    $verse = test_input($_POST['verse']);
  }
  if(isset($_POST['message']))
  {
   $message = test_input($_POST['message']);
  }
  if($title != '' || $verse != '' || $message != '')
  {
   $query = 'INSERT INTO messages(mess_title, memory_verse, message)
             VALUES("'. $title .'", "'. $verse .'", "'. $message .'")';
	
   $result = mysqli_query($conn,$query);	
   header('Location: http://localhost:4200/ImprovedBibleGuru/admin_ssl.php'); 
   exit;   
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
					<a href="admin_ssl.php" class="backToAdmin">Back to admin page</a>
					<a href="index.php" class="backToHome">Back to home page</a>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:500px; position:relative;">
					<div id="formDiv" style="position:absolute; left:500px;">
<div id="tableDiv">
<form name="regform"  action="" method="post">
<p><h4 style="color:#0000ff;">Post your messages</h4></p>
<table border="0" width="400" cols="2">

<tr>
<td>
<label for="title">Title:</label><span class="required">*</span>
</td>
</tr>
<tr>
<td>
<input type="text" name="title" id="title" style="width: 225px;" required >
</td>
</tr>

<tr>
<td>
<label for="verse">Memory Verse:</label><span class="required">*</span>
</td>
</tr>
<tr>
<td>
<input type="text" name="verse" id="verse" style="width: 225px;" required>
</td>
</tr>
<tr>
<td>
<label for="message">Message:</label><span class="required">*</span>
</td>
<td>
</tr>
<tr>
<td>
<textarea name="message" id="message" cols="30" rows="10" required></textarea>
</td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" class="leftmove">
<input type="reset" name="reset" id="reset"></td>
</tr>
</table>

</form>
</div><!--tableDiv ends here-->


</div><!--formDiv ends here-->
						
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