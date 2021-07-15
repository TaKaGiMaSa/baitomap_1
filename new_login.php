<?php

include 'db_config.php';
$json = file_get_contents('php://input');
$data = json_decode($json, true);
var_dump($data);
try {
    // connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
$user_id = $data[0];
$pass = $data[1];

$sqls = "INSERT INTO `manage`( `user_id`, `password`) VALUES ('$user_id','$pass')";
$stmt = $db->exec($sqls);



$db = null;
