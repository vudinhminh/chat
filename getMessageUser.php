<?php

include_once 'config.php';
include_once 'model/m_database.php';
session_start();
$database      = new M_database();
$fkUserSend = $_SESSION['user_chat']['id'];
$fkUserReceive = $_GET['fkUserReceive'];
$pageSize      = $_GET['pageSize'];
$page          = $_GET['page'];
$offset = ($page - 1)*$pageSize;
$sql         = "select fk_user_send as fkUserSend, fk_user_receive as fkUserReceive, content as message  from messages "
        . "where (fk_user_send = $fkUserSend AND fk_user_receive = $fkUserReceive) OR (fk_user_receive = $fkUserSend AND fk_user_send = $fkUserReceive)  order by create_date ASC limit $offset,$pageSize" ;

$listUser      = $database->GetAllQuery($sql);
header('Content-Type: application/json');
echo json_encode($listUser);
http_response_code(200);
