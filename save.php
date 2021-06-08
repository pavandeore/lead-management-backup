<?php
include'config.php';
$name=$_POST['name'];
$cname=$_POST['cname'];
$source=$_POST['source'];
$type=$_POST['type'];
$gst=$_POST['gst'];
$addr=$_POST['addr'];
$description=$_POST['description'];
$sql="INSERT INTO `tbl_cust` (`id`, `name`, `cname`, `source`, `type`, `gst`, `addr`, `description`) VALUES (NULL, '$name', '$cname', '$source', '$type', '$gst', '$addr', '$description')";
if($con->query($sql)>0)
{
	$_SESSION['message']='Record inserted successfully...';
	header('Location:index.php');

}
else{
	echo "error";
}
?>