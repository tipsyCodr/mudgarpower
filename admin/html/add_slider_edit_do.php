<?php
require_once ('../../root/db_connection.php');

$uid = $_REQUEST['update_id'];
$old_imag = $_REQUEST['old_file'];
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$image_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

if (empty($image_name)) {
    $image_name = $old_imag;

} else {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $save_to = './uploads/slider_images/'. $image_name;
    $upload_status = move_uploaded_file($tmp_name, $save_to);
   
}


$query = "UPDATE `slide_information` SET `slide_title` = '$title', `slide_subtitle` = '$subtitle', `slide_image` = '$image_name' WHERE `slide_id` = '$uid'";
$result = $db->query($query) or die('');
if ($result) {
    echo 1;

} else {
    echo 2;
}

?>