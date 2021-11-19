<?php

if(isset($_POST["submit"])){

    $username = $_POST["usid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyloginInput($username, $pwd) !==false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !==false) {
        header("location: ../login.php?error=invalidusername");
        exit();
    }

    if (invalidPassword($pwd) !==false) {
        header("location: ../login.php?error=invalidpasswprd");
        exit();
    }
}

 loginUser($connection, $username, $pwd);

}else{
     header("location: ../login.php");
}

function emptySignupInput ($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}