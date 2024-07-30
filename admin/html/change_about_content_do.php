<?php
require_once ('../../root/db_connection.php');

if (isset($_POST['description'])) {
    $description = $db->quote($_POST['description']);
  


    $image_name = $_FILES['about_image']['name'];
    $tmp_name = $_FILES['about_image']['tmp_name'];
    $save_to = "./uploads/about_images/" . $image_name;



    if (!empty($image_name)) {
        move_uploaded_file($tmp_name, $save_to);
        $qry = "UPDATE `about_section_information` SET `about_description`='$description',`about_img`='$image_name',`created_on`= NOW() where id = 1 ";


    } else {

        $qry = "UPDATE `about_section_information` SET `about_description`='$description',`created_on`= NOW() where id = 1 ";


    }
    $isExecuted = $db->query($qry) or die('');
    if ($isExecuted) {
        echo 1;
    } else {
        echo 2;
    }


}
?>