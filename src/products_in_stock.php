<?php

session_start();

require_once 'changeOfContent.php';

contentСoordination();
sayHi();

echo "
<html lang=\"en\">
<head>
<title>товары</title>
</head>
<body bgcolor=\"{$_SESSION['bgcolor']}\">
<font color=\"{$_SESSION['font']}\">
<h1>Товары в наличии</h1>
";


$mysqli = new mysqli("db", "root2", "passw", "auth_DB");

$result = $mysqli->query("SELECT * FROM products");

foreach ($result as $row){
	if ($row['amount']!=0){
    	echo ("{$row['name']}" . " цена: " . "{$row['price']}" . " руб, осталось: " . "{$row['amount']}" . " штук<br/>");
}
}
?>
</font>
</body>
</html>