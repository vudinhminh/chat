<?php
include_once 'config.php';
include_once 'model/m_database.php';
session_start();
$tendangnhap = $_POST['txtTenDangNhap'];
$matkhau = $_POST['txtMatKhau'];
$login = new M_database();
$login->Login($tendangnhap,$matkhau);