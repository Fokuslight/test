<?php 

$db = @mysqli_connect('localhost', 'root', '', 'users') or die('Ошибка соединения с БД');
mysqli_set_charset($db, "utf8") or die('Не установлена кодировка');