<?php

$conn = mysqli_connect("localhost","root","","lead_management");

    @$emp_name=$_POST['employee_name'];
    @$emp_number=$_POST['employee_number'];
    @$emp_role=$_POST['employee_role'];

  if(empty($emp_name) || empty($emp_number) || empty($emp_role) ){
    echo "
    <div class='unblurred warning-msg alert alert-warning p-3 m-3'>
    <b class='p-4 m-4'>Please fill all the fields...</b>
    </div>";
    exit();
  }else{

  $sql="INSERT INTO `employee`(`name`, `number`, `role`) VALUES ('$emp_name','$emp_number','$emp_role')";
  
    if($conn->query($sql))
      echo "
      <div class='noblurdiv alert alert-success p-4 m-4'>
      <b class='p-4 m-4'>&nbsp;&nbsp;Success&nbsp;&nbsp;</b>
      </div>";
    
    else
      echo "
      <div class='noblurdiv alert alert-danger'>
      <b class='px-4'>Error</b>
      </div>";
  }

?>