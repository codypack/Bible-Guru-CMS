<?php
session_start();
include('connectDB.php');

$firstnameErr = $lastnameErr = $resaddErr = $emailErr = $phonenoErr = $sexErr = $faithErr = $userErr = $passErr = $cpassErr = "";
$firstname = $lastname = $resadd = $email = $phoneno = $sex = $faith = $user = $pass = $cpass = "";
$lencheck = $passcheck = "";
$regcheck = "";
if(isset($_POST['register']))
{
 function test_input($data) 
 {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
 
 
 
 $firstname = test_input($_POST["firstname"]);
 $lastname = test_input($_POST["lastname"]);
 $resadd = test_input($_POST["resadd"]);
 $email = test_input($_POST["email"]);
 $phoneno = test_input($_POST["phoneno"]);
 if(isset($_POST["faith"]))
 {
  $faith = test_input($_POST["faith"]);
 }
 $user = test_input($_POST["user"]);
 $pass = test_input($_POST["pass"]);
 $cpass = test_input($_POST["cpass"]);


  

 
  if(empty($_POST['firstname']))
  {
   $firstnameErr = "Firstname is required";
  }
  if(empty($_POST['lastname']))
  {
   $lastnameErr = "lastname is required";
  }
  if(empty($_POST['resadd']))
  {
   $resaddErr = "Residential address is required";
  }
  if(!filter_var( $_POST["email"] , FILTER_VALIDATE_EMAIL ))
  {
   $emailErr = "Format improper";
  }
  if(empty($_POST['phoneno']))
  {
   $phonenoErr = "Phone required";
  }
  if(empty($_POST['sex']))
  {
   $sexErr = "Sex required";
  }
  if(empty($_POST['user']))
  {
   $userErr = "Username required";
  }
  if(empty($_POST['pass']))
  {
   $passErr = "Password required";
  }
  if(empty($_POST['cpass']))
  {
   $cpassErr = "Confirm Password required";
  }
  if(empty($_POST['faith']))
  {
   $faithErr = "Gender required";
  }
  
  
  
  $image_tempname = $_FILES['uploadfile']['name'];

  $dir ='C:/xampp/htdocs/ImprovedBibleGuru/upload_images/';
  $ImageName = $dir . $image_tempname;
  if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $ImageName)) 
    {
      //get info about the image being uploaded
      list($width, $height, $type, $attr) = getimagesize($ImageName);
      switch($type) 
      {
       case 1:
       $ext = ".gif";
       break;
    
	   case 2:
       $ext = ".jpg";
       break;

	   case 3:
       $ext = ".png";
       break;

       default:
       echo "Sorry, but the file you uploaded was not a GIF, JPG, or PNG file.<br>";
       echo "Please hit your browser's 'back' button and try again.";
      }
    }
	$sql = "SELECT user_name, pass_word FROM biblestudent WHERE user_name = '".$user."' || pass_word = '".$pass."'";
	$execute = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($execute);
	if(($user == $row['user_name']) || ($pass == $row['pass_word']))
	{
	  $regcheck = "Username/Password already registered";
	
	}
	elseif(strlen($user) < 6 || strlen($pass) < 6) 
    {
      $lencheck = 'Username and password must contain at least 6 characters';
    }
    elseif ($pass != $cpass) 
    {
      $passcheck = 'Your passwords do not match';
    }
	else
	{
	   $query = 'INSERT INTO biblestudent(first_name, last_name, res_address, email_add, phoneNo, user_name, pass_word, con_pass,faith)
       VALUES("' . $firstname . '", "' . $lastname . '", "' . $resadd .'","' . $email .'", "' . $phoneno .'","' . $user .'", "' . $pass .'", "' . $cpass .'", "' . $faith .'")';
	   $result = mysqli_query($conn,$query);
	   
	   $last_id = mysqli_insert_id($conn);
	   $imagename = $last_id . $ext;
	   $_SESSION['imagename'] = $imagename;
	   
	   $query = 'UPDATE biblestudent SET file_name = "' . $imagename . '" WHERE student_id = ' . $last_id;
       $result = mysqli_query($conn,$query);  
	   
	   
	   $newfilename = $dir . $last_id . $ext;
       rename($ImageName, $newfilename);
	   header('Location: http://localHost:4200/ImprovedBibleGuru/reg_success.php');
	}
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
		  <style>
		  td
		  {
		    text-align:left;
		  }
		  </style>
		
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
					<div class="col-sm-12" style="height:500px; position:relative; text-align:center;" id="registerMidDiv">
					<?php if(isset($lencheck)) echo "<span class='required'>$lencheck</span>"; ?>
	                <?php if(isset($passcheck)) echo "<span class='required'>$passcheck</span>"; ?>
					<?php if(isset($regcheck)) echo "<span class='required'>$regcheck</span>"; ?>
					<!--<div id="baseDiv">-->
<span class="registerFormHead">Supply the necessary data below. Fields with the <span class="required">*</span> sign are required</span>

<div id="formDiv" style="position:absolute; left:220px; border:0px solid #000; width:800px; height:450px; margin-top:40px;">
<div id="tableDiv">
<form name="regform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

<table  border="0" width="550">
<tr>
<td width="200" style="text-align:right;">
<label for="firstname">First name:</label><span class="required">*</span>
</td>
<td width="300">
<input type="text" name="firstname" id="firstname" required value="<?php echo $firstname; ?>"/>

<?php echo "<span class='inputErr'>$firstnameErr</span>"; ?>

</td>

</tr>

<tr>
<td style="text-align:right;">
<label for="lastname">Last name:</label><span class="required">*</span>
</td>
<td>
<input type="text" name="lastname" id="lastname" required value="<?php echo $lastname; ?>" />
<?php echo "<span class='inputErr'>$lastnameErr</span>"; ?>
</td>

</tr>

<tr>
<td style="text-align:right;">
<label for="resadd">Residential Address:</label><span class="required">*</span>
</td>
<td>
<input type="text" name="resadd" id="resadd" required value="<?php echo $resadd; ?>"/>
<?php echo "<span class='inputErr'>$resaddErr</span>"; ?>
</td>

</tr>

<tr>
<td style="text-align:right;">
<label for="email">Email Address:</label><span class="required">*</span>
</td>
<td>
<input type="text" name="email" id="email" required value="<?php echo $email; ?>" />
<?php echo "<span class='inputErr'>$emailErr</span>"; ?>
</td>

</tr>
<tr>
<td style="text-align:right;">
<label for="phoneno">Phone Number:</label><span class="required">*</span>
</td>

<td>
<input type="text" name="phoneno" id="phoneno" required value="<?php echo $phoneno; ?>" />
<?php echo "<span class='inputErr'>$phonenoErr</span>"; ?>
</td>

</tr>

<tr>
<td style="text-align:right;">
<label for="user">User Name:</label><span class="required">*</span>
</td>
<td>
<input type="text" name="user" id="user" value="<?php echo $user; ?>" />
<?php echo "<span class='inputErr'>$userErr</span>"; ?>
</td>
</tr>

<tr>
<td style="text-align:right;">
<label for="pass">Password:</label><span class="required">*</span>
</td>
<td>
<input type="password" name="pass" id="pass" value="<?php echo $pass; ?>" />
<?php echo "<span class='inputErr'>$passErr</span>"; ?>
</td>

</tr>

<tr>
<td style="text-align:right;">
<label for="cpass">Confirm Password:</label><span class="required">*</span>
</td>
<td>
<input type="password" name="cpass" id="cpass" value="<?php echo $cpass; ?>" />
<?php echo "<span class='inputErr'>$cpassErr</span>"; ?>
</td>

</tr>

<tr>
<td style="text-align:right; padding-right:5px;"><b>Gender</b></td>
<td style="padding-left:10px;"><label for="christ">Male</label>
<input type="radio" name="gender" id="christ" value="male" <?php if(isset($faith) && $faith == "christian") echo "checked"; ?> /> 
<label for="nonchrist">Female</label>
<input type="radio" name="gender" id="nonchrist" value="female" <?php if(isset($faith) && $faith == "others") echo "checked"; ?> />
<?php echo "<span class='inputErr'>$faithErr</span>"; ?>

</td>

</tr>


<tr>
<td style="text-align:right;"><b>Upload Image</b><span class="required"></span></td>
<td><input type="file" name="uploadfile" class="moveleft"/>
<!--
<input type="submit" name="submit" value="Upload" class="moveleft"/>
-->
</td>

</tr>

<tr>
<td colspan="3">
<small><em><span class="required">*</span> <b>Acceptable image formats include: GIF, JPG/JPEG and PNG.</b></em></small>
</td>
</tr>

<tr>
<td><input type="submit" name="register" id="register" value="Register" class="move"></td>
<td><input type="reset" name="reset" id="reset" style="float:left;"></td>

</tr>
</table>

</form>
</div><!--tableDiv ends here-->


</div><!--formDiv ends here-->
<!--</div><!--baseDiv ends here-->

						
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