<?php
include 'mailconfig.php';
include 'sess.php';
$password = $_POST['password'];
$email=getval('r-email');
$dbh = new PDO("sqlite:/var/www/html/corpu.db");
try {
    $dbh = new PDO("sqlite:/var/www/html/corpu.db");
    $query = "UPDATE APPLICANT SET password = :password WHERE email=:email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
} catch (PDOException $e) {
    print "Connection failed: " . $e->getMessage();
}
delval('r-email');
header("Location: login-applicant.html");

?>



