<?php
require_once('../../root/db_connection.php');

if (!empty($_FILES['image'])) {
    $count = 0;
    foreach ($_FILES['image']['name'] as $image_name) {
        $tmp_name = $_FILES['image']['tmp_name'][$count];

        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        if (in_array($extension, ['mp4', 'webm', 'ogg'])) {
            $save_to = '../../images/certificates/' . $image_name;
        } else {
            $save_to = '../../images/certificates/' . $image_name;
        }

        $upload_status = move_uploaded_file($tmp_name, $save_to);

        if ($upload_status) {
            echo "1";
        } else {
            echo 0;
        }

        $count++;
    }
}

