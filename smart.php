<?php 

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$site = $_POST['user_site'];
$message = $_POST['user_message'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mamiha2009@mail.ru';                 // Наш логин
$mail->Password = '280205';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('mamiha2009@mail.ru', 'Marina Vyrysheva');   // От кого письмо 
$mail->addAddress('mamiha2007@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Виртуальная реальность';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	E-mail: ' . $email . ' <br>
	Телефон: ' . $phone . ' <br>
	Сайт: ' . $site . ' <br>
	Сообщение: ' . $message . '';
$mail->AltBody = 'Это альтернативный текст';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
//Если отправка прошла успешно, переводим пользователя на указанный url
 	Header("Location: http://myverstka-html.ru/VR-box-2.ru/thank.html");
}

?>