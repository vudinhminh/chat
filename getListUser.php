<?php

include_once 'config.php';
include_once 'model/m_database.php';
session_start();
$database      = new M_database();
$fkUserSend = $_SESSION['user_chat']['id'];

$where    = ' where id <> ' . $_SESSION['user_chat']['id'];
$listUser = $database->GetAllQuery($sql);

header('Content-Type: application/json');
echo json_encode($listUser);
http_response_code(200);
