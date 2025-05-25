<?php

class Dbregister{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function register($employeeid, $fullname, $managerid, $password){
        
        $sql = "INSERT INTO tb_employee (employeeid,fullname,managerid,password) VALUES (:employeeid,:fullname,:managerid,:password)";

        $result = $this->conn->prepare($sql);

        $result->bindParam(":employeeid", $employeeid);
        $result->bindParam(":fullname", $fullname);
        $result->bindParam(":managerid", $managerid);
        $result->bindParam(":password", $password);

        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function sendLeave($leaveid, $leave_from_date, $leave_to_date, $employeeid, $leave_desc){

        $sql = "INSERT INTO tb_leaveform (leaveid,leave_from_date,leave_to_date,employeeid,leave_desc) VALUES (:leaveid,:leave_from_date,:leave_to_date,:employeeid,:leave_desc)";

        $result = $this->conn->prepare($sql);

        $result->bindParam(':leaveid', $leaveid);
        $result->bindParam(':leave_from_date', $leave_from_date);
        $result->bindParam(':leave_to_date', $leave_to_date);
        $result->bindParam(':employeeid', $employeeid);
        $result->bindParam(':leave_desc', $leave_desc);

        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>