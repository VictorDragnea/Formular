<?php 

require 'PHPMailer-master\PHPMailerAutoload.php';

$nume = $_POST['nume'];
$email = $_POST['email'];
$mesaj = $_POST['mesaj'];
$upload = $_POST['upload'];

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
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment($upload, "fisierul meu uploadat");         // Add attachments
$mail->addAttachment($upload, 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Mesaj de la '.$email;
$mail->Body    = $mesaj;
$mail->AltBody = $mesaj;

if(!$mail->send()) {
    echo 'Mesajul NU a fost trimis.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Multumim pentru mesaj, '.$nume.'!';
}


 
?>