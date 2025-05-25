<?php
session_start();

include_once('../config/database.php');
include_once('../dbcontrol/dbregister.php');

$connectDB = new Database();
$db = $connectDB->getConnection(); 

$addUser = new Dbregister($db);

if(isset($_POST["signup"])){

    $employeeid = $_POST["employeeid"];
    $fullname = $_POST["fullname"];
    $managerid = $_POST["managerid"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];

    if(empty($employeeid) || empty($fullname) || empty($password) || empty ($confirmpassword)){
        $_SESSION['error'] = "กรอกข้อมูลไม่ครบ";
        header("Location: ../../register.php");
        exit();
    }

    if(strlen($password) <= 3){
        $_SESSION['error'] = "รหัสผ่านสั้นเกินไป";
        header("Location: ../../register.php");
        exit();
    }

    if($password !== $confirmpassword){
        $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        header("Location: ../../register.php");
        exit();
    }

    if($addUser->register($employeeid, $fullname, $managerid, $password)){
        $_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
    }else{
        $_SESSION['error'] = "สมัครสมาชิกไม่สำเร็จ, ID ซ้ำ";
    }

    header("Location: ../../register.php");
    exit();
}

?>