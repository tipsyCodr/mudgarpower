<?php
// send_mail.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $cc = $_POST["cc"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];

    $to = "your-email@example.com";
    $cc = $cc ? "CC: $cc\n" : "";

    $message = "{$cc}Subject: $subject\n\n$body";

    $result = mail($to, $subject, $message, "From: $email");
    var_dump($result);   
    // header("Location: thank-you.html");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
</head>
<body>
<form method="post" action="send_mail.php">
    <label for="name">Name:</label><br>
    <input type="text" name="name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" name="email" required><br>
    <label for="cc">CC:</label><br>
    <input type="email" name="cc"><br>
    <label for="subject">Subject:</label><br>
    <input type="text" name="subject" required><br>
    <label for="body">Body:</label><br>
    <textarea name="body" rows="10" cols="30" required></textarea><br>
    <input type="submit" value="Send">
</form>


</body>
</html>