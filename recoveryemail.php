<?php
include 'sess.php';
//include 'createuser.php';
include 'mailconfig.php';
//createuser($fname);
$email= $_POST['email'];
try {
    $dbh = new PDO("sqlite:/var/www/html/corpu.db");
    $query = "SELECT COUNT(*) FROM APPLICANT WHERE email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $row_count = $stmt->fetchColumn();
    
    if ($row_count > 0) {
        $exists=1;
    } else {
	$exists=0;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if($exists)
{
setval('r-email',$email);
$sender_email = 'corpug23@gmail.com'; // Replace with your verified email address
$recipient_email = $email; // Replace with the recipient's email address
$subject = 'Password Reset link for CorpU account';
$body = '<html><body style="margin: 0; padding: 0;"><img src="https://www.telitec.com/wp-content/uploads/2020/09/password-header.png" width="100%" 
height="auto"><br><br><h2>Please use the below link to setup password for your account.
<br><a href="http://3.227.209.146/CorpU/resetpassword.php">Reset Password</a><br>this link is only valid for 30 mins</h2></body></html>';
// Send the email using the AWS SES client

$result = $client->sendEmail([
    'Source' => $sender_email,
    'Destination' => [
        'ToAddresses' => [$recipient_email],
    ],
    'Message' => [
        'Subject' => [
            'Data' => $subject,
        ],
        'Body' => [
            'Html' => [
                'Data' => $body,
            ],
        ],
    ],
]);
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
<div class="form-cube"> 
<h2><strong><center>Password reset link has been sent to you email. <br> Thank you.</h2>
    </center></strong></body>
</div>
</div>
';
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
<div class="form-cube">
<h2><strong><center>Email address does not exists in Database please create an account</h2> 
<a href="http://3.227.209.146/CorpU/register.html">Click here</a>  To go to verification page again 
    </center></strong></body>
</div>
</div>
</body>
';
}


?>