<?php
class Dblogin{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($employeeid, $fullname, $password){
        $sql = "SELECT * FROM tb_employee WHERE employeeid = :employeeid AND fullname = :fullname";

        $result = $this->conn->prepare($sql);

        $result->bindParam(":employeeid", $employeeid);
        $result->bindParam(":fullname", $fullname);
        $result->execute();

        if($result->rowCount() === 1){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $hashedPassword = $row['password'];

            if($password===$hashedPassword){
                $_SESSION['user'] = [
                    'employeeid' => $row['employeeid'],
                    'fullname' => $row['fullname'],
                    'managerid' => $row['managerid']
                ];
                return true;
            }else{
                $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                return false;
            }
        }else{
            $_SESSION['error'] = "ไม่พบ ID หรือ ชื่อ ที่กรอก";
            return false;
        }

    }
}

?>