
<?php

$conn = mysqli_connect("localhost","root","","lead_management");

@$id = $_POST['id'];
@$name = $_POST['fullName'];
@$contact = $_POST['contact'];
@$alternative_contact = $_POST['alternative_contact'];
@$email = $_POST['email'];
@$address = $_POST['address'];
@$company = $_POST['company'];
@$gst = $_POST['gst'];



$name1="/^[a-zA-Z]+$/";
$emailregexp="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number="/^[0-9]+$/";

if(empty($name) || empty($contact) || empty($email) ){
	echo "
	<div class='alert alert-warning'>
	<b>Please filled all the fields...</b>
	</div>";
	exit();
}
else{

$sql = "UPDATE `customer_data` SET customer_name='$name', customer_number='$contact' , customer_alternative_number='$alternative_contact', cutomer_address='$address', customer_email='$email', company_name='$company', gstno='$gst' WHERE cust_id='$id' ";

if($conn->query($sql)){
	echo "
	<div class='p-4 alert alert-success'>
	<b class='py-2 px-4'>Updated</b>
	</div>";
}else{
	echo "
	<div class='alert alert-danger'>
	<b>Error</b>
	</div>";
}

}


 ?>
