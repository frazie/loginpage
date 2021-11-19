<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySignupInput($name, $email, $username, $pwd, $pwdrepeat) !==false) {
        header("location: ../signup.php?error=emptyinput");
    exit();
    }

    if (invalidUid($username) !==false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !==false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (passwordMatch($pwd, $pwdrepeat) !==false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($connection, $username, $email) !==false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    createUser($connection, $name, $email, $username, $pwd);
}else{
    header("location: ../signup.php");
}
