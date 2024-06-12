<?php 
include 'sess.php';
global $dbh;
$dbh = new PDO("sqlite:/var/www/html/corpu.db");
$email = getval('aloggedin');
echo($email);
$subject_name = $_POST["subject_name"];
$no_of_hours = $_POST["no_of_hours"];
echo($no_of_hours);
echo($subject_name);

$query = "INSERT INTO applications (applicant_name, applied_subject, application_status, no_of_hours, email)
          SELECT a.fname, '$subject_name', 'pending', '$no_of_hours', '$email'
          FROM applicant a
          WHERE a.email = '$email'";
$stmt = $dbh->query($query);

header("Location: jobopp.php");
?>
