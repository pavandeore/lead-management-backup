<?php
$con = new mysqli("localhost","root","","test");
if(isset($_POST['save'])){
    
    $txtFullname = $_POST['txtFullname'];
    $txtEmail = $_POST['txtEmail'];
    $txtPhone = $_POST['txtPhone'];
    $txtAddress = $_POST['txtAddress'];

    $count = 0;
    $updatedcount = 0;
    
    foreach ($txtFullname as $key => $value) {
        $count++;
        $save = "INSERT INTO user(namee, email, phone, addresss) VALUES('".$value."','".$txtEmail[$key]."','".$txtPhone[$key]."','".$txtAddress[$key]."')";
        $con->query($save);
    }
    $updatedcount = $count;

    if($updatedcount > 0){
        echo "Updated Success";
    }else{
        echo "Kuch to Error hai boss!";
    }
}

?>