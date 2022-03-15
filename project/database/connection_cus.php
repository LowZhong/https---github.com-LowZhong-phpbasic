<?php
// used to connect to the database
$host = "localhost";
$db_name = "new_customer";
$username = "new_customer";
$password = "m3l5lmVX39rdRbAw";

try {
$con = new
PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
echo "Connected successfully <br/>";
}

// show error
catch(PDOException $exception){
echo "Connection error: ".$exception->getMessage();
}

function validateUsername($username){
    if($username == null){
        return 'Please enter username';
    }else if(strlen($username)<6){
        return 'username must at least 6 character'; //return error msg
    }
}

function validatePassword($password,$inputconfirmPassword){
    if($password == null){
        return 'Please enter password';
    }else if($inputconfirmPassword == null){
        return 'Please enter confirm password';
    }else if(strlen($password)<6){ //password length
        return 'password must at least 6 character'; //return error msg
    }else if(!preg_match('@[A-Z]@',$password)){
        return 'password must contain at least a capital letter.';
    }else if(!preg_match('@[a-z]@',$password)){
        return 'password must contain at least a small letter.';
    }else if(!preg_match('@[0-9]@',$password)){ //preg.checking format
        return 'password must contain at least a number.';
    }else if($password != $inputconfirmPassword){//
        return 'Both Password & Confirm Password must be same.';
    }
}