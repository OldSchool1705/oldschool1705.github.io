<?php


if(!empty($_POST)){

// error_reporting(-1);


$to = "<an1984tonn@ya.ru>";
$url = "<sait.ru>";


$request = $_POST;
$form_table = '';
$arr = array();

foreach ($request as $k => $v) {

    $arr[$k] = $v;
    if(trim(htmlspecialchars($v)) != ''){
        $form_table .= "
            <table>
                <tr>
                    <td style='padding: 10px; font-weight: 600; width:250px;text-align: right; padding-right: 30px;'>".
                        htmlspecialchars($k).":
                    </td>
                    <td style='padding: 10px; border: #000000 1px solid; background-color: #f8f8f8; width:500px;'>".
                        htmlspecialchars($v)."
                    </td>
                </tr>
            </table>
        ";
    }
}
    $subject = 'Новая заявка !!!';
    $message = $form_table;

  
    


/* telegram bot*/ 
  
// $token = "1315691723:AAFZBj1RU4FMWbmkGcP4VySqYJ_BP2IAXjQ";
// $chat_id = "400476763";

// $coords = trim($url, '<>');
// $txt = 'Сайт - '.$coords."%0A";
// foreach($arr as $key => $value) {
//     $txt .= "<b>".$key."</b> ".$value."%0A";
//   };
// $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");






/* Для отправки HTML-почты вы можете установить шапку Content-type. */
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=\"utf-8\"\r\n";
$headers .= 'From: MediaRama-info@yandex.by' . "\r\n" .
            'Reply-To: MediaRama-info@yandex.by' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

/* дополнительные шапки */
$headers .= "From: Заявка с сайта $url\r\n";
// $headers .= "Cc: an1984tonn@ya.ru\r\n";
//$headers .= "Bcc: an1984tonn@ya.ru\r\n";

/* и теперь отправим из */

mail($to, $subject, $message, $headers);
echo '<h2 class="h2">Ваша заявка принята !!!</h2>';
}
else{ 
    echo '<h2 class="h2">Ошибка отправки. Попробуйте позже...</h2>';
}