<?php 
session_start();
if(empty($_SESSION['username']  && $_SESSION['password'] && $_SESSION['priveledgeID'] == 6)){
    header("location:../login.php");
} 
else {
// html Content form to Display  user Data here
//  establishing Database Connection:
include_once("../db_conn.php");
$con = mysqli_connect($host,$user,$pass);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else{
$select_db=mysqli_select_db($con, $dbase);

$currentLoggedUser = $_SESSION['username'];
// Retrieve current Logged user detaild from Database

$currentLoggedUser ="SELECT loginID FROM `qr_loginusers` WHERE username='$currentLoggedUser'";
$sql_run =mysqli_query($con, $currentLoggedUser) or die(mysql_error());
$row = mysqli_fetch_array($sql_run);
$loginID = $row['loginID'];

// Retrieve User detail from User table 
$currentLoggedUser ="SELECT * FROM `qr_users` WHERE userloginID='$loginID'";
$sql_run =mysqli_query($con, $currentLoggedUser) or die(mysql_error());
$row = mysqli_fetch_array($sql_run);
$firstname = $row['first_name'];
$lastname = $row['last_name'];
$programme = $row['programme'];
$gender = $row['gender'];
$phone = $row['phone'];
$email = $row['email'];
$dob = $row['dob'];
$admitted_year = $row['year'];
$level = $row['user_levelID'];

$ImageName =  str_replace('/', '_', $_SESSION['username']);

// echo $ImageName;
 echo '<!doctype html>
 <html lang="en">
 
 <head>
 
     <!--====== Required meta tags ======-->
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <!--====== Title ======-->
     <title>KWASU Student profile page</title>
 
     <!--====== Favicon Icon ======-->
     <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
 
     <!--====== Bootstrap css ======-->
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 
     <!--====== Line Icons css ======-->
     <link rel="stylesheet" href="assets/css/LineIcons.css">
 
     <!--====== Magnific Popup css ======-->
     <link rel="stylesheet" href="assets/css/magnific-popup.css">
 
     <!--====== Default css ======-->
     <link rel="stylesheet" href="assets/css/default.css">
 
     <!--====== Style css ======-->
     <link rel="stylesheet" href="assets/css/style.css">
 
 
 </head>
 
 <body>
 
     <!--====== PRELOADER PART START ======-->
 
     <div class="preloader">
         <div class="loader_34">
             <div class="ytp-spinner">
                 <div class="ytp-spinner-container">
                     <div class="ytp-spinner-rotator">
                         <div class="ytp-spinner-left">
                             <div class="ytp-spinner-circle"></div>
                         </div>
                         <div class="ytp-spinner-right">
                             <div class="ytp-spinner-circle"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 
     <!--====== PRELOADER ENDS START ======-->
 
     <!--====== HEADER PART START ======-->
 
     <header id="home" class="header-area">
         <div class="navigation fixed-top">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <nav class="navbar navbar-expand-lg">
                             <a class="navbar-brand" href="../index.php">
                                 <img src="./../img/kwasulogo.png" alt="Logo">
                             </a> <!-- Logo -->
                             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="toggler-icon"></span>
                                 <span class="toggler-icon"></span>
                                 <span class="toggler-icon"></span>
                             </button>
 
                             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                 <ul class="navbar-nav ml-auto">
                                     <li class="nav-item active"><a class="page-scroll" href="#home">Home</a></li>
                                     <li class="nav-item"><a class="page-scroll" href="#about">About Me</a></li>
                                     <li class="nav-item"><a class="page-scroll" href="./../logout.php">Logout</a></li> 
                                     <!-- <li class="nav-item"><a class="page-scroll" href="#work">Portfolio</a></li> -->
                                     <!-- <li class="nav-item"><a class="page-scroll" href="#blog">Blog</a></li> -->
                                     <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
                                 </ul>
                             </div> <!-- navbar collapse -->
                         </nav> <!-- navbar -->
                     </div>
                 </div> <!-- row -->
             </div> <!-- container -->
         </div> <!-- navigation -->
 
         <div id="parallax" class="header-content d-flex align-items-center">
             <div class="header-shape shape-one layer" data-depth="0.10">
                 <img src="assets/images/banner/shape/shape-1.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-tow layer" data-depth="0.30">
                 <img src="assets/images/banner/shape/shape-2.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-three layer" data-depth="0.40">
                 <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-fore layer" data-depth="0.60">
                 <img src="assets/images/banner/shape/shape-2.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-five layer" data-depth="0.20">
                 <img src="assets/images/banner/shape/shape-1.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-six layer" data-depth="0.15">
                 <img src="assets/images/banner/shape/shape-4.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-seven layer" data-depth="0.50">
                 <img src="assets/images/banner/shape/shape-5.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-eight layer" data-depth="0.40">
                 <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-nine layer" data-depth="0.20">
                 <img src="assets/images/banner/shape/shape-6.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="header-shape shape-ten layer" data-depth="0.30">
                 <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
             </div> <!-- header shape -->
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-xl-5 col-lg-6">
                         <div class="header-content-right">
                             <h4 class="sub-title">Hello, My Name is</h4>
                             <h1 class="title">'. $firstname .'</h1>
                             <p>I am studying ' . $programme . ' in Kwara State University</p>
                             <a class="main-btn" href="#about">View my Details</a>
                         </div> <!-- header content right -->
                     </div>
                     <div class="col-lg-6 offset-xl-1">
                     <!--  Edit default image  -->
                     <div class="col-lg-6 offset-xl-1">
                     
                    <div style="margin: 20px auto;
                    display: block;
                    max-width:213px;
                    max-height:213px;
                    width: auto;
                    height: auto;
                    display: block;">
                    <img src="../admin/student_img/'.$ImageName.'.jpg">
                    <img src="../admin/student_img/'.$ImageName.'.png">
                    </div>
                     
                     <!-- <div class="header-image d-none d-lg-block">
                             <img src="assets/images/banner/hero.png" alt="hero">
                         </div> <!-- header image --> -->
                     </div>
                 </div> <!-- row -->
             </div> <!-- container -->
             
         </div> <!-- header content -->
     </header>
 
     <!--====== HEADER PART ENDS ======-->
 
     <!--====== ABOUT PART START ======-->
 
     <section id="about" class="about-area pt-125 pb-130">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-8">
                     <div class="section-title text-center">
                         <h2 class="title">About ' . $firstname .  $url .'</h2>
                     </div> <!-- section title -->
                 </div>
             </div> <!-- row -->
             <div class="row">
                 <div class="col-lg-6">
                     <div class="about-content mt-50">
                         <h5 class="about-title">Hi There! I"m ' . $firstname . ' ' .  $lastname . '</h5>
                         <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
                         <ul class="clearfix">
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-calendar"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Programme :</span>' . $programme . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-calendar"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Gender :</span>' . $gender . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-calendar"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Admitted Year:</span>' . $admitted_year . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-calendar"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Date of birth:</span>' . $dob . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-envelope"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Email:</span> ' . $email . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-phone-handset"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Phone:</span> ' . $phone . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                             <li>
                                 <div class="single-info d-flex align-items-center">
                                     <div class="info-icon">
                                         <i class="lni-map-marker"></i>
                                     </div>
                                     <div class="info-text">
                                         <p><span>Next of Kin" Phone:</span> ' . $phone . '</p>
                                     </div>
                                 </div> <!-- single info -->
                             </li>
                         </ul>
                     </div> <!-- about content -->
                 </div>
                 
                 <div class="contact-form pt-30">
                     <form id="contact-form" action="assets/contact.php">
                         <div class="single-form">
                             <input type="text" name="name" placeholder="Name">
                         </div> <!-- single form -->
                         <div class="single-form">
                             <input type="email" name="email" placeholder="Email">
                         </div> <!-- single form -->
                         <div class="single-form">
                             <textarea name="message" placeholder="Message"></textarea>
                         </div> <!-- single form -->
                         <p class="form-message"></p>
                         <div class="single-form">
                             <button class="main-btn" type="submit">Send Message</button>
                         </div> <!-- single form -->
                     </form>
                 </div> <!-- contact form -->
                 </div>
             </div> <!-- row -->
         </div> <!-- container -->
     </section>
 
     <!--====== ABOUT PART ENDS ======-->
 
     <!--====== SERVICES PART START ======-->
 
 
     <!--====== SERVICES PART ENDS ======-->
 
     <!--====== CALL TO ACTION PART START ======-->
 
     
     <!--====== CALL TO ACTION PART ENDS ======-->
 
     <!--====== WORK PART START ======-->
 
     
 
     <!--====== WORK PART ENDS ======-->
 
     <!--====== PRICING PART START ======-->
 
 
     <!--====== PRICING PART ENDS ======-->
 
     <!--====== BLOG PART START ======-->
 
 
     <!--====== BLOG PART ENDS ======-->
 
     <!--====== CONTACT PART START ======-->
 
     <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-8">
                     <div class="section-title text-center pb-25">
                         <h2 class="title">School\' Details</h2>
                         <!-- <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p> -->
                     </div> <!-- section title -->
                 </div>
             </div> <!-- row -->
             <div class="row justify-content-center">
                 <div class="col-lg-4 col-md-6 col-sm-7">
                     <div class="contact-box text-center mt-30">
                         <div class="contact-icon">
                             <i class="lni-map-marker"></i>
                         </div>
                         <div class="contact-content">
                             <h6 class="contact-title">Address</h6>
                             <p>Kwara State University, Malete, kwara State</p>
                         </div>
                     </div> <!-- contact box -->
                 </div>
                 <div class="col-lg-4 col-md-6 col-sm-7">
                     <div class="contact-box text-center mt-30">
                         <div class="contact-icon">
                             <i class="lni-phone"></i>
                         </div>
                         <div class="contact-content">
                             <h6 class="contact-title">Phone</h6>
                             <p>+2349000000</p>
                             <!-- <p>+547 5554 6663</p> -->
                         </div>
                     </div> <!-- contact box -->
                 </div>
                 <div class="col-lg-4 col-md-6 col-sm-7">
                     <div class="contact-box text-center mt-30">
                         <div class="contact-icon">
                             <i class="lni-envelope"></i>
                         </div>
                         <div class="contact-content">
                             <h6 class="contact-title">Email</h6>
                             <p>verifyme@kwasu.edu.ng</p>
                         </div>
                     </div> <!-- contact box -->
                 </div>
             </div> <!-- row -->
             
         </div> <!-- container -->
     </section>
 
     <!--====== CONTACT PART ENDS ======-->
 
     <!--====== FOOTER PART START ======-->
 
     <footer id="footer" class="footer-area">
         <div class="footer-widget pt-130 pb-130">
            
             </div> <!-- container -->
         </div> <!-- footer widget -->
         <div class="footer-copyright pb-20">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="copyright-text text-center pt-20">
                             <p>Copyright © 2020. Matric Number: 17d/47CS/XP/0054 rel="nofollow">Matric Number: 17d/47CS/XP/0054</p>
                         </div> <!-- copyright text -->
                     </div>
                 </div> <!-- row -->
             </div> <!-- container -->
         </div> <!-- footer widget -->
     </footer>
 
     <!--====== FOOTER PART ENDS ======-->
 
     <!--====== BACK TOP TOP PART START ======-->
 
     <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
 
     <!--====== BACK TOP TOP PART ENDS ======-->
 
 
 
 
 
 
 
     <!--====== jquery js ======-->
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
 
     <!--====== Bootstrap js ======-->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/popper.min.js"></script>
 
     <!--====== Magnific Popup js ======-->
     <script src="assets/js/jquery.magnific-popup.min.js"></script>
 
     <!--====== Parallax js ======-->
     <script src="assets/js/parallax.min.js"></script>
 
     <!--====== Counter Up js ======-->
     <script src="assets/js/waypoints.min.js"></script>
     <script src="assets/js/jquery.counterup.min.js"></script>
 
 
     <!--====== Appear js ======-->
     <script src="assets/js/jquery.appear.min.js"></script>
 
     <!--====== Scrolling js ======-->
     <script src="assets/js/scrolling-nav.js"></script>
     <script src="assets/js/jquery.easing.min.js"></script>
 
 
     <!--====== Main js ======-->
     <script src="assets/js/main.js"></script>
 
 </body>
 
 </html>
 ';
}
}
?>