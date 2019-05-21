<?php
$headers ="From: talear.com <martplanet@gmail.com>\r\nContent-type:text/html;charset=utf-8\r\n";
$to = 'flashe698@gmail.com';

if(isset($_POST) && $_POST) {
    $message = 'Новое сообщение <br> От --' . $_POST['firstName'] . '-- <br> Телефон --' . $_POST['phone'] . '-- <br> E-mail --' . $_POST['myEmail'] . '-- <br> Сообщение --' . $_POST['massage'] . '-- <br> Город --' . $_POST['city'] . '-- <br> Отзыв --' . $_POST['reviews'] . '-- <br> Продукт --' . $_POST['tale'] . '-- <br> Количество штук --' . $_POST['productQuantity'] . '-- <br> Общая сумма --' . $_POST['totalPrice'];
    if(mail($to,"Письмо из лендинга Hairdorables.com ",$message,$headers)) {
        echo 1;
        die;
    }
}
else {
    return false;
}
