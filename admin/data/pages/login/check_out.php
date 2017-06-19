<?php
session_start();
$_SESSION["auth_user"] = 0;
header("Location: ../../../../index.php");
?>