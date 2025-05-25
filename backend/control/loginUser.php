<?php
session_start();

include_once('../config/database.php');
include_once('../dbcontrol/dblogin.php');

$connectDB = new Database();
$db = $connectDB->getConnection();

$loginUser = new Dblogin($db);

if (isset($_POST["signin"])) {
    $employeeid = $_POST["employeeid"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];

    if(empty($employeeid) || empty($fullname) || empty($password)){
        $_SESSION['error'] = "กรอกข้อมูลไม่ครบ";
        header("Location: ../../index.php");
        exit();
    }

    if ($loginUser->login($employeeid, $fullname, $password)) {
        header("Location: ../../showleave.php");
        exit();
    } else {
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = "เข้าสู่ระบบไม่สำเร็จ"; // fallback message
        }
        header("Location: ../../index.php");
        exit();
    }

}
