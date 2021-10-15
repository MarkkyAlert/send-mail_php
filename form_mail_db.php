<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


header('Content-Type: text/html; charset=utf-8');

$txtname = $_POST['txtname'];
$email = $_POST['email'];
$txtarea = $_POST['txtarea'];

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

// ต้องขอการเข้าถึงจาก google ที่ https://www.google.com/settings/security/lesssecureapps

$mail->Username = "puettipong.o@gmail.com";
$mail->Password = "Appleid13";
$mail->setFrom("puettipong.o@gmail.com", "MARKPRUET");
$mail->addAddress($email);
$mail->Subject = "มีข้อความจากหน้าเว็บไซต์";
$email_content = '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>ข้อความจากคุณ :' . $txtname . '</p>
    <p>อีเมล์ลูกค้า : </p>
    <br>
    <textarea cols="30" rows="10">'
        .$txtarea.
    '</textarea>
</body>
</html>
';

$email_receiver = $email;

if ($email_receiver) {
    $mail->msgHTML($email_content);

    if (!$mail->send()) {
        echo "<h3 class='text-center'>ระบบมีปัญหา</h3>";
        echo $mail->ErrorInfo;
    }
    else {
        echo "ระบบส่งเรียบร้อย";
    }
}
?>
