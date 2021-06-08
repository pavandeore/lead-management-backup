<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data and upate</title>
</head>
<body>
<center>
    <h1>Search data and update it </h1>
   
    <form action="" method="POST">
        <input type="text" name="id" placeholder="enter id to search" />
        <input type="submit" name="search" value="Search Data" />

    </form>
    
    <?php

    $con = new mysqli("localhost","root","","lead_management");

    if(isset($_POST['search'])){
        $id = $_POST['id'];
        $query = "SELECT * FROM test_data where id='$id'";
        $run = $con->query($query)
        while($row = mysqli_fetch_array($run)){
            echo $row['name'];
        }
    }

    ?>

</center>
</body>
</html>