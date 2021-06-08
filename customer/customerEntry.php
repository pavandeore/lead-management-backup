
<?php

$conn = mysqli_connect("localhost","root","","lead_management");


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

if(empty($name) || empty($contact)){
	echo "
	<div class='warning-msg alert alert-warning'>
	<b>Please fill all the fields...</b>
	</div>";
	exit();
}
else{

$sql = "INSERT INTO `customer_data`(`customer_name`, `customer_number`, `customer_alternative_number`, `cutomer_address`, `customer_email`, `company_name`, `gstno`) VALUES ('$name','$contact','$alternative_contact','$address','$email','$company','$gst') ";

if($conn->query($sql))
	echo "
	<div class='alert alert-success'>
	<b>Success</b>
	</div>";
else
	echo "
	<div class='alert alert-danger'>
	<b>Error</b>
	</div>";

}


 ?>


<script>
    $('.alert-success').delay('1000').fadeOut('2000');
	$('.alert-danger').delay('1000').fadeOut('2000');
	$('.warning-msg').delay('1000').fadeOut('2000');
</script>
