
<?php

$conn = mysqli_connect("localhost","root","","lead_management");


if(isset($_POST['id']) ){
    @$specific_id = $_POST['id'];
    setcookie('id', $specific_id);
}
else{

    @$id = $_COOKIE['id'];
    @$lead_source=$_POST['source'];
    @$lead_type=$_POST['type'];
    @$assign_to=$_POST['assign_to'];
    @$priority=$_POST['priority'];
    @$folloup_date=$_POST['followup-date'];
    @$requirement=$_POST['requirement'];


  if(empty($id) || empty($lead_source) || empty($lead_type) || empty($folloup_date) || empty($requirement)){
    echo "
    <div class='unblurred warning-msg alert alert-warning p-3 m-3'>
    <b class='p-4 m-4'>Please fill all the fields...</b>
    </div>";
    exit();
  }else{

  $sql="INSERT INTO `tbl_leaddata`(`cust_id`, `lead_source`, `lead_type`, `assign_to`, `priority`, `requirement`, `followup_date`,`last_contacted`,`status`) VALUES ('$id','$lead_source','$lead_type', '$assign_to','$priority','$requirement','$folloup_date',NULL,'draft')";
  

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
}
?>

<script>
  $(document).ready(function(){

  })
</script>