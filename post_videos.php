<?php
   $video_tempname = $video_size = ""; 
   include('connectDB.php');
   
   if(isset($_POST['post'])) 
   {
    $maxsize = 25242880; //25mb
	if(isset($_FILES['uploadfile']['name']))
	{
     $video_tempname = $_FILES['uploadfile']['name'];
	}
	$dir ='C:/xampp/htdocs/ImprovedBibleGuru/upload_videos/';
    $videoName = $dir . $video_tempname;
	$position = strpos($video_tempname, ".");
    $fileextension = substr($video_tempname, $position + 1);
    $fileextension = strtolower($fileextension);

	
	if(isset($_FILES['file']['size']))
	{
	  $video_size = $_FILES['file']['size'];
	}
	 if(($video_size >= $maxsize || $video_size == 0))
	 {
	   $filesizeerror = "File too large. File must be less than 5mb.";
	 }
	 elseif($fileextension !== "mp4" && $fileextension !== "ogg" && $fileextension !== "webm" && $fileextension !== "3gp" && $fileextension !== "mov" && $fileextension !== "mpeg" && $fileextension !== "avi")
	 {
	  $fileextensionerror = "The file extension must be .mp4, .ogg, .avi, .mov, .mpeg and .webm in order to be uploaded";
	 }
	 elseif($fileextension == "mp4" || $fileextension == "ogg" || $fileextension == "webm" || $fileextension == "3gp" || $fileextension == "mov" || $fileextension == "mpeg" || $fileextension == "avi")
	 {
	   //Upload
	   if(move_uploaded_file($_FILES['file']['tmp_name'], $videoName))
	   {
	     //Insert record
		 $query = "INSERT INTO videos(admin_video_name) VALUES('".$video_tempname."')";
		 mysqli_query($conn,$query);
		 echo "Upload successfully";
	   }
	 }
	
    
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
					<?php if(isset($filesizeerror)) echo $filesizeerror; if(isset($fileextensionerror)) echo $fileextensionerror; ?>
					<div id="formDiv" style="position:absolute; left:500px; top:100px;">
                    <form name="updateform"  action="" method="post" enctype="multipart/form-data">
					<p><h4 style="color:#0000ff;">Post your videos</h4></p>
                    <table cols="2" border="0" width="400">
                    <tr>
                    <td>
                    <label for="question">Video:</label>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input type="file" name="uploadfile" />
                    </td>
                    </tr>
                    <tr>
                    <td><input type="submit" name="post" id="post" value="Post" class="leftmove" /></td>
                       
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