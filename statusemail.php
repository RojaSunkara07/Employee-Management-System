<?php
use Aws\Ses\SesClient;

include 'mailconfig.php';

function applicationstatus($recipient_email, $status, $unit) {
    $sender_email = 'corpug23@gmail.com'; // Replace with your verified email address

    $subject = 'Your application has been ' . $status . '.';
    $body = '<html><body style="margin: 0; padding: 0;"><img src="https://www.pngarts.com/files/2/Turquoise-Abstract-Lines-Transparent-Image.png" width="100%" height="auto"><br><br><h2>Hello applicant, your application for ' . $unit . ' has been ' . $status . '.</h2></body></html>';

    // Configure the AWS SDK for SES
    $config = [
        'credentials' => [
        'key' => 'AKIATDZTRKYP5HRRS3JE',
        'secret' => 'kFOL1Wm1YzstNHtEdprIqrHTTcvRCwpJzKms641O',
        ],
        'region' => 'us-east-1', // Replace with your desired AWS region
        'version' => 'latest',
    ];

    // Create an instance of the SES client
    $client = new SesClient($config);

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
}
?>
