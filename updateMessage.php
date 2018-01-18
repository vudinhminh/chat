<?php

include_once 'config.php';
include_once 'model/m_database.php';
session_start();
$database      = new M_database();
$fkUserSend = $_SESSION['user_chat']['id'];
$fkUserReceive = $_POST['fkUserReceive'];
$message      = $_POST['message'];
$database->InsertMessage($fkUserSend, $fkUserReceive, $message);