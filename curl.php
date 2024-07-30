<?php
$ch = curl_init();

$data = array(
    "model" => "llama3",
    "prompt" => "Write a recipe for dangerously spicy mayo."
);

// Set the URL
curl_setopt($ch, CURLOPT_URL, "http://localhost:11434/api/generate");

// Specify the request method as POST
curl_setopt($ch, CURLOPT_POST, true);

// Attach the data to the request
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Return the response as a string instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

curl_close($ch);
?>