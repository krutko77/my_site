<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	// Настройки вашей почты
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'ssl://smtp.yandex.ru';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'webkrutko@yandex.by';                     //SMTP username
	$mail->Password   = 'Certina77';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;    

	//От кого письмо
	$mail->setFrom('webkrutko@yandex.by', 'Cайт по разработки сайтов'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('webkrutko@mail.ru'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Привет! Это запрос с сайта по разработки сайтов';
	
	//Домен
	$domain = "нужен";
	if($_POST['domain'] == "no"){
		$domain = "не нужен";
	}
	
	//Хостинг
	$hosting = "нужен";
	if($POST['hosting'] == "no"){
		$hosting = "не нужен";
	}

	//Тело письма
	$body = '<h1>Встречайте супер письмо!</h1>';

   if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';      
	}

   if(trim(!empty($_POST['email']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';      
	}

	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';      
	}	
	
	if(trim(!empty($_POST['domain']))){
		$body.='<p><strong>Домен:</strong> '.$domain.'</p>';      
	}

	if(trim(!empty($_POST['hosting']))){
		$body.='<p><strong>Хостинг:</strong> '.$hosting.'</p>';      
	}	
	
	/*
	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>