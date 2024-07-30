<?php
require_once ('../../root/db_connection.php');
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$image_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$uid = $_COOKIE['login'];

$save_to = './uploads/slider_images/'.$image_name;
$upload_status = move_uploaded_file($tmp_name, $save_to);

if ($upload_status) {
    $query = "INSERT INTO `slide_information`(`slide_title`, `slide_subtitle`, `slide_image`, `slide_created_on`, `slide_created_by`)
              VALUES ('$title','$subtitle','$image_name',now(),'$uid')";



    $insert_status = $db->query($query) or die('');
    if ($insert_status) {
        echo '1';
    } else {
        echo '0';
    }

} else {
    echo 0;
}


?>