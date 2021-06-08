<?php

$conn = mysqli_connect("localhost", "root", "", "lead_management");


@$id = $_POST['call_cust_id'];
@$message = $_POST['call_message'];

if (empty($message)) {
    echo "
	<div class='warning-msg alert alert-warning'>
	<b>Please fill all the fields...</b>
	</div>";
    exit();
} else {

    $sql = "INSERT INTO `call_log`(`cust_id`, `call_message`, `call_time`) VALUES ('$id','$message',NOW()) ";

    if ($conn->query($sql))
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