# Updated: 2016-02-25
<?php
header('Content-Type: application/json');
$data = ['status' => 'ok', 'version' => '1.0'];
echo json_encode($data);
?>