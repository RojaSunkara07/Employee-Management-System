<?php
$subject_name=$_POST['subject_name'];
$required_hours=$_POST['required_hours'];
$assigned_hours=$_POST['assigned_hours'];
$time_slot=$_POST['time_slot'];
include 'sess.php';
try {
$query = "UPDATE assigned_units SET required_hours = '$required_hours', assigned_hours = '$assigned_hours', time_slot = '$time_slot' WHERE subject_name = '$subject_name'";
$stmt = $dbh->prepare($query);
$stmt->execute();
}
 catch (PDOException $e) {
    print "Connection failed: " . $e->getMessage();
}

echo $subject_name,$required_hours,$assigned_hours,$time_slot;
header("Location:job_postings.php");
?>
