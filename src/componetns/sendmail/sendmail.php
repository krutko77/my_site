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
	
		
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'mailbe05.hoster.by';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'postmaster@webkrutko.by';                     //SMTP username
	$mail->Password   = 'certina77';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	
	
	//От кого письмо
	$mail->setFrom('postmaster@webkrutko.by', 'Cайт по разработке.'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('webkrutko@mail.ru'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Привет! Это запрос с сайта по разработке.';

	//Типы сайтов
	$siteType = "лендинг";
	if($_POST['siteType'] == "businessСard"){
		$siteType = "сайт-визитка";
	}

	if($_POST['siteType'] == "multiPageSite"){
		$siteType = "многостраничный сайт";
	}
	
	if($_POST['siteType'] == "blog"){
		$siteType = "тематический сайт-блог";
	}

	if($_POST['siteType'] == "other"){
		$siteType = "другое";
	}

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

	if(trim(!empty($_POST['nameCompany']))){
		$body.='<p><strong>Название компании:</strong> '.$_POST['nameCompany'].'</p>';      
	}

	if(trim(!empty($_POST['tel']))){
		$body.='<p><strong>Телефон или мессенджер:</strong> '.$_POST['tel'].'</p>';      
	}

   if(trim(!empty($_POST['email']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';      
	}

	if(trim(!empty($_POST['siteType']))){
		$body.='<p><strong>Тип сайта:</strong> '.$siteType.'</p>';      
	}

	if(trim(!empty($_POST['theme']))){
		$body.='<p><strong>Тематика сайта:</strong> '.$_POST['theme'].'</p>';      
	}

	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Задачи сайта:</strong> '.$_POST['message'].'</p>';      
	}

	if(trim(!empty($_POST['region']))){
		$body.='<p><strong>Регион:</strong> '.$_POST['region'].'</p>';      
	}	

	if(trim(!empty($_POST['site']))){
		$body.='<p><strong>Есть ли сайт:</strong> '.$_POST['site'].'</p>';      
	}
		
	if(trim(!empty($_POST['logo']))){
		$body.='<p><strong>Фирменный шрифт, цвета, логотип:</strong> '.$_POST['logo'].'</p>';      
	}

	if(trim(!empty($_POST['design']))){
		$body.='<p><strong>Пожелания по дизайну сайта:</strong> '.$_POST['design'].'</p>';      
	}

	if(trim(!empty($_POST['links']))){
		$body.='<p><strong>Ссылки на сайты, которые нравятся:</strong> '.$_POST['links'].'</p>';      
	}

	if(trim(!empty($_POST['content']))){
		$body.='<p><strong>Есть ли готовые фото/видео и статьи для сайта:</strong> '.$_POST['content'].'</p>';      
	}

	if(trim(!empty($_POST['term']))){
		$body.='<p><strong>Желаемый срок разработки сайта:</strong> '.$_POST['term'].'</p>';      
	}

	if(trim(!empty($_POST['info']))){
		$body.='<p><strong>Полезная информация:</strong> '.$_POST['info'].'</p>';      
	}

	if(trim(!empty($_POST['domain']))){
		$body.='<p><strong>Домен:</strong> '.$domain.'</p>';      
	}

	if(trim(!empty($_POST['hosting']))){
		$body.='<p><strong>Хостинг:</strong> '.$hosting.'</p>';      
	}	
	
	// Проверка на бота
	if ($_POST['code'] != 'NOSPAM') {
		exit;
		}

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