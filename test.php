<?php
include 'sess.php';
$dbh = new PDO("sqlite:/var/www/html/corpu.db");
$query = "select * from assigned_units";
    
    foreach ($dbh->query($query) as $row) {
echo print_r($row, true) . "<br>"."<br>";
    }


?>
