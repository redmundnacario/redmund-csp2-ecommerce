<?php
/*Setup PHPMailer*/
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}

require_once("configuration.php");

$mail = new PHPMailer();

$emailBody = '<div><p>Hi '.$first_name . ',</p><p>Please take note of your reference code: <strong>' .$ref_num.'</strong></p><br><p>Best regards,</p><p>Honeyken</p></div>';

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;

$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($email);
$mail->Subject = "Your transaction with Honeyken";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);