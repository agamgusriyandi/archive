# Updated: 2016-01-29
<?php
header('Content-Type: application/json');
$data = ['status' => 'ok', 'version' => '1.0'];
echo json_encode($data);
?>