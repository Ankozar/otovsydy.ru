<?php
if(isset($_POST['g-recaptcha'])) {
    $captcha = $_POST['g-recaptcha'];
};
$secretkey = '6LeQWSkaAAAAAIu_R3FTZsgQL90ANjj_FcjmkK_I';
$ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$captcha;

$context  = stream_context_create($opts);
$response = file_get_contents($url);
$responsekeys = json_decode($response);

if($responsekeys->success && $responsekeys->score >= 0.5) {
        $to = "ankozar@mail.ru"; // емайл получателя данных из формы
        $title = "Форма обратной связи"; // тема полученного емайла
        $message = "Ваше имя: ".$_POST['userName']."<br>";//присвоить переменной значение, полученное из формы name=name
        $message .= "E-mail: ".$_POST['userMail']."<br>"; //полученное из формы name=email
        // $message .= "Номер телефона: ".$_POST['userMessage']."<br>"; //полученное из формы name=phone
        $message .= "Сообщение: ".$_POST['userMessage']."<br>"; //полученное из формы name=message
        $headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
        mail($to, $title, $message, $headers); //отправляет получателю на емайл значения переменных
        echo $responsekeys->success;
};


?>