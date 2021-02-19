<?php 
session_start();
include "generateQR.php";
if(empty($_SESSION['username']  && $_SESSION['password'] &&  $_SESSION['priveledgeID'] == 5)){
    header("location:../login.php");
} 
else {
// html Content form to add new user here
include_once("../db_conn.php");
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
$errors = []; // Store all foreseen and unforseen errors here
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$first_name = mysqli_real_escape_string($con, $_POST['firstname']);
$last_name = mysqli_real_escape_string($con, $_POST['lastname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$dob = mysqli_real_escape_string($con, $_POST['dob']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$programme = mysqli_real_escape_string($con, $_POST['programme']);
$level = mysqli_real_escape_string($con, $_POST['level']);
$year_admitted = mysqli_real_escape_string($con, $_POST['year_admitted']);

// Get Passport attached along with Form
$currentDir = getcwd();
$uploadDirectory = "\\student_img\\";


// Other File upload house work process
$fileExtensions = ["jpeg","jpg","png"]; // Get all the file extensions
$fileName = $_FILES["passport"]["name"];
$fileSize = $_FILES["passport"]["size"];
$fileTmpName  = $_FILES["passport"]["tmp_name"];
$fileType = $_FILES["passport"]["type"];
$temp = explode(".", $_FILES["passport"]["name"]);
$newImageName =  str_replace('/', '_', $username).'.'. end($temp);;
$fileExtension = strtolower(end(explode('.',$fileName)));
$uploadPath = $currentDir . $uploadDirectory;


// Encrypting Password Field

$password = md5($password);

//Check for emptiness
if($username=="" or $password=="" or $first_name=="" or 
$last_name=="" or $email=="" or $phone=="" or $dob=="" or
$gender=="" or $programme=="" or $year_admitted=="" or $level=="") {
    header("location:./addUsers.php");
       }
       else
        {

        // Check if Matric Number is in-use
            $username_query ="SELECT * FROM `qr_loginusers` WHERE username='$username'";
            $sql_run =mysqli_query($con, $username_query) or die(mysql_error());
            $count=mysqli_num_rows($sql_run);

            // Check if Email is in-use
            $email_query ="SELECT * FROM `qr_users` WHERE email='$email'";
            $sql_run2 =mysqli_query($con, $email_query) or die(mysql_error());
            $count2=mysqli_num_rows($sql_run2);
            
            if ($count !=0 or $count2 !=0){
                echo 'This Matric Number or Email had been allocated to another Student. 
                Pleae use Back button of Your browser to edit the Matric Number or Email';}
            else{
                       
        // Saving Login User  Record into database stage         
            $sql="INSERT INTO `qr_loginusers`(`username`,`password`,`priveledgeID`) VALUES ('$username','$password','6')";
            mysqli_query($con,$sql) or die(mysql_error());
            $last_id = mysqli_insert_id($con);

            // Retrieve LevelID from DB
            $levelId = "SELECT * FROM `qr_level` WHERE current_level ='$level'";
            $sql_run =mysqli_query($con,$levelId) or die(mysqli_error($con));
            $row = mysqli_fetch_array($sql_run);
            $levelId = $row['levelID'];

            // Insert user data
            $sql2= "INSERT INTO `qr_users`(`privID`, `first_name`, `last_name`, `phone`, `email`, `dob`, `gender`, `programme`, `user_levelID`, `year`, `userloginID`) VALUES ('6','$first_name','$last_name','$phone', '$email', '$dob','$gender','$programme','$levelId', '$year_admitted', '$last_id')";
            mysqli_query($con,$sql2) or die(mysqli_error($con));
            $last_id = mysqli_insert_id($con);

            // Insert current user Url into Database
    
            $userUrl = http."://".$_SERVER['HTTP_HOST'].'/zainab/client/user_page.php?LoggedInstudent='.$username;
            
            // Insert General View url
            $publicUserurl = http."://".$_SERVER['HTTP_HOST'].'/zainab/client/generalView.php?username='.$username.'&privID=7';
            // http://localhost/zainab/client/generalView.php?username=16/cs47/xp/0004&privID=7
            
            $url_sql= "INSERT INTO `qr_pageurl`(`userurlID`, `plainUrl`, `encryptUrl`) VALUES('$last_id','$userUrl', '$publicUserurl')";
            mysqli_query($con,$url_sql) or die(mysqli_error($con));
            
            // Encrypting user Url and insert into DB
            
            // Generating QR code for the current user
            generateQR($username);
            // Taking care of the image function at this section
            if (! in_array($fileExtension,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }

            if ($fileSize > 2000000) {
                $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            }

            if (empty($errors)) {
                echo $fileTmpName;
                $didUpload = move_uploaded_file($fileTmpName, "$uploadPath\\$newImageName");

                // if ($didUpload) {
                //     echo "The file " . basename($newImageName) . " has been uploaded";
                // }
            }

            header("location:./addUsers.php");
            
        }



        }


}