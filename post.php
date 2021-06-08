<?php
include'dbmgr.php';
$action=$_GET['action'];
if($action=='login_data'){
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$qry=selectone("user","email='".$email."' and password='".$pass."'","*");
	//exit;
	if($qry!='false'){
		$_SESSION['FULLNAME']=$qry['email'];
		$_SESSION['id']=$qry['id'];
		header('Location:index.php');
	}
	else
	{
		$_SESSION['error']="Your Username or Password is Incorrect";
		header('Location:login.php');
	}
}


?>
