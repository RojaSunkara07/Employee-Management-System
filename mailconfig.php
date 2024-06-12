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
?>