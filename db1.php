<?php
include 'sess.php';

 global $dbh;
    $query = "update assigned_units set subject_id=6 where assigned_staff='Ajay'";
    $stmt = $dbh->query($query);
    $pair = $stmt->fetch();
  
?>
