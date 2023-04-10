<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

require_once('phpmailer/PHPMailerAutoload.php');


$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'basket128@gmail.com';                 // Наш логин
$mail->Password = 'jttvqzykdqmmvzap';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('basket128@gmail.com', 'october-home');   // От кого письмо 
$mail->addAddress('plush.m@inbox.ru');     // Add a recipient
$mail->addAddress('msk1@deltamsk.ru');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Запрос на прайс от '. $name ;
$mail->Body    = '
		Пользователь оставил данные <br> <br> 
	Имя: <strong>' . $name . '</strong> <br><br> 
	Номер телефона: <strong>' . $phone . '</strong><br><br> 
	E-mail: <strong>' . $email . '</strong>';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>