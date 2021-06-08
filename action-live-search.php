<?php

include 'config.php';

if ($con->connect_error) {
    die("Failed to connect" . $con->connect_error);
}

if (isset($_POST['query'])) {
    $inputText = $_POST['query'];
    $query = "SELECT * FROM customer_data WHERE customer_name  LIKE '$inputText%'";

    $result = $con->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a href='#' id='live-search-click' onclick='return getrecord(" . $row['cust_id'] . ")'
            class='live-search-click list-group-item list-group-item-action border-1' >" . $row['customer_name'] .
                "</a>";
        }
    } else {
        echo "<p class='list-group-item'>No Record</p>";
    }
}

?>

<script>
    function getrecord(id) {
        $.ajax({
            url: "specific-entry-live-search.php",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                $(".right-div").html(data);
            }
        });

        $.ajax({
            url: "leadEntry.php",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                console.log('transferred');
            }
        });
    }
</script>