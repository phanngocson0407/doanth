<?php
class DataValidationUtils {
    function checkEmailValid($email){
        $pattern_email = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        return (!preg_match($pattern_email, $email))?false:true;
    }
    function checkPasswordValid($pass){
        $pattern_pass = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}";
        return (!preg_match($pattern_pass, $pass))?false:true;
    }
}
?>