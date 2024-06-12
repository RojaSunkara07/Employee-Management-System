 <?php 
include 'sess.php';
include 'statusemail.php';
$dbh = new PDO("sqlite:/var/www/html/corpu.db");
$applicationID=$_GET['id'];

  $query = "update applications set application_status='Rejected'
where application_id = $applicationID;";
      $stmt = $dbh->query($query);
   $query =" select applied_subject , email from applications
where application_id =$applicationID;";

 $stmt = $dbh->query($query);
     $pair = $stmt->fetch();
  foreach ($dbh->query($query) as $row) {
    }
$unit= $row[0];
$email= $row[1];
applicationstatus($email,'Rejected',$unit);   
header("Location: applicants.php");
  
?>



