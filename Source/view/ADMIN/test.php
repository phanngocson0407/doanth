<?php
 //include_once './../../Model/UserModel.php';
 include_once './../../until/MySQLUtil.php';
$dbConnect = new MySQLUtils();
$query = "SELECT userid, username, password, fullname, phone, status, email from user";
$data = $dbConnect->getAllData($query);
var_dump($data);
$dbConnect->disconnectDB();

?>