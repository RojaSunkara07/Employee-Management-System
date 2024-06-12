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
        <title>CorpU &#8211; Password Setup</title>
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
	<form method="post" action="verifypassword.php">
	<div class="signup-container"> 
            <!-- Box container containing elements -->
            <div class="form-cube"> 
                <img src="images/corpU-logo.svg" alt="corpU logo"> <!-- CorpU logo -->
                <h1 id="heading"> Please set your password. </h1>
		<div class="input-field" id="idFld"> 
                             <!-- HTML validation -->
                            <input type="password" name="password" id="password" required="required" placeholder="password"> 
                        </div>
		<div id="float-right">
                             <!-- Form button that submits input to backend -->
                            <button id="fill" type="submit" value="submit" class="signinBttn">Set Password</button>
                        </div>
</form>
    </body>
