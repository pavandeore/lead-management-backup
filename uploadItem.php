<?php

$conn = mysqli_connect("localhost","root","","lead_management");

    @$item_name=$_POST['item_name'];
    @$item_desc=$_POST['item_desc'];
    @$item_rate=$_POST['item_rate'];
    @$item_gst=$_POST['item_gst']; 

  if(empty($item_name) || empty($item_desc) || empty($item_rate) || empty($item_gst)){
    echo "
    <div class='unblurred warning-msg alert alert-warning p-3 m-3'>
    <b class='p-4 m-4'>Please fill all the fields...</b>
    </div>";
    exit();
  }else{

  $sql="INSERT INTO `item_master`(`item_name`, `item_desc`, `rate`, `gst`) VALUES ('$item_name','$item_desc','$item_rate', '$item_gst')";
  
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