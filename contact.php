<?php
if(array_key_exists('submit', $_POST))
{
 $to = htmlspecialchars($_POST['to']);
 $from = htmlspecialchars($_POST['from']);
 $subject = htmlspecialchars($_POST['subject']);
 $mess = htmlspecialchars($_POST['message']);
 $headers = 'From: ' . $from . "\r\n";
 
 $message = "To: $to\n\n";
 $message .= "From: $from\n\n";
 $message .= "Subject: $subject";
 $message .="Message: $mess";
 $message = wordwrap($message, 70);
 $mailSent = mail($to, $subject, $message, $headers);
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
	<?php
    if ($_POST && !$mailSent) 
	{
	  header('Location: http://localHost:4200/ImprovedBibleGuru/mail_fail.php');
	}
	elseif ($_POST && $mailSent)
	{
	  header('Location: http://localHost:4200/ImprovedBibleGuru/mail_suc.php');
	}
	/*
    ?>
    <p class="warning">Sorry, there was a problem sending your message.Please try later.</p>
    <?php
     }
     elseif ($_POST && $mailSent) 
	 {
    ?>
    <p><strong>Your message has been sent. Thank you for your feedback.</strong></p>
    <?php 
	 
	 }
     */	 
	 ?>
		
		<section style="width:91%; margin:auto;">
			<div class="container">
				<div class="row" style="">
				 
					<div class="col-sm-12" style="height: 130px; ">
					
					<img src="images/biblegurufinal.png" style="margin-top:0px; position:relative;" />
					<a href="index.php" class="backToHome">Back to home page</a>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12" style="height:500px; position:relative;">
					
					<h4 style="text-align:center; color:#0000ff;">Send your message,requests,comments and personal questions we'll do our best to contact you</h4>
<div id="formDiv" style="position:absolute; left:500px; top:-40px;">
<div id="tableDiv">
<form name="regform"  action="" method="post">

<table border="0" width="400" cols="2">

<tr>
<td>
<label for="to">To:</label><span class="required">*</span>
</td>
</tr>
<tr>
<td>
<input type="text" name="to" id="to" style="width: 225px;" required >
</td>
</tr>

<tr>
<td>
<label for="from">From:</label><span class="required">*</span>
</td>
</tr>
<tr>
<td>
<input type="text" name="from" id="from" style="width: 225px;" required>
</td>
</tr>

<tr>
<td>
<label for="subject">Subject:</label><span class="required">*</span>
</td>
</tr>
<tr>
<td>
<input type="text" name="subject" id="subject" style="width: 225px;" required>
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
					<div class="col-sm-12" style="background-color:#b85c90; padding:7px; text-align:center; border:0px;">
						<!--<h1>FOOTER</h1>-->
						<h5 style="color:white;">&copy; copyright 2019 Onyx Creative solutions</h5>
					</div>
				</div>
			</div>
		</section>


		
	</body>
</html>