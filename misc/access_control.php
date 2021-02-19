<?php
include_once 'db_conn.php';
// Begin session 
session_start();
date_default_timezone_set('Africa/Lagos');

// Getting content of Session that was set elsewhere
$username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
$password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password']

if(!isset($uid)) {
header("location:./login.php");
}

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;


?>
