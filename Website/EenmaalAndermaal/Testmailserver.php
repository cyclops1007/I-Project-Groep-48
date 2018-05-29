<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 8-5-2018
 * Time: 09:50
 */

require('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();

// Send mail using Gmail
    //$mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the server
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "eenmaalandermaal2018@gmail.com"; // GMAIL username
    $mail->Password = "nuggetlover1!"; // GMAIL password

/*
// Typical mail data
$mail->SetFrom('eenmaalandermaal2018@gmail.com'); //send from
$mail->AddAddress('emerson_martina@yahoo.com'); //to
$mail->Subject = "Test"; //title
$mail->Body = "Thanks for signing up!"; //contents

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    // Something went bad
    echo $e;
}
*/




?>