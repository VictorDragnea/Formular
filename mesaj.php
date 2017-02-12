<!DOCTYPE html>

<html>
	<head>
		<title>Multumim!</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<div id="container">
			<div class="box">

<?php 
			######### VALIDARE DATE DIN POST #########
			
function validare ($data){
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

$nameErr = $emailErr = $msgErr= $uploadErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST['nume'])){
		$nameErr = "Nu ati introdus numele.";
	} else {
		$nume = validare($_POST['nume']);
		if(!preg_match("/^[a-zA-Z ]*$/",$nume)){
    		$nameErr = "Sunt permise 'decat' litere si spatii!";
    	}
	}
	
	if(empty($_POST['email'])){
		$emailErr = "Nu ati introdus o adresa de email.";
	} else {
		$email = validare($_POST['email']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr = "Formatul emailului introdus nu este corect.";
		}
	}
	
	if(empty($_POST['mesaj'])){
		$msgErr = "Nu ati introdus un mesaj.";
	} else {
		$mesaj = trim($_POST["mesaj"]);
	}
	
} 

#####  upload-ul de fisisere ######
$uploaddir='uploads/';
$uploadfile = $uploaddir . basename($_FILES['upload']['name']);
if($_FILES['upload']['size'] > 5000000){
	$uploadErr = "Fisiserul este mai mare de 5MB";
} else {
	move_uploaded_file($_FILES['upload']['tmp_name'],$uploadfile);
}

##############  aici se incheie validarea POSTului #############


		######## TRIMITERE MAIL CU 'PHPMAILER' SI AFISARE MESAJ  ##########
if(empty($nameErr) && empty($emailErr) && empty($msgErr) && empty($uploadErr)){
	
	 require 'PHPMailer-master\PHPMailerAutoload.php';
	$mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'dragneavictor@gmail.com';                 // SMTP username
	$mail->Password = 'vsgvi240';                           // SMTP password
	//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	
	$mail->setFrom($email, 'Mailer');
	$mail->addAddress('dragneavictor@gmail.com', 'Joe User');     // Add a recipient
	
	$mail->addAttachment($uploadfile);         // Add attachments
	$mail->addAttachment('uploads/', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'Mesaj de la '.$nume;
	$mail->Body    = $mesaj;
	$mail->AltBody = $mesaj;
	
	if(!$mail->send()) {
	echo 'Mesajul NU a fost trimis.'.'</br>';
	echo 'Eroare PHPMailer: ' . $mail->ErrorInfo;
	} else {
	echo 'Multumim pentru mesaj, '.$nume.'!';
	}
	
} else {
	echo $nameErr."</br>";
	echo $emailErr."</br>";
	echo $msgErr."</br>";
	echo $uploadErr;
	echo '<form><input type="button" value="Back" onClick="history.back();return true;"></form>';
}
   
?>

			</div>
		</div>
	</body>
</html>



