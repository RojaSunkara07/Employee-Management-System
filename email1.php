<?php
include 'mailconfig.php';
include 'sess.php';
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phonenum'];
$teachingfeild = $_POST['tfeild'];
$otherteachingfeild = $_POST['commentskills'];
$code=rand(1000,9999);
setval('login',$code);
setval('email',$email);
$sender_email = 'corpug23@gmail.com'; // Replace with your verified email address
$recipient_email = $email; // Replace with the recipient's email address
$subject = 'Verification email from CorpU';
$body = '<html><body style="margin: 0; padding: 0;"><img src="https://www.pngarts.com/files/2/Turquoise-Abstract-Lines-Transparent-Image.png" width="100%" height="auto"><br><br><h2>Verification code for sign up process is.</h2></body></html>'.$code;
// Send the email using the AWS SES client

$result = $client->sendEmail([
    'Source' => $sender_email,
    'Destination' => [
        'ToAddresses' => [$recipient_email],
    ],
    'Message' => [
        'Subject' => [
            'Data' => $subject,
        ],
        'Body' => [
            'Html' => [
                'Data' => $body,
            ],
        ],
    ],
]);

echo $fname,$lname,$email,$phone,$teachingfeild,$otherteachingfeild;
echo gettype($fname),gettype($lname),gettype($email),gettype($phone),gettype($teachingfeild),gettype($otherteachingfeild);

$dbh = new PDO("sqlite:/var/www/html/corpu.db");
try {
    $query = "INSERT INTO APPLICANT (fname,lname,email,phone,teachingfield,otherteachingfield)
    VALUES ('$fname','$lname',:email,'$phone','$teachingfeild','$otherteachingfeild')";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();   
} catch (PDOException $e) {
    print "Connection failed: " . $e->getMessage();
}
$dbh = null;

header("Location: verifycode1.php");

?>


