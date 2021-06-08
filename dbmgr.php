<?php
date_default_timezone_set("Asia/Kolkata");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lead_management";
session_start();
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "apiv2_local";

// Function to select multiple data from the service.
function selectfromtable($table, $data)
{
 // $servername='kudosedw-readreplica.cplf0rvieviw.ap-south-1.rds.amazonaws.com';
  global $servername, $username, $password, $dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT $data FROM $table";
  $roles = array();
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $roles[] = $row;
      }
      return $roles;
  } else {
      //echo "0 results";
      return 0;
  }
  $conn->close();
}
// Select one data set from the table with specific condition
function selectone($table, $condition, $data){
 // $servername='kudosedw-readreplica.cplf0rvieviw.ap-south-1.rds.amazonaws.com';
  global $servername, $username, $password, $dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT $data FROM $table WHERE $condition";
//echo $sql;
  //exit;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      if($result->num_rows == 1)
      {
        while($row = $result->fetch_assoc()) {
        return $row;
        }
      }
      else {
        return "false";
      }
  } else {
      return "false";
  }
  $conn->close();
}

// Function to select multiple data from the service conditional.
function selectfromtablecond($table, $data, $condition){
 // $servername='kudosedw-readreplica.cplf0rvieviw.ap-south-1.rds.amazonaws.com';
  global $servername, $username, $password, $dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT $data FROM $table WHERE $condition";
  //echo $sql;
  //exit;
  $roles = array();
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $roles[] = $row;
      }
      return $roles;
  } else {
      //echo "0 results";
      return 0;
  }
  $conn->close();
}
// Function to add log entry
function createLog($table, $fields, $values){
  global $servername, $username, $password, $dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO $table ($fields) VALUES ($values)";
 // exit;
  if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
  } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
// Get the real requester IP address
function getRealIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function insertToDB($table, $fields, $values){
    global $servername, $username, $password, $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
  //  echo "SQL: " .$sql;
   // exit;
    if ($conn->query($sql) === TRUE) {
    //    echo "New record created successfully";
       return "true";
   } else {
      //  echo "Error: " . $sql . "<br>" . $conn->error;
       return "false";
   }
    $conn->close();
}

function updateDB($table, $fields)
{
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE $table SET $fields";
//   echo $sql;
    if ($conn->query($sql) === TRUE) {
  //      echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

function deleteRecord($table,$where){
   global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 $sql = "DELETE FROM $table  WHERE $where";
  //echo $sql;
    if ($conn->query($sql) === TRUE) {
      return "true";
    } else {
        echo "Error while deleting record: " . $conn->error;
    }
    $conn->close();
}

function updateDBWhere($table, $fields, $where)
{
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE $table SET $fields WHERE $where";
	//echo $sql;
    if ($conn->query($sql) === TRUE) {
      return "true";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}

//This returns true or false if the value exists in the loan_master database. There are 2 or three fields are mandatory to ensure that the loans are not duplicated and client id is not repeated for the same loamn
function checkforduplicate($table,$data, $condition)
{
  global $servername, $username, $password, $dbname;

//  $table = "loan_master";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT $data FROM $table WHERE $condition";
 // echo $sql;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      if($result->num_rows == 1)
      {
        return "true";
      }
      else {
        return "false";
      }
  } else {
      return "false";
  }
  $conn->close();
}
function IND_money_format($money){
  $len = strlen($money);
  $m = '';
  $money = strrev($money);
  for($i=0;$i<$len;$i++){
      if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
          $m .=',';
      }
      $m .=$money[$i];
  }
  return strrev($m);
}
function generic_pagination_with_where_condition($per_page,$page,$condition,$data,$table){
  $page_url="?";
  if(!empty($condition)){
 $query=selectfromtablecond($table,$data,$condition);
  }else{
    $query=selectfromtable($table,$data);
  }
  $total = $query[0]['totalCount'];
  $adjacents = "2";
  $page = ($page == 0 ? 1 : $page);
  $start = ($page - 1) * $per_page;
  $prev = $page - 1;
  $next = $page + 1;
  $setLastpage = ceil($total/$per_page);
  $lpm1 = $setLastpage - 1;

  $setPaginate = "";
  if($setLastpage > 1)
  {
  $setPaginate .= "<ul class='setPaginate'>";
  $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
  if($page>1){
  $setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
  }
  if ($setLastpage < 7 + ($adjacents * 2))
  {
  for ($counter = 1; $counter <= $setLastpage; $counter++)
  {
  if ($counter == $page)
  $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
  else
  $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
  }
  }
  elseif($setLastpage > 5 + ($adjacents * 2))
  {
  if($page < 1 + ($adjacents * 2))
  {
  for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
  {
  if ($counter == $page)
  $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
  else
  $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
  }
  $setPaginate.= "<li class='dot'>...</li>";
  $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
  $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
  }
  elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
  {
  $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
  $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
  $setPaginate.= "<li class='dot'>...</li>";
  for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
  {
  if ($counter == $page)
  $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
  else
  $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
  }
  $setPaginate.= "<li class='dot'>..</li>";
  $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
  $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
  }
  else
  {
  $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
  $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
  $setPaginate.= "<li class='dot'>..</li>";
  for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
  {
  if ($counter == $page)
  $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
  else
  $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
  }
  }
  }
  if ($page < $counter - 1){
  $setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
  $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
  }else{
  $setPaginate.= "<li><a class='current_page'>Next</a></li>";
  $setPaginate.= "<li><a class='current_page'>Last</a></li>";
  }
  $setPaginate.= "</ul>\n";
  }
  return $setPaginate;
  }
?>
