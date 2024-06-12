<?php
include 'sess.php';
 $dbh = new PDO("sqlite:/var/www/html/corpu.db");
 $email= $_POST['Email'];
 $password1 =$_POST['password'];
    global $dbh;
    $query = "SELECT password FROM applicant WHERE email='$email'";
    $stmt = $dbh->query($query);
    $pair = $stmt->fetch();
    $password2=$pair[0];

if($password1==$password2)
{
setval('aloggedin',$email);
header("Location: dashboard-applicant.html");
}
else
{
echo '
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="Applicant login page for CorpU">
		<meta name="keywords" content="CorpU, recruitment, IT">
		<meta name="author" content="Group 23">
        <title>CorpU &#8211; Verified</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <!-- Favicon for tab -->
        <link rel="icon" type="image/x-icon" href="images/game-fill.png">
        <!-- References to web icons from Remixicon.com -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- References to external fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
<div class="signup-container">
<div class="form-cube"><br><br>
<h2><center>Please enter valid login credentials</h2> 
<a href="http://3.227.209.146/CorpU/login-applicant.html">Click here</a> to go back to login page again 
    </center></body>
</div>
</div>
</body>
';

} 

?>