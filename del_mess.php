<?php
include('connectDB.php');

  $done = false;
  $expected = array('mess_title', 'memory_verse', 'message', 'admin_mess_id');
  if ($_GET && !$_POST) 
  {
   if (isset($_GET['admin_mess_id']) && is_numeric($_GET['admin_mess_id'])) 
   {
     $mess_id = $_GET['admin_mess_id'];
   }
   else 
   {
     $mess_id = NULL;
   }
   if($mess_id) 
   {
    //$sql = "SELECT * FROM biblestudent, answers WHERE biblestudent.student_id = answers.student_id";
	$sql = "SELECT * FROM messages WHERE admin_mess_id = $mess_id";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
   }
  }
  // if form has been submitted, update record
    if (array_key_exists('delete', $_POST)) 
	{
// prepare expected items for insertion into database
      foreach ($_POST as $key => $value) 
	  {
        if (in_array($key, $expected)) 
		{
         ${$key} = htmlspecialchars($value);
        }
      }
      // abandon the process if primary key invalid
      if (!is_numeric($_POST['admin_mess_id'])) 
	  {
        die('Invalid request');
      }

      // prepare the SQL query
      $sql = "DELETE FROM messages WHERE admin_mess_id = {$_POST['admin_mess_id']}";
              
      // submit the query
      $deleted = mysqli_query($conn,$sql);
    }
      // redirect page if $article_id is invalid
      if ($done || !isset($mess_id)) 
      {
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
					<img src="images/biblegurufinal.png" style="margin-top:0px; "/>
					<a href="admin_ssl.php" class="backToAdmin">Back to admin page</a>
					<a href="index.php" class="backToHome">Back to home page</a>	
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:500px; position:relative;">
					
					<div id="formDiv" style="position:absolute; left:430px; top:50px;">
<?php if (empty($row)) { ?>
<p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
<form name="deleteform"  action="" method="post">
<table cols="2" border="0" width="400">
<tr>
<td>
<label for="title">Title:</label><span class="required">*</span>
</td>
<td>
<input type="text" name="title" id="title" style="width: 300px;" value="<?php echo htmlentities($row['mess_title']); ?>" />
</td>
</tr>
<tr>
<td>
<label for="verse">Memory verse:</label><span class="required">*</span>
</td>
<td>
<textarea name="verse" id="verse" cols="30" rows="8"><?php echo htmlentities($row['memory_verse']); ?></textarea>
</td>
</tr>
<tr>
<td>
<label for="mess">Message:</label>
</td>
<td>
<textarea name="mess" id="mess" cols="30" rows="8"><?php echo htmlentities($row['message']); ?></textarea>
</td>
</tr>

<tr>
<td><input type="submit" name="delete" id="delete" value="Confirm deletion" class="leftmove" /></td>
<td><input type="submit" name="cancel" id="cancel" value="Cancel" /></td>
</tr>
</table>
<input name="admin_mess_id" type="hidden" value="<?php echo $row['admin_mess_id']; ?>" />
</form>
<?php } ?>
</div>

						
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