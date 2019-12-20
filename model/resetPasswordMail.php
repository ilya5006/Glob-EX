<?php
$to = "mrreads@yandex.com";

$subject = "тема";

$txt = "текст!";

$headers = "From: help@vsekanc.ru" . "\r\n" .
"CC: help@vsekanc.ru";

mail($to, $subject, $txt, $headers);