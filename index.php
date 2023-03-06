<?php
session_start();
include('connectDB.php');


$sql = "SELECT admin_ques FROM questions"; 
$res = mysqli_query($conn,$sql);
$numRows = mysqli_num_rows($res);
$i = rand(0, $numRows);
$query = "SELECT admin_ques FROM questions where admin_ques_id = '".$i."'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$_SESSION['admin_ques'] = $row['admin_ques'];

$query = "SELECT first_name, last_name, scale FROM biblestudent, answers WHERE updated > DATE_SUB(NOW(), INTERVAL 4 DAY) AND biblestudent.student_id = answers.student_id ORDER BY scale DESC LIMIT 0, 9";
$result = mysqli_query($conn,$query);
mysqli_close($conn);
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
		  <script src="js/biblereading1.js"></script>
		  <script src="js/biblereading2.js"></script>
		<style>
			
		</style>
	</head>
	<body style="background-color:rgba(0, 0, 0, 0.03);">
		
		<section style="width:90%; margin:auto;">
			<div class="container-fluid" style="border:0px;">
				<div class="row">
					<div class="col-sm-12" style="height: 130px; position:relative;">
					
					<div id="logtableDiv">
                      <form name="logform"  action="login_check.php" method="post">
					   <table border="0" width="280">
                         <tr>
                         <td width="80">
                         <label for="user" class="move">Username:</label>
                         </td>
                         <td width="60">
                         <input type="text" name="user" id="user" required>
                         </td>
                         </tr>
                         <tr>
                         <td></td><td></td>
                         </tr>
                         <tr>
                         <td></td><td></td>
                         </tr>
                         <tr>
                         <td>
                         <label for="pass" class="move">Password:</label>
                         </td>
                         <td>
                         <input type="password" name="pass" id="pass" required>
                         </td>
                         </tr>
                         <tr>
                         <td colspan="2" class="tdmargins" class="butmargin"><span class="cap" class="leftmove">Already registered? </span><input type="submit" name="login" id="login" value="Login"></td>
                         </tr>
                         <tr><td colspan="2"><span class="cap">Not registered?</span>&nbsp;&nbsp;<a href="register_new.php">Register</a>&nbsp;&nbsp;<a href="contact.php">Contact us</a></td></tr>
                         </table>
						 <input type="hidden" name="myhidden" value=<?php if(isset($_SESSION['imagename'])) echo $_SESSION['imagename']; ?>>
                       </form>
                    </div>
				
					   <img src="images/biblegurufinal.png" style="margin-top:0px; "/>
						<!--<h1>BANNER IMAGE</h1>-->
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" style="border-right:0px;">
						<!--<h3>SIDE BAR 1</h3>-->
					<div id="up" class="divsides">
                      <div id="recent">RECENT RATINGS</div>	
					  <table style="margin-left:30px; marging-top:10px;">
					  <?php
                       while ($row = mysqli_fetch_assoc($result)) 
                       {
                      ?>
                      <tr>
                      <td style="text-align: left; padding-right: 5px; color:#ff0000; font-weight:bold;"><?php echo $row['first_name']; ?></td>
                      <td style="text-align: left; padding-right: 5px; color:#ff0000; font-weight:bold; "><?php echo $row['last_name']; ?></td>
                      <td style="text-align: left; color:#ff0000; font-weight:bold;"><?php echo $row['scale']; ?></td>
                      </tr>
                     <?php } ?>
                      </table>
					  </div>
                    <div id="down" class="divsides">
                     <img id="slide" src="images/another.png">
                     <div id="slides">
                      <img src="images/another.png">
                      <img src="images/bib.png">
                      <img src="images/bib2.png">
                      <img src="images/is.png">
                      <img src="images/images.png">
                     </div>
                     Have you searched the scriptures today?
                     If you haven't please find time today...
                     Go through these <a href="messages.php">verses</a> today
                    </div>
                    </div>
					<!--</div>-->
					<div class="col-sm-6" style="border-left:0px; border-right:0px;">
						<!--<h1>MAIN CONTENT</h1>-->
						<div id="quesDiv"><?php echo $_SESSION['admin_ques']; ?></div>
					 Welcome to TheBibleGuru.com the site where fundamental questions
                     on the christian faith are raised and answered. At the moment
                     you can participate in the question answering activity after
                     you have registered and logged in. Your clear answer 
                     will be very much appreciated. Answers will be rated on a scale
                     of one to ten or has determined by the site owner. A sample list of the ten high
					 scoring candidates are displayed top left of this page.It is intended to be from highest
					 scoring to the list scoring.But if all the ten ends up as high scoring then it's all good. 
                     Definitely everybody cannot make this list. So there's no need to feel slighted for not being among the ten.
                     The real goal is to learn and share the word. Your rating from your previous entry will
                     be displayed once you log in again...
                     Your timeliness and how precise your answer is in few words determine your rating...
					 For personal issues or questions 
                     you can click the <a href="contact.php">contact us </a>link.
                     If you get to this page with no question reflected in the top middle section. Please refresh this page...
                     You can email samoludipe@gmail.com for your messages, requests, comments
                     and personal questions.					 
					</div>
					<div class="col-sm-3" style="border-left:0px;">
						<!--<h3>SIDE BAR 2</h3>-->
					<div id="up">
					  
					  <img id="slide1" src="images/cry.jpg">
                     <div id="slides1">
                      <img src="images/cry.jpg">
                      <img src="images/encourage.jpg">
                      <img src="images/her.jpg">
                      <img src="images/light.jpg">
                      
                     </div>
					   
					    <?php
                       //$fetchVideos = mysqli_query($conn, "SELECT admin_video_name FROM videos ORDER BY admin_video_id DESC");
                       //while($row = mysqli_fetch_assoc($fetchVideos))
                       //{
                        //$videofile = $row['admin_video_name'];
                        //echo "<div>";
                        //echo "<video src='".$videofile."' controls width='303px' height='225px' >";
                        //echo "</div>";
                       //}
                       ?> 
					   
					   
					  
					</div><!--up div ends here-->
					<div id="down">
					  <img id="slide2" src="images/praiseThe.jpg">
                     <div id="slides2">
                      <img src="images/praiseThe.jpg">
                      <img src="images/shelter.jpg">
                      <img src="images/thelord.jpg">
                      <img src="images/zion.jpg">
					  <!--
					  <img src="images/cry.jpg">
                      <img src="images/encourage.jpg">
                      <img src="images/her.jpg">
                      <img src="images/light.jpg">
                      -->
                     </div>
					
					</div>
					</div>
				  
				</div>
				<div class="row">
					<div class="col-sm-12" style="background-color:#b85c90; padding:7px; text-align:center; border:1px;">
						<h5 style="color:white;">&copy; copyright 2019 Onyx Creative solutions</h5>
					</div>
				</div>
			</div>
		</section>


		
	</body>
</html>