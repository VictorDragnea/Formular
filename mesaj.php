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

require 'PHPMailer-master\PHPMailerAutoload.php';

//print_r($_POST);

$nume = ucfirst($_POST['nume']);
$email = $_POST['email'];
$mesaj = $_POST['mesaj'];


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
$mail->addAddress('vdragneavictor@gmail.com', 'Joe User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');


$uploaddir='uploads/';
$uploadfile = $uploaddir . basename($_FILES['upload']['name']);
move_uploaded_file($_FILES['upload']['tmp_name'],$uploadfile);

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

?>
			</div>
		</div>
	</body>
</html>