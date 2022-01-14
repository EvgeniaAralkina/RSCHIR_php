<?php
session_start();


require_once '/var/www/html/changeOfContent.php';
contentСoordination();

sayHi();


echo "

<html>
<head>
	<meta charset=\"utf-8\">
</head>
<body>
<font color=\"{$_SESSION['font']}\">
	<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
	<form enctype=\"multipart/form-data\" action=\"submit.php\" method=\"POST\">
	    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
	    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"16777210\" />
	    <!-- Название элемента input определяет имя в массиве $_FILES -->
	    <p> Выберите файл, чтобы отправить его не сервер <p>
	    <p><input name=\"pdf_file\" type=\"file\" /> </p>
	    <input type=\"submit\" value=\"Отправить файл\" />
	</form>

	<p> <a href=\"../pr5_files/allFiles.php\">Посмотреть все файлы</a> 
	<br>
		<a href=\"../index.html\">Вернуться на домашнюю страницу</a>
	</p>
	</font>
</body>
</html>
";