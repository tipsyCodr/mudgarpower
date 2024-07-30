<?php

require_once ('../../root/db_connection.php');
if (isset($_REQUEST['picname'])) {
    $picname = $_REQUEST['picname'];
    // unlink('$picname');
    // echo $picname;
    if(file_exists($picname)){
        unlink($picname);
    ?>
    <script>
        window.location.replace("./manage_certifcate.php?delstatus=1");
    </script>

    <?php
    }
}


?>