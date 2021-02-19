<?php

//include only that one, rest required files will be included from it
include "phplib/qrlib.php";

//write code into file, Error corection lecer is lowest, L (one form: L,M,Q,H)
//each code square will be 4x4 pixels (4x zoom)
//code will have 2 code squares white boundary around
function generateQR($username){
$originalstu = $username; 
$newuser = str_replace('/', '_', $originalstu );
$user = $newuser.'.png';
// QRcode::png('PHP QR Code :)', 'test.png', 'L', 4, 2);
// QRcode::png("MY FIRST PHP QR CODE GENERATOR EXAMPLE") ;
QRcode::png ("http://localhost/zainab/client/user_page.php?LoggedInstudent=".$user , "./student_img/".$user, "L", 5, 5) ;
}
?>
