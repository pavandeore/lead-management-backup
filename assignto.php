<?php

include 'config.php';

$sql = "SELECT `name` FROM `employee` ";
$result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($roww = $result->fetch_assoc()) {
            echo "<option value=".$roww['name'].">".$roww['name']."</option>";
        }
    }

?>