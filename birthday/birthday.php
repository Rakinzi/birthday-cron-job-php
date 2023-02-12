<?php
include "config.php";
$date = date('Y-m-d');
$sql = "SELECT * FROM users where DATE_FORMAT(birthday,'%m-%d' )= DATE_FORMAT('$date','%m-%d')";
$result = $link->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    sendEmail($email, $msg, $row['username'] , $smtp , "User");
} 

// This function allows the email for the user to be sent.
function sendEmail($email, $msg, $name, $smtp, $username)
{
    require_once 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $smtp; // use smtp.example.com
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587 || 465;
    $mail->isHTML(true);
    $mail->setFrom($username, "test");
    $mail->addAddress($email, '');
    $mail->Subject = 'WISHING '.strtoupper($name).' HAPPY BIRTHDAY ';
    $mail->Body    = $msg;
    $mail->send();
}