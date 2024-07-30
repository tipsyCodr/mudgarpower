<?php
// var_dump(json_encode($_POST));


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['message'])) {
    require_once ('../root/db_connection.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['mobile'];
    $message = $_POST['message'];
    $to = "developerpathidea@gmail.com";
    $subject = "Hello";
    $body = "From: " . $name . "\r\nEmail ID: " . $email . "\r\nPhone Number: " . $phone . "\r\nMessage: " . $message;
    $headers = "From: " . $email . "\r\nReply-To: " . $email;
    $sql = "INSERT INTO `contact_information`(`contact_name`, `contact_email`, `contact_phone`, `contact_message`, `created_on`) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $message . "', NOW())";
    $query = $db->query($sql) or die("");
    if (mail($to, $subject, $body, $headers)) {

        echo "<script>alert('Email sent successfully');</script>";
        // echo "Success";
    } else {
        echo "<script>alert('Email sending failed');</script>";
        // echo "Failed";
    }
    echo '<h1>Redirecting Back to Home Page...</h1>';
    header("location: ../");

    exit;
}
?>