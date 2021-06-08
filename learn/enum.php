<?php

$con = new mysqli("localhost","root","","learn");

$sql = "INSERT INTO `able`(`name`,`gender`) VALUES('Pawan','jm')";

if($con->query($sql)){
    echo "Inserted";
}else{
    echo "Not inserted";
}

?>