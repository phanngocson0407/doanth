<?php


class MySQLUtils
{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private static $conn;


    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "doan_thuchanh";
        if (self::$conn == NULL) {
            // echo "Tạo kết nối<br>";
            $this->connectDB();
        }
        // else{
        //     echo "Lấy kết nối cũ <br>";
        //     return self::$conn;
        // }
        return self::$conn;
    }
    public function __destruct()
    {
        $this->servername = "";
        $this->username = "";
        $this->password = "";
        $this->dbname = "";
        self::$conn = NULL;
    }
    private function connectDB()
    {


        try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function disconnectDB()
    {
        //echo "Đóng kết nối<br>";
        //$this->conn = null;
        self::$conn = NULL;
    }

    // public function insertUserData($txt_username, $txt_password,$txt_tenkhachhang,$txt_phone,$txt_status,$txt_email){
    //     $query = "INSERT INTO user(username, password, fullname, phone, status, email) VALUES (:username, :password, :fullname, :phone, :status, :email)";
    //     $stmt = self::$conn->prepare($query);
    //     $stmt->bindParam(":username", $txt_username);
    //     $stmt->bindParam(":password", $txt_password);
    //     $stmt->bindParam(":fullname", $txt_tenkhachhang);
    //     $stmt->bindParam(":phone", $txt_phone);
    //     $stmt->bindParam(":status", $txt_status);
    //     $stmt->bindParam(":email", $txt_email);
    //     $stmt->execute();
    // }
    public function insertData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
    }
    public function getAllData($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function updateData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->rowCount();

    }
    public function deleteData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->rowCount();

    }

}
?>