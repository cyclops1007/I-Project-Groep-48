<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 8-5-2018
 * Time: 09:50
 */

require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer(true);

// Send mail using Gmail
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "eenmaalandermaal2018@gmail.com"; // GMAIL username
    $mail->Password = "nuggetlover1!"; // GMAIL password

// Typical mail data
$mail->AddAddress('eenmaalandermaal2018@gmail.com'); //to
$mail->SetFrom('eenmaalandermaal2018@gmail.com'); //send from
$mail->Subject = "Signup | verification"; //title
$mail->Body = "Thanks for signing up!
                please click this link to activate your account:
                http://localhost/php/website/Website/EenmaalAndermaal/Geverifieerd.php?email='.$mail'
"; //contents



try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    // Something went bad
    echo "Fail :(";
}


?>