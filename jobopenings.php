

<?php 
include 'sess.php';
echo("hello");

$query = "SELECT  a.applied_subject, a.no_of_hours, b.time_slot
FROM applications AS a
JOIN assigned_units AS b ON a.applied_subject = b.subject_name
where a.application_status = 'Pending'";

$result = $dbh->query($query);
     foreach ($dbh->query($query) as $row) {
echo print_r($row, true) . "<br>"."<br>";
    }

?>




   