# Updated: 2024-07-24
<?php
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>