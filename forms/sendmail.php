<?php
namespace Sj\Portfolio;
//Import PHPMailer classes into the global namespace

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
 
require_once ('..\vendor\autoload.php');
 
$mail = new PHPMailer(true);

// $email=$_POST['email'];
// $name=$_POST['name'];
// $subject=$_POST['subject'];
// $message=$_POST['message'];
// $body=$_POST['message'];

$mail->isSMTP();    
$mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
$mail->SMTPAuth = true;
$mail->CharSet = "utf-8";
$mail->Username = 'jacquesstephan10@gmail.com';   //username
$mail->Password = 'watibigali100';   //password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('jacquesstephan100@gmail.com', 'Stephen');

$mail->isHTML(true);
 
$mail->Subject = $_POST['subject'];
$mail->Body = '<strong> Votre mail est'.$_POST['email'].'</strong> <br/> <p/>'.$_POST['message'];

if(!$mail->Send()) { //Teste si le return code est ok. 
    echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7) 
}else{      
    echo'Votre mail a bien été envoyé !';
// header( "Location: ../" );
$mail->SmtpClose();
}



?>