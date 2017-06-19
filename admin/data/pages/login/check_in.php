<?php
include('password.php');

$viewPWD = false;

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// attenzione al redirect dopo aver generato un output !!!!!

if ($viewPWD) {
    print "SHA1     : " . sha1($password) . '<br>';
}
else {
    if (sha1($password) == $adminPWD) {
        $_SESSION["auth_user"] = 1;
        header("Location: ../../../../index.php?p=admin");
    }
    else {
        header("Location: ../../../../index.php?p=noauth");
    }
}
?>