# Updated: 2016-10-17
<?php
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>