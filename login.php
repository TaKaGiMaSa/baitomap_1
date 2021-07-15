<?php
include 'db_config.php';
$data = array();


try {
    // connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->query("SELECT * FROM `manage` WHERE 1");

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $db = null;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

$login_json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $login_json;
