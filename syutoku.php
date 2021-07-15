<?php
include 'db_config.php';
$baito = array();


try {
    // connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //最新の情報


    $stmt = $db->query("SELECT * FROM `info` WHERE 1 ");
    //場所込みのSELECT文。
    //SELECT image_path,auth,datetime FROM `swan_image` WHERE `auth`!=-1 AND `datetime` BETWEEN '2021-4-12' AND '2021-4-14' AND location_id='0'

    $baito = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

$baito_json = json_encode($baito, JSON_UNESCAPED_SLASHES);
echo $baito_json;
