<?php
/*
include 'sess.php';
delval('aloggedin');
header("Location: login-applicant.html");
*/
include 'statusemail.php';
$email='ajaychowdaryshaganti2@gmail.com';
$unit='Data Science';
applicationstatus($email,'Approved',$unit);
?>
