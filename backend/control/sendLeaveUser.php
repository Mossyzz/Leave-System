<?php
session_start();

include_once('../config/database.php');
include_once('../dbcontrol/dbregister.php');

$connectDB = new Database();
$db = $connectDB->getConnection();

$sendLeave = new Dbregister($db);

if(isset($_POST["sendLeave"])){

    $leaveid = $_POST["leaveid"];
    $leave_from_date = $_POST["leave_from_date"];
    $leave_to_date = $_POST["leave_to_date"];
    $employeeid = $_POST["employeeid"];
    $leave_desc = $_POST["leave_desc"];

    if(empty($leaveid) || empty($leave_from_date) || empty($leave_to_date) || empty ($leave_desc)){
        $_SESSION['error'] = "กรอกข้อมูลไม่ครบ";
        header("Location: ../../showleave.php#send");
        exit();
    }

    if($sendLeave->sendLeave($leaveid,$leave_from_date,$leave_to_date,$employeeid,$leave_desc)){
        $_SESSION['success'] = "ส่งข้อมูลการลาเรียบร้อย";
        header("Location: ../../showleave.php#send");
        exit();
    }else{
        $_SESSION['error'] = "ส่งข้อมูลการลาไม่สำเร็จ , ID ใบลาซ้ำ";
        header("Location: ../../showleave.php#send");
        exit();
    }

}


?>