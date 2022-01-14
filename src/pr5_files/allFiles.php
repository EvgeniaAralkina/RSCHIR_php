<?php

session_start();

require_once '/var/www/html/changeOfContent.php';
contentСoordination();

sayHi();

	$mysqli = new mysqli("db", "root2", "passw", "auth_DB");

	$result = $mysqli->query("SELECT id, name FROM files");

	foreach ($result as $row){

		echo "<a href=\"showFile.php?id={$row['id']}\" target=\"_blank\"> {$row['name']} </a>" . "<br>";

	}

	echo "
	<font color=\"{$_SESSION['font']}\">
	<br> 
		<p>
		<a href=\"../pr5_files/uploadFile.php\">Добавить файл</a>
		<br>
		<a href=\"../index.html\">Вернуться на домашнюю страницу</a>
		</p>
		</font>";
?>