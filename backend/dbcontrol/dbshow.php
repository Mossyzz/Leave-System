<?php

class Dbshow{
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function getYourLeave($employeeid){
        $sql = "SELECT * FROM tb_leaveform WHERE employeeid = :employeeid";

        $result = $this->conn->prepare($sql);

        $result->bindParam(':employeeid',$employeeid);

        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStaffMemberLeave($employeeid){
        $sql = "SELECT l.*, e.fullname
        FROM tb_leaveform l
        JOIN tb_employee e ON l.employeeid = e.employeeid
        WHERE e.managerid = :employeeid
        ORDER BY leaveid ASC";

        $result = $this->conn->prepare($sql);

        $result->bindParam(':employeeid', $employeeid);

        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>