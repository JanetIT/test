<!DOCTYPE html>
<html>
	<head>
		<title>Contacts</title>
		<link rel="stylesheet" href="new_style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

<?php
require 'connection.php';$conn = Connect();

$name = $tel = $email = $subject = $message = "";
$nameErr = $telErr = $emailErr = $subjectErr = $messageErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = " ";
	echo '<style> 
	#nameerr {color: red;} 
	</style>';
  } else {
    $name = $conn -> real_escape_string($_POST['name']);
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only latin letters and white space allowed";
  }
  }
  if (empty($_POST["tel"])) {
    $telErr = " ";
	  echo '<style>
    #telerr {color: red;}
        </style>';
  } else {
    $tel = $conn -> real_escape_string($_POST["tel"]);
	if (!preg_match("/^[0-9 ]*$/",$tel)) {
      $telErr = "Only numbers and white space allowed";
  }
  }
  if (empty($_POST["email"])) {
    $emailErr = " ";
	  echo '<style>
    #emailerr {color: red;}
        </style>';
  } else {
    $email = $conn -> real_escape_string($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  }
   if (empty($_POST["subject"])) {
    $subject = "";
  } else {
   $subject = $conn -> real_escape_string($_POST["subject"]);
  }
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = $conn -> real_escape_string($_POST["message"]);
  }
  if ($nameErr != "" || $telErr != "" || $emailErr != "" || $subjectErr != "" || $messageErr != "") {
  	echo '<style>
  	.herror {display:block;}
  	</style>';
  } else {
  	$query = "INSERT into dataj (d_name,d_tel,d_email,d_subject,d_message) VALUES('" . $name . "','" . $tel . "','" . $email . "','" . $subject . "','" . $message . "')";
    $success = $conn -> query($query);
    if (!$success) {
	die("Couldn't enter data: " . $conn -> error);
    } 
    $conn -> close();
    $name = $tel = $email = $subject = $message = "";
    echo '<style>
  	.success {display:block;}
  	</style>';
}
}

?>
		<div id="frame">
			<div class="herror"> 
				<h1><strong>There was a problem with your submission.</strong></h1>
				<p>Errors have been <span>highlighted </span>below</p>
			</div>
			<div class="success"> 
				<h1><strong>Your message has been successfully sent!</strong></h1>
			</div>
			
			<h2 id="head">CONTACT US</h2>
			<p class="outtext ast"> <span id="asterisk">* </span>Asterisk fields are required</p>
			
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p class="outtext" id="nameerr"><span id="asterisk">* </span>Enter your name:</p>
			<input class="fields" type="text" name="name" placeholder="Name"
			 value="<?php echo $name;?>" <?php if ($nameErr != ""){echo 'style="border-color:#ff1a1a"';} ?>>
			<span class="error"><?php echo $nameErr;?></span><br>
			
			<p class="outtext" id="telerr"><span id="asterisk">* </span>Enter your phone number:</p>
			<input class="fields" type="text" name="tel" placeholder="Phone"
			 value="<?php echo $tel;?>" <?php if ($telErr != ""){echo 'style="border-color:#ff1a1a"';} ?>>
			<span class="error"><?php echo $telErr;?></span><br>
			
			<p class="outtext" id="emailerr"><span id="asterisk">* </span>Enter your email:</p>
			<input class="fields" type="email" name="email" placeholder="Email"
			 value="<?php echo $email;?>" <?php if ($emailErr != ""){echo 'style="border-color:#ff1a1a"';} ?>>
			<span class="error"><?php echo $emailErr;?></span><br>
			
			<p class="outtext">Subject:</p>
			<select class="subj" name="subject">
				<option value="order" <?php if ($subject=="order") {echo "selected";}?>>Order</option>
				<option value="support" <?php if ($subject=="support") {echo "selected";}?>>Support</option>
				<option value="query" <?php if ($subject=="query") {echo "selected";}?>>Query</option>
				<option value="other" <?php if ($subject=="other") {echo "selected";}?>>Other</option>
			</select><br>
			
			<p class="outtext">Your message:</p>
			<textarea class="fields message" name="message" placeholder="... Message"><?php echo $message;?></textarea><br>
			
			<input class="submit" type="submit" name"submit" value="SEND">
		</form>
		</div>		
	</body>
</html>
