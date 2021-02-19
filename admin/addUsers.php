<?php 
session_start();
if(empty($_SESSION['username']  && $_SESSION['password'] && $_SESSION['priveledgeID'] == 5)){
    header("location:../login.php");
} 
else {
    $_SESSION['admin_add_user'] = 'fromaddUser_form'; 
// html Content form to add new user here
echo '
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Admin Dashboard</title>
		<meta name="description" content="A tutorial on how to recreate the effect of YouTube\'s little left side menu. The idea is to slide a little menu icon to the right side while revealing some menu item list beneath. " />
		<meta name="keywords" content="Add keywords" />
		<meta name="author" content="_yourName_ for Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <link href="./bootstrap/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,600,500,700" rel="stylesheet"
                type="text/css" />
        <script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">	
			<header class="clearfix">
				<h1>Admin Dashboard-- Adding student records</span></h1>	
			</header>
            <div class="main">
<form action ="addProccess.php" method="POST" enctype="multipart/form-data">
<div class="col-md-4">

<div class="form-group">
<label class=""> First Name   </label>
<input type="text" name="firstname" class="form-control col-md-4" required>
</div>
<div class="form-group">
<label class=""> Last Name   </label>
<input type="text" name="lastname"  class="form-control col-md-4" required>
</div>
<div class="form-group">
<label class=""> Email Address   </label>
<input type="email" name="email" class="form-control col-md-4" required>
</div>

<div class="form-group">
<label class=""> Phone Number  </label>
<input name="phone" type="text" class="form-control col-md-4" pattern="{999}-{99999999}" maxlength="11" >
</div>

<div class="form-group">
<label class=""> Matric Number  </label>
<input type="text" name="username" class="form-control col-md-4" required>
</div>

<div class="form-group">
<label class=""> Pasword  </label>
<input type="password" name="password" class="form-control col-md-4" required>
</div>
     
</div>
<div class="col-md-4">    
<div class="form-group">
<label class=""> Date of Birth  </label>
<div class="form-group">
<div class="input-group date">
 <input type="text" name ="dob" class="form-control" id="datepicker" />
 <span class="input-group-addon">
     <span class="glyphicon glyphicon-calendar"></span>
 </span>
 </div>
</div>
</div>
<div class="form-group">
<label class=""> Gender  </label>
<select type="text" name="gender" class="form-control col-md-4" >
<option>Select gender  </option>
 <option  value="male">Male </option>
  <option value="female">Female  </option>
</select>
 </div>
  
<div class="form-group">
<label class=""> Department *</label>
<select type="text" name="programme"  class="form-control col-md-4" >
<option>Please Select Program  </option>
  <option value="Computer Science">Computer Science</option>
  <option value="Mass Communication">Mass Communication</option>
  <option value="Library and Information Science">Library and Information Science</option>
  </select>
 </div>
 <div class="form-group">
 <label class=""> Level  </label>
 <select type="text" name="level" class="form-control col-md-4" >
 <option>Select Level  </option>
  <option  value="100">100 Level </option>
  <option  value="200">200 Level </option>
  <option  value="300">300 Level </option>
  <option  value="400">400 Level </option>
   <option value="500">500 level  </option>
 </select>
  </div>
 
<div class="col-md-4">    
<div class="form-group">
<label class=""> Entrance Year  </label>
<div class="form-group">
<div class="input-group date">
 <input type="text" name ="year_admitted" class="form-control" id="datepicker" />
 <span class="input-group-addon">
     <span class="glyphicon glyphicon-calendar"></span>
 </span>
 </div>
</div>
</div>

<!-- Passport upload Section -->
<div class="custom-file">
  <input type="file" class="custom-file-input" name="passport" id="passport" >
  <label class="custom-file-label" for="passport">Upload Passport</label>
</div>

<br /> <br />
<div class="submitButton">
                   <button type="submit" class="btn btn-default">Submit Your Request</button>
 </div>
</div>

</form>
</div>

</body>
';

}
?>