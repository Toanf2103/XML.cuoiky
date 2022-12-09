<?php
$time = 60 * 60 * 24 * 7;
session_set_cookie_params($time, '/');
session_start();

include('xu_ly.php');
include('connect.php');

$action = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';

switch ($action) {
    case 'xu-ly-dang-nhap':
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];
        $check = checkLogin($email, $pass);

        if ($check) {
            $_SESSION['id'] = $check;
            header("Location: .");
        } else {
            header("Location: .?error=true");
        }
        break;

    case 'logout':
        session_destroy();
        header("Location: .");
        break;
    case 'xuatXml':
        xuatXMLSp();
        break;
    case 'xuatXmlLoai':
        xuatXMLLoai();
        break;
    default:
        if (empty($_SESSION['id']))
            include('view/dangnhap.php');
        else
            include('view/quanly.php');
        break;
}
?>