<?php
session_start();

$admin_ques = $_SESSION['admin_ques'];
$_SESSION['now'] = time();
include('connectDB.php');


function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//mysql_select_db('bibleguru', $db) or die(mysql_error($db));
$_SESSION['user'] = test_input($_POST['user']);
$_SESSION['pass'] = test_input($_POST['pass']);
$user_name = test_input($_POST['user']);
$pass_word = test_input($_POST['pass']);
  if($user_name == "" || $pass_word == "")
  {
    header('Location: http://localhost:4200/ImprovedBibleGuru/');
    echo "<span>Empty username or password</span>";
  }
  
  
 $sql = "SELECT * FROM biblestudent, answers where user_name = '".$user_name."' && pass_word = '".$pass_word."' && biblestudent.student_id = answers.student_id ORDER BY answer_id DESC LIMIT 0, 1 ";
 $sql2 = "SELECT * FROM biblestudent where user_name = '".$user_name."' && pass_word = '".$pass_word."'";
 $execute = mysqli_query($conn,$sql);
 $execute2 = mysqli_query($conn,$sql2);
 $row = mysqli_fetch_assoc($execute);
 $row2 = mysqli_fetch_assoc($execute2);
 if(mysqli_num_rows($execute2) == 0)
 {
   header('Location: http://localhost:4200/ImprovedBibleGuru/logfail.php');
 }
 else if($row2['user_name'] == "mainuser7" && $row2['pass_word'] == "access79#")
 {
   header('Location: http://localhost:4200/ImprovedBibleGuru/admin_ssl.php');
 }
 else
 {
   //echo "<span class='regres'>You have successfully logged in...</span>";
 }
   /*
 if(array_key_exists('submit',$_POST))
 {
   if($_SESSION['now'] - $_SESSION['later'] > 172800)
   {
     header('Location: http://localHost:8080/TheBibleGuru/timeframe.php');
	 exit;
   }
 }
*/

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
		  </style>
	</head>
	<body>
	 <?php
	 
     ?>	 
		<section style="width:91%; margin:auto;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12" style="height: 130px; position:relative;">
					<img src="images/biblegurufinal.png" style="margin-top:0px; "/>
					<img src="upload_images/<?php echo $row2['file_name']; ?>" class="imageDisplay" width="100px" height="100px">
                    <a href="index.php" class="backToAdmin">Back to home page</a>					
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:600px; position:relative;">
					<?php
					/*
                     $db = mysql_connect('localhost', 'root', 'root') or
                     die ('Unable to connect. Check your connection parameters.');
                     mysql_select_db('bibleguru', $db) or die(mysql_error($db));
                     $_SESSION['user'] = mysql_real_escape_string($_POST['user']);
                     $_SESSION['pass'] = mysql_real_escape_string($_POST['pass']);
                     $user_name = mysql_real_escape_string($_POST['user']);
                     $pass_word = mysql_real_escape_string($_POST['pass']);
  
  
                     if($user_name == "" || $pass_word == "")
                     {
                       header('Location: http://localHost:8080/TheBibleGuru/');
                       echo "<span>Empty username or password</span>";
                     }
  
  
                     $sql = "SELECT * FROM biblestudent where user_name = '".$user_name."' && pass_word = '".$pass_word."'";
                     $execute = mysql_query($sql);
                     $row = mysql_fetch_assoc($execute);
                     if(mysql_affected_rows() == 0)
                     {

                      header('Location: http://localHost:8080/TheBibleGuru/logfail.php');
                     }

                     else if($row['user_name'] == "themain7" && $row['pass_word'] == "opendoor7")
                     {
                       header('Location: http://localHost:8080/TheBibleGuru/admin.php');
                     }
                     else
                     {

                       echo "<span class='regres'>You have successfully logged in...</span>";

                     }
                     if(array_key_exists('submit',$_POST))
                     {
                      if($_SESSION['now'] - $_SESSION['later'] > 172800)
                       {
                        header('Location: http://localHost:8080/TheBibleGuru/timeframe.php');
	                    exit;
                       }
                     }
					*/
	
	                if(mysqli_num_rows($execute2) > 0)
                    {
	                 echo "<span class='regres'>You have successfully logged in " . $row['first_name'] . ' ' . $row['last_name']. "</span>";
					 echo " <span class='regres'>Your rating from your last answer on the " . $row['updated'] . " is:<br/> Assessment - " . $row['assess'] . " Scale - " . $row['scale'] . "</span>"; 
	                }
					mysqli_close($conn);
                   ?>
                   <h4 class="registerFormHead">Please supply your answer to the question you saw on the home page below in 100 characters<br/>Your timeliness and how precise you answer in few words determine your rating...</h4>
                    
                   
                   <div id="formDiv">
                   <div id="tableDiv">
                   <form name="regform"  action="submitQuestion.php" method="post">

                     <table border="0" width="400" cols="2">
                     <tr>
                     <td>
                     <label for="ques">Question:</label><span class="required">*</span>
                     </td>
                     </tr>
                     <tr>
                      <td>
                       <input type="text" name="ques" id="ques" value="<?php echo $admin_ques; ?>" style="width: 300px;">
                      </td>
                      </tr>
                       <tr>
                       <td>
                        <label for="answer">Answer:</label><span class="required">*</span>
						
                       </td>
                        <td>
                       </tr>
                        <tr>
                        <td>
                        <textarea name="answer" id="answer" cols="40" rows="10" required maxlength="100"></textarea>
                        </td>
                        </tr>
                         <tr>
                         <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" class="leftmove">
                         <input type="reset" name="reset" id="reset"></td>
                         </tr>
                      </table>
                     </form>             
					
						
					</div>
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