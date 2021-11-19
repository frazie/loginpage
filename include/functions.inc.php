<?php

 function emptySignupInput ($name, $email, $username, $pwd, $pwdrepeat){
     $result;
     if (empty($name)|| empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
         $result = true;
     }else{
         $result = false;
     }
     return $result;
 }
 function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidEmail ($email){
     $result;
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $result = true;
     }else{
         $result = false;
     }
     return $result;
}
function passwordMatch($pwd, $pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function uidExists($connection, $username, $email) {
    $sql = "SELECT * FROM `afri-eco` WHERE usid = ? OR ? = email;";

    $stmt = mysqli_stmt_init($connection);
     if (!mysqli_stmt_prepare($stmt, $sql)){
         header("location: ../signup.php?error=stmtfailed");
         exit();
     }
     mysqli_stmt_bind_param($stmt,"ss",$username, $email);
     mysqli_stmt_execute($stmt);

     $resultData=mysqli_stmt_get_result($stmt);

     if ($row = mysqli_fetch_assoc($resultData)){
         return $row;
     }else{
         $result = false;
         return $result;
     }
     mysqli_stmt_close($stmt);
}

function createUser($connection, $name, $email, $username, $pwd){
    $sql="INSERT INTO `afri-eco`(`name`, `email`, `usid`, `pwd`) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}