<?php
   include('connectDB.php');
   
   $question = ''; 
   if(isset($_POST['question'])) 
   {
     $question = htmlspecialchars($_POST["question"]);
   }
   if($question != '')
   {
   $query = 'INSERT INTO questions(admin_ques)
             VALUES("'. $question .'")';
	
   $result = mysqli_query($conn, $query);
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
					<div class="col-sm-12" style="height: 130px; position:relative;">
					<img src="images/biblegurufinal.png" style="margin-top:0px; "/>
					<a href="admin_ssl.php" class="backToAdmin">Back to admin page</a>
					<a href="index.php" class="backToHome">Back to home page</a>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:500px; position:relative;">
					
					<div id="formDiv" style="position:absolute; left:500px; top:100px;">
                    <form name="updateform"  action="" method="post">
					<p><h4 style="color:#0000ff;">Post your questions</h4></p>
                    <table cols="2" border="0" width="400">
                    <tr>
                    <td>
                    <label for="question">Question:</label>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <textarea name="question" id="question" cols="30" rows="8" required /></textarea>
                    </td>
                    </tr>
                    <tr>
                    <td><input type="submit" name="post" id="post" value="Post" class="leftmove" />
                       <input type="reset" name="reset" id="reset" /></td>
                    </tr>
                   </table>
                   </form>
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