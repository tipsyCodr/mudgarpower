<?php
// OneSignal configuration
$appId = 'caf671c6-78c6-48cf-ad71-48640e5f9812';
$restKey = 'os_v2_app_zl3hdrtyyzem7llrjbsa4x4yckt7tafwnv6ujzmljesjeif3aocjmrpn2rbo6kofhjq7cabrwff6ao34gee7gsubr6pyaonfet5jhqa';

// Notification content
$title = "Test Notification";
$message = "This is a test .";
$imageUrl = "https://example.com/path/to/image.png"; // optional image URL

// Target player IDs (replace with your actual player IDs)
$playerIds = ['af5960f6-11d8-4d3b-9d0f-ecdbd7967982'];
// $playerIds = ['fa83b75a-183e-41d7-b780-ca838b2cf1ba', '8e078917-202a-4701-a37b-f882ae22354f'];
// $playerIds = ['fa83b75a-183e-41d7-b780-ca838b2cf1ba', '8e078917-202a-4701-a37b-f882ae22354f'];

// Prepare the notification payload
$fields = [
    'app_id' => $appId,
    'include_subscription_ids' => $playerIds,
    'headings' => ['en' => $title],
    'contents' => ['en' => $message]
];

// Optionally add an image if provided
if (!empty($imageUrl)) {
    $fields['big_picture'] = $imageUrl;
    $fields['ios_attachments'] = ['id' => $imageUrl];
}

// Encode the payload to JSON
$fields = json_encode($fields);

// Initialize curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json; charset=utf-8',
    'Authorization: Basic ' . $restKey,
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Execute the request and capture the response
$response = curl_exec($ch);
curl_close($ch);

// Output the response
echo $response;
