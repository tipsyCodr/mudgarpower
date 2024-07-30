<?php
require_once ('../../root/db_connection.php');

$image_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];


$save_to = '../../images/certificates/' . $image_name;
$upload_status = move_uploaded_file($tmp_name, $save_to);

if ($upload_status) {
    echo "1";

} else {
    echo 0;
}


?>