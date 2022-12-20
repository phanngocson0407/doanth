<?php

session_start();
include_once '../Model/UserModel.php';
include_once '../until/DataValidationUtils.php';

class UserController
{
    public function dataValid($email, $pass)
    {
        $validData = new DataValidationUtils();
        return $validData->checkEmailValid($email) && $validData->checkPasswordValid($pass);
    }
    public function insertUser($user){
        $user->insertUser();

    }
    public function updateUser($user){
        $user->updateUser();

    }
    public function deleteUser($user){
        $user->deleteUser();

    }
    public function getUser($user){
        $user->getUser();

    }
    public function getAllUser($user){
      return $user->getAllUser();

    }
  


}



// function isUserExist($email, $arrUser = array())
// {
//     $laExist = false;
//     $userDetail = null;

//     foreach ($arrUser as $user) {

//         if ($user->getEmail() == $email) {
//             $userDetail = $user;
//             $laExist = true;
//         }

//     }
//     return $userDetail;
// }
// function isUserValid($email, $pass, $arrUser = array())
// {
//     $userDetail = null;
//     foreach ($arrUser as $user) {
//         if ($user->getEmail() == $email && $user->getPassword() == $pass) {
//             $userDetail = $user;
//         }

//     }
//     return $userDetail;
// }



// $arrUsers = array();
// $user_01 = new UserModel("tho", "123", "truongtho2262001@gmail.com", "09123", "nguyen truong tho", "online");
// array_push($arrUsers, $user_01);
$user_action = "";
if(count($_POST)>0){
    $user_action = $_POST["user_action"];

}

$userControl = new UserController();
switch ($user_action) {
    case "user_create":
        $txt_username = $_POST["username"];
        $txt_password = md5($_POST["password"]);
        $txt_email = $_POST["email"];
        $txt_phone = $_POST["phone"];
        $txt_status = $_POST["status"];
        $txt_tenkhachhang = $_POST["tenkhachhang"];



        //  $userDetail = isUserExist($txt_email, $arrUsers);

        // if(!is_null($userDetail)){
        //     header("Location:../view/ADMIN/trangchu.php");

        // }else{
        $user_02 = new UserModel($txt_username, $txt_password, $txt_email, $txt_phone, $txt_tenkhachhang, $txt_status,0);
        $userControl->insertUser($user_02);

        break;
    case "user_login":
        $userLogin_txt_email = $_POST["email"];
        $userLogin_txt_password = $_POST["password"];

        if (dataValid($userLogin_txt_email, $userLogin_txt_password)) {

            //  $user = isUserValid($userLogin_txt_email, $userLogin_txt_password, $arrUsers);
            if (!(is_null($user))) {
                $_SESSION["email"] = $userLogin_txt_email;
                $_SESSION["is_login"] = true;
                header("Location: ../view/ADMIN/trangchu.php");
            }
        } else {
            echo " Du Lieu Khong Hop Le !";
        }
        break;
    default:
        //  header("Location: ../view/ADMIN/userListPage.php");
        $user = new UserModel("", "", "", "", "", "", 0);
        $data = $userControl->getAllUser($user);
        include_once '../view/ADMIN/customer.php';
        // header("Location: ../view/ADMIN/userListPage.php");
        break;

}


// $txt_username= $_POST["username"];
// $txt_password= $_POST["password"];
// $txt_email= $_POST["email"];
// $txt_phone= $_POST["phone"];
// $txt_tenkhachhang= $_POST["tenkhachhang"];



// $user_01 = new UserModel("tho", "123", "truongtho@gmail.com", "09123", "nguyen truong tho", "online");
// $arrUsers = array();
// array_push($arrUsers, $user_01);
// $userDetail = isUserExist($txt_email, $arrUsers);
// var_dump($userDetail);

// if(!is_null($userDetail)){
//     header("Location:../view/ADMIN/trangchu.php");

// }else{
//    $user_02 =  new UserModel($txt_username, $txt_password,$txt_email,$txt_phone,$txt_tenkhachhang,"online"); 
//    array_push($arrUsers, $user_02);
//     $dbConnect = new MySQLUtils();
//     $query = "INSERT INTO user (username,password,fullname,address,sex) VALUES(:username, :password, :fullname, :address, :sex)";
//     $param = array(":username"=>$txt_username, ":password" =>$txt_password, ":fullname"=>$txt_tenkhachhang, ":address"=>"123", ":sex"=>"nam");

// }






?>