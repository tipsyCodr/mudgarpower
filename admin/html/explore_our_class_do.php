<?php
require_once ('../../root/db_connection.php');
if (isset($_POST['description'])) {
    $description = $db->quote($_POST['description']);
    $date = $_POST['date'];

    $description = htmlspecialchars($description);
    $qry = "UPDATE `explore_our_class` SET `description`='$description',`next_class`='$date',`created_on`=NOW() WHERE id=2";

  
    $query = $db->query($qry);

    $query = $db->prepare($qry);
   


    if ($query->execute()) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
