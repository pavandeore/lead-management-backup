<?php
include 'config.php';

if(isset($_POST['status'])){
    $specific_status = $_POST['status'];

    if($specific_status == 'select all'){
        $sql = "SELECT * FROM `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id ORDER BY `followup_date` ";
    }else{
        $sql = "SELECT * FROM `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id AND `status` = '$specific_status' ORDER BY `followup_date` ";
    }
    
    $result = $con->query($sql);
    if($result->num_rows>0){ 
        include 'maindash-unique.php';  
    }

}else{
    echo "Query not run!";
}

?>