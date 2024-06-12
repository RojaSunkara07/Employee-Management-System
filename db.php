 <?php 
 
                        include 'sess.php';
                    $email=getval('aloggedin');
                        $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                        $email=
                        $query = "SELECT  applied_subject, no_of_hours, time_slot
                        FROM applications where email='$email' group by application_status";

                        $result = $dbh->query($query);
foreach ($dbh->query($query) as $row) {
echo print_r($row, true) . "<br>"."<br>";
    }

?>
    


                                                           