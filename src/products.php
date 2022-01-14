<?php
session_start();

require_once 'changeOfContent.php';
contentСoordination();

sayHi();


echo "
<html lang=\"ru\">
<head>
<title>товары</title>

<style type=\"text/css\">

  body { color: \"{$_SESSION['bgcolor']}\"; }

</style>

</head>
<body >
<font color=\"{$_SESSION['font']}\">
<h1>Все товары</h1>
";

echo $_SESSION['acceptLanguage'];

$mysqli = new mysqli("db", "root2", "passw", "auth_DB");

$result = $mysqli->query("SELECT * FROM products");

foreach ($result as $row){
    echo ("{$row['name']}" . " цена: " . "{$row['price']}" . " руб, осталось: " . "{$row['amount']}" . " штук<br/>");
}
?>

</font>
</body>
</html>