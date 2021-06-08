<?php

include 'config.php';

if(isset($_POST['status'])){
    $specific_status = $_POST['status'];
    $id = $_COOKIE['viewid'];

    $sql = "UPDATE `tbl_leaddata` SET `status`='$specific_status' WHERE `tbl_leaddata`.id='$id' ";

    if($con->query($sql)){
        echo "<div class='alert alert-success'>Status Changed</div>";
    }else{
        echo "error during changing status";
    }
}


?>

<script>
    $('.alert-success').delay('1000').fadeOut('2000');
</script>