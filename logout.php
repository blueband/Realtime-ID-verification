<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['priveledgeID']);
header("location:./login.php");
?>