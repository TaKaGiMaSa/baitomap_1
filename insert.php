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
$name = $data[0];
$longitude = $data[5];
$latitude = $data[6];
$money = $data[1];
$work = $data[2];
$work_time = $data[3];
$phone = $data[4];
$sqls = "INSERT INTO `info`(`name`, `longitude`, `latitude`, `money`, `work`, `work_time`, `phone`) VALUES ('$name',$longitude,$latitude,$money,'$work','$work_time','$phone')";
$stmt = $db->exec($sqls);



$db = null;
