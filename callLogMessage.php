<?php 

include 'config.php';

@$id = $_POST['id'];


$result = $con->query("SELECT * FROM `call_log` WHERE id = '$id' ");
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){

        echo "<b>Message: </b>".$row['call_message'];

    }
}

?>