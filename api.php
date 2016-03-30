# Updated: 2016-03-30
<?php
header('Content-Type: application/json');
$data = ['status' => 'ok', 'version' => '1.0'];
echo json_encode($data);
?>