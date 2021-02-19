<?php
session_start();
if (!isset($_POST['login_submit']))
{
    // Chek if user actual submit login data
    // before accessing this page, If not
    // Display the user signup form
    header("location:./login.php");
}
else
{
// session_start();
// date_default_timezone_set('Africa/Lagos');
include("db_conn.php");
$con = mysqli_connect($host,$user,$pass);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else{
$select_db=mysqli_select_db($con, $dbase);

}

#Declaring Needed Variables
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

// Encrypting Password Field
$password = md5($password);


//Check for emptiness
if($username=="" or $password=="") {
 header("location:./login.php");
	}
	else
	 {

// Database Record retriever stage
$sql="SELECT priveledgeID FROM `qr_loginusers` WHERE username='$username' and password='$password'";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
if($row[priveledgeID] == 5){
    $sql="SELECT * FROM `qr_loginusers` WHERE username='$username' and password='$password'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    if ($row[username] == $username and $row[password] == $password){
        
        // Creating Session Variable here
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['priveledgeID'] = $row[priveledgeID];

        // Display adminDashboard from here
        header("location:./admin/index.php");


    }else{
        // Redirect back to Login Page
        header("location:./login.php");
    }

}else{
    // echo 'other user';
    $sql="SELECT * FROM `qr_loginusers` WHERE username='$username' and password='$password'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    if ($row[username] == $username and $row[password] == $password){

        //Session variables are dilivered here
        $_SESSION['username'] = $row[username];
        $_SESSION['password'] = $row[password];
        $_SESSION['priveledgeID'] = $row[priveledgeID];

        // Display Student Dashboard from here
        header("location:./client/user_page.php?LoggedInstudent={$username}");
        // header("Location: index.php?instructor={$username}");
        }else{
        // Redirect back to Login Page
        header("location:./login.php");
    }
}
// $result = mysqli_query($con, $sql);
// $count=mysqli_num_rows($result);
// $row=mysqli_fetch_array($result);
// // printf('this is a cool stuff', $count);




// echo $username;
// echo 'This is my database data'.'<br />';
// echo '<br />';
// echo $password;
// echo '<br />';
// echo $accountPriviledge;

	}


}
?>