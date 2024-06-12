<?php

require '/var/www/html/vendor/autoload.php'; // Include the AWS SDK for PHP

use Aws\Ses\SesClient; // Import the necessary AWS SES classes

// Set up the AWS SES client
$client = new SesClient([
    'version' => 'latest',
    'region' => 'us-east-1', // Replace with the AWS SES region you're using
    'credentials' => [
        'key' => 'AKIATDZTRKYP5HRRS3JE',
        'secret' => 'kFOL1Wm1YzstNHtEdprIqrHTTcvRCwpJzKms641O',
    ],
]);
$code=rand(1000,9999);
// Set up the email message
$sender_email = 'corpug23@gmail.com'; // Replace with your verified email address
$recipient_email = '167r1a0448@gmail.com'; // Replace with the recipient's email address
$subject = 'Test email';


$body = '<html><body style="margin: 0; padding: 0;"><img src="https://www.pngarts.com/files/2/Turquoise-Abstract-Lines-Transparent-Image.png" width="100%" height="auto"><br><br><p>Verification code for sign up process is.</p></body></html>'.$code;





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
echo "Email sent! Message ID: " . $result['MessageId'];
header("Location: email1.php?code=$code");

?>


