<?php

require_once ('../../root/db_connection.php');
$slide_id = $_REQUEST['id'];

$query = "SELECT * FROM `slide_information` WHERE `slide_id` = '$slide_id'";

$result = $db->query($query) or die('');
$row = $result->fetch(PDO::FETCH_ASSOC);
unlink($row['slide_image']);

$query = "DELETE FROM `slide_information` WHERE `slide_id` = '$slide_id'";


$result = $db->query($query) or die('');
if ($result) {
    ?>
    <script>
        window.location.replace("./add_slider_manage.php?delstatus=1");

    </script>

    <?php
}

?>