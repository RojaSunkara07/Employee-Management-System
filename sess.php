<?php
$dbh = new PDO("sqlite:/var/www/html/corpu.db");

function setval($a, $b)
{
    global $dbh;
    $query = "INSERT INTO sessions(key, pair) VALUES ('$a', '$b')";
    $dbh->query($query);
}

function getval($a)
{
    global $dbh;
    $query = "SELECT pair FROM sessions WHERE key='$a'";
    $stmt = $dbh->query($query);
    $pair = $stmt->fetch();
    return $pair[0];
}


function delval($a)
{
global $dbh;
$stmt = $dbh->prepare("Delete FROM sessions WHERE key=:a");
$stmt->bindParam(':a', $a);

// Execute the statement
$stmt->execute();
}


?>
