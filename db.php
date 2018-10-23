# Updated: 2018-10-23
<?php
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>