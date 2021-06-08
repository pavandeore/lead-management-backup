<?php
include 'config.php';

if(isset($_POST['leadType'])){
    $specific_lead_type = $_POST['leadType'];

    if($specific_lead_type == 'select all'){
        $sql = "SELECT * FROM `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id ORDER BY `followup_date` ";
    }else{
        $sql = "SELECT * FROM `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id AND `lead_type` = '$specific_lead_type' ORDER BY `followup_date` ";
    }
    
    $result = $con->query($sql);
    if($result->num_rows>0){ 
        include 'maindash-unique.php';         
    }

}else{
    echo "Query not run!";
}

?>