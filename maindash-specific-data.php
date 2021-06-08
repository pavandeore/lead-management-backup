<?php

include 'config.php';


if(isset($_POST['query'])){
    $specific_name = $_POST['query'];

    $sql = "SELECT * FROM `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id AND (`customer_name`  LIKE '$specific_name%' OR `customer_number`  LIKE '$specific_name%' ) ORDER BY `followup_date` ";

    $result = $con->query($sql);
    if($result->num_rows>0){ 
        include 'maindash-unique.php';      
    }

}
else{
    echo "No Record Found for Specific Search";
}


?>