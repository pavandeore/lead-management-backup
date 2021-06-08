<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "lead_management";

session_start();

$con = mysqli_connect($host, $username, $password, $dbname);


$result = $con->query("SELECT * FROM `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id ORDER BY `followup_date`");
if($result->num_rows>0){ 
   include 'maindash-unique.php';  
}



?>