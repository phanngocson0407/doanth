<?php

session_start();
include_once '../Model/UserModel.php';
include_once '../until/MySQLUtil.php';


function isUserExist($email,$arrUser = array()){
    $laExist = false;
    $userDetail = null;

    foreach($arrUser as $user){
       
          if($user->getEmail() == $email ){
                $userDetail = $user;
                $laExist = true;
          }
        
    }
    return $userDetail;
}
function isUserValid($email,$pass,$arrUser = array()){
    $userDetail = null;
    foreach($arrUser as $user){
        if ($user->getEmail() == $email && $user->getPassword() == $pass){
            $userDetail = $user;
        }

    }
    return $userDetail;
}
function dataValid($email, $pass){
    return checkEmailValid($email) && checkPasswordValid($pass);
}

$user_action = $_POST["user_action"];
$user_actionget = $_GET["user_action"];

var_dump($user_actionget);
exit();
switch($user_action){
    case "user_create":
        $txt_username= $_POST["username"];
        $txt_password= $_POST["password"];
        $txt_email= $_POST["email"];
        $txt_phone= $_POST["phone"];
        $txt_tenkhachhang= $_POST["tenkhachhang"];
        
        
        
        $user_01 = new UserModel("tho", "123", "truongtho@gmail.com", "09123", "nguyen truong tho", "online");
        $arrUsers = array();
        array_push($arrUsers, $user_01);
        $userDetail = isUserExist($txt_email, $arrUsers);
        var_dump($userDetail);
        
        if(!is_null($userDetail)){
            header("Location:../view/ADMIN/trangchu.php");
        
        }else{
           $user_02 =  new UserModel($txt_username, $txt_password,$txt_email,$txt_phone,$txt_tenkhachhang,"online"); 
           array_push($arrUsers, $user_02);
            $dbConnect = new MySQLUtils();
            $query = "INSERT INTO user (username,password,fullname,address,sex) VALUES(:username, :password, :fullname, :address, :sex)";
            $param = array(":username"=>$txt_username, ":password" =>$txt_password, ":fullname"=>$txt_tenkhachhang, ":address"=>"123", ":sex"=>"nam");
        
        }
        break;
    case "user_login":
        $userLogin_txt_email = $_POST["email"];
        $userLogin_txt_password = $_POST["password"];
        if(dataValid($userLogin_txt_email,$userLogin_txt_password)){
            $user = isUserValid($userLogin_txt_email, $userLogin_txt_password, $arrUsers);
            if(!(is_null($user))){
                $_SESSION["email"] = $userLogin_txt_email;
                $_SESSION["is_login"] = true;
                header("Location: ../view/ADMIN/trangchu.php");
            }
        }else{
            echo " Du Lieu Khong Hop Le !";
        }
        break;
    default:
        header("Location: ../view/ADMIN/index.php");
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