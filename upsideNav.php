<?php

include 'config.php';

$sql = "SELECT count(status) AS open_lead FROM `tbl_leaddata` WHERE `tbl_leaddata`.status ='open' ";

$result=$con->query($sql);
$row = $result->fetch_assoc();
?>

<div class="upside-navigation py-3 my-2">
    <div class="repairing-div text-white"><?php echo $row['open_lead'];  ?><div>Open Lead</div></div>
    <div class="total-div text-white">999<div>Total / closed</div></div>
    <div class="deliver-div text-white">255<div>Lead FollowUp</div></div>
    <div class="repaired-div text-white">10<div>Quatation to Send</div></div>
</div>